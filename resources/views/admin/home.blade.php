@extends('layouts.controls')

@section('content')
<h1>Pannello di controllo</h1>

<p>User: {{Auth::user()->name}}</p>
<p>email: {{Auth::user()->email}}</p>
<p>Token:</p>
@if (Auth::user()->api_token)
    <p>{{Auth::user()->api_token}}</p>
    @else
        <form class="" action="{{ route('admin.generator')}}" method="post">
            @csrf

            <button type="submit" name="button">genera token</button>
        </form>
@endif

@endsection
