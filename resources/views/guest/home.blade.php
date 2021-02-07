@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <h1>Welcome to my blog</h1>
        </div>
        <div class="row">

            <h2>Ultimo articolo pubblicato:</h2>

            <div class="card text-center ">
                <div class="card-header">
                    <h1>{{$last_post->title}}</h1>
                </div>
                <div class="card-body">
                    @if ($last_post->cover)

                        <img class="card-img-top" src="{{asset('storage/'. $last_post->cover)}}" alt="Card image cap">
                    @endif

                    <p class="card-text">{{$last_post->description}}</p>
                    <p class="card-text"> Autore: {{$last_post->author}}</p>
                    <a href="{{route('categories.show' ,['slug' => $last_post->slug ])}}">
                        <p class="card-text"> categoria: {{$last_post->category ? $last_post->category->name : 'none'}}</p>
                    </a>
                    <p>Tags:

                        @forelse ($last_post->tags as $tag)
                            {{ $tag->name }}{{ !$loop->last ? ',' : '' }}
                        @empty
                            -
                        @endforelse
                    </p>
                </div>
                <div class="card-footer text-muted">
                    <p>
                        Data inserimento articolo: {{date('d-m-Y', strtotime($last_post->created_at))}}
                    </p>
                    @if ($last_post->created_at != $last_post->updated_at )
                        <p>
                            Data ultima modifica articolo: {{date('d-m-Y', strtotime($last_post->updated_at))}}
                        </p>

                    @endif

                </div>
            </div>


        </div>
        <div class="row">
            <h2>Ultimi 5 post:</h2>
        </div>
        <div class="row">


            @foreach ($posts as $key => $post)
                @if ($key > 0 && $key <= 5)
                    <div class="card" style="width: 18rem;">
                        @if ($post->cover)

                            <img class="card-img-top" src="{{asset('storage/'. $post->cover)}}" alt="{{$post->title}}">
                        @endif



                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->description}}</p>
                            <a href="{{route('posts.show', ['slug' => $post->slug ] )}}" class="btn btn-primary">Vai all'articolo</a>
                        </div>
                    </div>

                @endif

            @endforeach
        </div>

    </div>
@endsection
