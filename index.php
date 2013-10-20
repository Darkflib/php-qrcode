<?php    
/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010-2013 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
 
    echo '<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>PHP QR Code Demo</title>
        <script type="text/javascript" src="lib/js/qrcanvas.js"></script>
    </head>
    <body>
    <h1>PHP QR Code</h1>
    <hr/>';
    
    echo '<a href="examples/index.php">Examples and Demos</a> (<a href="">online</a>) 
    | <a href="docs/html/index.html">API Documentation</a> (<a href="">online</a>)  
    | <a href="http://sourceforge.net/projects/phpqrcode/">Online SF project</a> 
    | <a href="http://phpqrcode.sourceforge.net/">Online SF Main Site</a> 
    | <a href="http://sourceforge.net/apps/mediawiki/phpqrcode/">Online SF wiki</a>
    | <a href="http://sourceforge.net/donate/index.php?group_id=311533">Donate!</a><hr />';
    
    // setup and input processing ----------------------------------------------
    
    //set it to writable location, a place for temp generated PNG files
    $FILE_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $FILE_WEB_DIR = 'temp/';

    include "lib/full/qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($FILE_TEMP_DIR))
        mkdir($FILE_TEMP_DIR);
    

    //processing form input
    //remember to sanitize user input in real-life solution !!!
    
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);

    $textData = 'PHP QR Code :)';
    
    if (isset($_REQUEST['data']) && (trim($_REQUEST['data']) != '')) { 
        $textData = $_REQUEST['data'];
    }
        
    //config form --------------------------------------------------------------
    
    echo '<form action="index.php" method="post">
        Data:&#160;<input name="data" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):'PHP QR Code :)').'" />&#160;
        ECC:&#160;<select name="level">
            <option value="L"'.(($errorCorrectionLevel=='L')?' selected="true"':'').'>L - smallest</option>
            <option value="M"'.(($errorCorrectionLevel=='M')?' selected="true"':'').'>M</option>
            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected="true"':'').'>Q</option>
            <option value="H"'.(($errorCorrectionLevel=='H')?' selected="true"':'').'>H - best</option>
        </select>&#160;
        Size:&#160;<select name="size">';
        
    for($i=1;$i<=10;$i++)
        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected="true"':'').'>'.$i.'</option>';
        
    echo '</select>&#160;
        <input type="submit" value="GENERATE" /></form><hr/>';

    //display generated file ---------------------------------------------------
    
    $pngFilename = $FILE_TEMP_DIR.'test'.md5($textData.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
    QRcode::png($textData, $pngFilename, $errorCorrectionLevel, $matrixPointSize, 2);    
    
    echo '<img src="'.$FILE_WEB_DIR.basename($pngFilename).'" /><hr />';

    // benchmark ---------------------------------------------------------------
    
    QRtools::timeBenchmark();    
    
    // links ---------------------------------------------------------------
    
    echo '<hr />';

    echo '</body></html>';