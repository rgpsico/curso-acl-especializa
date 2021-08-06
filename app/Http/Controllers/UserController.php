<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Dados;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    private $user ;
    public function __construct(User $user)
    {
        $this->user = $user;
        
    }
   

    public function index()
    {
        $id =  auth()->user()->id;
        $users = User::where('id',$id)->first()->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
         
        
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loggeid = intval(Auth::id());  
         $data = [
             'name'=>$request->name
            ]; 

        $dados             = Dados::find($loggeid);     
        $dados->user_id    = $loggeid;
        $dados->endereco   = $request->endereco;
        $dados->rua        = $request->rua;
        $dados->cep        = $request->cep;
        $dados->comunidade = $request->comunidade;

        $Album = Album::where('user_id',$loggeid)->first();

        if ($request->hasFile('foto_01') && $request->file('foto_01')->isValid()) 
        {
        
                $name = Str::of($request->name)->kebab();     
                $extension = $request->foto_01->extension();
                $nameImage = "{$name}.$extension";        
                $data['image'] = $nameImage;
                $Album->foto_01 = $nameImage;
                $Album->save();
                $upload = $request->foto_01->storeAs('posts',$nameImage);        
                if(!$upload)            
                    return redirect()->back()->with('Erros',['Falha no Upload']);           
                
        }

        if ($request->hasFile('foto_02') && $request->file('foto_02')->isValid()) 
        {
        
                $name = Str::of($request->name)->kebab();     
                $extension = $request->foto_02->extension();
                $nameImage = "{$name}.$extension";        
                $data['image'] = $nameImage;
                $Album->foto_02 = $nameImage;
                $Album->save();
                $upload = $request->foto_02->storeAs('posts',$nameImage);        
                if(!$upload)            
                    return redirect()->back()->with('Erros',['Falha no Upload']);           
                
        }

        if ($request->hasFile('foto_03') && $request->file('foto_03')->isValid()) 
        {
        
                $name = Str::of($request->name)->kebab();     
                $extension = $request->foto_03->extension();
                $nameImage = "{$name}.$extension";        
                $data['image'] = $nameImage;
                $Album->foto_03 = $nameImage;
                $Album->save();
                $upload = $request->foto_03->storeAs('posts',$nameImage);        
                if(!$upload)            
                    return redirect()->back()->with('Erros',['Falha no Upload']);           
                
        }

        if ($request->hasFile('foto_04') && $request->file('foto_04')->isValid()) 
        {
        
                $name = Str::of($request->name)->kebab();     
                $extension = $request->foto_04->extension();
                $nameImage = "{$name}.$extension";        
                $data['image'] = $nameImage;
                $Album->foto_04 = $nameImage;
                $Album->save();
                $upload = $request->foto_04->storeAs('posts',$nameImage);        
                if(!$upload)            
                    return redirect()->back()->with('Erros',['Falha no Upload']);           
                
        }
   

        auth()->user()->update($data);
        $dados->save();

        return redirect()->back()->with('Erros',['Falha no Upload']);           

      

     
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Upload(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = Str::of($request->title)->kebab();
     
            $extension = $request->image->extension();
            $nameImage = "{$name}.$extension";
            $data['image'] = $nameImage;

            $upload = $request->image->storeAs('posts',$nameImage);
            
            if(!$upload)            
                return redirect()->back()->with('Erros',['Falha no Upload']);           
     
        }
    }
}
