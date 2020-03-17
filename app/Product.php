<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
	protected $table="products";
    protected $fillable=["id_product","id_user","name","amount"];

    public function user()
    {
    	return $this->belongsTo("App\User","id_user","id_user");
    }
}
