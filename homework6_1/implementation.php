<?php
require_once("interfaces.php");
require_once("header.php");
class myViewRocks implements iView {
    

    public function display($pageName) {
        global $smarty;
        $smarty->display($pageName);
    }
    
    public function assignTemplateVariable($varName, $varValue){
        global $smarty;
        $smarty->assign($varName, $varValue);
    }
    
    public function setPageTitle($title) {
        global $smarty;
        $smarty->assign('title', $title);
    }
    
    public function setJavascriptFolder($jsFolder) {
        global $smarty;
        $smarty->assign('jsFolder', $jsFolder);
    }
    
    public function addJavascriptFiles($arrOfJsFiles) {
        global $smarty;
        $smarty->assign('jsFiles', $arrOfJsFiles);
    }
    
    public function setCSSFolder($cssFolder) {
        global $smarty;
        $smarty->assign('cssFolder', $cssFolder);
    }
    
    public function addCSSFiles($arrOfcssFiles) {
        global $smarty;
        $smarty->assign('cssFiles', $arrOfcssFiles);
    }
}


$myCoolView = new myViewRocks();

$myCoolView->setPageTitle("This design rulz");
$myCoolView->setJavascriptFolder("javascriptFolder");
$myCoolView->setCSSFolder("styles");
$myCoolView->addJavascriptFiles(array("jquery.js", "custom.js"));
$myCoolView->addCSSFiles(array("jquery.css", "custom.css"));
$myCoolView->assignTemplateVariable("message", "Hello!");

$myCoolView->display("index.tpl");
?>
