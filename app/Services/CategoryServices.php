<?php

namespace App\Services;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;

class CategoryServices
{
    //Funcionando
   public function list()
    {
        $categories = Category::paginate();

        return $categories;
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
