<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use RealRashid\SweetAlert\Facades\Alert;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::orderBy('id','asc')->paginate(20);
        $contents->load('author');

        return view('admin.content.index', [
            'contents' => $contents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Content::rulesStore());

        $slug = str_replace(' ', '-', strtolower($request->title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug);

        $image = $this->upload($request->file('image'));

        $content = array();
        $content['author_id'] = auth()->id() ?? 1;
        $content['title'] = $request->title;
        $content['content'] = $request->content;
        $content['slug'] = $slug;
        $content['image'] = $image;

        Content::create($content);

        Alert::success('Success', 'Postingan berhasil ditambahkan');

        return redirect()->route('admin.content.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.content.form', [
            'content' => Content::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(Content::rulesUpdate());

        $content = Content::findOrFail($id);

        $slug = str_replace(' ', '-', strtolower($request->title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug);

        $image = $content->image;
        if($request->hasFile('image')){
            $image = $this->upload($request->file('image'));
        }

        $content->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'image' => $image,
            'status' => $request->status,
        ]);

        Alert::success('Success', 'Postingan berhasil diperbarui');

        return redirect()->route('admin.content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $content = Content::findOrFail($id);
            $content->delete();

            Alert::success('Success', 'Postingan berhasil dihapus');
        }catch(\Exception $e){
            Alert::error('Error', 'Postingan gagal dihapus karena sudah terhubung dengan data lain');
        }

        return redirect()->route('admin.content.index');
    }
}
