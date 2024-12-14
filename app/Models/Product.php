<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $table = 'dev.product_catalog';
    protected $table;

    protected static function boot()
    {
        parent::boot();
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Menetapkan nama tabel menggunakan helper
        // $this->table = 'dev.product_catalog';
        $this->table = table('product_catalog');
    }

    public $timestamps = false; // Nonaktifkan timestamp jika tidak ingin menggunakan


    protected $fillable = [
        'productid',
        'licensecount',
        'client',
        'productcode',
        'days',
        'wording'
    ];
}
