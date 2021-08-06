<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
class SiteController extends Controller
{
 
    public function index(Post $post)
    {       
        return view('portal.home.index');
    }

    public function update($idPost , Post $post) 
    {
        $post = Post::find($idPost);

      if(Gate::denies('update-post',$post))
            abort(403,"unautorized");

        return view('post-update',compact('post'));

    }

    public function rolesPermissions()
    {
        $nameUser = auth()->user()->name;
        echo"<h1>{$nameUser}</h1>";

        foreach(auth()->user()->roles as $role) {
            echo "<b>$role->name</b><br/>";
            $permissions = $role->permissions;
            foreach($permissions as $permision)
            {
                echo " $permision->name |";

            }
            echo "<hr/>";
        }
    }
}
