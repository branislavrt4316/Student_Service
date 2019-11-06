<?php 
    session_start();
    $red = $_SESSION['sess_user_status'];
    if(!isset($_SESSION['sess_user_korime']) || $red!="Администратор"){
      header('Location: ../LoginStranica/login.html');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Почетна страна администратор</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styleA.css" type="text/css">
    <a href="../LoginStranica/pocetna.php"></a>
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
	   <a href="../PocetnaStranaAdmin/SviProfesori/SviProfesori.php"><b>Професори</b></a><hr>
       <a href="../PocetnaStranaAdmin/SviStudenti/SviStudenti.php"><b>Студенти</b></a><hr>
	   <a href="../PocetnaStranaAdmin/SviPredmeti/Predmeti.php"><b>Предмети</b></a><hr>
	   <a href="../PocetnaStranaAdmin/ZahteviUverenje/ZahtevUverenje.php"><b>Захтеви за уверења</b></a>
	   <hr>
	   <form action="logout.php" method="post">
	   <input type="submit" value="Одјава" />
	   </form>
	   <hr>
	   </div>
	   <div class="box">
           
           <text class="gltxt">Опис тага "Професори"</text><hr width="190px" align="left">
           <text class="sptxt">Овде можете видети све професоре и додати новог професора уколико желите.</text><br><br>
           <text class="gltxt">Опис тага "Студенти"</text><hr width="175px" align="left">
           <text class="sptxt">Овде можете видети све студенте који студирају на факултету.</text><br><br>
           <text class="gltxt">Опис тага "Предмети"</text><hr width="175px" align="left">
           <text class="sptxt">Овде можете видети све предемте који постоје на факултету.</text><br><br>
           <text class="gltxt">Опис тага "Захтеви за уверења"</text><hr width="250px" align="left">
           <text class="sptxt">Овде можете видети сва уверења која студенти затраже од администратора.</text>
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