<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));//Listado de productos
    }

    public function show($id)
    {
        $product = Product::find($id);
        $images = $product->images()->orderBy('featured', 'desc')->get();
        return view('admin.products.show')->with(compact('product', 'images'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));//Formulario de registro
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:100',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required'
        ];

        $messages = [
            'name.required' => 'El campo nombre es obligatorio',
            'name.min' => 'El nombre debe tener mínimo 3 carácteres',
            'name.max' => 'El nombre no puede exceder los 100 carácteres',
            'description.required' => 'El campo descripción es obligatorio',
            'description.max' => 'La descripción no puede ser mayor a 200 carácteres',
            'price.required' => 'El campo precio es obligatorio',
            'price.numeric' => 'El precio tiene que ser númerico',
            'price.min' => 'El precio debe ser mayor a 0',
            'category_id' => 'La categoría es obligatoria'
        ];

        $this->validate($request, $rules, $messages);

        //Está función se encarga de guardar el producto en la BD
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');    
        $product->save();//Aquí se hace el insert a la tabla de productos

        return redirect('/admin/products')->with('status', 'Se añadio correctamente el producto!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit')->with(compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3|max:100',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];

        $messages = [
            'name.required' => 'El campo nombre es obligatorio',
            'name.min' => 'El nombre debe tener mínimo 3 carácteres',
            'name.max' => 'El nombre no puede exceder los 100 carácteres',
            'description.required' => 'El campo descripción es obligatorio',
            'description.max' => 'La descripción no puede ser mayor a 200 carácteres',
            'price.required' => 'El campo precio es obligatorio',
            'price.numeric' => 'El precio tiene que ser númerico',
            'price.min' => 'El precio debe ser mayor a 0'
        ];

        $this->validate($request, $rules, $messages);
        $product_only = Product::find($id);
        $product_only->name = $request->input('name');
        $product_only->description = $request->input('description');
        $product_only->long_description = $request->input('long_description');
        $product_only->category_id = $request->input('category_id');
        $product_only->price = $request->input('price');
        
        if($product_only->save()){
            $request->session()->flash('status', 'Se modifico correctamente el producto!');
            return redirect('/admin/products');
        }else{
            return view('admin.products.edit')->with('product', $product_only);
        }
    }

    public function destroy(Request $request, $id)
    {   
        $product_only = Product::find($id);

        if(!is_null($product_only)){
            $product_only->delete();
        };        

        $request->session()->flash('status', 'Se elimino correctamente el producto!');
        return redirect('/admin/products');

    }
}
