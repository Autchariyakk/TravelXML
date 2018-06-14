<?php

$targetPath = "image/";
$name = $_POST['name'];
$name_tmp = $_POST['name_temp'];
$tag = $_POST['tag'];
$review = $_POST['review'];
$address = $_POST['address'];
$price = $_POST['price'];
$facebook = $_POST['facebook'];
$image = $_POST['image_temp'];
$imageFile = $_FILES['image'];
$fileName = $_FILES['image']['name'];

$uploadFile = $targetPath . basename($fileName);

move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);

$dom = new DOMDocument();
$dom->load("data.xml");
$xpath = new DOMXPath($dom);

foreach ($xpath->evaluate("//bis_name[text()='$name_tmp']/parent::*") as $node) {
    $node->parentNode->removeChild($node);
}

$dom->save("data.xml");
$dom->saveXML();

$rootNode = $dom->documentElement;
$bistroNode = $dom->createElement('bistro');
$imageNode = $dom->createElement('bis_pic');
$nameNode = $dom->createElement("bis_name");
$tagNode = $dom->createElement('bis_tag');
$reviewNode = $dom->createElement('bis_review');
$addressNode = $dom->createElement('bis_where');
$priceNode = $dom->createElement("bis_price");
$facebookNode = $dom->createElement('bis_link');

/*
 * Assign value into current tag
 */
$nameText = $dom->createTextNode($name);
$nameNode->appendChild($nameText);
$bistroNode->appendChild($nameNode);

$imageText = $dom->createTextNode($fileName);
$imageNode->appendChild($imageText);
$bistroNode->appendChild($imageNode);

$tagText = $dom->createTextNode($tag);
$tagNode->appendChild($tagText);
$bistroNode->appendChild($tagNode);

$reviewText = $dom->createTextNode($review);
$reviewNode->appendChild($reviewText);
$bistroNode->appendChild($reviewNode);

$addressText = $dom->createTextNode($address);
$addressNode->appendChild($addressText);
$bistroNode->appendChild($addressNode);

$priceText = $dom->createTextNode($price);
$priceNode->appendChild($priceText);
$bistroNode->appendChild($priceNode);

$facebookText = $dom->createTextNode($facebook);
$facebookNode->appendChild($facebookText);
$bistroNode->appendChild($facebookNode);

$rootNode->appendChild($bistroNode);
$dom->save("data.xml");
$dom->saveXML();

header("location: detail_bistro.php?pid=$name");
?>