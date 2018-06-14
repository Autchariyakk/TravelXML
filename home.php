<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Travel Thailand</title>
  <script src ="js/jquery-1.11.3.min.js"> </script>
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/menu.css">
  <link rel="stylesheet" type="text/css" href="css/homena.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
          <li  class="active"><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ภาค <span class="caret"></span></a>
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
  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <section>
 <article class="art3">
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


<script>
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.open("GET","data.xml",false);
xmlhttp.send();
xmlDoc=xmlhttp.responseXML;

var x=xmlDoc.getElementsByTagName("bistro");

for (i=0;i<x.length;i++){
	if (i%3==0) {
    document.write("<div align='center'>");
    document.write("<div class='row'>");
	
	  document.write("<div class='col-sm-6 col-md-4'>");
    document.write("<div class='thumbnail'>");
    document.write("<img src='image/");
    document.write(x[i].getElementsByTagName("bis_pic")[0].childNodes[0].nodeValue);
    document.write("'>");
    document.write("<div class='caption'>");
    document.write("<h4>");
    document.write(x[i].getElementsByTagName("bis_name")[0].childNodes[0].nodeValue);
    document.write("</h4>");
    document.write("<p>");
    document.write(x[i].getElementsByTagName("bis_tag")[0].childNodes[0].nodeValue);
    document.write("</p>");
    document.write("<p><a href='"+"detail_bistro.php?pid="+x[i].getElementsByTagName("bis_name")[0].firstChild.nodeValue+"' class='btn btn-primary' role='button'>รายละเอียด</a></p>");
    document.write("</div>");
    document.write("</div>");
    document.write("</div>");
	
	}else{
		
    document.write("<div class='col-sm-6 col-md-4'>");
    document.write("<div class='thumbnail'>");
    document.write("<img src='image/");
    document.write(x[i].getElementsByTagName("bis_pic")[0].childNodes[0].nodeValue);
    document.write("'>");
    document.write("<div class='caption'>");
    document.write("<h4>");
    document.write(x[i].getElementsByTagName("bis_name")[0].childNodes[0].nodeValue);
    document.write("</h4>");
    document.write("<p>");
    document.write(x[i].getElementsByTagName("bis_tag")[0].childNodes[0].nodeValue);
    document.write("</p>");
    document.write("<p><a href='"+"detail_bistro.php?pid="+x[i].getElementsByTagName("bis_name")[0].firstChild.nodeValue+"' class='btn btn-primary' role='button'>รายละเอียด</a></p>");
    document.write("</div>");
    document.write("</div>");
    document.write("</div>");
	}
	if ((i+1)%3==0) {
	 document.write("</div>");
    document.write("</div>");	
	}
    }

    document.write("</div>");
    document.write("</div>");

</script>


</section>
<footer class="col-xs-12">
    <img class="m2 col-xs-4" src="img/TT.png" />
    <p class="art2 col-xs-4">รายวิชา : 322375 XML Technologies and Applications<br>
     ภาควิชา วิทยาการคอมพิวเอร์<br>สาขา เทคโนโลยีสารสนเทศและการสื่อสาร
     <br>มหาวิทยาลัยขอนแก่น</p>
</footer>
</body>
</html>
<?php include "arrow.php" ?>


