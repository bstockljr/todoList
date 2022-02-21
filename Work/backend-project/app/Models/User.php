<?php

namespace App\Models;

use App\Models\Todos;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    

    protected $fillable = [
        'name',
        
    ];

    public $timestamps = false;

    public function todos()
    {
        return $this->morphToMany(Todos::class, 'todoable');
    }



//     $post = Post::find(1);
 
// foreach ($post->tags as $tag) {
//     //
// }
}
