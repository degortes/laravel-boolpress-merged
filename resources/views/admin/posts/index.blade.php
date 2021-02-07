@extends('layouts.controls')

@section('content')
<h1>Post:</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>autore</th>
            <th>slug</th>
            <th>azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->author}}</td>
                <td>{{$post->slug}}</td>
                <td><a href="{{route('admin.posts.show' , ['post' => $post->id ] )}}" class="btn btn-primary">Dettagli</a></td>
                <td><a href="{{route('admin.posts.edit' , ['post' => $post->id ] )}}" class="btn btn-warning">Modifica</a></td>
                <td>
                    <form action="{{route('admin.posts.destroy' , ['post' => $post->id ] )}}" method="post">
                        <button type="submit" name="button" class="btn btn-danger">Elimina</button>
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
<div class="text-center">
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Aggiungi Articolo</a>
</div>



@endsection
