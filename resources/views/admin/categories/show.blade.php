@extends('layouts.controls')

@section('content')
    <h1 class="col-12">Articoli per la categoria: {{$category->name}}</h1>
    @foreach ($category->posts as $single_post)
            <a class=" col-4 "href="{{route('admin.posts.show' , ['post' => $single_post->id ] )}}">
                <div class="card text-center">
                    <div class="card-header">
                        <h3>{{$single_post->title}}</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{Str::of($single_post->description)->limit(150)}}</p>
                        <p class="card-text"> Autore: {{$single_post->author}}</p>
                        <p class="card-text"> categoria: {{$single_post->category ? $single_post->category->name : 'none'}}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <p>
                            Data inserimento articolo: {{date('d-m-Y', strtotime($single_post->created_at))}}
                        </p>
                        @if ($single_post->created_at != $single_post->updated_at )
                            <p>
                                Data ultima modifica articolo: {{date('d-m-Y', strtotime($single_post->updated_at))}}
                            </p>
                        @endif
                    </div>
                </div>
            </a>
    @endforeach
@endsection
