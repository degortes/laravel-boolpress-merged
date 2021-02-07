<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = [
            'categories'=> Category::all()
        ];
        return view('guest.categories.index' , $data);
    }

    public function show($slug) {
        $cat = Category::where('slug' , $slug)->first();

        if ($cat) {
            $data = [
                'category' => $cat
            ];
            return view('guest.categories.show', $data);
        }
        abort(404);
    }
}
