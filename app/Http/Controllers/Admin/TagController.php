<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //make it paginated
        $tags = Tag::all();

        return view('admin.tags.index', [
            'tags' => $tags,
            'page' => 'Tags'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create', [
            'page' => 'Creating Tag'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:50'],
        ]);
        
        Tag::create($validated);
        
        return redirect()->route('admin.tags.index')->with('message', 'the tag has been created successfully');;
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', [
            'tag' => $tag,
            'page' => 'Showing Tag'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', [
            'tag' => $tag,
            'page' => 'Edit Tag'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:50'],
        ]);

        $tag->update($validated);

        return redirect()->route('admin.tags.index')->with('message', 'the tag has been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('message','the tags has been deleted successfully');
    
    }
}
