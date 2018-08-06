<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id')->paginate(10);
        return view('admin.categories.index')->with(compact('categories'));//Listado de productos
    }

    public function show($id)
    {
        $category_only = Category::find($id);
        return view('admin.categories.show')->with(compact('category'));
    }

    public function create()
    {
        return view('admin.categories.create');//Formulario de registro
    }

    public function store(Request $request)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        //Está función se encarga de guardar el producto en la BD
        Category::create($request->all());

        return redirect('/admin/categories')->with('status', 'Se añadio correctamente la categoría!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category'));
    }

    public function update(Request $request, Category $category)
    {

        $this->validate($request, Category::$rules, Category::$messages);
        
        if($category->update($request->all())){
            $request->session()->flash('status', 'Se modifico correctamente la categoría!');
            return redirect('/admin/categories');
        }else{
            return view('admin.categories.edit')->with(compact('category'));
        }
    }

    public function destroy(Request $request, $id)
    {   
        $category_only = Category::find($id);

        if(!is_null($category_only)){
            $category_only->delete();
        };        

        $request->session()->flash('status', 'Se elimino correctamente la categoría!');
        return redirect('/admin/categories');

    }
}
