<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function send(Request $request)
{
    // Validate request
    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:50'],
        'whatsapp' => ['required', 'string', 'max:50'],
        'bukti_transfer' => ['nullable', 'image', 'max:2048'], // Image validation
        'angkatan' => ['required', 'string', 'max:50'],
        'jurusan' => ['required', 'string', 'max:50'],
        'kota_domisili' => ['required', 'string', 'max:50'],
        'comment' => ['required', 'string', 'max:500'],
    ]);

    // Sanitize inputs
    $validatedData['name'] = preg_replace('/([^a-zA-Z0-9\- ])/', '', $validatedData['name']);
    $validatedData['comment'] = preg_replace('/([^a-zA-Z0-9\- ])/', '', $validatedData['comment']);
    $validatedData['whatsapp'] = preg_replace('/([^0-9])/', '', $validatedData['whatsapp']);

    // Handle the file upload
    if ($request->hasFile('bukti_transfer')) {
        $validatedData['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
    }    

    // Save the data
    Comment::create($validatedData);

    return back()->with('success', 'Comment sent successfully!');
}

}
