@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Post pubblici</h1>
            <div class="card-container">
                @foreach ($posts as $post)
                    <a class="card-title" href="{{route('posts.show', ['slug' => $post->slug ] )}}">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                <p>Titolo: </p>{{$post->title}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Autore: {{$post->author}}</li>
                                <li class="list-group-item">Articolo: {{Str::of($post->description)->limit(150)}}</li>
                                @foreach ($categories as $cat)
                                    @if ($post->category_id == $cat->id)
                                        <li class="list-group-item">Categoria: {{ $cat->name }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
