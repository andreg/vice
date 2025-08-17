<?php

namespace Andreg\Vice;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class VicePluginServiceProvider extends PackageServiceProvider {

	public static string $name = 'andreg/vice';

	public function configurePackage( Package $package ): void {
		$package
			->name( static::$name )
			->hasAssets();
	}

	public function boot(): void {
		parent::boot();

		if ( $this->app->runningInConsole() ) {
			$this->publishes( [
				__DIR__ . '/../resources/dist' => public_path( 'vendor/andreg/vice' ),
			], [ 'vice-assets', 'laravel-assets' ] );
		}
	}

}
