<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;

//use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Faker\Factory;
use App\Models\Person;

class PersonController extends Controller
{
    //GET requests
    public function getPersons()
    {
        echo '<pre>';
        print_r(DB::select('select * from Person'));
    }

    public function insertPerson($firstName,$lastName)
    {
        DB::insert('insert into Person (LastName, FirstName) values (?, ?)', [$firstName, $lastName]);
    }

    public function createName()
    {
        $fake = Factory::create("en_EN");
        $gender = $fake->randomElement(['male', 'female']);
        $firstName = $fake->firstName($gender) . " ";
        $lastName = $fake->lastName($gender);
        $this->insertPerson($firstName,$lastName);
    }

    public function postNames()
    {
        for ($i=0;$i<20;$i++ )
        {
            $this->createName();
        }
    }

    public function deleteAll()
    {
        DB::table('Person')->delete();
    }

    /**
     * @param $id
     * @return Response
     */
    public function delete($id)
    {
        DB::table('Person')->delete($id);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $firstName = $request->firstName;
        $lastName = $request->lastName;

        DB::table('Person')
            ->where('id', $id)
            ->update(['FirstName'=>$firstName,'LastName'=>$lastName]);
    }

    public function post(Request $request)

    {
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        DB::insert('insert into Person (LastName, FirstName) values (?,?)',[$lastName,$firstName]);
    }
}
