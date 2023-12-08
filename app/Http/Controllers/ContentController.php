<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.content', [
            'datas' => Article::orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'author_id' => 'required',
            'banner' => 'required|image|file|max:1024',
            'body' => 'required',
        ]);

        if ($request->file('banner')) {
            $validate['banner'] = $request->file('banner')->store('post-img');
        }

        Article::create($validate);

        return redirect('/mycontent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.showContent', ['data' => Article::find($id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
