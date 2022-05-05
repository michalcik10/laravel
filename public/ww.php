<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PersonController;

$results = DB::select('select * from Person ');
echo $results;
//app('App\Http\Controllers\PersonController')->Get_User();
//$person_controller = new PersonController();
//$person_controller->Get_User();
