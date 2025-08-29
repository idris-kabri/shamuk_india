<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';

    protected $fillable = [
        'client_id',
        'service_type',
        'purpose',
        'borrower_name',
        'contact_name',
        'contact_number',
        'registration_number',
        'city',
        'remarks',
        'documents',
        'created_by'
    ];

    public function getClient(){
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function getServiceType(){
        return $this->belongsTo(ServiceType::class, 'service_type', 'id');
    }
}
