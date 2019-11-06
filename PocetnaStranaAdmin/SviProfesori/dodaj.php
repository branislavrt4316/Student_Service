<?php
session_start();

    $red = $_SESSION['sess_user_status'];
    if(!isset($_SESSION['sess_user_korime']) || $red!="Администратор"){
      header('Location: ../LoginStranica/login.html');
    }
              

    if(isset($_GET["ime"])){
        $ime = $_GET["ime"];
        $prezime = $_GET["prezime"];
        $adresa = $_GET["adresa"];
        $mesto = $_GET["mesto"];
        $postanskiBroj = $_GET["postanskiBroj"];
        $brMob = $_GET["brMob"];
        $brPosao = $_GET["brPosao"];
        $datum = $_GET["datum"];
        $plata = $_GET["plata"];
        $email = $_GET["email"];
        if(isset($_GET["statusProf"])){
            $statusProf = $_GET["statusProf"];
            if($statusProf == "Profesor")
            {
                $status = "Profesor";
            }else{
                $status = "Asistent";
            }
        }
        
       // echo $_GET["ime"].",".$_GET["prezime"].",".$_GET["adresa"].",".$_GET["mesto"].",".$_GET["postanskiBroj"].",".$_GET["brMob"].",".$_GET["brPosao"].",".$_GET["datum"].",".$_GET["plata"].",".$_GET["email"].",".$_GET["statusProf"];
       // exit(1);
        
        $db = @mysqli_connect("localhost", "root", "", "studentskiservis") or die ("Neuspela konekcija na bazu!");
        mysqli_query($db, "SET NAMES UTF8");
        
        if(isset($_GET['ime'])){
            $upit = "INSERT INTO `profesori`(`ime`, `prezime`, `adresa`, `mesto`, `postanskibroj`, `brojTEL`, `BrTelPosao`, `zaposlenOD`, `plata`, `email`, `statusprof`) VALUES ('$ime', '$prezime', '$adresa', '$mesto', '$postanskiBroj', '$brMob', '$brPosao', '$datum', '$plata', '$email', '$status')";
            
            $rez = mysqli_query ($db, $upit);
            if(mysqli_affected_rows ($rez)==0){
                echo "Neuspela konekcija na bazu! <br>";
                echo $upit;
                printf("Result set has %d rows.\n",mysqli_info($rez));
                exit();
            }else{
                echo "uneto u bazu!";
            }
        }
    }
                
           
?>
<!DOCTYPE html>
<html>
<head>
    <head>Додавање новог професора</head>
</head>
<body>
    
<form action="<?php $_PHP_SELF ?>" method="GET">
    <input type="text" name="ime" placeholder="Име" required/><br>
    <input type="text" name="prezime" placeholder="Презиме" required/><br>
    <input type="text" name="adresa" placeholder="Адреса становања" required/><br>
    <input type="text" name="mesto" placeholder="Место становања" required/><br>
    <input type="number" name="postanskiBroj" placeholder="Поштански број" required/><br>
    <input type="text" name="brMob" placeholder="Број мобилног телефона" required/><br>
    <input type="text" name="brPosao" placeholder="Број телефона на послу" /><br>
    <input type="date" name="datum" placeholder="Датум од када је запослен" required/><br>
    <input type="number" name="plata" placeholder="Плата" required/><br>
    <input type="email" name="email" placeholder="Емаил" required/><br>
    <input type="radio" name="statusProf" value="Profesor" checked>Професор<br>
    <input type="radio" name="statusProf" value="Asistent">Асистент<br>
    <input type="submit" value="Унеси професора">
</form>
    <br><input type="submit" name="submit" value="Одустани">
    <br>
    
</body>
</html>
