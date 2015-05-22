<?php 

Route::group(['domain' => env('APP_APISEARCH_DOMAIN'), 'prefix' => ''], function() {
	Route::get('', 'FrontPageController@index');

	Route::get('{product}/helpers/{category?}', 'HelperFunctionsController@index');
	Route::get('{product}/helpers/{category?}/names.csv', 'HelperFunctionsController@generateNames');

	Route::get('lumen5', function() {
		$scanner = new PHP_Token_Stream(base_path('vendor/laravel/lumen-framework/src/helpers.php'));

		$no = 1;
		foreach ($scanner->getFunctions() as $name => $value) {
			echo '<h3>', sprintf('%d: %s', $no, $name), '</h3>';
//		var_dump($value);
			++$no;
		}
	});
});
