<html>
    <head>
    </head>
    <body>

      <?php if (isset($POST['submit'])){
        $ime = htmlentities($_POST['ime']);
        printf("%s", $ime);  
    } ?> 
      
    </body>
    </html>


