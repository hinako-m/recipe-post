<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['title', 'cooking_time', 'cookware', 'material', 'amount', 'memo', 'user_id'];
    
    public function user()
    {
        return $this->belongsto(User::class);
    }
}
