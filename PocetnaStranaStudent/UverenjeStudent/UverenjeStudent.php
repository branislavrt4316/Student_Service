<?php 
    session_start();
    $red = $_SESSION['sess_user_status'];
    if(!isset($_SESSION['sess_user_korime']) || $red!="Student"){
      header('Location: ../../LoginStranica/login.html');
    }

if(isset($_POST['send'])) {
        $vrednost = isset($_POST['uverenje']) ? $_POST['uverenje'] : "";
        $idstudenta=$_SESSION['sess_user_id'];
        $komentar="0=nije uradjeno";
        if($vrednost==$vrednost) {
            $date = date("Y-m-d H:i:s");
            $connect = mysqli_connect("localhost", "root", "", "studentskiservis") or die("Greska pri konekciji" . mysqli_connect_error());
            mysqli_query($connect, "SET NAMES UTF8");
            $sql = "INSERT INTO zahtevi(
                      idStudenta, iduverenja, odradjeno, datum, komentar
                    ) VALUES ('$idstudenta', '$vrednost', 0, '$date', '$komentar')";
            mysqli_query($connect, $sql);
            if(mysqli_affected_rows($connect) == 1){
                echo "<script>alert('Uspesno ste poslali zahtev!');</script>";
            }
            mysqli_close($connect);
        } else {
            echo "<script>alert('Greska, pokusajte ponovo!');</script>";
        }
    }

function getDataFromDb() {
    $connect = mysqli_connect("localhost", "root", "", "studentskiservis") or die("Greska pri konekciji" . mysqli_connect_error());
    mysqli_query($connect, "SET NAMES UTF8");
    $sql = "SELECT * FROM uverenja";
    $uverenje = array();
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($uverenje, $row['id'] . "~" . $row['naziv']);
        }
    }
    mysqli_close($connect);
    return $uverenje;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Захтев за уверење</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../UverenjeStudent/UverenjeStudentStyle.css" type="text/css">
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
          
          
            <div class="izbor">
           <form action="UverenjeStudent.php" method="post">
               <p><b>Бирање уверења:</b></p>
        <select name="uverenje" id="uverenje">
	
            <?php

            $data = getDataFromDb();
            foreach ($data as $uverenje) {
                $pieces = explode("~", $uverenje);
                echo "<option value='$pieces[0]'>$pieces[1]</option>";
            }

            ?>
        </select><br><br>
        <input type="submit" name="send" value="Пошаљи захтев"><br>
    </form>
                </div>
          
	   <div class="sidebar">
	   <div id="inform"><b>Информације о студенту:</b></div><hr><hr>
       <a href="../PocetnaStudent.php"><b>Почетна</b></a><hr>
	   <a href="../StatusStudent/StatusStudent.php"><b>Статус и подаци</b></a><hr>
       <a href="../UverenjeStudent/UverenjeStudent.php"><b>Захтев за студентско уверење</b></a><hr>
	   <a href="../PredmetiOceneStudent/PredmetiOceneStudent.php"><b>Предмети и оцене</b></a>
	   <hr>
	   <form action="../logout.php" method="post">
	   <input type="submit" value="Одјава" id="dugmeodjava"/>
	   </form>
	   
	   </div>
	  </div>
	  <div class="footer">
	  <p>&copy; 2017 Висока школа електротехнике и рачунарства струковних студија, Војводе Степе 283, Београд</p>
	  </div>
   </div>
   
   
   
</body>

</html>