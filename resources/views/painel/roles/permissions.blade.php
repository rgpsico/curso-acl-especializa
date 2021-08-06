@extends('painel.templates.template')
@section('content')


    <div class="container">
        <h1 class="title">
          Permissions <b>{{$role->name}}</b>
        </h1>

        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <th>Label</th>
             
                <th width="200px">Ações</th>
            </tr>
            @forelse ($permissions as $permission)
            <tr>
                <td>{{$permission->name}}</td>
                <td>{{$permission->label}}</td>
                <td>
                    <a href="{{url("/painel/permission/$permission->id/role")}}" class="edit">
                        <i class="fa fa-lock"></i>
                    </a>
                   
                    <a href="{{url("/painel/permission/$permission->id/edit")}}" class="edit">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <a href="{{url("/painel/permission/$permission->id/delete")}}" class="delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @empty 
            <tr>
                <td colspan="90">nenhum resultado</td>
            </tr>               
            @endforelse
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
