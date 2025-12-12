<?php

namespace Andreg\Vice;

use Andreg\Vice\Enums\NavigationPosition;
use Andreg\Vice\Support\Color;
use Filament\Contracts\Plugin;
use Filament\Enums\GlobalSearchPosition;
use Filament\Enums\UserMenuPosition;
use Filament\FontProviders\LocalFontProvider;
use Filament\Panel;

class VicePlugin implements Plugin {

	private array $config = [];

	public function getId(): string {
		return 'vice';
	}

	public static function make( array $config = [] ): static {
		$instance = new static();
		$instance->setConfig( $config );

		return $instance;
	}

	public function setConfig( array $config ): static {
		$this->config = $config;

		return $this;
	}

	public function register( Panel $panel ): void {
		$defaultColors = [
			'danger'  => Color::Red,
			'gray'    => [
				25  => 'oklch(0.985 0.001 287.3)',
				50  => 'oklch(0.970 0.001 287.3)',
				75  => 'oklch(0.953 0.003 286.8)',
				100 => 'oklch(0.935 0.004 286.6)',
				150 => 'oklch(0.905 0.005 286.5)',
				200 => 'oklch(0.875 0.008 286.4)',
				300 => 'oklch(0.788 0.011 286.2)',
				400 => 'oklch(0.680 0.015 286.1)',
				500 => 'oklch(0.583 0.017 285.9)',
				600 => 'oklch(0.507 0.017 285.8)',
				700 => 'oklch(0.431 0.015 285.8)',
				800 => 'oklch(0.367 0.012 285.8)',
				850 => 'oklch(0.343 0.010 285.9)',
				875 => 'oklch(0.331 0.010 285.9)',
				900 => 'oklch(0.319 0.009 285.9)',
				925 => 'oklch(0.262 0.009 285.8)',
				950 => 'oklch(0.210 0.006 285.9)',
			],
			'info'    => Color::Blue,
			'primary' => Color::Blue,
			'success' => Color::Green,
			'warning' => Color::Amber,
		];

		$panel->colors( array_merge( $defaultColors, $this->config[ 'colors' ] ?? [] ) );

		if ( ! empty( $this->config[ 'navigation' ] ) && NavigationPosition::Topbar === $this->config[ 'navigation' ] ) {
			$panel->topNavigation( true );
			$panel->userMenu( position: UserMenuPosition::Topbar );

			if ( $this->config[ 'globalSearch' ] ?? false ) {
				$panel->globalSearch( position: GlobalSearchPosition::Topbar );
			}
		}
		else {
			$panel->topNavigation( false );
			$panel->userMenu( position: UserMenuPosition::Sidebar );

			if ( $this->config[ 'globalSearch' ] ?? false ) {
				$panel->globalSearch( position: GlobalSearchPosition::Sidebar );
			}
		}

		$panel->font(
			family: 'InterVariable',
			url: asset( 'vendor/andreg/vice/fonts/inter.css' ),
			provider: LocalFontProvider::class
		);

		$panel->viteTheme( 'vendor/andreg/vice/resources/css/theme.css' );
	}

	public function boot( Panel $panel ): void {}

}
