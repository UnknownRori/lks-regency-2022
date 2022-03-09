<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    function search_category()
    {
        return view('search-category', [
            'category' => Category::all()
        ]);
    }

    function search_category_post(Request $request)
    {
        $attribute = $request->validate([
            'category_id' => ['required', 'numeric'],
        ]);

        return view('search-result', [
            'posts' => Posts::where('category_id', $attribute['category_id'])->get()
        ]);
    }

    function search_title()
    {
        return view('search-title');
    }

    function search_title_post(Request $request)
    {
        $attribute = $request->validate([
            'title' => ['required', 'string', 'max:255']
        ]);

        return view('search-result', [
            'posts' => Posts::where('title', 'LIKE', "%{$attribute['title']}%")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.form', [
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = $request->validate([
            'category_id' => ['required', 'numeric'],
            'title' => ['required', 'string', 'max:255'],
            'img' => ['required', 'image'],
            'content' => ['required', 'string']
        ]);

        $attribute['users_id'] = Auth::user()->id;

        if (Category::find($attribute['category_id'])) {
            if (Posts::create($attribute)) return redirect()->route('post.list')->with('msg', ['success', 'Posts successfully posted!']);
            return redirect()->route('post.list')->with('msg', ['danger', 'Posts failed to post!']);
        }
        return redirect()->route('post.list')->with('msg', ['warning', ' What are you trying todo!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', [
            'post' => Posts::findorfail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.form', [
            'category' => Category::all(),
            'post' => Posts::findorfail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attribute = $request->validate([
            'category_id' => ['required', 'numeric'],
            'title' => ['required', 'string', 'max:255'],
            'img' => ['required', 'image'],
            'content' => ['required', 'string']
        ]);

        $post = Posts::findorfail($id);
        $post->fill($attribute);
        if (Category::find($attribute['category_id'])) {
            if (Auth::user()->id == $post->users_id) {
                if ($post->save()) return redirect()->route('post.list')->with('msg', ['success', 'Posts Successfully Edited!']);
                return redirect()->back()->with('msg', ['danger', 'Posts Failed to Edit!']);
            }
            return redirect()->back()->with('msg', ['danger', 'You need own this post to edit it!']);
        }
        return redirect()->route('post.list')->with('msg', ['warning', ' What are you trying todo!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Posts::destroy($id)) return redirect()->back()->with('msg', ['success', 'Posts Deletion Success']);
        return redirect()->back()->with('msg', ['danger', 'Posts Deletion Failed']);
    }

    public function userlist()
    {
        return view('posts.list', [
            'posts' => Posts::where('users_id', Auth::user()->id)->paginate(6),
            'title' => 'Posts List'
        ]);
    }

    public function adminlist()
    {
        return view('posts.list', [
            'posts' => Posts::paginate(6),
            'title' => 'Manage Posts'
        ]);
    }
}
