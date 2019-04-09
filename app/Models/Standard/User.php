<?php

namespace App\Models\Standard;

use App\Models\Bureau\Bureau;

use App\Models\Client\Client;
use Spatie\Permission\Models\Role;
use App\Models\Househelp\Househelp;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Permission;
use App\Models\Organisation\Organisation;
use App\Models\Standard\Webservices\About;
use App\Models\Standard\Webservices\Advert;
// use Pdazcom\Referrals\Models\ReferralProgram;
// use Pdazcom\Referrals\Models\ReferralProgram;
use App\Models\Course\Referral\ReferralLink;
use App\Models\Standard\Webservices\Feature;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course\Referral\ReferralCourse;
use App\Models\Organisation\OrganisationAdmin;
use App\Models\Client\Standard\Manual_Collection;
use App\Models\Client\Standard\Parcel_Collection;
use App\Models\Standard\Webservices\ServiceModel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles,
        Notifiable,
        // SendUserPasswordReset,
        SoftDeletes;




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'user_type',
        'email',
        'password',
        'password_changed_at',
        'active',
        'confirmation_code',
        'confirmed',
        'timezone',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['last_login_at', 'deleted_at'];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'confirmed' => 'boolean',
    ];


      public function getFullNameAttribute()
      {
          return $this->last_name ? $this->first_name.' '.$this->last_name : $this->first_name;
      }


      /**
       * @return string
       */
      public function getNameAttribute()
      {
          return $this->full_name;
      }

      //permisions & roles
      public function getAllRolesAttribute() {
        $roles = [];
          foreach (Role::all() as $role) {
            if (Auth::user()->hasRole($role->name)) {
              $roles[] = $role->name;
            }
          }
          return $roles;
      }

      public function getAllPermissionsAttribute() {
        $permissions = [];
          foreach (Permission::all() as $permission) {
            if (Auth::user()->can($permission->name)) {
              $permissions[] = $permission->name;
            }
          }
          return $permissions;
      }

      public function getReferrals()
    {
        return ReferralCourse::all()->map(function ($course) {
            return ReferralLink::getReferral($this, $course);
        });
    }

    public function manual_collections()
    {
        return $this->hasMany(Manual_Collection::class);
    }
    public function parcel_collections()
    {
        return $this->hasMany(Parcel_Collection::class);
    }

      public function organisationdirectors()
      {
          return $this->belongsToMany(Organisation::class,'organisation_director')
                      ->withPivot(
                          'photo',
                          'active',
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
                          'position_id',
                          'gender_id'
                      )
                      ->join('genders', 'organisation_director.gender_id', '=', 'genders.id')
                      ->join('positions', 'organisation_director.position_id', '=', 'positions.id')
                      ->join('countries', 'organisation_director.country_id', '=', 'countries.id')
                      ->join('counties', 'organisation_director.county_id', '=', 'counties.id')
                      ->join('constituencies', 'organisation_director.constituency_id', '=', 'constituencies.id')
                      ->join('wards', 'organisation_director.ward_id', '=', 'wards.id')
                      ->select('organisations.*',
                          'organisation_director.*',
                              'countries.name as country_name',
                              'counties.name as county_name',
                              'constituencies.name as constituency_name',
                              'wards.name as ward_name',
                              'positions.name as position_name',
                              'genders.name as gender_name'
                      )
                      ->withTimestamps();
      }
      public function organisationadmins()
      {
          return $this->belongsToMany(Organisation::class,'organisation_admin')
                      ->withPivot(
                          'photo',
                          'active',
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
                          'position_id',
                          'gender_id'
                      )
                      ->join('genders', 'organisation_admin.gender_id', '=', 'genders.id')
                      ->join('positions', 'organisation_admin.position_id', '=', 'positions.id')
                      ->join('countries', 'organisation_admin.country_id', '=', 'countries.id')
                      ->join('counties', 'organisation_admin.county_id', '=', 'counties.id')
                      ->join('constituencies', 'organisation_admin.constituency_id', '=', 'constituencies.id')
                      ->join('wards', 'organisation_admin.ward_id', '=', 'wards.id')
                      ->select('organisations.*',
                          'organisation_admin.*',
                              'countries.name as country_name',
                              'counties.name as county_name',
                              'constituencies.name as constituency_name',
                              'wards.name as ward_name',
                              'positions.name as position_name',
                              'genders.name as gender_name'
                      )
                      ->withTimestamps();
      }
      public function organisationaffiliates()
      {
          return $this->belongsToMany(Organisation::class,'organisation_affiliate')
                      ->withPivot(
                          'photo',
                          'active',
                          'id_no',
                          'id_photo_front',
                          'id_photo_back',
                          'about_me',
                          'phone',
                          'address',
                          'country_id',
                          'county_id',
                          'constituency_id',
                          'ward_id',
                          'position_id',
                          'gender_id'
                      )
                      ->join('genders', 'organisation_affiliate.gender_id', '=', 'genders.id')
                      ->join('positions', 'organisation_affiliate.position_id', '=', 'positions.id')
                      ->join('countries', 'organisation_affiliate.country_id', '=', 'countries.id')
                      ->join('counties', 'organisation_affiliate.county_id', '=', 'counties.id')
                      ->join('constituencies', 'organisation_affiliate.constituency_id', '=', 'constituencies.id')
                      ->join('wards', 'organisation_affiliate.ward_id', '=', 'wards.id')
                      ->select('organisations.*',
                          'organisation_affiliate.*',
                              'countries.name as country_name',
                              'counties.name as county_name',
                              'constituencies.name as constituency_name',
                              'wards.name as ward_name',
                              'positions.name as position_name',
                              'genders.name as gender_name'
                      )
                      ->withTimestamps();
      }


      public function organisationemployees()
      {
          return $this->belongsToMany(Organisation::class,'organisation_employee')
                      ->withPivot(
                          'photo',
                          'active',
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
                          'position_id',
                          'gender_id'
                      )
                      ->join('genders', 'organisation_employee.gender_id', '=', 'genders.id')
                      ->join('positions', 'organisation_employee.position_id', '=', 'positions.id')
                      ->join('countries', 'organisation_employee.country_id', '=', 'countries.id')
                      ->join('counties', 'organisation_employee.county_id', '=', 'counties.id')
                      ->join('constituencies', 'organisation_employee.constituency_id', '=', 'constituencies.id')
                      ->join('wards', 'organisation_employee.ward_id', '=', 'wards.id')
                      ->select('organisations.*',
                          'organisation_employee.*',
                              'countries.name as country_name',
                              'counties.name as county_name',
                              'constituencies.name as constituency_name',
                              'wards.name as ward_name',
                              'positions.name as position_name',
                              'genders.name as gender_name'
                      )
                      ->withTimestamps();
      }



    public function organisationadmin()
    {
        return $this->hasOne(OrganisationAdmin::class);
    }
    public function abouts()
    {
        return $this->hasMany(About::class);
    }
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
    public function servicemodels()
    {
        return $this->hasMany(ServiceModel::class);
    }
    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

//clients
    public function clients()
    {
        return $this->hasMany(Client::class);
    }




}
