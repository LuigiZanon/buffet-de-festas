<?php


namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Summary of MenuController
 */
class MenuController extends Controller
{
    /**
     * Summary of menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function menu()
    {
        return view('menu/menuP');
    }
}
