<?php

    // we use merged version of lib (single file)
    include('../lib/merged/phpqrcode.php');
    include('config.php');
    
    QRcode::png('PHP QR Code :)', EXAMPLE_TMP_SERVERPATH.'010_merged.png');
        
    // displaying
    echo '<img src="'.EXAMPLE_TMP_URLRELPATH.'010_merged.png" />';
    
    echo '<br/><br/>Notice this code may chenge every refresh - 
    because merged version of lib does not serach for best mask, 
    but instead select mask by random (to improve speed)';
    