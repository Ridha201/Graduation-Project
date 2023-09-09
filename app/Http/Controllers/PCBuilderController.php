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
    public function getGpuProducts(Request $request){
        $formFactor = $request->formFactor;
      if($formFactor == null){

        $products = product::with('GPU')->where('productCategory', 'GPU')->get();
    
        $response = $products->map(function($product) {
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'wattage' => isset($product->gpu) ? $product->gpu->wattage : null,
                'gpuFormFactor' => isset($product->gpu) ? $product->gpu->gpuFormFactor : null,
            ];
        });
    }else {
        $products = product::with('GPU')
        ->whereHas('GPU', function ($query) use ($formFactor) {
            $query->where('gpuFormFactor','<=', $formFactor);
        })
        ->where('productCategory', 'GPU')
        ->get();
        
        $response = $products->map(function($product) {
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'wattage' => isset($product->gpu) ? $product->gpu->wattage : null,
                'gpuFormFactor' => isset($product->gpu) ? $product->gpu->gpuFormFactor : null,

            ];
        });
    }

    
        return response()->json($response);
    }
    public function getRamProducts(Request $request){
        $Slots = $request->Slots;
        $Generation = $request->Generation;
        $Frequency = $request->Frequency;
        $Capacity = $request->Capacity;


       

        if($Slots == null && $Generation == null){
            $products = product::with('ram')->where('productCategory', 'RAM')->get();

        
            $response = $products->map(function($product) {
                return [
                    'id' => $product->id,
                    'productName' => $product->productName,
                    'productPrice' => $product->productPrice,
                    'productImage' => $product->productImage,
                    'frequency' => isset($product->ram) ? $product->ram->frequency : null,
                    'capacity' => isset($product->ram) ? $product->ram->capacity : null,
                    'generation' => isset($product->ram) ? $product->ram->generation : null,
                    'slots' => isset($product->ram) ? $product->ram->slots : null,

                ];
            });
        
        }else {
            $products = product::with('ram')
            ->whereHas('ram', function ($query) use ($Slots, $Generation) {
                $query->where('slots','<=',$Slots)->where('generation' ,  $Generation);
            })
            ->where('productCategory', 'RAM')
            ->get();

            $response = $products->map(function ($product) use ($Frequency, $Capacity) {
            $freqtest = $product->ram->frequency > $Frequency;
            $captest = $product->ram->capacity > $Capacity;
    
            
                return [
                    'id' => $product->id,
                    'productName' => $product->productName,
                    'productPrice' => $product->productPrice,
                    'productImage' => $product->productImage,
                    'frequency' => isset($product->ram) ? $product->ram->frequency : null,
                    'capacity' => isset($product->ram) ? $product->ram->capacity : null,
                    'generation' => isset($product->ram) ? $product->ram->generation : null,
                    'slots' => isset($product->ram) ? $product->ram->slots : null,
                    'freqtest' => $freqtest,
                    'captest' => $captest,
    
                ];
            });
        }
        return response()->json($response);
    }

    public function getStorageProducts(){
        $products = product::where('productCategory', 'storage')->get();
        return response()->json($products);
    }
    public function getCasingProducts(Request $request){
        $MbdFormFactor = $request->MbdFormFactor;
        $GpuFormFactor = $request->GpuFormFactor;
        if($MbdFormFactor == null && $GpuFormFactor == null){
            $products = product::with('cases')->where('productCategory', 'case')->get();
        
            $response = $products->map(function($product) {
                return [
                    'id' => $product->id,
                    'productName' => $product->productName,
                    'productPrice' => $product->productPrice,
                    'productImage' => $product->productImage,
                    'formFactor' => isset($product->cases) ? $product->cases->formFactor : null,   
    
                ];
            });
        }elseif($MbdFormFactor == null && $GpuFormFactor != null){
            $products = product::with('cases')
            ->whereHas('cases', function ($query) use ($MbdFormFactor, $GpuFormFactor) {
                $query->where('formFactor','>=',$GpuFormFactor);
            })
            ->where('productCategory', 'case')
            ->get();
    
            $response = $products->map(function($product) {
                return [
                    'id' => $product->id,
                    'productName' => $product->productName,
                    'productPrice' => $product->productPrice,
                    'productImage' => $product->productImage,
                    'formFactor' => isset($product->cases) ? $product->cases->formFactor : null,   
    
                ];
            });
        }
        elseif($MbdFormFactor != null && $GpuFormFactor == null){
            $products = product::with('cases')
            ->whereHas('cases', function ($query) use ($MbdFormFactor, $GpuFormFactor) {
                $query->where('formFactor','>=',$MbdFormFactor);
            })
            ->where('productCategory', 'case')
            ->get();
    
            $response = $products->map(function($product) {
                return [
                    'id' => $product->id,
                    'productName' => $product->productName,
                    'productPrice' => $product->productPrice,
                    'productImage' => $product->productImage,
                    'formFactor' => isset($product->cases) ? $product->cases->formFactor : null,   
    
                ];
            });
        }
        else{
            $products = product::with('cases')
            ->whereHas('cases', function ($query) use ($MbdFormFactor, $GpuFormFactor) {
                $query->where('formFactor','>=',$MbdFormFactor)->where('formFactor','>=',$GpuFormFactor);
            })
            ->where('productCategory', 'case')
            ->get();
    
            $response = $products->map(function($product) {
                return [
                    'id' => $product->id,
                    'productName' => $product->productName,
                    'productPrice' => $product->productPrice,
                    'productImage' => $product->productImage,
                    'formFactor' => isset($product->cases) ? $product->cases->formFactor : null,   
    
                ];
            });
        }
        return response()->json($response);
    }
    public function getCoolerProducts(){
        $products = product::where('productCategory', 'cooler')->get();
        return response()->json($products);
    }
    public function getMotherboardProducts(Request $request){

        $brand = $request->brand;
        $ramgeneration = $request->generation;
        $ramslots = $request->slots;
        $caseformfactor = $request->caseFormFactor;
        $ramfrequency = $request->frequency;
        $ramcapacity = $request->capacity;
        $freqexcced = false;
        $capexcced = false;
        


        if($brand != null && $ramcapacity== null && $caseformfactor == null  ){
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
                'mbdFormFactor' => isset($product->mbd) ? $product->mbd->mbdFormFactor : null,
                'ramSlots' => isset($product->mbd) ? $product->mbd->ramSlots : null,
                'ramGen' => isset($product->mbd) ? $product->mbd->ramGen : null, 
                'maxSupportedRamFrequency' => isset($product->mbd) ? $product->mbd->maxSupportedRamFrequency : null,
                'maxSupportedRamCapacity' => isset($product->mbd) ? $product->mbd->maxSupportedRamCapacity : null,  

            ];
            
        });
    }

    elseif ($brand == null && $ramcapacity != null && $caseformfactor == null) {
        $products = product::with('MBD')
            ->whereHas('MBD', function ($query) use ($ramslots, $ramgeneration) {
                $query->where('ramSlots', '>=', $ramslots)->where('ramGen', $ramgeneration);
            })
            ->where('productCategory', 'motherboard')
            ->get();
    
        $response = $products->map(function ($product) use ($ramfrequency, $ramcapacity) {
            $freqexcced = $product->mbd->maxSupportedRamFrequency < $ramfrequency;
            $capexcced = $product->mbd->maxSupportedRamCapacity < $ramcapacity;
    
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'wattage' => isset($product->mbd) ? $product->mbd->wattage : null,
                'compatibility' => isset($product->mbd) ? $product->mbd->compatibility : null,
                'mbdFormFactor' => isset($product->mbd) ? $product->mbd->mbdFormFactor : null,
                'ramSlots' => isset($product->mbd) ? $product->mbd->ramSlots : null,
                'ramGen' => isset($product->mbd) ? $product->mbd->ramGen : null,
                'maxSupportedRamFrequency' => isset($product->mbd) ? $product->mbd->maxSupportedRamFrequency : null,
                'maxSupportedRamCapacity' => isset($product->mbd) ? $product->mbd->maxSupportedRamCapacity : null,
                'freqexcced' => $freqexcced,
                'capexcced' => $capexcced,
            ];
        });
    }

    elseif($brand == null && $ramcapacity == null && $caseformfactor != null ){
        $products = product::with('MBD')
        ->whereHas('MBD', function ($query) use ($caseformfactor) {
            $query->where('mbdFormFactor','<=', $caseformfactor);
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
                'mbdFormFactor' => isset($product->mbd) ? $product->mbd->mbdFormFactor : null,
                'ramSlots' => isset($product->mbd) ? $product->mbd->ramSlots : null,
                'ramGen' => isset($product->mbd) ? $product->mbd->ramGen : null,
                'maxSupportedRamFrequency' => isset($product->mbd) ? $product->mbd->maxSupportedRamFrequency : null,
                'maxSupportedRamCapacity' => isset($product->mbd) ? $product->mbd->maxSupportedRamCapacity : null,
            ];  
        });
    }

    elseif($brand != null && $ramcapacity != null && $caseformfactor == null ){
        $products = product::with('MBD')
        ->whereHas('MBD', function ($query) use ($brand,$ramslots, $ramgeneration,$ramcapacity,$ramfrequency) {
            $query->where('compatibility', $brand)->where('ramSlots','>=', $ramslots)->where('ramGen', $ramgeneration);
        })
        ->where('productCategory', 'motherboard')
        ->get();


        $response = $products->map(function ($product) use ($ramfrequency, $ramcapacity) {
            $freqexcced = $product->mbd->maxSupportedRamFrequency < $ramfrequency;
            $capexcced = $product->mbd->maxSupportedRamCapacity < $ramcapacity;
    
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'wattage' => isset($product->mbd) ? $product->mbd->wattage : null,
                'compatibility' => isset($product->mbd) ? $product->mbd->compatibility : null,
                'mbdFormFactor' => isset($product->mbd) ? $product->mbd->mbdFormFactor : null,
                'ramSlots' => isset($product->mbd) ? $product->mbd->ramSlots : null,
                'ramGen' => isset($product->mbd) ? $product->mbd->ramGen : null,
                'maxSupportedRamFrequency' => isset($product->mbd) ? $product->mbd->maxSupportedRamFrequency : null,
                'maxSupportedRamCapacity' => isset($product->mbd) ? $product->mbd->maxSupportedRamCapacity : null,
                'freqexcced' => $freqexcced,
                'capexcced' => $capexcced,
            ];
        });
    }

    elseif($brand != null && $ramcapacity == null && $caseformfactor != null ){
        $products = product::with('MBD')
        ->whereHas('MBD', function ($query) use ($brand,$caseformfactor) {
            $query->where('compatibility', $brand)->where('mbdFormFactor','<=', $caseformfactor);
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
                'mbdFormFactor' => isset($product->mbd) ? $product->mbd->mbdFormFactor : null,
                'ramSlots' => isset($product->mbd) ? $product->mbd->ramSlots : null,
                'ramGen' => isset($product->mbd) ? $product->mbd->ramGen : null,
                'maxSupportedRamFrequency' => isset($product->mbd) ? $product->mbd->maxSupportedRamFrequency : null,
                'maxSupportedRamCapacity' => isset($product->mbd) ? $product->mbd->maxSupportedRamCapacity : null,
            ];  
        });
    }

    elseif($brand == null && $ramcapacity != null && $caseformfactor != null ){
        $products = product::with('MBD')
        ->whereHas('MBD', function ($query) use ($ramgeneration,$ramslots,$caseformfactor,$ramcapacity,$ramfrequency) {
            $query->where('mbdFormFactor','<=', $caseformfactor)->where('ramSlots','>=', $ramslots)->where('ramGen', $ramgeneration);
        })
        ->where('productCategory', 'motherboard')
        ->get();


        $response = $products->map(function ($product) use ($ramfrequency, $ramcapacity) {
            $freqexcced = $product->mbd->maxSupportedRamFrequency < $ramfrequency;
            $capexcced = $product->mbd->maxSupportedRamCapacity < $ramcapacity;
    
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'wattage' => isset($product->mbd) ? $product->mbd->wattage : null,
                'compatibility' => isset($product->mbd) ? $product->mbd->compatibility : null,
                'mbdFormFactor' => isset($product->mbd) ? $product->mbd->mbdFormFactor : null,
                'ramSlots' => isset($product->mbd) ? $product->mbd->ramSlots : null,
                'ramGen' => isset($product->mbd) ? $product->mbd->ramGen : null,
                'maxSupportedRamFrequency' => isset($product->mbd) ? $product->mbd->maxSupportedRamFrequency : null,
                'maxSupportedRamCapacity' => isset($product->mbd) ? $product->mbd->maxSupportedRamCapacity : null,
                'freqexcced' => $freqexcced,
                'capexcced' => $capexcced,
            ];
        });
    }

    elseif($brand != null && $ramcapacity != null && $caseformfactor != null ){
        $products = product::with('MBD')
        ->whereHas('MBD', function ($query) use ($ramgeneration,$ramslots,$caseformfactor,$brand,$ramcapacity,$ramfrequency) {
            $query->where('mbdFormFactor','<=', $caseformfactor)->where('ramSlots','>=', $ramslots)->where('ramGen', $ramgeneration)->where('compatibility', $brand);
        })
        ->where('productCategory', 'motherboard')
        ->get();


        $response = $products->map(function ($product) use ($ramfrequency, $ramcapacity) {
            $freqexcced = $product->mbd->maxSupportedRamFrequency < $ramfrequency;
            $capexcced = $product->mbd->maxSupportedRamCapacity < $ramcapacity;
    
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'wattage' => isset($product->mbd) ? $product->mbd->wattage : null,
                'compatibility' => isset($product->mbd) ? $product->mbd->compatibility : null,
                'mbdFormFactor' => isset($product->mbd) ? $product->mbd->mbdFormFactor : null,
                'ramSlots' => isset($product->mbd) ? $product->mbd->ramSlots : null,
                'ramGen' => isset($product->mbd) ? $product->mbd->ramGen : null,
                'maxSupportedRamFrequency' => isset($product->mbd) ? $product->mbd->maxSupportedRamFrequency : null,
                'maxSupportedRamCapacity' => isset($product->mbd) ? $product->mbd->maxSupportedRamCapacity : null,
                'freqexcced' => $freqexcced,
                'capexcced' => $capexcced,
            ];
        });
    }
  
  
  
    elseif($brand == null && $ramcapacity== null && $caseformfactor == null ){
        $products = product::with('MBD')->where('productCategory', 'motherboard')->get();


        $response = $products->map(function($product) {
            return [
                'id' => $product->id,
                'productName' => $product->productName,
                'productPrice' => $product->productPrice,
                'productImage' => $product->productImage,
                'wattage' => isset($product->mbd) ? $product->mbd->wattage : null,
                'compatibility' => isset($product->mbd) ? $product->mbd->compatibility : null,
                'mbdFormFactor' => isset($product->mbd) ? $product->mbd->mbdFormFactor : null,
                'ramSlots' => isset($product->mbd) ? $product->mbd->ramSlots : null,
                'ramGen' => isset($product->mbd) ? $product->mbd->ramGen : null,
                'maxSupportedRamFrequency' => isset($product->mbd) ? $product->mbd->maxSupportedRamFrequency : null,
                'maxSupportedRamCapacity' => isset($product->mbd) ? $product->mbd->maxSupportedRamCapacity : null,
            ];  
        });
    }
    return response()->json($response);
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

