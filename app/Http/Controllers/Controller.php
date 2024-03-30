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
                // Alert::success('Success!', Session::get('success_message'));
                Alert::toast(Session::get('success_message'), 'success');
            }

            return $next($request);
        });
    }
}
