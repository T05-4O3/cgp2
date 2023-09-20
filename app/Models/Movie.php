<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type(){
        return $this -> belongsTo(ProductsType::class,'movcat_id','id');
    }
    public function goals(){
        return $this -> belongsTo(Goal::class,'goal_type','id');
    }
    public function user(){
        return $this -> belongsTo(User::class,'creator_id','id');
    }
}
