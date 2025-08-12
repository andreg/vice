<?php

namespace Andreg\Vice;

use Filament\Contracts\Plugin;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Panel;

class VicePlugin implements Plugin {

	public static function make(): static {
		return new static();
	}

	public function getId(): string {
		return 'vice';
	}

	public function register( Panel $panel ): void {
		$panel
			->font( 'Liter', provider: GoogleFontProvider::class )
			->viteTheme( 'vendor/andreg/vice/resources/css/theme.css' );
	}

	public function boot( Panel $panel ): void {
	}

}
