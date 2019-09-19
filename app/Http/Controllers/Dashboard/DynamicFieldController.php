<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class DynamicFieldController extends Controller
{
    function index()
    {
        return view('dynamic_field');
    }

    public function insert(Tutorial $tutorial, Request $request)
    {
        if($request->ajax())
        {
            $rules = array(
                'name.*'  => 'required',
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $name = $request->name;
            for($count = 0; $count < count($name); $count++)
            {
                $data = array(
                    'name' => $name[$count],
                    'tutorial_id' => $tutorial->id
                );
                $insert_data[] = $data;
            }

            Session::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
        }
    }
}
