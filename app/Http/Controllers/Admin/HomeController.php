<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function generator()
    {
        $api_token = Str::random(60);
        $user = Auth::user();
        $user->api_token = $api_token;
        $user->save();
        return redirect()->route('admin.index');

        // return view('admin.home');
    }


}
