<?php

namespace App\Services;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use DB;
use Str;
use App\Models\Sku;

class ProductServices
{
    //Funcionando
    public function list()
    {
        $products = Product::paginate();

        return $products;
    }
    //Funcionando
    public function store(ProductStoreRequest $request)
    {
        $product = DB::transaction(function () use ($request) {

            //dd($request->all());

            $product_data = $request->except("sku");
            $product_data['slug'] = Str::slug($product_data['name']);

            $product = Product::create($product_data);

            $skus = $product->Sku()->createMany($request->get('sku'));

            foreach ($skus as $key => $sku) {

                foreach ($request->sku[$key]['images'] as $index => $image) {
                    $path = $image['url']->store('products');

                    $sku->images()->create([
                        'url' => $path,
                        'cover' => $index == 0
                    ]);
                }
            }

            return $product->load('sku.images');
            //dd($skus);
        });

        return $product;
    }

    //Funcionando
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product = DB::transaction(function () use ($request, $product) {

            

            $product_data = $request->except("sku");
            $product_data['slug'] = Str::slug($product_data['name']);

            $product->update($product_data);



            foreach ($request->sku as $key => $skuData) {
    $sku = $product->sku()->updateOrCreate(['id' => $skuData['id'] ?? 0], $skuData);

    if (isset($skuData['images']) && is_array($skuData['images'])) {
        foreach ($skuData['images'] as $index => $image) {
            // upload ou lógica para salvar a imagem
            $path = $image['url']->store('products', 's3');

            $sku->images()->create([
                'url' => $path,
                'cover' => $index == 0
            ]);
        }
    }
}


            return $product->load('sku.images');
            //dd($skus);
        });

        return $product;
    }

    //Funcionando
    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            $product->load('Sku.images');

            foreach ($product->Sku as $sku) {
                foreach ($sku->images as $image) {
                    //dump('Após load: SKUs encontrados: ' . $product->Sku->count());
                    $image->delete();
                }

                $sku->delete();
            }
            
            $product->delete();
        });
    }
}