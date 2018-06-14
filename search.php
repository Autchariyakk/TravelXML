<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("data.xml");
$x = $xmlDoc->getElementsByTagName('bistro');
$search = $_GET['search'];
// echo $search;

if (strlen($search) > 0) {
    $restaurant_name = array();
    $restaurant_image = array();
    $restaurant_tag = array();
    for ($i = 0; $i < ($x->length); $i++) {
        $temp_name = $x->item($i)->getElementsByTagName('bis_name');
        $temp_image = $x->item($i)->getElementsByTagName('bis_pic');
        $temp_tag = $x->item($i)->getElementsByTagName('bis_tag');
        if ($temp_name->item(0)->nodeType == 1) {
            //find a link matching the search text
            if (stristr($temp_name->item(0)->childNodes->item(0)->nodeValue, $search)) {
                array_push($restaurant_name, $temp_name->item(0)->childNodes->item(0)->nodeValue);
                array_push($restaurant_image, $temp_image->item(0)->childNodes->item(0)->nodeValue);
                array_push($restaurant_tag, $temp_tag->item(0)->childNodes->item(0)->nodeValue);
            }
        }
    }
}
?>
    <!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>
    <head>
        <meta charset="utf-8">
        <title>Travel Thailand</title>
        <script src="js/jquery-1.11.3.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <link rel="stylesheet" type="text/css" href="css/search.css">
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
                    <li class="active"><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
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
                <form class="navbar-form navbar-right" role="search" medtoh="GET" action="search.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <section>
        <article class="art1">
            <div class="col-md-3">
      <a class="a1" href="esan.php"><img class="m1" src="tag/e.png"/></a>
    </div>
      <div class="col-md-3">
      <a class="a1" href="north.php"><img class="m1" src="tag/n.png"/></a>
    </div>
    <div class="col-md-3">
      <a class="a1" href="central.php"><img class="m1" src="tag/c.png"/></a>
    </div>
     <div class="col-md-3">
      <a class="a1" href="south.php"><img class="m1" src="tag/s.png"/></a>
    </div>
        </article>

        <?php
        $blist = 0;
        $blist = 0;

        for ($j = 0; $j < count($restaurant_name); $j++) {
            ?>
            <div  align="center">
            <div class='col-sm-6 col-md-4'>
                <div class='thumbnail'>
                    <img src="image/<?php echo $restaurant_image[$j]; ?>"/>
                    <div class='caption'>
                        <h4><?php echo $restaurant_name[$j]; ?></h4>
                        <p class="text-center"><?php echo $restaurant_tag[$j] ?></p>
                        <p>
                            <a href='detail_bistro.php?pid=<?php echo $restaurant_name[$j] ?>'
                               class='btn btn-primary'>
                                รายละเอียด
                            </a>
                        </p>
                    </div>
                </div>
            </div>
         </div>
            <?php
        }
        ?>


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