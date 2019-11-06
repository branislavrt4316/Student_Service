<?php 
    session_start();
    $red = $_SESSION['sess_user_status'];
    $idpom=$_SESSION['sess_user_id'];
    if(!isset($_SESSION['sess_user_korime']) || $red!="Profesor"){
      header('Location: ../../LoginStranica/login.html');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Предмети професора</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../PredmetiProfesor/PredmetiProfesor.css" type="text/css">
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
       <a id="abc" href="../PocetnaStranaProfesor.php"><b>Почетна</b></a><hr>
	   <a id="abv" href="../StatusProfesor/StatusProfesor.php"><b>Статус и подаци</b></a><hr>
	   <a id="gd" href="#"><b>Предмети професора</b></a><hr>
	   <a id="ez" href="../UpisOcena/UpisProfesor.php"><b>Упис оцена</b></a><hr>
	   <form action="../logout.php" method="post">
	   <input type="submit" value="Одјава" />
	   </form>
	   <hr>
	   </div>
          
          
	   <div class="box">
	 
           <table border="1">
    <text id="txttabela">Табела предмета на којима је професор ангажован:</text>
         <tr>
          <td> <b>Назив предмета</b> </td>
          <td> <b>Трајање</b> </td>
          <td> <b>Сале за предавања</b> </td>
          <td> <b>Сале за вежбе</b> </td>
          <td> <b>Ангажован од</b> </td>
         </tr>
           <?php
              $db=@mysqli_connect("localhost", "root", "","studentskiservis") or die ("Neuspela konekcija na bazu");
	          mysqli_query($db, "SET NAMES UTF8");
              $upit= "SELECT profesori.ime,profesori.prezime,predmeti.imepredmeta,predmeti.trajanje,predmeti.predavanja,predmeti.vezbe, predmetprofesor.angazovanOD FROM predmetprofesor 
              inner join predmeti on predmetprofesor.idpredmeta=predmeti.id
              inner join profesori on predmetprofesor.idprofesora=profesori.id
              where idprofesora=$idpom";
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