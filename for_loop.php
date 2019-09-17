<?php
$kates = rand(1,3);
print "kaciu $kates<br />";
$sunys = rand(1,3);
print "suniu $sunys<br />";
$peles = 3;
$katasuniai = 0;
for ($i = 1; $i <= $kates; $i++) {
	print "<br/>Kačių ciklas $i <br />";
    for ($b = 1; $b <= $sunys; $b++) {
		print "šunų ciklas $b <br />";
		for ($j = 0; $j <= $peles; $j++) {
			print "sunu ciklas $j <br />";
		}
        $pavyko = rand(0, 1);
        print " randamizuota skaicius $pavyko <br/>";
       if ($pavyko) {
            $katasuniai++;
            break;
        }
    }
}
print "po $i ciklo turim $katasuniai katasuniu <br />";
$h2_text = "Dalyvavo $kates kates ir $sunys sunys";
$h3_text = "Katasuniu iseiga: $katasuniai";
?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Katasuniu iseiga</h1>
        <h2><?php print $h2_text; ?></h2>
        <h3><?php print $h3_text; ?></h3>
    </body>
</html>

