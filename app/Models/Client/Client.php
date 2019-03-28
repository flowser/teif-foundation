<?php

namespace App\Models\Client;

use App\Models\Client\Parcel;
use App\Models\Standard\User;
use App\Models\Standard\Ward;
use App\Models\Standard\County;
use App\Models\Standard\Country;
use App\Models\Standard\Constituency;
use App\Models\Client\Standard\Result;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Standard\Education;
use App\Models\Client\Standard\Certificate;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'gender_id',
        'education_id',
        'photo',
        'id_no',
        'id_photo_front',
        'id_photo_back',
        'about_me',
        'phone',
        'landline',
        'address',
        'country_id',
        'county_id',
        'constituency_id',
        'ward_id',
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
    public function parcels()
    {
        return $this->hasMany(Parcel::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function education()
    {
        return $this->belongsTo(Education::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function county()
    {
        return $this->belongsTo(County::class);
    }
    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
}
