<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Person;
use App\ShipOrder;
use App\Transformers\PersonTransformer;
use App\Transformers\ShipOrderTransformer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public $successStatus = 200;

    public function register(RegisterUserRequest $request)
    {
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('Invillia')->accessToken;
        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('Invillia')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        } else {
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function getPeople()
    {
        return fractal(Person::get(), new PersonTransformer());
    }

    public function getShipOrders()
    {
        return fractal(ShipOrder::get(), new ShipOrderTransformer());
    }
}
