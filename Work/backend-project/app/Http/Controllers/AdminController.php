<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
    
    public function index()
    {
        $admins = Admin::all();
        return response()->json($admins, 201);   
    }

  
    public function create(Request $adminFromVue)
    {
        $admin = Admin::create([
            'name'=>$adminFromVue->get('name'),
            'email'=>$adminFromVue->get('email'),
            'password'=>password_hash($adminFromVue->get('password'),PASSWORD_BCRYPT),
            

            // $hash = password_hash($password, PASSWORD_DEFAULT);


            // $hash = password_hash($password, PASSWORD_DEFAULT);
            // 'name' => $data['name'],
            // 'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
        ]);
        app('App\Http\Controllers\ApiTokenController')->update($admin);
        return $admin;
    
    }

    public function login(Request $request)
    {
        
        $validator = Validator::make(
            [
                'password' => $request->get('password'),
                'email' => $request->get('email')
            ],
            [
                'password' => 'required',
                'email' => 'required'
            ]
        );
    
        if ($validator->fails())
        {
            return Response()->json([
                'status' => false,
                'errorMessage'=>"check the email or password",           
            ]);
        }

        $dbData = Admin::whereEmail($request->get('email'))->first();
        if( $dbData != null){
            $passCheck = password_verify($request->get('password'), $dbData->password);
            if($passCheck == true){

                return Response()->json([
                    'status' => true,
                    'admin' => $dbData
                ]);

            }else{
                return Response()->json([
                    'status' => false,
                    'reason' => "password"
                ]);
            }
        }else{
            return Response()->json([
                'status' => false,
                'reason' => "email"
            ]);
        }
        
        
        

       
        // $adminData = array(
        //     'email'     => $request->get('email'),
        //     'password'  => $request->get('password'),
        // );
        // dd($dbData->email);
        // $existEmail = Admins::find();
        // return view('some-view')->with('users', $users);
        // $dbData = Admin::all('email');
        // check email true/false -> 
        //check pass
        // if (password_verify($pass, $hash)){
        //     return 'SUCCESS!';
        // }else {
        //     return 'Emotional Damage';
        // }
    }
//



// section logout ------------------------------------------------
// section logout ------------------------------------------------
// section logout ------------------------------------------------
// section logout ------------------------------------------------

    public function logout(Request $request)
    {
        //
    }


    // section logout ------------------------------------------------
    // section logout ------------------------------------------------
    // section logout ------------------------------------------------
    // section logout ------------------------------------------------


    
    public function store(StoreAdminRequest $request)
    {
        //
    }
    
    

   
    public function edit(Admin $admin)
    {
        //
    }

   
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

   
    public function destroy(Admin $admin)
    {
        //
    }
}
