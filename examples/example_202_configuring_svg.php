<?php

    include('../lib/full/qrlib.php');
    
    // Configuring SVG
    
    $dataText   = 'PHP QR Code :)';
    $svgTagId   = 'id-of-svg';
    $saveToFile = false;
    $imageWidth = 250; // px
    
    // SVG file format support
    $svgCode = QRcode::svg($dataText, $svgTagId, $saveToFile, QR_ECLEVEL_L, $imageWidth);
    
    echo $svgCode;
    