<?php

namespace App\Services;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Product;

class ProductServices
{
    //Funcionando
   public function list()
    {
        $products = Product::paginate();

        return $products;
    }
     //Funcionando
    public function store(CategoryStoreRequest $request){
        $category = Category::create($request->all());

        return $category;
    }

    //Funcionando
    public function update(CategoryUpdateRequest $request, Category $category){
        $category->update($request->all());

        return $category;
    }
    
    //Funcionando
    public function destroy(Category $category)
    {
        $category->delete();
    }
}
