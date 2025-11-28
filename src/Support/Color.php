<?php

namespace Andreg\Vice\Support;

use Filament\Support\Colors\Color as ColorsColor;

class Color extends ColorsColor {

	/**
	 * @return array<int, string>
	 */
	public static function generatePalette( string $color ): array {
		$color = static::convertToOklch( $color );

		[ ,, $hue ] = sscanf( $color, 'oklch(%f %f %f)' );

		return array_map(
			fn ( array $constants ): string => "oklch({$constants[ 0 ]} {$constants[ 1 ]} {$hue})",
			[
				50  => [ 0.97717647058824, 0.01395454545455 ],
				100 => [ 0.95035294117647, 0.03272727272727 ],
				200 => [ 0.90547058823529, 0.06318181818182 ],
				250 => [ 0.90547058823529, 0.06318181818182 ],
				300 => [ 0.84047058823529, 0.10604545454546 ],
				400 => [ 0.75352941176471, 0.15027272727273 ],
				500 => [ 0.68270588235294, 0.17009090909091 ],
				600 => [ 0.59782352941176, 0.16913636363636 ],
				700 => [ 0.51494117647059, 0.14940909090909 ],
				800 => [ 0.44611764705882, 0.12331818181818 ],
				900 => [ 0.39458823529412, 0.09963636363636 ],
				950 => [ 0.27788235294118, 0.07136363636364 ],
			],
		);
	}

}
