<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $timestamps = false;
    protected $table = "users";
    protected $fillable = ['user_id','name','email','password'];
    protected $guarded = [];

    public function ItemsDetails()
    {
        return $this->hasMany('App\Item','user_id','id');
    }

}


?>
