<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

    protected $table;

    protected static function boot()
    {
        parent::boot();
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Menetapkan nama tabel menggunakan helper
        $this->table = table('nbp_log');
    }

    protected $fillable = [
        'created_at',
        'req',
        'resp',
        'status'
    ];
}
