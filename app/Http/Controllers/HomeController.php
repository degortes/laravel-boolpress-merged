<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Category;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }
    // public function categories()
    // {
    //     $data = [
    //         'categories'=> Category::all()
    //     ];
    //     return view('guest.categories.index' , $data);
    // }
}
