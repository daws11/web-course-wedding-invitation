<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // Display the admin page
    public function index()
    {
        $guests = Guest::paginate(10);
        $responses = Comment::paginate(10);
        return view('admin.index', compact('guests', 'responses'));
    }

    // Store a new guest
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255|unique:guests,name',
        ]);

        // Create the guest with a generated slug
        $slug = Str::slug($request->input('name'));
        $guest = Guest::create([
            'name' => $request->input('name'),
            'slug' => $this->generateUniqueSlug($slug),
        ]);

        return redirect()->route('admin.index')->with('success', 'Guest added successfully');
    }

    // Generate a unique slug
    protected function generateUniqueSlug($slug)
    {
        $count = Guest::where('slug', 'LIKE', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function deleteGuest($id)
{
    $guest = Guest::findOrFail($id);
    $guest->delete();

    return redirect()->route('admin.index')->with('success', 'Guest deleted successfully');
}

public function deleteComment($id)
{
    $comment = Comment::findOrFail($id);
    $comment->delete();

    return redirect()->route('admin.index')->with('success', 'Comment deleted successfully');
}

}
