<?php

namespace App\Models\Configuration;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subMenus()
    {
        return $this->hasMany(Menu::class, 'main_menu_id');
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'menu_permission', 'permission_id', 'menu_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
