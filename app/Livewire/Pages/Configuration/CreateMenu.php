<?php

namespace App\Livewire\Pages\Configuration;

use App\Livewire\Forms\createMenu as FormsCreateMenu;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateMenu extends Component
{
    public $menu;
    public $permissions = [];

    public function mount(Menu $menu = null)
    {
        $this->menu = $menu ?? new Menu();
    }

    private function fillData(FormsCreateMenu $request, Menu $menu)
    {
        $menu->fill($request->validated());
        $menu->fill([
            'orders' => $request->orders,
            'icon' => $request->icon,
            'category' => $request->category,
            'main_menu_id' => $request->main_menu,
        ]);
    }

    public function store()
    {
        $this->validate([
            'menu.name' => 'required|string|max:255',
            'menu.url' => 'required|string|max:255',
            'permissions' => 'array',
        ]);

        DB::beginTransaction();
        try {
            $this->authorize('create konfigurasi/menu');

            $this->menu->save();

            foreach ($this->permissions as $permission) {
                $newPermission = Permission::create(['names' => $permission . " {$this->menu->url}"]);
                $newPermission->menus()->attach($this->menu);
            }

            DB::commit();
            session()->flash('message', 'Menu created successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'An error occurred: ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.configuration.create-menu');
    }
}
