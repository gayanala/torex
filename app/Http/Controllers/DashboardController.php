<?php
/**
 * Created by PhpStorm.
 * User: SanKp
 * Date: 9/30/2017
 * Time: 9:51 PM
 */

namespace App\Http\Controllers;


class DashboardController extends Controller
{


    public function index()
    {
        return view('dashboard.index');

    }


}