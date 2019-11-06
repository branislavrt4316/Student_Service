<?php 
    session_start();
    $red = $_SESSION['sess_user_status'];
    if(!isset($_SESSION['sess_user_korime']) || $red!="Profesor"){
      header('Location: ../LoginStranica/login.html');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Почетна професор</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styleP.css" type="text/css">
    <link href="../LoginStranica/pocetna.php">
</head>
<body>
   <div class="wraper">
      <div class="heading">
	  <img src="Logo.gif" id="logo">
	  <h2>Висока школа електротехнике и рачунарства струковних стуија</h2>
	  </div>
	  <div class="content">
	   <div class="text1">
	    <text><br>Важно: Ако пријављивање обављате са рачунара коме приступ има више особа, након пријављивања обавезно угасите претраживач или изаберите опцију <b>Одјави</b> се како бисте избегли могућност неовлашћене измене ваших података!</text>
           <div>
        <?php
           echo "<br>Добро дошли <b>{$_SESSION['sess_user_ime']} {$_SESSION['sess_user_prezime']}</b>. Пријављени сте као <b>{$_SESSION['sess_user_status']}.</b><br>";
           echo " Тренутни датум је: ";
           echo date("<b>d.m.Y</b> ");
        ?> 
               <p id="demo2">Тренутно време је:</p>
               <p id="demo1"></p>
            </div>
	   </div>
	   <div class="sidebar">
	   <div id="informacije"><b>Информације:</b></div><hr><hr>
	   <a id="abv" href="../PocetnaStranaProfesor/StatusProfesor/StatusProfesor.php"><b>Статус и подаци</b></a><hr>
	   <a id="gd" href="../PocetnaStranaProfesor/PredmetiProfesor/PredmetiProfesor.php"><b>Предмети професора</b></a><hr>
	   <a id="ez" href="../PocetnaStranaProfesor/UpisOcena/UpisProfesor.php"><b>Упис оцена</b></a><hr>
	   <form action="logout.php" method="post">
	   <input type="submit" value="Одјава" />
	   </form>
	   <hr>
	   </div>
          
          
	   <div class="box">
	   <text class="gltxt">Опис тага "Статус и подаци"</text><hr width="230px" align="left">
           <text class="sptxt">Овде можете видети свој статус и податке.</text><br><br>
           <text class="gltxt">Опис тага "Предмети професора"</text><hr width="265px" align="left">
           <text class="sptxt">Овде можете видети све предемте на којима сте ангажовани.</text><br><br>
           <text class="gltxt">Опис тага "Упис оцена"</text><hr width="195px" align="left">
           <text class="sptxt">Овде можете уписати оцене студентима за предмет који предајете.</text>
	   </div>
          
          
	  </div>
	  <div class="footer">
	  <p>&copy; 2017 Висока школа електротехнике и рачунарства струковних студија, Војводе Степе 283, Београд</p>
	  </div>
   </div>
   
   
   
</body>

</html>
<script>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
    var d = new Date();
    document.getElementById("demo1").innerHTML = d.toLocaleTimeString();
}
</script>