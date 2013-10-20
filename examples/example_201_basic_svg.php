<?php

	include('../lib/full/qrlib.php');
	
	// SVG file format support
	
	$svgCode = QRcode::svg('PHP QR Code :)');
	
	echo $svgCode;
	