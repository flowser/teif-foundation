<?php

namespace App\Models\Client\Standard;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'name',
    ];
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
