<?php

/**
* Basic interface that represents a single view (HTML page)
*/
interface IView {

    /**
* Renders and displays the HTML.
* For example - should work like $smarty->display("some.tpl")
* @var <string> $pagaName - the name of the template to display
*/
    public function display($pageName);

    /**
* Assigns a variable to a template placeholder
* @var <string> $varName - the name of the placeholder
* @var $varValue - the value for the placeholder
*/
    public function assignTemplateVariable($varName, $varValue);

    /**
* Sets the page title between <title></title> tags
* @var <string> $title - The page title
*/
    public function setPageTitle($title);

    /**
* Sets the location of the javascript files
* @var <string> $jsFolder - the location to the javascript files
*/
    public function setJavascriptFolder($jsFolder);

    /**
* Adds the following javascript files in the HTML template
* @var <array> $js - array of file names that are located in the $jsFolder
*/
    public function addJavascriptFiles($js /* array */);

    /**
* Sets the location of the CSS files
* @var <string> $cssFolder - the location to the CSS files
*/
    public function setCSSFolder($cssFolder);

    /**
* Adds the following CSS files in the HTML template
* @var <array> $css - array of file names that are located in the $cssFolder
*/
    public function addCSSFiles($css /* array */);
}

?>