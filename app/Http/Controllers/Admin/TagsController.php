<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use Str;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'tags'=> Tag::all(),
        ];

        return view('admin.tags.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'name' => 'required|max:100',
        ]);
        $input_data = $request->all();
        $add_tag = new Tag();
        $add_tag->fill($input_data);

        $slug = Str::slug($add_tag->name);
        $slug_base = $slug;

        $tag_if_exist = Tag::where('slug' , $slug)->first();
        $j = 1;
        while ($tag_if_exist) {
            $slug = $slug_base .'-'.$j;
            $j++;
            $tag_if_exist = Tag::where('slug' , $slug)->first();

        }
        $add_tag->slug = $slug;


        $add_tag->save();




        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        if ($tag) {
            $data = [
                'tag' => $tag
            ];
            return view('admin.tags.show', $data);
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        if ($tag) {

            $data = [
                'tag' => $tag
            ];
            return view('admin.tags.edit', $data);
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
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $form_data = $request->all();
        if ($form_data['name'] != $tag->name) {
            $slug = Str::slug($form_data['name']);
            $slug_base = $slug;

            $tag_if_exist = Tag::where('slug' , $slug)->first();
            $j = 1;
            while ($tag_if_exist) {
                $slug = $slug_base .'-'.$j;
                $j++;
                $tag_if_exist = Tag::where('slug' , $slug)->first();

            }
            $form_data['slug'] = $slug;
        }
        $tag->update($form_data);

        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
