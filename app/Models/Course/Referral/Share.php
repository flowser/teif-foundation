<?php

namespace App\Models\Course\Referral;

use App\Models\Standard\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course\Referral\ReferralLink;

class Share extends Model
{
    protected $fillables =[
        'user_id',
        'referral_link_id',
        'network'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function referrall_link()
    {
        return $this->belongsTo(ReferralLink::class);
    }

}
