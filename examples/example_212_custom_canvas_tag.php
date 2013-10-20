<?php

    include('../lib/full/qrlib.php');
    
    // HTML5 Canvas renderer with custom tag
    
    $jsCanvasCode = QRcode::canvas('PHP QR Code :)', 'my-target-canvas-id', QR_ECLEVEL_L, 200);
    
	// reqired JS rendering lib
    echo '<script type="text/javascript" src="../lib/js/qrcanvas.js"></script>';
	
	// Canvas and JS code output
	echo '<canvas id="my-target-canvas-id" width="300" height="250" style="background: yellow;"></canvas>';
    echo $jsCanvasCode;
    