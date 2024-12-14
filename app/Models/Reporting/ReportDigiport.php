<?php

namespace App\Models\Reporting;

use Illuminate\Database\Eloquent\Model;

class ReportDigiport extends Model
{
    protected $table;

    protected static function boot()
    {
        parent::boot();
    }
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = table('report_digiport');
    }

    protected $fillable = [
        'productid',
        'licensecount',
        'subscriberid',
        'license_count',
        'starttime',
        'endtime',
        'grl',
        'activation_code',
        'created_at'
    ];
}
