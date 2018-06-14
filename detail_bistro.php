<?php

$pid = $_GET["pid"];
$xml = simplexml_load_file('data.xml') or die("Error: Cannot create object");
$items = $xml->xpath("bistro[bis_name='$pid']");
$item = $items[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
    <meta charset="utf-8">
    <title>Travel Thailand</title>
    <script src="js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/detailna.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pridi:300" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Travel Thailand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">ภาค<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="esan.php">อีสาน</a></li>
                        <li><a href="north.php">เหนือ</a></li>
                        <li><a href="central.php">กลาง</a></li>
                        <li><a href="south.php">ใต้</a></li>
                       
                    </ul>
                </li>
                <li><a href="review.php">เพิ่มสถานที่</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<section>
    <div align="center">
        <h1><?php echo $item->bis_name ?></h1>
        <img class="m3" src="image/<?php echo $item->bis_pic ?>">
    </div>
    <p class="p1"><?php echo $item->bis_review ?></p>
    <br>
    <p class="p2"> ที่ตั้ง : <?php echo $item->bis_where ?></p>
    <p class="p2"> ค่าเข้าชม : <?php echo $item->bis_price ?> บาท</p>
    <p class="p2"> Facebook :
        <?php
        $x = $item->bis_link;
        if (strlen($x) < 10) {
            echo " $item->bis_link</p>";
        } else {
            echo "<a href='$item->bis_link' target='_blank'>$item->bis_link</a></p>";
        }
        ?>

    <div id="confirm" class="modal hide fade">
        <div class="modal-body">
            Are you sure?
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
            <button type="button" data-dismiss="modal" class="btn btn-info">Cancel</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-10 col-sm-2">
            <script>
                if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("GET", "data.xml", false);
                xmlhttp.send();
                xmlDoc = xmlhttp.responseXML;

                var x = xmlDoc.getElementsByTagName("bistro");

                for (i = 0; i < x.length; i++) {
                    document.write("<a class='n1' href='editreview.php?editpid=" + x[i].getElementsByTagName("bis_name")[0].firstChild.nodeValue + "' <button type='buntton' class='btn btn-warning'>Edit</button>");
                    document.write("<a class='n1' href='deletereview.php?deleteditpid=" + x[i].getElementsByTagName("bis_name")[0].firstChild.nodeValue + "' <button type='buntton' class='btn btn-warning'>Delete</button>");
            </script>
            <?php echo "<a class='n1' href='editreview.php?editpid=$pid'><button type='button' class='btn btn-warning'>Edit</button>" ?>
            <?php echo "<a class='n1' href='delete.php?id=$pid' onclick=\"return confirm('คุณต้องการลบสถานที่นี้หรือไม่?');\"><button type='button' class='btn btn-danger'>Delete</button>" ?>
        </div>
    </div>
</section>
<footer class="col-xs-12">
    <img class="m2 col-xs-4" src="img/TT.png"/>
    <p class="art2 col-xs-4">รายวิชา : 322375 XML Technologies and Applications<br>
        ภาควิชา วิทยาการคอมพิวเอร์<br>สาขา เทคโนโลยีสารสนเทศและการสื่อสาร
        <br>มหาวิทยาลัยขอนแก่น</p>
</footer>
<script type="javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
<?php include "arrow.php" ?>
 