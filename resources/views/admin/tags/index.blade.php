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
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->slug}}</td>
                    <td><a href="{{route('admin.tags.edit' , ['tag' => $tag->id ] )}}" class="btn btn-warning">Modifica</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <ul>
    @foreach ($categories as $cat)
        <li>
            <a href="{{ route('admin.categories.show' , ['category'=> $cat->id])}}">{{$cat->name}}</a>
        </li>
    @endforeach
    </ul> --}}
    <div class="text-center">
        <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Aggiungi Tag</a>
    </div>
@endsection
