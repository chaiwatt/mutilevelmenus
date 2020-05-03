<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function Index()
    {
        $menus = Menu::where('parent_id', '=', 0)->get();
        return view('menu.index')->withMenus($menus);
    }
    public function Create(){
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title','id')->all();
        return view('menu.create')->withMenus($menus)->withAllMenus($allMenus);
    }
    public function CreateSave(Request $request)
    {
        $request->validate([
           'title' => 'required',
        ]);
        $input = $request->all();
        $input['parent_id'] = Empty($input['parent_id']) ? 0 : $input['parent_id'];
        Menu::create($input);
        return redirect()->back()->withSuccess('Menu added successfully.');
    }
}