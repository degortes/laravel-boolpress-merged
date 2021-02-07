@extends('layouts.controls')

@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="{{route('admin.posts.store')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Titolo</label>
                        <input type="text" name="title" class="form-control" required>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label >autore</label>
                        <input name="author" type="text" class="form-control" required >
                        @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <select class="" name="category_id">
                            <option value="">-seleziona la categoria-</option>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        @foreach ($tags as $tag)
                        <div class="form-check">
                            <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}">
                            <label class="form-check-label">
                                {{ $tag->name }}
                            </label>
                        </div>
                        @endforeach
                        @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label >descrizione</label>
                        <textarea name="description" type="text" rows="10" class="form-control" required></textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>


        </div>

    </div>


@endsection
