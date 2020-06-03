<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Ofiongston">
    <meta name="description" content="How to create a website by doing it yourself.">
    <meta http-equiv="refresh" content="3600">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<script>
        function showError(elemId,errorId,name) {
            let value = document.getElementById(elemId).value;
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState === 4 && this.status === 200){
                    let response = this.responseText;
                    if (response.startsWith("Invalid")){
                        document.getElementById(elemId).value = null;
                    }
                    else{
                        document.getElementById(errorId).innerText = response;
                    }
                }
                else {
                    document.getElementById(errorId).innerText = "error in connection";
                }
            };
            xhttp.open("GET","Validator.php?q1="+name+"&q2="+value,true);
            xhttp.send();
        }
    </script>-->
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="icon" href="favicon.png" type="image/x-icon">
<!--    <script src="Header.js" defer></script>-->
    <title>WEB 3</title>
</head>
<body>
<?php
    include_once "HomePage.php";
    $home = new HomePage();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $home->verifyInput();
    }
    $home->loadHomePage();
    $home->showOutput();
?>


</body>
</html>
