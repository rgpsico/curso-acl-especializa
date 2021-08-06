<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;


class PainelController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $totalPermissoes = Permission::count();
        $totalPosts = Post::count();        
     return view('painel.home.index',compact('totalUsers','totalRoles','totalPermissoes','totalPosts'));
    }
}
