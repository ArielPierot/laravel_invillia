<?php

namespace App\Http\Controllers;

use App\Person;
use App\ShipOrder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public $successStatus = 200;

    public function register(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('Invillia')->accessToken;
        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('Invillia')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        } else{
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }

    public function profile() {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function getPeople()
    {
        return Person::get();
    }

    public function getShipOrders()
    {
        return ShipOrder::get();
    }
}
