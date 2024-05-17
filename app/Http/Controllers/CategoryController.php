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
        $category = category::find($reguest->categoryId);
        $category->name = $reguest->catName;
        $category->is_active = $reguest->catStatus;
        $category->save();
        return redirect()->route('panel.categoryIndex')->with(['success' => 'Kategori Başarıyla güncellendi']);

    }
}
