<?php

namespace App\Services;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use App\Http\Requests\BrandStoreRequest;

class BrandServices
{

   public function list()
    {
        $brands = Brand::paginate();

        return $brands;
    }

    public function store(BrandStoreRequest $request){
        $brand = Brand::create($request->all());

        return $brand;
    }
    public function update(BrandUpdateRequest $request, Brand $brand){
        $brand->update($request->validate($request->all()));

        return $brand;
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
    }
}
