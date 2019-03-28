<?php

namespace App\Models\Client;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    protected $fillable = [
        'client_id',
        'company_name',
        'parcel_number',
        'delivered',
    ];
    protected $casts = [
        'delivered' => 'boolean',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
