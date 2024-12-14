<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class createMenu extends Form
{
    #[Rule('required|string|max:255', as: 'Name')]
    public string $name;

    #[Rule('required|string|max:255', as: 'Url')]
    public string $url;

    #[Rule('required|integer|min:1', as: 'Orders')]
    public ?int $orders;
}
