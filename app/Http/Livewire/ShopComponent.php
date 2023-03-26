<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }

use Livewire\Withpagination;

    public function render()
    {
        if ($this->sorting == 'date') {
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-asc') {
            $products = Product::orderBy('productPrice', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::orderBy('productPrice', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::paginate($this->pagesize);
        }

        return view('livewire.list', ['donnee' => $products]);
    }
}
