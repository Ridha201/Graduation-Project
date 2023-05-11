<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class PCBuilderController extends Controller
{
    public function getCpuProducts(Request $request){ 
        $compatibility = $request->compatibility;
        if($compatibility == null){
        $products = product::with('cpu')->where('productCategory', 'CPU')->get();
    
        $response = $products->map(function($product) {
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'brand' => isset($product->cpu) ? $product->cpu->brand : null,
                'wattage' => isset($product->cpu) ? $product->cpu->wattage : null,
            ];
        });
    
        return response()->json($response);

        }else {
        $products = product::with('CPU')
        ->whereHas('CPU', function ($query) use ($compatibility) {
            $query->where('brand', $compatibility);
        })
        ->where('productCategory', 'CPU')
        ->get();

        $response = $products->map(function($product) {
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'brand' => isset($product->cpu) ? $product->cpu->brand : null,
                'wattage' => isset($product->cpu) ? $product->cpu->wattage : null,
            ];
            
        });
        return response()->json($response);
    }
}
    public function getGpuProducts(){
        $products = product::with('GPU')->where('productCategory', 'GPU')->get();
    
        $response = $products->map(function($product) {
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'wattage' => isset($product->gpu) ? $product->gpu->wattage : null,
            ];
        });
    
        return response()->json($response);
    }
    public function getRamProducts(){
        $products = product::where('productCategory', 'RAM')->get();
        return response()->json($products);
    }

    public function getStorageProducts(){
        $products = product::where('productCategory', 'storage')->get();
        return response()->json($products);
    }
    public function getCasingProducts(){
        $products = product::where('productCategory', 'case')->get();
        return response()->json($products);
    }
    public function getCoolerProducts(){
        $products = product::where('productCategory', 'cooler')->get();
        return response()->json($products);
    }
    public function getMotherboardProducts(Request $request){
        $brand = $request->brand;
        if($brand != null || $brand == "both"){
        $products = product::with('MBD')
        ->whereHas('MBD', function ($query) use ($brand) {
            $query->where('compatibility', $brand);
        })
        ->where('productCategory', 'motherboard')
        ->get();

        $response = $products->map(function($product) {
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'wattage' => isset($product->mbd) ? $product->mbd->wattage : null,
                'compatibility' => isset($product->mbd) ? $product->mbd->compatibility : null,
            ];
            
        });
        return response()->json($response);
    }
    else {
        $products = product::with('MBD')->where('productCategory', 'motherboard')->get();


        $response = $products->map(function($product) {
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'wattage' => isset($product->mbd) ? $product->mbd->wattage : null,
                'compatibility' => isset($product->mbd) ? $product->mbd->compatibility : null,
            ];
            
        });
        return response()->json($response);
    }
    }

    public function getPsuProducts(Request $request){
        $wattage = $request->wattage;
        $products = product::with('PSU')
        ->whereHas('PSU', function ($query) use ($wattage) {
            $query->where('wattage','>=', $wattage);
        })
        ->where('productCategory', 'PSU')
        ->get();

        $response = $products->map(function($product) {
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
            ];
        });

        return response()->json($response);
    }
}

