<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todos extends Model
{
    use HasFactory;



    protected $fillable = [
        'item',
        'user',
        'user_type',
    ];

    public $timestamps = false;

    protected $casts = [
        'completed' => 'boolean'
    ];

    public function users(){
        return $this->morphedByMany(User::class, 'todoable');
    }


    public function admins(){
        return $this->morphedByMany(Admin::class, 'todoable');
    }

}
