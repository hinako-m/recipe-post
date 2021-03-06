<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Recipe;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでrecipe/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        // $recipe = Recipe::all();
        
        $recipes = Recipe::orderBy('created_at', 'asc')->paginate(10);
        return view('recipes.index', [
            'recipes' => $recipes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでrecipes/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $recipe = new Recipe;
        
        return view('recipes.create', [
            'recipe' => $recipe,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // postでrecipes/にアクセスされた場合の「新規作成処理」
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
        ]);
        
        $request->user()->recipes()->create([
            'title' => $request->title,
            'user_id' => $request->user()->id,
            'cooking_time' => $request->cooking_time,
            'cookware' => $request->cookware,
            'material' => $request->material,
            'amount' => $request->amount,
            'memo' => $request->memo
        ]);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでrecipes/idにアクセスされた場合の「取得表示処理」詳細ページ
    public function show($id)
    {
        $user = User::find($id);
        $recipe = Recipe::find($id);
        
        // if ('id' === $recipe->user_id) {
        //     return redirect('/');
        // }
        
        $data = [
            'user' =>$user,
            'recipe' => $recipe,
        ];

        // $data += $this->counts($user); 
        
        return view('recipes.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでrecipes/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $recipe=Recipe::find($id);
        if (\Auth::id() !== $recipe->user_id) {
            return redirect('/');
        }
            
        $recipe = Recipe::find($id);
        
        return view('recipes.edit', [
            'recipe' => $recipe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // putまたはpatchでrecipes/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
        ]);
        
        $recipe = Recipe::find($id);
        $recipe->user_id = $request->user()->id;
        $recipe->title = $request->title;
        $recipe->cooking_time = $request->cooking_time;
        $recipe->material = $request->material;
        $recipe->amount = $request->amount;
        $recipe->cookware = $request->cookware;
        $recipe->memo = $request->memo;
        $recipe->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    // deleteでrecipes/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $recipe = \App\Recipe::find($id);

        if (\Auth::id() === $recipe->user_id) {
            $recipe->delete();
        }
        
        return redirect('/');
    }
    
}
