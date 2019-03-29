<?php

namespace App\Models\Client\Standard;

use App\Models\Client\Client;
use App\Models\Standard\User;
use App\Models\Client\Standard\Result;
use Illuminate\Database\Eloquent\Model;

class Parcel_Collection extends Model
{
    protected $fillable = [
        'result_id',
        'client_id',
        'user_id',
        'company_name',
        'parcel_number',
        'parcel_fee',
        'delivered'
    ];
    protected $casts = [
        'delivered' => 'boolean',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function result()
    {
        return $this->belongsTo(Result::class);
    }
}
