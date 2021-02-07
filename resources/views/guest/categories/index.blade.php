@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Articoli per Categorie:</h1>

        </div>
        <div class="row">
            <ul>
                @foreach ($categories as $cat)
                        <li>
                            <div class="dropdown">
                                <a href="{{route('categories.show' , ['slug'=> $cat->slug] )}}"  >
                                    {{$cat->name}}
                                </a>
                            </div>
                        </li>
                @endforeach
            </ul>
        </div>

    </div>

@endsection
