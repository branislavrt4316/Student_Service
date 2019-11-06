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
    <title>Сви студенти</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="SviStudenti.css" type="text/css">
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
	   </div>
	   <div class="sidebar">
	   <div id="informacije"><b>Информације:</b></div><hr><hr>
        <a href="../PocetnaStranaAdmin.php"><b>Почетна</b></a><hr>
        <a href="../SviProfesori/SviProfesori.php"><b>Професори</b></a><hr>
	    <a href="#"><b>Студенти</b></a><hr>
	   <a href="../SviPredmeti/Predmeti.php"><b>Предмети</b></a><hr>
	   <a href="../ZahteviUverenje/ZahtevUverenje.php"><b>Захтеви за уверење</b></a><hr>
	   <form action="../logout.php" method="post">
	   <input type="submit" value="Одјава" />
	   </form>
	   <hr>
	   </div>
	   
          
           <div class="box">
	   <table border="1">
    <text id="txttabela">Табела свих студената:</text>
         <tr>
          <td> <b>Број индекса</b> </td>
          <td> <b>Име</b> </td>
          <td> <b>Презиме</b> </td>
          <td> <b>Година уписа</b> </td>
             <td> <b>Статус семестра</b> </td>
             <td> <b>Адреса</b> </td>
             <td> <b>Место</b> </td>
             <td> <b>Телефон</b> </td>
             <td> <b>Е-маил</b> </td>
             
         </tr>
           <?php
              $db=@mysqli_connect("localhost", "root", "","studentskiservis") or die ("Neuspela konekcija na bazu");
	          mysqli_query($db, "SET NAMES UTF8");
              $upit= "SELECT * FROM studenti";
              $rez=mysqli_query($db, $upit);
              if(mysqli_num_rows($rez)==0)
	            {
		           echo "Neuspela konekcija na bazu!<br>";
		           exit();
	            } 
        
           while ($pom = mysqli_fetch_array($rez)) {
		      echo "<tr>";
		      echo "<td> <b>{$pom['brojindeksa']}</b> </td>";
		      echo "<td> <b>{$pom['ime']}</b> </td>";
		      echo "<td> <b>{$pom['prezime']}</b> </td>";
		      echo "<td> {$pom['godinaupisa']} </td>";
                  echo "<td> {$pom['statussemestra']} </td>";
                  echo "<td> {$pom['adresa']} </td>";
                  echo "<td> {$pom['mesto']} </td>";
                echo "<td> {$pom['mobilnitelefon']} </td>";
                echo "<td> {$pom['e-mail']} </td>";
                
		      echo "</tr>";}
           ?>
           
       </table> 
	   </div>
          
          
          
	  </div>
	  <div class="footer">
	  <p>&copy; 2017 Висока школа електротехнике и рачунарства струковних студија, Војводе Степе 283, Београд</p>
	  </div>
   </div>
   
   
   
</body>

</html>