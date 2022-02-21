<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiTokenController extends Controller
{
    public function update(Object $admin)
    {
        $token = Str::random(60);
 
        $admin->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();
 
        return ['token' => $token];
    }
}
