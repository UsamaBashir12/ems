<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
  public function index()
  {
    return view('contact');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'subject' => 'required|string|max:255',
      'message' => 'required|string',
    ]);

    Contact::create($request->all());

    return redirect()->route('contact')->with('success', 'Your message has been sent.');
  }
}
