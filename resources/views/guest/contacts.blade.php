@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="{{route('request.info')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Nome</label>
                        <input value="{{old('name')}}"type="text" name="name" class="form-control" required>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label>Cognome</label>
                        <input value="{{old('lastname')}}"type="text" name="lastname" class="form-control" required>
                        @error('lastname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label>email</label>
                        <input value="{{old('email')}}"type="email" name="email" class="form-control" required>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label >descrizione</label>
                        <textarea name="description" type="text" rows="10" class="form-control" required>{{old('description')}}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>
        </div>
    </div>

@endsection
