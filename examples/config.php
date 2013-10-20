<?php

    if (isset($_SERVER['SERVER_NAME']) && ($_SERVER['SERVER_NAME'] == 'phpqrcode.sourceforge.net')) {
        // sourceforge server TEMP dir
        define('EXAMPLE_TMP_SERVERPATH', dirname(__FILE__).'/../../persistent/temp/');
        // proxy file to display files from TEMP
        define('EXAMPLE_TMP_URLRELPATH', 'sfproxy.php?file=');
    
    } else {

        define('EXAMPLE_TMP_SERVERPATH', dirname(__FILE__).'/temp/');
        define('EXAMPLE_TMP_URLRELPATH', 'temp/');
        
    }
    