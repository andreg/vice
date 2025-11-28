<?php

namespace Andreg\Vice;

use Andreg\Vice\Enums\NavigationPosition;
use Andreg\Vice\Support\Color;
use Filament\Contracts\Plugin;
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
			'gray'    => Color::Zinc,
			'info'    => Color::Blue,
			'primary' => Color::Blue,
			'success' => Color::Green,
			'warning' => Color::Amber,
		];

		$panel->colors( array_merge( $defaultColors, $this->config[ 'colors' ] ?? [] ) );

		if ( ! empty( $this->config[ 'navigation' ] ) && NavigationPosition::Topbar === $this->config[ 'navigation' ] ) {
			$panel->topNavigation( true );
			$panel->userMenu( position: UserMenuPosition::Topbar );
		}
		else {
			$panel->topNavigation( false );
			$panel->userMenu( position: UserMenuPosition::Sidebar );
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
