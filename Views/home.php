<style>
  .item, img{
    width:700px;
    height:400px;
  }
</style>
<?php
  $this->_t = "Page d'accueil";
?>  
<div id="myCarousel" class="carousel slide" data-ride="carousel" align="center">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="https://globalnews.ca/wp-content/uploads/2020/04/93293068_10157871924762254_8560396985213911040_o.jpg?quality=85&strip=all" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="http://www.santeclic.com/wp-content/uploads/2016/06/a-few-helpful-doctors-ready-to-excuse-you.jpg" alt="Chicago">
    </div>
    <div class="item">
      <img src="https://i.cbc.ca/1.5170035.1560210566!/fileImage/httpImage/image.jpg_gen/derivatives/16x9_780/hospital-doctor.jpg" alt="New York">
    </div>
    <div class="item">
      <img src="https://i.cbc.ca/1.5994115.1618912421!/cpImage/httpImage/image.jpg_gen/derivatives/16x9_780/covid-que-20210418.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php
  require("./Public/nav.php");
?>
<div class="carousel">
  
</div>