<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Gate;
class RolesController extends Controller
{
    private $Roles;

    public function __construct(Role $Roles)
    {
     $this->Roles = $Roles;   
    }

    private function checkPermission(){
        if (Gate::denies('admin'))
        return abort(403,"erro ao acessar");
    }

    
    public function index()
    {
       $this->checkPermission();
        
        $Roles = $this->Roles->all();
        return view('painel.roles.index',compact('Roles'));

    }

    public function permissions($id)
    {
        $role = $this->Roles->find($id);
        $this->checkPermission();
        $permissions = $role->permissions()->get();

        return view('painel.roles.permissions',compact('role','permissions'));
      

    }
}
