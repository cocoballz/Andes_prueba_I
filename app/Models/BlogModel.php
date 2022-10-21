<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{

    protected $table = 'blogs';
    protected $guarded = ['id','created_at','updated_at'];


    public function usuario()
    {
        return $this->hasOne(User::class, 'id','id_usuario');
        
    }

    use HasFactory;
}
