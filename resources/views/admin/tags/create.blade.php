@extends('layouts.controls')

@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="{{route('admin.tags.store')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Nome</label>
                        <input type="text" value="{{old('name')}}"name="name" class="form-control" required>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>
        </div>
    </div>
@endsection
