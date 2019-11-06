<?php 
session_start();
 
 if(isset($_POST['korime'])){
  $korime = $_POST['korime'];
 }
 if (isset($_POST['lozinka'])) {
  $lozinka = $_POST['lozinka'];

 }
	$db=@mysqli_connect("localhost", "root", "", "studentskiservis") or die ("Neuspela konekcija na bazu!");
	mysqli_query($db, "SET NAMES UTF8");
	$upit="SELECT * FROM korisnici WHERE korime='{$korime}' AND lozinka='{$lozinka}'";
	$rez=mysqli_query($db, $upit);
	if(mysqli_num_rows($rez)==0)
	{       
        header('Location: login.html'); //Ako ni lozinka ni korime ne postoje vraca na login str
	}

	$red=mysqli_fetch_array($rez); //rezultat upita pretvara u niz

  $_SESSION['sess_user_id'] = $red['id'];
  $_SESSION['sess_user_korime'] = $red['korime'];
  $_SESSION['sess_user_lozinka'] = $red['lozinka'];
  $_SESSION['sess_user_ime'] = $red['ime'];
  $_SESSION['sess_user_prezime'] = $red['prezime'];
  $_SESSION['sess_user_status'] = $red['status'];
  $_SESSION['sess_user_email'] = $red['email'];
  $_SESSION['sess_user_brindex'] = $red['brindexa'];

  echo $_SESSION['sess_user_status'];
  session_write_close(); //zatvara sesiju

if( $_SESSION['sess_user_status'] == "Администратор"){
   header('Location: ../PocetnaStranaAdmin/PocetnaStranaAdmin.php');
}elseif($_SESSION['sess_user_status'] == "Profesor"){
 header('Location: ../PocetnaStranaProfesor/PocetnaStranaProfesor.php');
}elseif($_SESSION['sess_user_status'] == "Student"){
header('Location: ../PocetnaStranaStudent/PocetnaStudent.php');
}else{
   header('Location: http://localhost/Projekat%20PVA/LoginStranica/login.html');
  };

?>

