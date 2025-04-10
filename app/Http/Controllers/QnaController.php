<?php

namespace App\Http\Controllers;

use App\Models\Qna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QnaController extends Controller
{

    public function index()
    {
        $qnas = Qna::where('user_id', Auth::id())->get();
        return view('questionares.sent_questionares', compact('qnas'));
    }

    public function indexAll()
    {
        $qnas = Qna::all();
        return view('questionares.view_all', compact('qnas'));
    }

    public function edit($id)
    {
        // Fetch the Qna by ID
        $qna = Qna::findOrFail($id);
        // Return the edit view with Qna data
        return view('questionares.edit', compact('qna'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question_subject' => 'required',
            'question_description' => 'required',
            'attachment' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            $qna = Qna::findOrFail($id);

            $qna->question_subject = $request->question_subject;
            $qna->question_description = $request->question_description;

            if ($request->hasFile('attachment')) {
                if ($qna->attachment && file_exists(public_path('documents/' . $qna->attachment))) {
                    unlink(public_path('documents/' . $qna->attachment));
                }

                $attachment = $request->file('attachment');
                $attachmentName = $attachment->getClientOriginalName();
                $attachment->move(public_path('documents'), $attachmentName);
                $qna->attachment = $attachmentName;
            }

            $qna->save();

            return redirect()->back()->with('success', 'Qna updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Qna. Please try again.');
        }
    }


    public function create()
    {
        return view('questionares.send_questionare');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_subject' => 'required|string|max:255',
            'question_description' => 'required|string',
            'document' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('documents'), $file_name);

                // Create new Qna record
                $qna = new Qna();
                $qna->question_subject = $request->question_subject;
                $qna->question_description = $request->question_description;
                $qna->attachment = $file_name; // Assuming you're storing just the file name
                $qna->user_id = Auth::id();
                $qna->save();

                return redirect()->back()->with('success', 'Questionnaire sent successfully.');
            } else {
                return redirect()->back()->with('error', 'No document file uploaded.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to upload document. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $qna = Qna::findOrFail($id);
            if (file_exists(public_path('documents/' . $qna->attachment))) {
                unlink(public_path('documents/' . $qna->attachment));
            }
            $qna->delete();

            return redirect()->back()->with('success', 'Document deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete document. Please try again.');
        }
    }
}
