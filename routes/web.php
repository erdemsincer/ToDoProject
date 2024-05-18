<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TaskController;
use \App\Http\Controllers\CategoryController;
Route::get('/', function () {
    return view('welcome');
});


//Test Routes

Route::get('testTemplate',function (){
    return view('panel.layout.app');
});

//task routeleri

Route::get('/tasks/create',[TaskController::class,'createPage'])->name('panel.CreateTaskPage');
Route::post('/tasks/add',[TaskController::class,'addTask'])->name('panel.addtask');


//kategori

Route::get('/panel/categories/index',[CategoryController::class,'index'])->name('panel.categoryIndex');
Route::get('/panel/categories/create',[CategoryController::class,'createPage'])->name('panel.createPage');
Route::post('/panel/categories/addCategory',[CategoryController::class,'postCategory'])->name('panel.categoryAdd');
Route::get('panel/categories/update/{id}',[CategoryController::class,'updatePage'])->name('panel.categoryUpdatePage');
Route::post('panel/category/updatePost',[CategoryController::class,'updateCategory'])->name('panel.updateCategory');
Route::get('panel/category/deleteCategory/{id}',[CategoryController::class,'deleteCategory'])->name('panel.categoryDelete');


