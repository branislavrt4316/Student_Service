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
    <title>Захтеви за уверења</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="ZahtevUverenje.css" type="text/css">
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
	   <div id="informacije1"><b>Информације:</b></div><hr><hr>
       <a href="../PocetnaStranaAdmin.php"><b>Почетна</b></a><hr>
	   <a href="../SviProfesori/SviProfesori.php"><b>Професори</b></a><hr>
           <a href="../SviStudenti/SviStudenti.php"><b>Студенти</b></a><hr>
	   <a href="../SviPredmeti/Predmeti.php"><b>Предмети</b></a><hr>
	   <a href="#"><b>Захтеви за уверења</b></a>
	   <hr>
	   <form action="../logout.php" method="post">
	   <input type="submit" value="Одјава" />
	   </form>
	   <hr>
	   </div>
          
          
          
	   <div class="box">
    <text id="txttabela">Табела свих захтева за уверење:</text>
	   <table border="1">
    
         <tr>
          
          <td> <b>Име</b> </td>
          <td> <b>Презиме</b> </td>
          <td> <b>Број индекса</b> </td>
          <td> <b>Назив уверења</b> </td>
          <td> <b>Датум</b> </td>
          <td> <b>Измена</b> </td>
         </tr>
          
           <?php
              $db=@mysqli_connect("localhost", "root", "","studentskiservis") or die ("Neuspela konekcija na bazu");
	          mysqli_query($db, "SET NAMES UTF8");
           if(isset($_POST['idzahteva']))
           {
               $id=$_POST['idzahteva'];
               $upit2="UPDATE zahtevi SET odradjeno=1 WHERE id=$id";
               $odradjeno=mysqli_query($db,$upit2);
           };
           
              $upit= "SELECT studenti.ime, studenti.prezime, studenti.brojindeksa,uverenja.naziv,zahtevi.datum,zahtevi.odradjeno, zahtevi.komentar, zahtevi.id FROM zahtevi
              inner join studenti on zahtevi.idStudenta=studenti.id
              inner join uverenja on zahtevi.iduverenja=uverenja.id WHERE odradjeno=0";
              $rez=mysqli_query($db, $upit);
              if(mysqli_num_rows($rez)==0)
	            {
		           echo "Neuspela konekcija na bazu!<br>";
		           exit();
	            } 
           
              while ($pom = mysqli_fetch_array($rez)) {
		      echo "<tr>";
              
		      echo "<td> {$pom['ime']} </td>";
		      echo "<td> {$pom['prezime']} </td>";
		      echo "<td> {$pom['brojindeksa']} </td>";
		      echo "<td> {$pom['naziv']} </td>";
              echo "<td> {$pom['datum']} </td>";
              echo "<td><form action='ZahtevUverenje.php' method='POST'><input type='hidden' value='{$pom['id']}' name='idzahteva' /><input type='submit' name='uradjeno' value='Uradjeno' /></form></td>";
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