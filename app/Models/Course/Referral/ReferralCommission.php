<?php

namespace App\Models\Course\Referral;

use Illuminate\Database\Eloquent\Model;

class ReferralCommission extends Model
{
    protected $fillable = [
        'referral_link_id',
        'user_id',
        'fee_paid',
        'commission'
    ];
}
