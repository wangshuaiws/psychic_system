<?php
namespace App\Http\ViewComposers;
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/3/22
 * Time: 15:01
 */
use Illuminate\View\View;
use App\User;
use Auth;
class CommonComposer
{
    function __construct()
    {

    }

    public function compose(View $view)
    {
        $user = \Auth::user();
        //$scale = Auth::user()->scale()->first();
        $view->with([
            'name' => $user->name
            ]);

    }
}