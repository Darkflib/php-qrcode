<?php

    include('../lib/full/qrlib.php');
    
    // HTML5 Canvas renderer
    
    $jsCanvasCode = QRcode::canvas('PHP QR Code :)');
    
	// reqired JS rendering lib
    echo '<script type="text/javascript" src="../lib/js/qrcanvas.js"></script>';
	
	// Canvas and JS code output
    echo $jsCanvasCode;
    