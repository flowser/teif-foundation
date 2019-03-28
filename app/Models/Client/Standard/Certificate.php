<?php

namespace App\Models\Client\Standard;

use App\Models\Client\Client;
use App\Models\Standard\User;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
            'client_id',
            'user_id',//served by

            'collection_date',
            'collector_name',

            'id_no',
            'id_photo_front',
            'id_photo_back',

            'certificate_number',
            'certificate_image',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
