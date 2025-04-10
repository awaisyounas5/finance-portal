<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        // Get documents uploaded by the currently authenticated user
        $documents = Document::where('user_id', Auth::id())->get();
        return view('documents.view_documents', compact('documents'));
    }

    public function indexAll()
    {
        // Get all documents uploaded by all users
        $documents = Document::all();
        return view('documents.view_documents_all', compact('documents'));
    }

    public function create()
    {
        return view('documents.upload_document');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'document' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('documents'), $file_name);

                // Create new document record
                $document = new Document();
                $document->name = $request->name;
                $document->description = $request->description;
                $document->file_path = $file_name; // Assuming you're storing just the file name
                $document->user_id = Auth::id();
                $document->save();

                return redirect()->back()->with('success', 'Document uploaded successfully.');
            } else {
                return redirect()->back()->with('error', 'No document file uploaded.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to upload document. Please try again.');
        }
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('documents.edit_document', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'new_document' => 'sometimes|required|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            $document = Document::findOrFail($id);
            $document->name = $request->name;
            $document->description = $request->description;

            if ($request->hasFile('new_document')) {
                // Delete old document
                if (file_exists(public_path('documents/' . $document->file_path))) {
                    unlink(public_path('documents/' . $document->file_path));
                }
                // Upload new document
                $newDocumentName = $request->file('new_document')->getClientOriginalName();
                $request->file('new_document')->move(public_path('documents'), $newDocumentName);
                $document->file_path = $newDocumentName;
            }

            $document->save();

            return redirect()->back()->with('success', 'Document updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update document. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $document = Document::findOrFail($id);
            if (file_exists(public_path('documents/' . $document->file_path))) {
                unlink(public_path('documents/' . $document->file_path));
            }
            $document->delete();

            return redirect()->back()->with('success', 'Document deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete document. Please try again.');
        }
    }
}
