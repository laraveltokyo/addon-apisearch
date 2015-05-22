<?php namespace ApiSearch\Providers;

use Illuminate\Filesystem\Filesystem;

class AddonServiceProvider extends \Illuminate\Support\ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot(Filesystem $files)
	{
		// resource/assetsディレクトリ
		// -> public/assets/*
		$assetFiles = [];
		{
			$prefix = addon_path(addon_name(), 'resources/assets');
			foreach ($files->allFiles($prefix) as $file) {
				$absolutePath = $file->getPathname();
				$relativePath = substr($file->getPathname(), strlen($prefix));
				$assetFiles[$absolutePath] = public_path('assets/' . $relativePath);
			}
		}
		$this->publishes($assetFiles);

		// storageディレクトリ
		// -> storage/*
		$sampleSourceFiles = [];
		{
			$prefix = addon_path(addon_name(), 'storage/');
			foreach ($files->allFiles($prefix) as $file) {
				$absolutePath = $file->getPathname();
				$relativePath = substr($file->getPathname(), strlen($prefix));
				$sampleSourceFiles[$absolutePath] = storage_path($relativePath);
			}
		}
		$this->publishes($sampleSourceFiles);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
