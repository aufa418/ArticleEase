<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.editContent', ['data' => Article::find($id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $validate = $request->validate([
            'title' => 'string',
            'author' => 'required',
            'author_id' => 'required',
            'banner' => 'image|file|max:1024',
            'body' => 'string',
        ]);

        if ($request->banner) {
            Storage::delete($request->imageOld);
            $validate['banner'] = $request->file('banner')->store('post-img');
        } else {
            $validate['banner'] = $request->imageOld;
        }

        Article::where('id', $id)->update($validate);

        return redirect('/mycontent');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        // dd($request);
        Storage::delete($request->imageOld);
        Article::find($id)->delete();
        return redirect('/mycontent');
    }

}
