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
    <title>Упис оцена професор</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../UpisOcena/UpisProfesor.css" type="text/css">
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
	   <a id="gd" href="../PredmetiProfesor/PredmetiProfesor.php"><b>Предмети професора</b></a><hr>
	   <a id="ez" href="../UpisOcena/UpisProfesor.php"><b>Упис оцена</b></a><hr>
	   <form action="../logout.php" method="post">
	   <input type="submit" value="Одјава" />
	   </form>
	   <hr>
	   </div>
          
	   <div class="box">
           <form id="forma1" action="UpisProfesor.php" method="post">
               <p><b>Бирање предмета:</b></p>
               <select name="predmet" id="predmet">
                 <option selected>Изаберите предмет са ваше листе:</option>  
                 <?php
                $conn=new mysqli("localhost","root","","studentskiservis");
                if($conn->connect_errno)
                {
                  echo 'Neuspela konekcija!';
                }
                if($stmt=$conn->query("SELECT predmeti.id,predmeti.imepredmeta
                FROM predmetprofesor
                INNER JOIN predmeti on predmetprofesor.idpredmeta=predmeti.id
                INNER JOIN profesori on predmetprofesor.idprofesora=profesori.id
                WHERE profesori.id=$idpom"))
                {
                    while($r=$stmt->fetch_array(MYSQLI_ASSOC))
                    {
             echo" <option value='{$r['id']}'>{$r['imepredmeta']} </option>";
             }};?>
                   
               </select>
                <input type="submit" name="prikazi" value="Прикажи"><br><br>
           </form>
           <table border="1">
               <?php
              $db=@mysqli_connect("localhost", "root", "","studentskiservis") or die ("Neuspela konekcija na bazu");

               if(isset($_POST['ocena']))
           {
               $idocene=$_POST['idocene'];
               $upit2="UPDATE ocene SET ocena={$_POST['ocena']} WHERE id=$idocene";
               $odradjeno=mysqli_query($db,$upit2);
           };
               if(isset($_POST['prikazi'])) {   
	          mysqli_query($db, "SET NAMES UTF8");
                   
                
              $upit= "SELECT ocene.id, studenti.brojindeksa, studenti.ime, studenti.prezime, predmeti.imepredmeta, ocene.ocena
              FROM ocene
              INNER JOIN studenti on ocene.idStudenta=studenti.id
              INNER JOIN predmeti on ocene.idpredmeta=predmeti.id
              WHERE predmeti.id={$_POST['predmet']}";
                  
              $rez=mysqli_query($db, $upit);
              if(mysqli_num_rows($rez)==0)
	            {
		           echo "Neuspela konekcija na bazu!<br>";
		           exit();
	            } 
                   echo "<text id='txttabela'>
                   Табела упис оцена:
               </text>";
        echo "<tr>
               <td> <b>Број индекса</b> </td>
               <td> <b>Име</b> </td>
               <td> <b>Презиме</b> </td>
               <td> <b>Предмет</b> </td>
               <td> <b>Оцена</b> </td>
               <td> <b>Сачувај</b> </td>
               </tr>";
           while ($pom = mysqli_fetch_array($rez)) {
                  
               $pp=$pom['ocena'];
		      echo "<tr><form action='UpisProfesor.php' method='POST'>";
		      echo "<td> <b>{$pom['brojindeksa']}</b> </td>";
		      echo "<td> <b>{$pom['ime']}</b> </td>";
		      echo "<td> <b>{$pom['prezime']}</b> </td>";
		      echo "<td> {$pom['imepredmeta']}</td>"; 
              echo "<td> <select name='ocena' id='{$pom['id']}'><option selected value='{$pom['ocena']}'><b>";
               
                  if($pp==5){
                      echo"{$pom['ocena']}-није положио</b></option><option value='6'><b>6-положио</b></option><option value='7'><b>7-положио</b></option><option value='8'><b>8-положио</b></option><option value='9'><b>9-положио</b></option><option value='10'><b>10-положио</b></option></select> </td>";
                  }else{
                      echo "{$pom['ocena']}-положио</b></option><option value='5'><b>5-није положио</b></option><option value='6'><b>6-положио</b></option><option value='7'><b>7-положио</b></option><option value='8'><b>8-положио</b></option><option value='9'><b>9-положио</b></option><option value='10'><b>10-положио</b></option></select> </td>";
                  };
               echo "<td><input type='hidden' value='{$pom['id']}' name='idocene' /><input type='submit' name='sacuvaj' value='sacuvaj' /></td>";
		      echo "</form></tr>";}
                
              }
           ?>
               
           </table>
	   </div>
          
	  </div>
	  <div class="footer">
	  <p>&copy; 2017 Висока школа електротехнике и рачунарства струковних студија, Војводе Степе 283, Београд</p>
	  </div>
   </div>
   <td>
    </td>
   <option value=''></option>
   
</body>

</html>