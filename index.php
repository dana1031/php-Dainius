<?php
$natos = [
	'C',
	'D',
	'E',
	'F',
	'G',
	'A',
	'B'
];
$song = [];
$natu_suma = count($natos);
for ($i = 0; $i < 3; $i++) {
	$root = rand(0, $natu_suma - 1);
	
	for ($j = 0; $j < 3; $j++, $root += 2) {
		if ($root >= $natu_suma) {
			$note = $root - $natu_suma;
			$song[$i][$note] = $natos[$note];
		} else {
			$note = $root;
			$song[$i][$note] = $natos[$note];
		}
	}
}
var_dump($song);
?>
<html>
<head>
	<title>Song</title>
	<style>
		.key {
			height: 200px;
			width: 50px;
			border: 1px solid black;
			display: inline-block;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php foreach ($natos as $nata): ?>
			<div class="key">
				<?php print $nata; ?>
			</div>
		<?php endforeach; ?>
	</div>
</body>
</html>