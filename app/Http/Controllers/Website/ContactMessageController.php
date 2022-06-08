<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $this->checkPermission('contact_message.access');

        $contactMessages = ContactMessage::all();
        return view('dashboard.contact-messages.index', compact('contactMessages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:1000'],
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Message Send Successfully.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $this->checkPermission('contact_message.delete');

        $contactMessage->delete();
        return redirect()->route('contact-message.index')->with('success', 'Message deleted successfully.');
    }
}
