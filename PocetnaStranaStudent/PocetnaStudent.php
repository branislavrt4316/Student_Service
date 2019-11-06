<?php 
    session_start();
    $red = $_SESSION['sess_user_status'];
    if(!isset($_SESSION['sess_user_korime']) || $red!="Student"){
      header('Location: ../LoginStranica/login.html');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Почетна студент</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styleS.css" type="text/css">
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
	    <text>Сви подаци који се користе у овим формама, преузети су из базе података Студентске службе.
        <br><br>Важно: Ако пријављивање обављате са рачунара коме приступ има више особа, након пријављивања обавезно угасите претраживач или изаберите опцију <b>Одјави</b> се како бисте избегли могућност неовлашћене измене ваших података!</text>
           <div>
           <?php
           echo " Тренутни датум је: ";
           echo date("<b>d.m.Y</b> ");
        ?> 
               <p id="demo2">Тренутно време је:</p>
               <p id="demo1"></p>
               </div>
       </div>
	   <div class="sidebar">
	   <div id="inform"><b>Информације о студенту:</b></div><hr><hr>
	   <a href="../PocetnaStranaStudent/StatusStudent/StatusStudent.php"><b>Статус и подаци</b></a><hr>
       <a href="../PocetnaStranaStudent/UverenjeStudent/UverenjeStudent.php"><b>Захтев за студентско уверење</b></a><hr>
	   <a href="../PocetnaStranaStudent/PredmetiOceneStudent/PredmetiOceneStudent.php"><b>Предмети и оцене</b></a>
	   <hr>
	   <form action="logout.php" method="post">
           <input type="submit" value="Одјава" />
	   </form>
	   <hr>
	   </div>
          
          <div class="centartext">
          <?php
           echo "<div><br>Добро дошли <b>{$_SESSION['sess_user_ime']} {$_SESSION['sess_user_prezime']}</b>. Пријављени сте као <b>{$_SESSION['sess_user_status']}.</b> Ваш број индекса је: <b>{$_SESSION['sess_user_brindex']}</b></div>";
           
              ?>
          </div>
          
          
          <div class="box">
           <text class="gltxt">Опис тага "Статус и податци"</text><hr width="240px" align="left">
           <text class="sptxt">Овде можете видети ваш статус и податке.</text><br><br>
           <text class="gltxt">Опис тага "Захтев за студентско уверење"</text><hr width="330px" align="left">
           <text class="sptxt">Овде можете послати захтев за студентско уверење.</text><br><br>
           <text class="gltxt">Опис тага "Предмети и оцене"</text><hr width="250px" align="left">
           <text class="sptxt">Овде можете видети све предемте које сте изабрали и оцене из тих предмета.</text><br><br>
           
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