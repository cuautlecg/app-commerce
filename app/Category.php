<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{

    public static $rules = [
        'name' => 'required|min:3|max:100',
        'description' => 'required|max:200'
    ];

    public static $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'name.min' => 'El nombre debe tener mínimo 3 carácteres',
        'name.max' => 'El nombre no puede exceder los 100 carácteres',
        'description.max' => 'La descripción no puede ser mayor a 200 carácteres'
    ];

    protected $fillable = ['name', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $feauturedProduct = $this->products()->first();
        return $feauturedProduct->featured_image_url;
    }
}
