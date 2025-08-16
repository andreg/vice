<?php

namespace Andreg\Vice;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;

class VicePlugin implements Plugin {

	public static function make(): static {
		return new static();
	}

	public function getId(): string {
		return 'vice';
	}

	public function register( Panel $panel ): void {
		$panel
			->spa()
			->colors( function () {
				return [
					'primary' => Color::Slate,
					'gray'    => Color::Slate,
				];
			} )
			->viteTheme( 'vendor/andreg/vice/resources/css/theme.css' );
	}

	public function boot( Panel $panel ): void {
	}

}
