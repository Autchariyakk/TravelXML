<?php
	header('Content-Type: text/html; charset=utf-8');
	$name = stripcslashes($_POST['name']);
	$tag = stripcslashes($_POST['tag']);
	$review = stripcslashes($_POST['review']);
	$address = stripcslashes($_POST['address']);
	$price = stripcslashes($_POST['price']);
	$facebook = stripcslashes($_POST['facebook']);
	$pic = $_FILES["pic"]["name"];

	$target_dir = "image/";
	$target_file = $target_dir . basename($_FILES["pic"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["pic"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}

		// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.<br>";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["pic"]["size"] > 500000) {
	    echo "Sorry, your file is too large.<br>";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF"  ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.<br>";
	// if everything is ok, try to upload file
	} 
	else {
	    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
	        
	        $xml=new DomDocument('1.0','UTF-8');
			$xml->preserveWhiteSpace = false;
			$xml->formatOutput=true;
			$xml ->load('data.xml');

			$xml_bistros = $xml->getElementsByTagName('bistros')->item(0);


			$xml_bistro = $xml->createElement('bistro');

			$xml_name = $xml->createElement("bis_name");
			$xml_name_text = $xml->createTextNode($name);
			$xml_name->appendChild($xml_name_text);

			$xml_pic = $xml->createElement("bis_pic");
			$xml_pic_text = $xml->createTextNode($pic);
			$xml_pic->appendChild($xml_pic_text);

			$xml_tag = $xml->createElement("bis_tag");
			$xml_tag_text = $xml->createTextNode($tag);
			$xml_tag->appendChild($xml_tag_text);

			$xml_review = $xml->createElement("bis_review");
			$xml_review_text = $xml->createTextNode($review);
			$xml_review->appendChild($xml_review_text);

			$xml_address = $xml->createElement("bis_where");
			$xml_address_text = $xml->createTextNode($address);
			$xml_address->appendChild($xml_address_text);

			$xml_price = $xml->createElement("bis_price");
			$xml_price_text = $xml->createTextNode($price);
			$xml_price->appendChild($xml_price_text);

			$xml_facebook = $xml->createElement("bis_link");
			$xml_facebook_text = $xml->createTextNode($facebook);
			$xml_facebook->appendChild($xml_facebook_text);

			$xml_bistro->appendChild($xml_name);
			$xml_bistro->appendChild($xml_pic);
			$xml_bistro->appendChild($xml_tag);
			$xml_bistro->appendChild($xml_review);
			$xml_bistro->appendChild($xml_address);
			$xml_bistro->appendChild($xml_price);
			$xml_bistro->appendChild($xml_facebook);

			$xml_bistros->appendChild($xml_bistro);

					$xml->save("data.xml") or die("Error,Unable to create XML File");
					echo "<h2>บันทึกสำเร็จ</h2>";
					echo "<h2>The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.</h2>";
					echo "<a href='#' onclick='history.back();"."return false;'>กลับไป</a>";

    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}

?>
<script type="text/javascript">
	window.location="review.php";
</script>
