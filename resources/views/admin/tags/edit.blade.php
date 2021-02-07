@extends('layouts.controls')

@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="{{route('admin.tags.update' , ['tag' => $tag->id])}}">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Titolo</label>
                        <input value="{{old( 'name', $tag->name)}}" type="text" name="name" class="form-control" required>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary">Salva</button>
            </form>
        </div>
    </div>
@endsection
