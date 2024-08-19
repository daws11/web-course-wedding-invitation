<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Comment;
use App\Models\OrmawaGuest;
use App\Models\OrmawaComment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // Display the admin page
    public function index()
    {
        $guests = Guest::paginate(10);
        $responses = Comment::paginate(10);
        $ormawaGuests = OrmawaGuest::paginate(10);
        return view('admin.index', compact('guests', 'responses', 'ormawaGuests'));
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
            'slug' => $this->generateUniqueSlug($slug, 'guests'),
        ]);

        return redirect()->route('admin.index')->with('success', 'Guest added successfully');
    }

    // Store a new Ormawa guest
    public function storeOrmawaGuest(Request $request)
{
    $request->validate(['name' => 'required']);
    $slug = OrmawaGuest::generateUniqueSlug($request->name);
    OrmawaGuest::create([
        'name' => $request->name,
        'slug' => $slug,
    ]);
    return redirect()->route('admin.index');
}


    // Generate a unique slug for the given table
    protected function generateUniqueSlug($slug, $table)
    {
        $count = \DB::table($table)->where('slug', 'LIKE', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    // Delete a regular guest
    public function deleteGuest($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        return redirect()->route('admin.index')->with('success', 'Guest deleted successfully');
    }

    // Delete a comment
    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.index')->with('success', 'Comment deleted successfully');
    }

    // Delete an Ormawa guest
    public function deleteOrmawaGuest($id)
    {
        OrmawaGuest::findOrFail($id)->delete();
        return redirect()->route('admin.index');
    }

    public function bulkUploadOrmawaGuests(Request $request)
{
    $request->validate(['csv_file' => 'required|mimes:csv,txt']);

    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));

    foreach ($data as $row) {
        $name = $row[0] ?? null; // Assuming the name is in the first column
        
        if ($name) { // Check if the name is not null or empty
            $slug = OrmawaGuest::generateUniqueSlug($name);

            OrmawaGuest::create([
                'name' => $name,
                'slug' => $slug,
            ]);
        }
    }

    return redirect()->route('admin.index')->with('success', 'Ormawa guests added successfully');
}

}
