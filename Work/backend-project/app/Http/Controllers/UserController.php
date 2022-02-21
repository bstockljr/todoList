<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users, 201);    
    }

  
    public function create()
    {
        //
    }

    
    public function store()
    {
        //
    }

    
    public function show()
    {
        //
    }

    
    public function edit()
    {
        //
    }

  
    public function update()
    {
        //
    }

   
    public function destroy()
    {
        //
    }}
