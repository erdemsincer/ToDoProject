<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $kategoriler=category::get();

        return view('panel.categories.index',compact('kategoriler'));
    }
    public function createPage(){
        return view('panel.categories.create');

    }
    public function postCategory(Request $request)
    {

       $cat=new category();
       $cat->name=$request->category_name;


       $cat->is_active=$request->category_status;
       $cat->save();

       return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori Başarıyla Oluşturuldu']);


    }
}
