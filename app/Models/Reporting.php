<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporting extends Model
{
    protected $table;

    protected static function boot()
    {
        parent::boot();
    }
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = table('report_portal');
    }

    protected $fillable = [
        'subscriber_id',
        'license_id',
        'product_code',
        'license_count',
        'subscription_first_start_date',
        'command',
        'command_processing_date',
        'command_subscription_start_date',
        'command_subscription_end_date_',
        'command_trial_intervals_quantity',
        'command_chargeable_intervals_quantity',
        'subcription_trial_intervals_quantity',
        'subcription_chargeable_intervals_quantity'
    ];
}
