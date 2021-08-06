@extends('painel.templates.template')
@section('content')

<!--Filters and actions-->
<div class="actions">
    <div class="container">
        <a class="add" href="forms">
            <i class="fa fa-plus-circle"></i>
        </a>

        <form class="form-search form form-inline">
            <input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
            <input type="submit" name="pesquisar" value="Encontrar" class="btn btn-success">
        </form>
    </div>
</div><!--Actions-->

    <div class="container">
        <h1 class="title">
            Listagem dos POSTS
        </h1>

        <table class="table table-hover">
            <tr>
                <th>Titulo</th>
                <th>Description</th>
             
                <th width="100px">Ações</th>
            </tr>
            @can('view_posts')
            @forelse ($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>
                   
                   
                    <a href="{{url("/pianel/post/$post->id/edit")}}" class="edit">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <a href="{{url("/pianel/post/$post->id/delete")}}" class="delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @empty 
            <tr>
                <td colspan="90">nenhum resultado</td>
            </tr>               
            @endforelse
            @endcan
        </table>


        <nav>
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

@endsection
