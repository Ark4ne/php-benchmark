<?php

namespace App\Http\Controllers;

/**
 * Class IndexController
 *
 * @package     App\Http\Controllers
 */
class IndexController
{
    public function welcome()
    {
        return view('welcome');
    }
}
