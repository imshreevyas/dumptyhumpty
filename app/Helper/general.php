
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

if (!function_exists('checkUserType')) {
    function checkUserType()
    {
        if (Session::has('user_type') && Session::get('user_type') != 'admin') {
            return Redirect::route('index')->send();
        }
    }
}