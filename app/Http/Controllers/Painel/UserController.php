<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    private $User;

    public function __construct(User $User)
    {
     $this->User = $User;
     if (Gate::denies('admin'))
     return abort(403,"erro ao acessar");
    }

   
    public function index()
    {
        $Users = $this->User->all();
     

        return view('painel.users.index',compact('Users'));


    }

    public function roles($id)
    {
        $user = $this->User->find($id);
        $roles = $user->roles()->get();
        return view('painel.users.roles',compact('user','roles'));
    }
}
