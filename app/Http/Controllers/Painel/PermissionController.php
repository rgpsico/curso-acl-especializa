<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use Gate;

class PermissionController extends Controller
{
    private $Permission;

    public function __construct(Permission $Permission)
    {
     $this->Permission = $Permission;   
    }

    private function checkPermission(){
        if (Gate::denies('admin'))
        return abort(403,"erro ao acessar");
    }

    public function index()
    {
        $Permissions = $this->Permission->all();
        $this->checkPermission();
      

        return view('painel.permissions.index',compact('Permissions'));

    }

    public function roles($id)
    {
        $permission = $this->Permission->find($id);
        $this->checkPermission();
        $roles = $permission->roles()->get();
        return view('painel.roles.permissions',compact('permission','roles'));
    }

    
}
