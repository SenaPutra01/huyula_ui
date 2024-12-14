<?php

namespace App\Livewire\Pages\Product;

use App\Models\Product;
use Livewire\Component;

class ProductCatalog extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.pages.product.product-catalog', [
            'products' => $products,
        ]);
    }
}
