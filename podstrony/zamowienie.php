<?php
session_start();

$conn = mysqli_connect("localhost","root","","retrogamer");

if($conn->connect_error){
    
    die ('Brak połączenia '.mysqli_error());
    
}
else {
    
    echo '</br>';
}

$imie=$_POST["imie"];
$nazwisko=$_POST["nazwisko"];
$ulica=$_POST["ulica"];
$numer_domu=$_POST["numer_domu"];
$kod_pocztowy=$_POST["kod_pocztowy"];
$miejscowosc=$_POST["miejscowosc"];
$numer_telefonu=$_POST["numer_telefonu"];
$dostawa=$_POST["dostawa"];
$newsletter=$_POST["newsletter"];

$sql = "INSERT INTO zamowienie (id_zam, imie, nazwisko, ulica, numer_domu,kod_pocztowy, miejscowosc, numer_telefonu, dostawa, newsletter) VALUES (NULL, '$imie', '$nazwisko', '$ulica', '$numer_domu', '$kod_pocztowy', '$miejscowosc', '$numer_telefonu','$dostawa','$newsletter')";

                                
             
                $_SESSION["test"] = true;
    
            ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG_INNE/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/zamowienie.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>RetroGamer</title>
</head>

<body onselectstart="return false;">
    <nav>
        <ul>
            <li class="logo"> <a href="../index.html">Retro</br>Gamer</a> </li>
            <li class="burger"><span class="fa fa-bars"></span></li>
            <div class="menu">
            <li><a href="../podstrony/home.php">HOME</a></li>
                <li><a href="../podstrony/gry.php">GRY</a></li>
                <li><a href="../podstrony/konsole.php">KONSOLE</a></li>
                <li><a href="../podstrony/akcesoria.php">AKCESORIA</a></li>
                <?php
 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo "
    <li><a href='../podstrony/logowanie.php' style='text-transform: uppercase;'>".$_COOKIE["username"]."</a></li>
    ";
}else{
    echo "
    <li><a href='../podstrony/logowanie.php'>PROFIL</a></li>
    ";}
?>
            </div>
         
        </ul>
    </nav>

    <section class="main-section">

        <div class="produkty">
                <div class="wrapper">
        <?php   
if($conn->query($sql)===true){
        
    echo "<span style='text-align:center;'>Twoje zamowienie zostało złożone :)</span>    ";

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo "
        </div>
        <div class='guest'>
         <a href='profil.php'><div class='kupuje'>Sprawdź zamówienie</div></a>
        </div>
        <div class='guest'>
            <a href='home.php'><div class='kupuje'> Powrót do sklepu</div></a>
        </div>
        ";
    }else{
         echo "

         </div>
         <div class='guest' >
          <a href='profil.php' ;'><div class='kupuje'style='display:none>xd</div></a>
         </div>
         <div class='guest'>
             <a href='destroy.php'><div class='kupuje'> Powrót do sklepu</div></a>
         </div>
         ";
    }




        
    }
else {
    
    echo 'Błąd: '.$sql."</br>".$conn->error;
}
?>
        </div>

    </section>

    <footer class="stopeczka">

        <div class="links">
            <div class="about">
                <ul>
                    <li><a href="">SKŁADANIE ZAMÓWIEŃ</a></li>
                    <li><a href="">DOSTĘPNOŚĆ PRODUKTÓW</a></li>
                    <li><a href="">CZAS I KOSZT DOSTAWY</a></li>
                </ul>
            </div>
            <div class="about">
                <ul>
                    <li><a href="../podstrony/o_nas.php">O NAS</a></li>
                    <li><a href="">KONTAKT</a></li>
                    <li><a href="">INFORMACJE</a></li>
                </ul>
            </div>
            <div class="about">
                <ul>
                    <li><a href="">REGULAMIN</a></li>
                    <li><a href="">POLITYKA PRYWATNOŚCI</a></li>
                    <li><a href="">BEZPIECZEŃSTWO</a></li>
                </ul>
            </div>
        </div>

        <ul class="social">
            <i class="fa fa-facebook-f sociale"></i>
            <i class="fa fa-twitter sociale"></i>
            <i class="fa fa-instagram sociale"></i>
        </ul>
    </footer>

    <script>
        $('nav ul li.burger span').click(function () {
            $('nav ul div.menu').toggleClass("show");
            $('nav ul li.burger span').toggleClass("show");
        });

        var btn = $('#button');

        $(window).scroll(function () {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, '300');
        });

    </script>

</body>

</html>