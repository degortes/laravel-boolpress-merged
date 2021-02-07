@extends('layouts.controls')

@section('content')
    <h1 class="col-12">Tags:</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td><a href="{{route('admin.tags.show', ['tag' => $tag->id])}}">{{$tag->name}}</td>
                    <td>{{$tag->slug}}</a></td>
                    <td><a href="{{route('admin.tags.edit' , ['tag' => $tag->id ] )}}" class="btn btn-warning">Modifica</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Aggiungi Tag</a>
    </div>
@endsection
