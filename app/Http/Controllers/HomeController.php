<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bureau\Bureau;
use App\Models\Standard\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation\Organisation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Organisation

        if (auth()->check()) {
            if (auth()->user()->hasAnyRole(['Director', 'Superadmin','Admin'])){
                $logged_user =User::
                            leftJoin('organisation_director', 'organisation_director.user_id', '=', 'users.id')
                            ->leftJoin('positions', 'organisation_director.position_id', '=', 'positions.id')
                            ->leftJoin('countries', 'organisation_director.country_id', '=', 'countries.id')
                            ->leftJoin('counties', 'organisation_director.county_id', '=', 'counties.id')
                            ->leftJoin('constituencies', 'organisation_director.constituency_id', '=', 'constituencies.id')
                            ->leftJoin('wards', 'organisation_director.ward_id', '=', 'wards.id')
                            ->where('users.id', Auth::user()->id)
                            ->select('users.*',
                                'organisation_director.*',
                                    'countries.name as country_name',
                                    'counties.name as county_name',
                                    'constituencies.name as constituency_name',
                                    'wards.name as ward_name',
                                    'positions.name as position_name'
                            )->first();

                $organisation = Organisation::with('about','services', 'servicemodels', 'adverts', 'features',
                               'organisationdirectors', 'organisationadmins', 'organisationemployees')
                               ->first();

                  return view('layouts.adminmaster', compact("logged_user", "organisation"));

            }elseif (auth()->user()->hasAnyRole(['Client', 'Affiliate'])) {
                 return redirect('/');
            }
        }
    }
}
