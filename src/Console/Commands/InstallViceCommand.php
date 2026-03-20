<?php

namespace Andreg\Vice\Console\Commands;

use Illuminate\Console\Command;

class InstallViceCommand extends Command {

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'vice:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install the Vice Filament theme.';

	/**
	 * Execute the console command.
	 */
	public function handle() {
		$dirname = public_path( 'vendor/andreg/vice' );

		array_map( 'unlink', glob( $dirname . '/**/*' ) );

		$this->call( 'vendor:publish', [
			'--tag' => 'vice-assets',
		] );
	}

}
