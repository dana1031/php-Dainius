<?php
$array = [
	'value1',
	[
		'deep1',
		[
			'deep2'
		]
	],
	'stringas',
	'stringas2',
	[
		'stringas3',
		[
			'stringas4'
		]
	]
];
function array_return($array) {
	$string = '';
	
	foreach ($array as $value) {
		if (substr($string, -1) === '.') {
			$string = substr_replace($string, ', ', -1);
		}
		
		if (!is_array($value)) {
			$string .= "$value.";
		} else {
			$string .= array_return($value);
		}
	}
	return $string;
}
var_dump(array_return($array)); 