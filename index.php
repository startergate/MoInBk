<!DOCTYPE html>
<?php
	require("./config/config.php");
	require("./lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $result = mysqli_query($conn, "SELECT * FROM _moviedata");
?>
<html>
  <head>
    <link rel="apple-touch-icon" sizes="57x57" href="/static/img/favicon/donote/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/static/img/favicon/donote/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/static/img/favicon/donote/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/static/img/favicon/donote/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/static/img/favicon/donote/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/static/img/favicon/donote/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/static/img/favicon/donote/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/static/img/favicon/donote/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/static/img/favicon/donote/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/static/img/favicon/donote/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/static/img/favicon/donote/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/static/img/favicon/donote/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/static/img/favicon/donote/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/static/img/favicon/donote/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <title>DoMovie</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Normalize.css">
  	<link rel="stylesheet" type="text/css" href="./css/style.css?v=4">
    <link rel="stylesheet" type="text/css" href="./css/bg_style.css?v=1">
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid" id='padding-erase'>
      <div id="bgi">
        <div class="col-md-3">
          <a href="./note.php" class='middle'><img src="/static/img/common/donotevec.png" href="./note.php" alt="DoNote" class="img-rounded" id=logo alt='메인으로 가기' \></a>
        </div>
        <div class="col-md-9">
          <div class="text-right">
            <?php
              if (empty($_SESSION['uid'])) {
                echo "<a href='./user/login.php' class='btn btn-link' id='white'>로그인</a><a class='btn btn-link' href='./user/register.php' id='white'>회원가입</a>";
              } else {
                echo "<a href='./user/confirm.php' class='btn btn-link' id='white'>".$_SESSION['nickname']."님, 환영합니다.</a><a class='btn btn-link' href='./function/logout.php' id='white'>로그아웃</a>";
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<img src='/static/img/common/moinbk/".$row['resimg']."' alt='".$row['moviename']."'>";
            echo "<br />";
            echo $row['moviename'];
          }
          echo "<div id=movie>";
          echo "<a href='./new.php'><img id=movie src='/static/img/common/MoInBkADD.png' alt='Add Movie'></a>";
          echo "<br />";
          echo "<div id=text-center><a id=black href='./new.php'>영화 추가하기</a></div>";
          echo "</div>";
        ?>
    </div>
  </body>
</html>
