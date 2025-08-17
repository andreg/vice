<?php

namespace Andreg\Vice;

use Filament\Contracts\Plugin;
use Filament\FontProviders\LocalFontProvider;
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
			// ->topNavigation()
			->font(
				family: 'InterVariable',
				url: secure_asset( 'vendor/andreg/vice/fonts/inter.css' ),
				provider: LocalFontProvider::class
			)
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
