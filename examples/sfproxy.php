<?php

    // proxy to serve SF persistent temp dir
    
    include('config.php');
    
    $fileName = $_GET['file'];
    $fileName = join('', explode('/', $fileName));
    $fileName = join('', explode('\\', $fileName));
    
    $fullFile = EXAMPLE_TMP_SERVERPATH.$fileName;
    
    if (file_exists($fullFile)) {
    
        $splitTab  = explode('.', $fullFile);
        $extension = array_pop($splitTab);
       
        switch($extension) {
            case 'png':
                header("Content-Type: image/png");
                break;
            case 'svg':
                header("Content-Type: image/svg+xml");
                break;
            case 'svgz':
                header("Content-Type: image/svg+xml");
                header("Content-Encoding: gzip");
                break;
            default:
                header("Content-Type: application/octet-stream");
                break;
        }

        header("Content-Length: " . filesize($fullFile));
        readfile($fullFile);
        
    } else {
    
        header("HTTP/1.0 404 Not Found");
        
    }