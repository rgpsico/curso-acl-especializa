@extends('layouts.app')

@section('content')

<h1>Editar  user</h1>
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
    <h1>Cadastrar users</h1>
<form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <input type="text" name="name" placeholder="Nome" class="form-control" value="{{$user->name}}">
    </div>

    <div class="form-group">
        <input type="text" name="comunidade" placeholder="comunidade" class="form-control" value="{{$user->comunidade}}">
    </div>

    <div class="form-group">
        <input type="text" name="endereco" placeholder="endereco" class="form-control" value="{{$user->endereco}}">
    </div>

    <div class="form-group">
        <input type="text" name="cep" placeholder="cep" class="form-control" value="{{$user->cep}}">
    </div>

    <div class="form-group">
        <input type="text" name="rua" placeholder="rua" class="form-control" value="{{$user->rua}}">
    </div>

    <div class="form-group">

    </div>

   
    <div class="form-group">
        <img src=" {{asset('storage/posts/'.$user->foto_01)}}" alt="">
        <input type="file" name="foto_01" multiple placeholder="titulo" class="form-control" >
    </div>

    <div class="form-group">
        <img src=" {{asset('storage/posts/'.$user->foto_01)}}" alt="">
        <input type="file" name="foto_02" multiple placeholder="titulo" class="form-control" >
    </div>
    


    <div class="form-group">
        <img src=" {{asset('storage/posts/'.$user->foto_01)}}" alt="">
        <input type="file" name="foto_03" multiple placeholder="titulo" class="form-control" >
    </div>
    

    <div class="form-group">
        <img src=" {{asset('storage/posts/'.$user->foto_01)}}" alt="">
        <input type="file" name="foto_04" multiple placeholder="titulo" class="form-control" >
    </div>
    
    

    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>
</div>

@endsection