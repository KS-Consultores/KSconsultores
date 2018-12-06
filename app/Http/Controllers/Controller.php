<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    protected static $prefix = "admin";

    public function __construct(){
        Controller::$prefix = Config::get("project.prefix");

        View::share("prefix", Controller::$prefix);
    }

}
