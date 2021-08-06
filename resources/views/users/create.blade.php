@extends('layouts.app')

@section('content')







<div class="container">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
      
        </ul>
    </div>
@endif
    @if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>

@endif
    <h1>Cadastrar Posts</h1>
<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" name="title" placeholder="titulo" class="form-control">
    </div>
    <div class="form-group">
        <input type="file" name="image"  class="form-control">
    </div>

    <div class="form-group">
     <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>
</div>

@endsection