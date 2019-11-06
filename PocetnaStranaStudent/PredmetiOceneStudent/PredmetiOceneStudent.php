<?php 
    session_start();
    $red = $_SESSION['sess_user_status'];
    $idpom= $_SESSION['sess_user_id'];
    if(!isset($_SESSION['sess_user_korime']) || $red!="Student"){
      header('Location: ../LoginStranica/login.html');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Изабрани предмети и оцене</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../PredmetiOceneStudent/PredmetiOceneStudentStyle.css">
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
	   <a href="../StatusStudent/StatusStudent.php"><b>Статус и подаци</b></a><hr>
       <a href="../UverenjeStudent/UverenjeStudent.php"><b>Захтев за студентско уверење</b></a><hr>
	   <a href="#"><b>Предмети и оцене</b></a><hr>
	  
	   <form action="../logout.php" method="post">
	   <input type="submit" value="Одјава" /> 
	   </form>
	   <hr>
	   </div>
          
       <div class="box">
           
        <text id="txttabela">
            Табела изабраних предмета и оцене из тих предмета:
        </text>
        
       <div class="tabela">
       <table border="1">
         <tr>
          
          <td> <b>Предмет</b> </td>
          <td> <b>Оцена</b> </td>
         </tr>
           <?php
              $db=@mysqli_connect("localhost", "root", "",          "studentskiservis") or die ("Neuspela konekcija na bazu");
	          mysqli_query($db, "SET NAMES UTF8");
              $upit= "SELECT studenti.ime, studenti.prezime,        predmeti.imepredmeta, ocene.ocena FROM        studenti
                     left join ocene on ocene.idStudenta=studenti.id
                     left join predmeti on ocene.idpredmeta=predmeti.id where studenti.id=$idpom";
              $rez=mysqli_query($db, $upit);
              if(mysqli_num_rows($rez)==0)
	            {
		           echo "Neuspela konekcija na bazu!<br>";
		           exit();
	            } 
              while ($pom = mysqli_fetch_array($rez)) {
		      echo "<tr>";
		      echo "<td> {$pom['imepredmeta']} </td>";
		      echo "<td> {$pom['ocena']} </td>";
		      echo "</tr>";}
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