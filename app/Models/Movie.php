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
        return $this -> belongsTo(Goal::class,'movie_goals','id');
    }
    public function appeals(){
        return $this -> belongsTo(AppealPoints::class,'movie_appeals','id');
    }
    public function getTargetsTypeIdArrayAttribute() {
        return explode(',', $this->targets_type_id);
    }
    public function user(){
        return $this -> belongsTo(User::class,'creator_id','id');
    }
    public function getStoryTellingsIdArrayAttribute() {
        return explode(',', $this->storytellings_id);
    }
}
