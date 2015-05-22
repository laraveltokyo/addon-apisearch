<?php namespace ApiSearch\Http\Controllers;

use PHP_Token_Stream;

class HelperFunctionsController extends BaseController {

	private $map = [
		'laravel50/helpers/foundation' => [
			'title' => 'Laravel 5.0 Helper Functions',
			'subtitle' => 'illuminate/foundation=5.0',
			'source' => 'laravel5/helpers/5.0-illuminate-foundation-helpers.php',
		],
		'laravel50/helpers/support' => [
			'title' => 'Laravel 5.0 Helper Functions',
			'subtitle' => 'illuminate/support=5.0',
			'source' => 'laravel5/helpers/5.0-illuminate-support-helpers.php',
		],
		'lumen50/helpers/framework' => [
			'title' => 'Lumen 5.0 Helper Functions',
			'subtitle' => 'laravel/lumen-framework=5.0',
			'source' => 'lumen5/helpers/5.0-lumen-framework-helpers.php',
		],
		'lumen50/helpers/support' => [
			'title' => 'Lumen 5.0 Helper Functions',
			'subtitle' => 'illuminate/support=5.0',
			'source' => 'laravel5/helpers/5.0-illuminate-support-helpers.php',
		],
		'laravel42/helpers' => [
			'title' => 'Laravel 4.2 Helper Functions',
			'subtitle' => 'illuminate/support=4.2',
			'source' => 'laravel4/helpers/4.2-illuminate-support-helpers.php',
		],
	];

	public function index($product, $category = null)
	{
		$data = array_get($this->map, Request::path());

		if ($data === null) {
			abort(404);
		}

		$sourcePath = storage_path('api-search/' . $data['source']);

		if (!file_exists($sourcePath)) {
			abort(404, sprintf('Source "%s" not found.', $data['source']));
		}

		$scanner = new PHP_Token_Stream($sourcePath);

		return addon_view(addon_name(), 'functions', [
			'title' => $data['title'],
			'subtitle' => $data['subtitle'],
			'functions' => $scanner->getFunctions(),
		]);
	}

	public function generateNames($product, $category = null)
	{
		$data = array_get($this->map, sprintf('%s/helpers/%s', $product, $category));

		if ($data === null) {
			abort(404);
		}

		$sourcePath = storage_path('api-search/' . $data['source']);

		if (!file_exists($sourcePath)) {
			abort(404, sprintf('Source "%s" not found.', $data['source']));
		}

		$filename = sprintf('%s-%s-%s-%s', $product, 'helpers', $category, 'names.csv');
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => sprintf('attachment; filename=%s', $filename),
        );

		$scanner = new PHP_Token_Stream($sourcePath);
		$content = '';
		foreach ($scanner->getFunctions() as $name => $info) {
			$content .= $name;
			$content .= PHP_EOL;
		}

        return response()->make($content, 200, $headers);
	}

}
