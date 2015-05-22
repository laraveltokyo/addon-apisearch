<?php namespace ApiSearch\Http\Controllers;

class FrontPageController extends BaseController {

	public function index()
	{
		return addon_view(addon_name(), 'root', [
		]);
	}	

}
