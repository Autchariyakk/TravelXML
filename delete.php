<?php

$nameid = $_GET["nameid"];

$xmlDom = new DOMDocument();
$xmlDom->load("data.xml");
$xpath = new DOMXPath($xmlDom);

foreach ($xpath->evaluate("//bis_name[text()='$nameid']/parent::*") as $node) {
    $node->parentNode->removeChild($node);
}

$xmlDom->save("data.xml");
$xmlDom->saveXML();

header("location: home.php");
?>
