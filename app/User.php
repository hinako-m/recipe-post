<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_favorite', 'user_id', 'recipe_id')->withTimestamps();
    }
    
     public function favorite($recipeId)
    {
         // 既にお気に入り追加しているかの確認
        $exist = $this->add_favorite($recipeId);
        
        if ($exist) {
            // 既にお気に入りに追加していたら何もしない
            return false;
        } else {
            // お気に入りに未追加であれば追加する
            $this->favorites()->attach($recipeId);
            return true;
        }
    }
    
    public function unfavorite($recipeId)
    {
        // 既にお気に入りに追加しているかの確認
        $exist = $this->add_favorite($recipeId);
    
        if ($exist) {
            // 既にお気に入りに追加していれば解除する
            $this->favorites()->detach($recipeId);
            return true;
        } else {
            // お気に入りに未追加であれば何もしない
            return false;
        }
    }
    
    public function add_favorite($recipeId)
    {
        return $this->favorites()->where('recipe_id', $recipeId)->exists();
    }
}
