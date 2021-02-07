@extends('layouts.controls')

@section('content')
    <h1 class="col-12">categorie:</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td> <a href="{{route('admin.categories.show' , ['category' => $cat->id ] )}}"> {{$cat->name}}</a></td>
                    <td>{{$cat->slug}}</td>
                    <td><a href="{{route('admin.categories.edit' , ['category' => $cat->id ] )}}" class="btn btn-warning">Modifica</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Aggiungi Categoria</a>
    </div>
@endsection
