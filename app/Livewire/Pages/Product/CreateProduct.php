<?php

namespace App\Livewire\Pages\Product;

use App\Livewire\Forms\ProductForm;
use Livewire\Component;

use function Livewire\Volt\title;

class CreateProduct extends Component
{
    public ProductForm $form;

    public $modalProduct = false;

    public function createProduct()
    {
        $this->validate();
        $store = $this->form->store();
        is_null($store)
            ? $this->dispatch('notify', title: 'success', message: 'Create Product Successfully..')
            : $this->dispatch('notify', title: 'failed', message: 'Create Product Failed..');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.product.create-product');
    }
}
