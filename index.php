<?php
$anketa = [];
if (isset($_POST['submit'])) {
    $anketa['vardas'] = 'Vardas: ' . $_POST['vardas'];
    $anketa['pavarde'] = 'Pavardė: ' . $_POST['pavarde'];
    $anketa['amzius'] = 'Amžius: ' . $_POST['amzius'];
    $anketa['lygis'] = 'Lygis: ' . $_POST['lygis'];
	$anketa['tekstas'] = $_POST['vardas'] . ', kuriam yra ' . $_POST['amzius'] . ' metai, atsidūrė anketoje ir jis yra ' . lcfirst($_POST['lygis']);
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Forms</title>
	<link rel="stylesheet" href="../includes/normalize.css">
	<link rel="stylesheet" href="../includes/style.css">
</head>
<body>
	<?php if (empty($_POST)): ?>
		<div class="pildymas">
		   <h1>Užpildyk formą:</h1>
		   <form method="post">
			   <label>
				   <span>Vardas:</span>
				   <input type="text" name="vardas" placeholder="Vardas" required>
			   </label>
			   <label>
				   <span>Pavardė:</span>
				   <input type="text" name="pavarde" placeholder="Pavardė" required>
			   </label>
			   <label>
				   <span>Amžius:</span>
				   <input type="number" name="amzius" min="0" max="100" placeholder="Amžius">
			   </label>
			   <label for="lygis">
				   <span>Kaip vertini savo PHP žinias?</span>
			   </label>
			   <select name="lygis">
				   <option value="Pradedantysis" selected>Pradedantysis</option>
				   <option value="Pažengęs">Pažengęs</option>
				   <option value="Profesionalas">Profesionalas</option>
			   </select>
			   <input type="submit" name="submit" value="Pateikti">
		   </form>
		</div>

	<!--Sertifikatas-->
	<?php else: ?>
		<div class="anketa-bg">
			<img src="https://img.pngio.com/free-png-quality-control-certified-stamp-png-images-transparent-certified-stamp-png-850_655.png" width="120 px">
			<p class="pav">ANKETA</p>
			<?php foreach ($anketa as $irasas): ?>
				<p class="anketa"><?php print $irasas; ?></p>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</body>
</html> 