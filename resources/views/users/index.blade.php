@extends('layouts.app')

@section('content')

<h1>Editar </h1>

@forelse ($users as $user)
<p>{{$user->name}}</p>
<a href="{{route('users.edit',$user->id)}}" class="btn btn-success">Editar</a>
<hr>
    
@empty
    <p>nenhum Post</p>
@endforelse

@endsection