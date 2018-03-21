<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;
    protected $table = "items";
    protected $fillable = ['item_id','user_id','name','price','stock'];
    protected $guarded = [];
}

?>