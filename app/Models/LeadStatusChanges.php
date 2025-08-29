<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadStatusChanges extends Model
{
    use SoftDeletes;
    protected $table = 'lead_status_changes';
    protected $fillable = [
        'lead_id',
        'status',
        'appointed_date',
        'appointed_time',
        'appointed_place',
        'professional_fees',
        'select_mode_of_payment',
        'executive_charges',
        'remarks',
        'select_executive',
        'executive_message',
    ];
}
