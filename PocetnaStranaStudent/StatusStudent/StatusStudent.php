<?php 
    session_start();
    $red = $_SESSION['sess_user_status'];
    $idpom= $_SESSION['sess_user_id'];
    if(!isset($_SESSION['sess_user_korime']) || $red!="Student"){
      header('Location: http://localhost/Projekat%20PVA/LoginStranica/login.html');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Статус и подаци о студенту</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../StatusStudent/StatusStudentStyle.css" type="text/css">
	<link href="pocetna.php">
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
	   </div>
	   <div class="sidebar">
	   <div id="inform"><b>Информације о студенту:</b></div><hr><hr>
       <a href="../PocetnaStudent.php"><b>Почетна</b></a><hr>
	   <a href="#"><b>Статус и подаци</b></a><hr>
       <a href="../UverenjeStudent/UverenjeStudent.php"><b>Захтев за студентско уверење</b></a><hr>
	   <a href="../PredmetiOceneStudent/PredmetiOceneStudent.php"><b>Предмети и оцене</b></a><hr>
	   
	   <form action="../logout.php" method="post">
	   <input type="submit" value="Одјава" /><hr>
	   </form>
	   
	   </div>
          	   <div class="box">
                    <text id="txttabela">
            Табела статус и податци студента:
        </text>
          <div class="tabela">
       <table border="1">         
           <?php
              $db=@mysqli_connect("localhost", "root", "",          "studentskiservis") or die ("Neuspela konekcija na bazu");
	          mysqli_query($db, "SET NAMES UTF8");
              $upit= "SELECT * FROM `studenti` where id=$idpom ";
              $rez=mysqli_query($db, $upit);
              if(mysqli_num_rows($rez)==0)
	            {
		           echo "Neuspela konekcija na bazu!<br>";
		           exit();
	            } 
              while ($pom = mysqli_fetch_array($rez)) {
		   
		      echo "<tr><th> Име: </th><th> {$pom['ime']} </th></tr>";   
		      echo "<tr><th> Презиме: </th><th> {$pom['prezime']} </th></tr>";
		      echo "<tr><th> Број индекса: </th><th> {$pom['brojindeksa']} </th></tr>";
		      echo "<tr><th> Година уписа: </th><th> {$pom['godinaupisa']} </th></tr>";
              echo "<tr><th> Статус семестра: </th><th> {$pom['statussemestra']} </th></tr>";
              echo "<tr><th> Адреса: </th><th> {$pom['adresa']} </th></tr>";
              echo "<tr><th> Место: </th><th> {$pom['mesto']} </th></tr>";
              echo "<tr><th> Телефон: </th><th> {$pom['mobilnitelefon']} </th></tr>";
              echo "<tr><th> Е-маил: </th><th> {$pom['e-mail']} </th></tr>";
              }
           ?>
           
       </table>    
       </div>
          </div> 
          
	  </div>
	  <div class="footer">
	  <p>&copy; 2017 Висока школа електротехнике и рачунарства струковних студија, Војводе Степе 283, Београд</p>
	  </div>
   </div>
   
   
   
</body>

</html>