<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class RegistrationController extends Controller
{
    public function registration(Request $request)
    {
    	$user = Sentinel::registerAndActivate($request->all());
    	// return response()->json($user);

    	$role = Sentinel::findRoleBySlug('customer');

    	$role->users()->attach($user);
    }
}
