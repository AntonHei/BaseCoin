<?php

function startImport($importIndex) {
	$curImports = [];

	$essentialImports = [
		'/BaseCoin/ressources/js/core/main.js'
	];

	$extraImports = [
		'/BaseCoin/ressources/js/core/mining.js',
		'/BaseCoin/ressources/js/core/ledging.js'
	];

	$extraExtraImports = [
		'/BaseCoin/ressources/js/core/cryptographics/sha256.js'
	];

	switch($importIndex) {
		//Light Import
		case 0:
			$curImports = $essentialImports;
			break;
		//Medium Import
		case 1:
			$curImports = array_merge($essentialImports, $extraImports);
			break;
		//Heavy Import
		case 2:
			$curImports = array_merge($essentialImports, $extraImports, $extraExtraImports);
			break;
	}

	for($i = 0; $i < sizeof($curImports); $i++) {
		echo '<script src="' . strval($curImports[$i]) . '"></script>';
	}

	return true;
}

?>