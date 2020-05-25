<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; //追加
use App\Recipe; // 追加


// フォロー、フォロワーの表示
// お気に入りだとお気に入りレシピの表示
class UserController extends Controller
{
 public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(10);

        $data = [
            'user' => $user,
            'recipes' => $favorites,
        ];

        $data += $this->counts($user);

        return view('recipes.favorites', $data);
    }   
}
