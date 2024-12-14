<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscriber extends Model
{
    use HasFactory;

    // Tentukan nama tabel dengan schema
    // protected $table = 'dev.subscriber'; // Menggunakan schema dev

    protected $table;

    protected static function boot()
    {
        parent::boot();
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Menetapkan nama tabel menggunakan helper
        $this->table = table('subscriber');
    }

    // Kolom yang dapat diisi
    protected $fillable = [
        'subscriberid',
        'productcode',
        'licensecount',
        'msisdn',
        'starttime',
        'endtime',

    ];
}
