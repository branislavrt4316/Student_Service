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
    <title>Сви професори</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="SviProfesori.css" type="text/css">
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
	   <a href="#"><b>Професори</b></a><hr>
       <a href="../SviStudenti/SviStudenti.php"><b>Студенти</b></a><hr>
	   <a href="../SviPredmeti/Predmeti.php"><b>Предмети</b></a><hr>
	   <a href="../ZahteviUverenje/ZahtevUverenje.php"><b>Захтеви за уверење</b></a><hr>
	   <form action="../logout.php" method="post">
	   <input type="submit" value="Одјава" id="dugmeodjava"/>
	   </form>
	   </div>
	   
          
           <div class="box">
    <text id="txttabela">Табела свих професора:</text>
	   <table border="1">
    
         <tr>
          <td> <b>Име</b> </td>
          <td> <b>Презиме</b> </td>
          <td> <b>Запослен од:</b> </td>
          <td> <b>Број телефона</b> </td>
             <td> <b>Адреса становања</b> </td>
             <td> <b>Место</b> </td>
             <td> <b>Поштански број</b> </td>
         </tr>
           <?php
              $db=@mysqli_connect("localhost", "root", "","studentskiservis") or die ("Neuspela konekcija na bazu");
	          mysqli_query($db, "SET NAMES UTF8");
              $upit= "SELECT * FROM profesori";
              $rez=mysqli_query($db, $upit);
              if(mysqli_num_rows($rez)==0)
	            {
		           echo "Neuspela konekcija na bazu!<br>";
		           exit(0);
	            } 
        
           while ($pom = mysqli_fetch_array($rez)) {
		      echo "<tr>";
		      echo "<td> <b>{$pom['ime']}</b> </td>";
		      echo "<td> <b>{$pom['prezime']}</b> </td>";
		      echo "<td> {$pom['zaposlenOD']} </td>";
		      echo "<td> {$pom['brojTEL']} </td>";
                  echo "<td> {$pom['adresa']} </td>";
                  echo "<td> {$pom['mesto']} </td>";
                  echo "<td> {$pom['postanskibroj']} </td>";
		      echo "</tr>";}
           ?>
           
       </table>

        <form action="dodaj.php" method="post">
	       <input type="submit" id="dugmeDodajProf" value="Додај професора"/>
	   </form>
               
	   </div>
          
          
          
	  </div>
	  <div class="footer">
	  <p>&copy; 2017 Висока школа електротехнике и рачунарства струковних студија, Војводе Степе 283, Београд</p>
	  </div>
   </div>
   
   
   
</body>

</html>