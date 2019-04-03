<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Standard\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation\Organisation;
use App\Models\Standard\Webservices\Advert;
use App\Models\Standard\Webservices\ServiceModel;

class PublicController extends Controller
{

    public function index(Request $request) 
    {
        if (auth()->check()) {
            if (auth()->user()->hasRole('Client')) {
                $logged_user =Auth::user();
                $organisation = Organisation::with('about','services', 'servicemodels', 'adverts', 
                               'organisationdirectors', 'organisationadmins', 'organisationemployees')
                               ->first();

                return view('layouts.homemaster')->with(
                    'logged_user','organisation');
            }
        }else{
            $organisation = Organisation::with('about','services', 'servicemodels', 'adverts')
                               ->first();
                return view('layouts.homemaster', compact("organisation"));
        }
    }
    public function routes()
    {
         return view('layouts.homemaster');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
