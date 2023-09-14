<?php

namespace App\Http\Controllers;
use App\Models\Registration;
use App\Models\Device;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return Registration::all();
    }

    public function store(Request $request)
    {
        //return ["Result" => "Data has been saved"];
        $device = new Device;
        $device->name = $request->name;
        $device->imei_no = $request->id;

        $result = $device->save();

        if($result)
        {
            return ["Result" => "Data has been saved"];
        }
        else{
            return ["Result" => "Data not Saved"];
        }
    }
}
