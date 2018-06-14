<?php

$editpid = $_GET["editpid"];
$xml = simplexml_load_file('data.xml') or die("Error: Cannot create object");
$items = $xml->xpath("bistro[bis_name='$editpid']");

$item = $items[0];
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Travel Thailand</title>
    <script src="js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
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
                <li class="dropdown">
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

    <div class="col-sm-offset-2 col-sm-8 box">
        <h1 class="h1s">Edit Review</h1>
    </div>

    <form class="form-horizontal" method="POST" action="edit_data.php" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-3 control-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value='<?php echo $item->bis_name ?>' required>
                <input type="hidden" class="form-control" name="name_temp" value='<?php echo $item->bis_name ?>'>
            </div>
        </div>
        <?php 
        $tag =$item->bis_tag;
        $cafe = "ใต้";
        ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">Tag</label>
            <div class="col-sm-6">
                <select class="form-control" name="tag" required>
                    <option  value="<?php echo $tag ?>"><?php echo $tag ?></option>
                    <?php
                    if ($tag != "อีสาน"){
                        echo "<option  value='อีสาน'>อีสาน</option>";
                    }
                    if($tag != "เหนือ"){
                        echo "<option  value='เหนือ'>เหนือ</option>";
                    }
                    if($tag != "กลาง"){
                        echo "<option  value='กลาง''>กลาง</option>";
                    }
                    if($tag != $cafe){
                        echo "<option  value='".$cafe."'>ใต้</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Review</label>
            <div class="col-sm-6">
                <textarea class="form-control" rows="7" name="review"
                required><?php echo $item->bis_review ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value='<?php echo $item->bis_where ?>'
                required>
            </div>
            
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ค่าเข้าชม</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="price" value='<?php echo $item->bis_price ?>'
                required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Link</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="facebook" value='<?php echo $item->bis_link ?>'
                required>
            </div>
            
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">เลือกรูป</label>
            <input type="hidden" name="image_temp" class="form-control" value='<?php echo $item->bis_pic; ?>'>
            <div class="col-sm-4">
                <input type="file" name="image" class="form-control" value='<?php echo $item->bis_pic ?>'>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-8 col-sm-4">
                <button type="submit" class="btn btn-danger col-sm-3">Save</button>
            </div>
        </div>
    </form>

</section>
<footer class="col-xs-12">
    <img class="m2 col-xs-4" src="img/TT.png"/>
    <p class="art2 col-xs-4">รายวิชา : 322375 XML Technologies and Applications<br>
        ภาควิชา วิทยาการคอมพิวเอร์<br>สาขา เทคโนโลยีสารสนเทศและการสื่อสาร
        <br>มหาวิทยาลัยขอนแก่น</p>
    </footer>
</body>
</html>
<?php include "arrow.php" ?>