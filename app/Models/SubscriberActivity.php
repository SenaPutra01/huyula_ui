<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberActivity extends Model
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
        $this->table = table('subscribe_activity');
    }

    protected $fillable = [
        'msisdn',
        'subscriberid',
        'status',
        'statuschangetime',
        'starttime',
        'endtime',
        'activationcode',
        'req_text',
        'resp_text'
    ];
}