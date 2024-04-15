<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

abstract class Controller extends \Illuminate\Routing\Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Session::has('success_message')) {
                // Display success message
                Alert::toast(Session::get('success_message'), 'success');
            } elseif (Session::has('error_message')) {
                // Display error message using actual session data
                Alert::error('Error!', Session::get('error_message'));
            }

            return $next($request);
        });
    }
}
