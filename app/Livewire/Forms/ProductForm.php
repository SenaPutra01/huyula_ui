<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    public ?Product $product;

    #[Rule('required|string|max:255', as: 'Productid')]
    public string $productid;

    #[Rule('required|integer|min:1', as: 'Licensecount')]
    public ?int $licensecount;

    #[Rule('required|string|max:255', as: 'Client')]
    public string $client;

    #[Rule('required|string|max:255', as: 'Productcode')]
    public string $productcode;

    #[Rule('required|integer|min:1', as: 'Days')]
    public ?int $days;

    #[Rule('nullable|string', as: 'Wording')]
    public string $wording;

    public function setProduct(Product $product)
    {
        $this->product = $product;

        $this->productid = $product->productid;
        $this->licensecount = $product->licensecount;
        $this->client = $product->client;
        $this->productcode = $product->productcode;
        $this->wording = $product->wording;
    }


    public function store()
    {
        Product::create($this->except('product'));
    }

    public function update()
    {
        $this->product->update($this->except('product'));
    }

    public function render()
    {
        return view('livewire.pages.product.product-form');
    }
}
