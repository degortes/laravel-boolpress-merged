@extends('layouts.controls')

@section('content')

    <div class="card text-center ">
        <div class="card-header">
            <h1>{{$posts->title}}</h1>
        </div>
        <div class="card-body">
            <p class="card-text"> Articolo: {{$posts->description}}</p>
            <p class="card-text"> Autore: {{$posts->author}}</p>
            <img src="{{asset('storage/'. $posts->cover)}}" alt="{{$posts->title}}">
            <p class="card-text"> Slug: {{$posts->slug}}</p>
            <p class="card-text"> categoria: {{$posts->category ? $posts->category->name : 'none'}}</p>
            <p>Tags:
                @forelse ($posts->tags as $tag)
                    {{ $tag->name }}{{ !$loop->last ? ',' : '' }}
                @empty
                    -
                @endforelse
            </p>
        </div>
        <div class="card-footer text-muted">
            <p>
                Data inserimento articolo: {{date('d-m-Y', strtotime($posts->created_at))}}
            </p>
            @if ($posts->created_at != $posts->updated_at )
                <p>
                    Data ultima modifica articolo: {{ date('d-m-Y', strtotime($posts->updated_at))}}
                </p>
            @endif
        </div>
    </div>
@endsection
