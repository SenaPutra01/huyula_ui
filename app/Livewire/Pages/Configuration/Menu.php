<?php

namespace App\Livewire\Pages\Configuration;

use App\Models\Configuration\Menu as ModelMenu;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        // $this->authorize('read  configuration/menu');
        $menus = ModelMenu::all();
        return view('livewire.pages.configuration.menu', [
            'menus' => $menus,
        ]);
    }
}
