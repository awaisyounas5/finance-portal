<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MacroeconomicDocument;
use Illuminate\Support\Facades\File;

class MacroeconomicDocumentController extends Controller
{
    public function index()
    {
        $documents = MacroeconomicDocument::all();
        return view('macroeconomic_outlook.view', compact('documents'));
    }

    public function create()
    {
        return view('macroeconomic_outlook.create');
    }


    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'document.*' => 'required|mimes:pdf,doc,docx|max:2048', // Add validation for file types and maximum file size
        ]);

        try {
            // Process document uploads
            $data = [];
            if ($request->hasfile('document')) {
                foreach ($request->file('document') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path('documents'), $name);
                    $data[] = $name;
                }
            }

            $document = new MacroeconomicDocument();
            $document->name = $request->name;
            $document->description = $request->description;
            $document->file_path = json_encode($data);
            $document->save();

            return redirect()->back()->with('success', 'Macroeconomic document created successfully.');
        } catch (\Exception $e) {
            // Handle any exception that occurs during the process
            return redirect()->back()->with('error', 'Failed to create macroeconomic document. Please try again.');
        }
    }

    public function edit($id)
    {
        $document = MacroeconomicDocument::find($id);
        return view('macroeconomic_outlook.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'new_document.*' => 'sometimes|required|mimes:pdf,doc,docx|max:2048', // Validate new documents if provided
            ]);

            $document = MacroeconomicDocument::find($id);
            $document->name = $request->get('name');
            $document->description = $request->get('description');

            // Process new document uploads
            if ($request->hasfile('new_document')) {
                foreach ($request->file('new_document') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path('documents'), $name);
                    $data[] = $name;
                }
                // Merge new document paths with existing ones
                $existingFiles = json_decode($document->file_path, true) ?? [];
                $updatedFiles = array_merge($existingFiles, $data);
                $document->file_path = json_encode($updatedFiles);
            }

            $document->save();

            return redirect()->back()->with('success', 'Document has been updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update document. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $document = MacroeconomicDocument::find($id);
            $document->delete();

            return redirect()->route('macroeconomic-outlook.view-documents')->with('success', 'Document has been deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete document. Please try again.');
        }
    }

    public function delete($id, $filename)
    {
        try {
            $document = MacroeconomicDocument::findOrFail($id);

            $filePaths = json_decode($document->file_path, true);
            $index = array_search($filename, $filePaths);
            if ($index !== false) {
                unset($filePaths[$index]);
            }

            $document->file_path = json_encode(array_values($filePaths));
            $document->save();

            $filePath = public_path('documents/' . $filename);
            if (File::exists($filePath)) {
                unlink($filePath);
            }

            return redirect()->back()->with('success', 'Document deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete document. Please try again.');
        }
    }
}
