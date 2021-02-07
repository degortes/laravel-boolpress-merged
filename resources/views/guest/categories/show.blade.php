@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$category->name}} category</h1>
            @foreach ($category->posts as $single)
                <a class="dropdown-item" href="{{route('posts.show', ['slug' => $single->slug ] )}}">{{$single->title}}</a>
            @endforeach
        </div>
    </div>

    
@endsection
