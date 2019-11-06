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
    <title>Сви предмети</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="Predmeti.css" type="text/css">
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
            <a href="../SviStudenti/SviStudenti.php"><b>Студенти</b></a><hr>
	   <a href="#"><b>Предмети</b></a><hr>
	   <a href="../ZahteviUverenje/ZahtevUverenje.php"><b>Захтеви за уверења</b></a><hr>
	   <form action="../logout.php" method="post">
	   <input type="submit" value="Одјава" id="dugmeodjava"/>
	   </form>
	   
	   </div>
          
	   <div class="box">
	   
           
           <table border="1">
    <text id="txttabela">Табела свих предмета:</text><br>
         <tr>
          <td> <b>Назив предмета</b> </td>
          <td> <b>Трајање</b> </td>
          <td> <b>Сале за предавања</b> </td>
          <td> <b>Сале за вежбе</b> </td>
          <td> <b>Предавач име:</b> </td>
          <td> <b>Предавач презиме:</b> </td>
          <td> <b>Ангажован од:</b> </td>
         </tr>
           <?php
              $db=@mysqli_connect("localhost", "root", "","studentskiservis") or die ("Neuspela konekcija na bazu");
	          mysqli_query($db, "SET NAMES UTF8");
              $upit= "SELECT predmeti.imepredmeta, predmeti.trajanje, predmeti.predavanja, predmeti.vezbe, profesori.ime, profesori.prezime, predmetprofesor.angazovanOD FROM predmetprofesor INNER JOIN profesori on predmetprofesor.idprofesora=profesori.id INNER JOIN predmeti on predmetprofesor.idpredmeta=predmeti.id";
              $rez=mysqli_query($db, $upit);
              if(mysqli_num_rows($rez)==0)
	            {
		           echo "Neuspela konekcija na bazu!<br>";
		           exit();
	            } 
        
           while ($pom = mysqli_fetch_array($rez)) {
		      echo "<tr>";
		      echo "<td> <b>{$pom['imepredmeta']}</b> </td>";
		      echo "<td> <b>{$pom['trajanje']}</b> </td>";
		      echo "<td> <b>{$pom['predavanja']}</b> </td>";
		      echo "<td> <b>{$pom['vezbe']}</b> </td>"; 
              echo "<td> <b>{$pom['ime']}</b> </td>"; 
              echo "<td> <b>{$pom['prezime']}</b> </td>"; 
              echo "<td> <b>{$pom['angazovanOD']}</b> </td>";
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