<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $kategoriler = category::get();

        return view('panel.categories.index', compact('kategoriler'));
    }

    public function createPage()
    {
        return view('panel.categories.create');

    }

    public function postCategory(Request $request)
    {

        $cat = new category();
        $cat->name = $request->category_name;
        $cat->is_active = $request->category_status;
        $cat->save();

        return redirect()->route('panel.categoryIndex')->with(['success' => 'Kategori Başarıyla Oluşturuldu']);


    }

    public function updatePage($a)
    {
        $category = category::find($a);


        return view('panel/categories/update', compact('category'));
    }

    public function updateCategory(Request $reguest)
    {

        $reguest->validate([
            'carStatus'=>'min:0|max:1|',
            'catName'=>'min:3|max:8|required'

        ]);
        $category = category::find($reguest->categoryId);
        if ($category!=null){
            $category->name = $reguest->catName;
            $category->is_active = $reguest->catStatus;
            $category->save();
            return redirect()->route('panel.categoryIndex')->with(['success' => 'Kategori Başarıyla güncellendi']);
        }else{
            return redirect()->route('panel.categoryIndex')->with(['error' => 'Bir Hata Oluştu Lütfen Tekrar deneyiniz']);
        }


    }

    public function deleteCategory($id)
    {

        $category=category::find($id);

        if ($category->deleted_ad==null){
            $category->delete();
            return redirect()->route('panel.categoryIndex')->with(['success' => 'Kategori Başarı İle Silindi']);
        }
        return redirect()->route('panel.categoryIndex')->with(['success'=>'Hata Oluştu']);


    }
}
