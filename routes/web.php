<?php

use App\Http\Controllers\Painel\PainelController;
use App\Http\Controllers\Painel\PermissionController;
use App\Http\Controllers\Painel\PostController;
use App\Http\Controllers\Painel\RolesController;
use App\Http\Controllers\Portal\SiteController as PortalSiteController;
use App\Http\Controllers\Painel\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=> 'painel'],function(){
    Route::get('/posts',[PostController::class, 'index']);
    Route::get('/',[PainelController::class, 'index']);
    
    Route::get('/permissions',[PermissionController::class, 'index']);
    Route::get('/permission/{id}/role',[PermissionController::class, 'index']);

    Route::get('/roles',[RolesController::class, 'index']);

    Route::get('/role/{id}/permissions',[RolesController::class, 'permissions']);
    Route::get('/role/{id}/roles',[PermissionController::class, 'roles']);


    Route::get('/users',[UserController::class, 'index']);
    Route::get('/user/{id}/roles',[UserController::class, 'roles']);
});

Auth::routes();

Route::get('/',[PortalSiteController::class, 'index']);


