<?php

namespace App\Models;

use App\Models\Todos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token'
        
    ];

    public $timestamps = false;


    public function todos()
    {
        return $this->morphToMany(Todos::class, 'todoable');
    }


  


    
}
