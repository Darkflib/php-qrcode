<?php

    include('../lib/full/qrlib.php');
    include('config.php');
    
    // Saving SVG to file, demo with sourcecode preview
    
    $tempDir = EXAMPLE_TMP_SERVERPATH;
     
    $dataText   = 'PHP QR Code :)';
    $svgTagId   = 'id-of-svg';
    $saveToFile = '203_demo.svg';
    
    // it is saved to file but also returned from function
    $svgCode = QRcode::svg($dataText, false, $tempDir.$saveToFile);
    
    $svgCodeFromFile = file_get_contents($tempDir.$saveToFile);
    
    // taken from: http://php.net/manual/en/function.highlight-string.php by: Dobromir Velev
    function xml_highlight($s){
        $s = preg_replace("|<([^/?])(.*)\s(.*)>|isU", "[1]<[2]\\1\\2[/2] [5]\\3[/5]>[/1]", $s);
        $s = preg_replace("|</(.*)>|isU", "[1]</[2]\\1[/2]>[/1]", $s);
        $s = preg_replace("|<\?(.*)\?>|isU","[3]<?\\1?>[/3]", $s);
        $s = preg_replace("|\=\"(.*)\"|isU", "[6]=[/6][4]\"\\1\"[/4]",$s);
        $s = htmlspecialchars($s);
        $s = str_replace("\t","&nbsp;&nbsp;",$s);
        $s = str_replace(" ","&nbsp;",$s);
        $replace = array(1=>'0000FF', 2=>'0000FF', 3=>'800000', 4=>'00AA00', 5=>'FF0000', 6=>'0000FF');
        foreach($replace as $k=>$v) {
            $s = preg_replace("|\[".$k."\](.*)\[/".$k."\]|isU", "<font color=\"#".$v."\">\\1</font>", $s);
        }
        return nl2br($s);
    }

    // tag output
    echo $svgCodeFromFile;
    echo '<br/>';
    
    // we print code
    echo '<span style="font-family: monospace, Courier, Courier New;font-size: 8pt">';
    echo xml_highlight($svgCodeFromFile);
    echo '</span>';