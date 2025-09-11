<?php

namespace App\Services;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use App\Http\Requests\BrandStoreRequest;

class BrandServices
{
    //Funcionando
   public function list()
    {
        $brands = Brand::paginate();

        return $brands;
    }
     //Funcionando
    public function store(BrandStoreRequest $request){
        $brand = Brand::create($request->all());

        return $brand;
    }

    //Funcionando
    public function update(BrandUpdateRequest $request, Brand $brand){
        $brand->update($request->all());

        return $brand;
    }
    
    //Funcionando
    public function destroy(Brand $brand)
    {
        $brand->delete();
    }
}
