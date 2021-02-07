<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories' => Category::all()
        ];

        return view('admin.categories.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
        $add_cat = new Category();
        $add_cat->fill($input_data);

        $slug = Str::slug($add_cat->name);
        $slug_base = $slug;

        $cat_if_exist = Category::where('slug' , $slug)->first();
        $j = 1;
        while ($cat_if_exist) {
            $slug = $slug_base .'-'.$j;
            $j++;
            $cat_if_exist = Category::where('slug' , $slug)->first();

        }
        $add_cat->slug = $slug;


        $add_cat->save();




        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if ($category) {
            $data = [
                'category' => $category
            ];
            return view('admin.categories.show', $data);
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if ($category) {

            $data = [
                'categories' => $category
            ];
            return view('admin.categories.edit', $data);
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
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $form_data = $request->all();
        if ($form_data['name'] != $category->name) {
            $slug = Str::slug($form_data['name']);
            $slug_base = $slug;

            $cat_if_exist = Category::where('slug' , $slug)->first();
            $j = 1;
            while ($cat_if_exist) {
                $slug = $slug_base .'-'.$j;
                $j++;
                $cat_if_exist = Category::where('slug' , $slug)->first();

            }
            $form_data['slug'] = $slug;
        }
        $category->update($form_data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');

    }
}
