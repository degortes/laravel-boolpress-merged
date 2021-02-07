<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Category;
use App\Post;
use App\Category;
use App\Clienti;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $last_post = Post::orderBy('id', 'desc')->first();
        $data = [
            'posts'=> Post::orderBy('id', 'desc')->get(),
            'categories' => Category::all(),
            'last_post' => $last_post
        ];
        return view('guest.home' , $data);
    }
    public function contatti() {
        return view('guest.contacts');

    }

    public function requestInfo(Request $request)
    {
        $form_data = $request->all();
        $new_customer = new Clienti();
        $new_customer->fill($form_data);
        $new_customer->save();
        return redirect()->route('thanks');


    }
    public function thanks()
    {
        return view('guest.thanks');
    }
}
