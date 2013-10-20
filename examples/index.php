<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style type="text/css">
    html, body, div { margin: 0; border: 0 none; padding: 0; }
    html, body, #wrapper, #left, #right { height: 100%; min-height: 100%; }
    #wrapper { margin: 0 auto; oveflow: hidden; width: 960px;  }
    #left { background: white; float: left; width: 260px; }
    #right { background: white; margin-left: 260px;  }
    #previewCnt { background: white; padding:1%; min-height: 300px;   }
    #codeCnt {  background:white; padding:1%; min-height: 300px; }
    .menu {  margin: 3%; background: white; border:1px solid silver; overflow:auto}
    .preview { background: white;  min-height: 300px;border:1px solid silver; }
    .codein { background: white;  min-height: 100%;border:1px solid silver; overflow:auto}
    .header { padding: 5px 8px; border-bottom: 1px solid silver; background: #0b3175; color: white; font-family: Arial, Verdana, Helvetica; font-weight: bold;}
    .subheader { padding: 2px 8px; border-bottom: 1px solid silver; background: gray; color: white; font-family: Arial, Verdana, Helvetica; font-weight: bold;font-size:8pt;}
    .headernob {border-bottom: 0 }
    .cnt { padding: 8px; }
    .item { border-top: 1px solid silver; padding: 3px; font-size: 0.8em; font-family: "Arial Narrow", Arial, Verdana;}
    .menu a { text-decoration: none; color: black; }
    .menu a:visited { text-decoration: none; color: gray; }
    .hi { background: #86c3ff;  }
    a .hi { color: black !important; }
    .filename { float: right; color: white; font-weight: normal;font-size:0.7em;}
    .filename a {color: white; text-decoration: none;}
    .filename a:visited {color: white;}
    .cntsmaller { font-size:0.7em; }
  </style>

  <title>PHP QR Code - Examples</title>
</head>
<?php

    $examples = array(
        "001"=>"PNG Output Browser",
        "002"=>"Using outputed PNG",
        "003"=>"Parametrised PNG generator...",
        "004"=>"... and how to use it",
        "005"=>"PNG saved to file",
        "006"=>"Configuring ECC level",
        "007"=>"Configuring pixel size",
        "008"=>"Configuring frame size",
        "010"=>"Using merged lib version",
        //------------------------------------
        "020"=>"Content - Phone Number",
        "021"=>"Content - SMS App",
        "022"=>"Content - Email simple",
        "023"=>"Content - Email extended",
        "024"=>"Content - Skype call",
        "025"=>"Content - Business Card, simple",
        "026"=>"Content - Business Card, detailed",
        "027"=>"Content - Business Card, photo",
        //------------------------------------
        "100"=>"--- ToDo ---",
        //------------------------------------
        "201"=>"SVG basic output",
        "202"=>"SVG confguring output",
        "203"=>"SVG save to file",
        "204"=>"Compressed SVGZ save support",
        "211"=>"CANVAS basic",
        "212"=>"CANVAS rendered on custom tag",
        //------------------------------------
        "300"=>"--- ToDo ---",
        //------------------------------------
        "701"=>"Text output",
        "702"=>"Text output - ASCII ART",
        "703"=>"Raw Code output",
        "704"=>"Raw Code debug",
        "711"=>"Custom GD2 JPEG renderer",
        "712"=>"Custom GD2 debug renderer",
        "721"=>"Vector debug - areas",
        "722"=>"Vector debug - edges",
        "723"=>"Vector debug - paths renderer",
        //------------------------------------
        "800"=>"--- ToDo ---"
    );
    
    $groups = array(
        "0"=>"Standard API Basics - Quick Start",
        "1"=>"Plugins API Basics - Quick Start",
        "2"=>"Standard API - Vector Graphics",
        "3"=>"Plugins API - Vector Graphics",
        "7"=>"Standard API - Debug &amp; Custom Dev",
        "8"=>"Plugins API - Debug &amp; Custom Dev"
    );
    
    
    $groupList = array();
    foreach($groups as $key=>$val) {
        $groupList[$key] = array();
        foreach($examples as $exampleKey=>$exampleName) {
            if (substr($exampleKey, 0, strlen($key)) == $key) {
                $groupList[$key][] = $exampleKey;
            }
        }
    }
    
    $example = (int)$_GET['example'];
    if ($example < 0)
        $example = 1;
    
    $example = substr('000'.$example, -3);

    $fileMappings = array();
    $foundFiles = glob('example_*.php');
    
    foreach($foundFiles as $foundFile) {
        $foundFileName = basename($foundFile);
        $fileNameEx = explode('_', $foundFileName);
        $fileMappings[$fileNameEx[1]] = $foundFileName;
    }
    
    if (!isset($fileMappings[$example])) {
        $example = '001';
    }
    
    $exampleFile = $fileMappings[$example];

?>
<body>
  <div id="wrapper">
    <div id="left">
        <div class="menu">
            <div class="header headernob">Examples Menu</div>
            <?php foreach($groupList as $groupKey=>$exList) { ?>
            <div class="subheader headernob"><?php echo $groups[$groupKey] ?></div>
            <?php foreach($exList as $exKey) { ?>
            <a href="index.php?example=<?php echo $exKey; ?>"><div class="item<?php echo ($exKey == $example)?' hi ':''; ?>"><b><?php echo $exKey; ?></b> <?php echo $examples[$exKey]; ?></div></a>
            <?php } ?>
            <?php } ?>
        </div>
        <br />
    </div>

    <div id="right">
        <div id="previewCnt">
            <div class="preview">
                <div class="header">Result</div>
                <iframe style="border:0; background:#e8f7ff;width:100%;height:300px" src="<?php echo $exampleFile; ?>"></iframe>
            </div>
        </div>
        <div id="codeCnt">
            <div class="codein">
                <div class="header">Sourcecode <div class="filename"><a href="<?php echo $exampleFile; ?>"><?php echo $exampleFile; ?></a></div></div>
                <div class="cnt cntsmaller" style="overflow:auto;white-space:nowrap;"><?php highlight_string(file_get_contents(dirname(__FILE__).'/'.$exampleFile)); ?></div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>