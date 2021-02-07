@extends('layouts.controls')

@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Titolo</label>
                        <input value="{{old('title')}}" type="text" name="title" class="form-control" required>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label >autore</label>
                        <input value="{{old('author')}}"name="author" type="text" class="form-control" required >
                        @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <input type="file" name="cover" class="form-control-file">

                        @error('cover')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <select class="" name="category_id">
                            <option value="">-seleziona la categoria-</option>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}"{{old('category_id')== $cat->id ? "selected=selected" : ""}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        @foreach ($tags as $tag)
                        <div class="form-check">
                            <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}" {{ in_array($tag->id , old('tags', [])) ? 'checked=checked' : '' }}>
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
                        <textarea name="description" type="text" rows="10" class="form-control" required>{{old('description')}}</textarea>
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
