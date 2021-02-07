@extends('layouts.controls')

@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="{{route('admin.posts.update' , ['post' => $posts->id])}}">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Titolo</label>
                        <input value="{{old( 'title', $posts->title)}}" type="text" name="title" class="form-control" required>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label>Autore</label>
                        <input value="{{old('author', $posts->author )}}" name="author" type="text" class="form-control" required>
                        @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label>descrizione</label>
                        <textarea name="description" type="text" class="form-control" required>{{old('description',$posts->description )}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <select class="" name="category_id">
                            <option value="">-seleziona categoria-</option>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}"
                                    {{$cat->id == old('category_id', $posts->category_id) ? "selected=selected" : ""}}>{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="form-group col-12">
                        @foreach ($tags as $tag)
                        <div class="form-check">
                            @if ($errors->any())
                                <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                {{ in_array($tag->id , old('tags', [])) ? 'checked=checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $tag->name }}
                                </label>
                            @else
                                <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                {{ $posts->tags->contains($tag) ? 'checked=checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $tag->name }}
                                </label>
                            @endif
                        </div>
                        @endforeach
                        @error('tags')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                <button type="submit" class="btn btn-primary">Salva</button>
            </form>

        </div>

    </div>


@endsection
