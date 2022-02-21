<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateAdminRequest;

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
        $adminData = array(
            'email'     => $request->get('email'),
            'password'  => $request->get('password'),
            
        );
        
        
        if (password_verify($userPass, $hashedPass)){
            return 'SUCCESS!';
        }else {
            return 'youre a failure, emotional damage';
        }
    }


   



    
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
