<?php

namespace App\Http\Controllers\User;

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
        $contents = Content::where('author_id', auth()->user()->id)->paginate(20);
        return view('user.content.index', [
            'contents' => $contents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.content.create');
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

        return redirect()->route('user.content.index');
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

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
            'image' => $image,
        ]);

        Alert::success('Success', 'Postingan berhasil diperbarui');

        return redirect()->route('user.content.index');
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
            Alert::error('Error', 'Terjadi kesalahan');
        }

        return redirect()->route('user.content.index');
    }
}
