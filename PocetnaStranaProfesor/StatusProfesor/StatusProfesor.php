<?php 
    session_start();
    $red = $_SESSION['sess_user_status'];
    $idpom = $_SESSION['sess_user_id'];
    if(!isset($_SESSION['sess_user_korime']) || $red!="Profesor"){
      header('Location: ../../LoginStranica/login.html');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Статус и подаци професора</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../StatusProfesor/StatusProfesor.css" type="text/css">
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
	   <a id="abv" href="#"><b>Статус и подаци</b></a><hr>
	   <a id="gd" href="../PredmetiProfesor/PredmetiProfesor.php"><b>Предмети професора</b></a><hr>
	   <a id="ez" href="../UpisOcena/UpisProfesor.php"><b>Упис оцена</b></a><hr>
	   <form action="../logout.php" method="post">
	   <input type="submit" value="Одјава" />
	   </form>
	   <hr>
	   </div>
          
          
	   <div class="box">
           <text id="txttabela">
            Табела статус и податци професора:
           </text>
	  <table border="1">
    
        
           <?php
              $db=@mysqli_connect("localhost", "root", "","studentskiservis") or die ("Neuspela konekcija na bazu");
	          mysqli_query($db, "SET NAMES UTF8");
              $upit= "SELECT * FROM profesori WHERE profesori.id=$idpom";
              $rez=mysqli_query($db, $upit);
              if(mysqli_num_rows($rez)==0)
	            {
		           echo "Neuspela konekcija na bazu!<br>";
		           exit();
	            } 
        
           while ($pom = mysqli_fetch_array($rez)) {
               
               echo "<br><tr><th> Име: </th><th> {$pom['ime']} </th></tr>";   
		      echo "<tr><th> Презиме: </th><th> {$pom['prezime']} </th></tr>";
		      echo "<tr><th> Адреса становања: </th><th> {$pom['adresa']} </th></tr>";
		      echo "<tr><th> Место: </th><th> {$pom['mesto']} </th></tr>";
              echo "<tr><th> Поштански број: </th><th> {$pom['postanskibroj']} </th></tr>";
              echo "<tr><th> Бр. тел: </th><th> {$pom['brojTEL']} </th></tr>";
              echo "<tr><th> Бр. тел посао: </th><th> {$pom['BrTelPosao']} </th></tr>";
              echo "<tr><th> Запослен од: </th><th> {$pom['zaposlenOD']} </th></tr>";
              echo "<tr><th> Плата: </th><th> {$pom['plata']} </th></tr>";
              echo "<tr><th> Е-маил: </th><th> {$pom['email']} </th></tr>";
              echo "<tr><th> Статус: </th><th> {$pom['statusprof']} </th></tr>";
               
		     }
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