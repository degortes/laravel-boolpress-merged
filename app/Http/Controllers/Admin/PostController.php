<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Tag;
use App\Category;
use Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::all()
        ];
        return view('admin.posts.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ];
        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'author' => 'required | max:30',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
            'description' =>'required ',
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:700'
        ]);
        $input_data = $request->all();
        $add_post = new Post();
        if (array_key_exists('cover' , $input_data )) {
            $image_path = Storage::put('cover_image' , $input_data['cover']);
            $input_data['cover'] = $image_path;
        }
        $add_post->fill($input_data);
        $slug = Str::slug($add_post->title);
        $slug_base = $slug;

        $post_if_exist = Post::where('slug' , $slug)->first();
        $j = 1;
        while ($post_if_exist) {
            $slug = $slug_base .'-'.$j;
            $j++;
            $post_if_exist = Post::where('slug' , $slug)->first();

        }
        $add_post->slug = $slug;


        $add_post->save();

        if(array_key_exists('tags', $input_data)) {
            $add_post->tags()->sync($input_data['tags']);
        }


        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post) {
            $data = [
                'posts' => $post
            ];
            return view('admin.posts.show', $data);
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post) {
            $post_category = Category::all();
            $data = [
                'categories' => $post_category,
                'posts' => $post,
                'tags' => Tag::all()
            ];
            return view('admin.posts.edit', $data);
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:100',
            'author' => 'required | max:30',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
            'description' =>'required ',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:700'

        ]);

        $form_data = $request->all();
        if ($form_data['title'] != $post->title) {
            $slug = Str::slug($form_data['title']);
            $slug_base = $slug;

            $post_if_exist = Post::where('slug' , $slug)->first();
            $j = 1;
            while ($post_if_exist) {
                $slug = $slug_base .'-'.$j;
                $j++;
                $post_if_exist = Post::where('slug' , $slug)->first();

            }
            $form_data['slug'] = $slug;
        }

        if (array_key_exists('cover' , $form_data)) {
            $image_path = Storage::put('cover_image' , $form_data['cover']);
            $form_data['cover'] = $image_path;
        }

        $post->update($form_data);
        if(array_key_exists('tags', $form_data)) {
            $post->tags()->sync($form_data['tags']);
        }
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
