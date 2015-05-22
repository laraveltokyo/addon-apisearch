<?php namespace ApiSearch\Http\Controllers;

use Illuminate\Routing\Controller;

class BaseController extends Controller {

	public function __construct()
	{
		View::share('title');
		View::share('subtitle');
	}

}
