<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; 
    }
}
   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG_INNE/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/produkt_style.css">
    <link rel="stylesheet" href="../style/cart.css">
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
  
<script>

    
</script>


        <title>RetroGamer</title>
</head>

<body onselectstart="return false;">
    <nav>
        <ul>
        <li class="logo"> <a href="../index.html">Retro</br>Gamer</a>  </li>
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
    <div class="cart">

    <?php
        
         if(isset($_SESSION["test"]) && $_SESSION["test"] === true){
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;

    echo "
    <div class='produkt_dane'>
        <div class='produkt_dane_nazwa'>
        Nazwa
        </div>
        <div class='produkt_dane_cena'>
        Cena
        </div>
    
    </div>";

foreach ($_SESSION["shopping_cart"] as $product){
   echo" 
<div class='produkt_cart'>
    <div class = 'produkt_img'>
        <span><img src='../".$product['image']."' ><span>
    </div>     
    <div class='produkt_info'>
        <div class = 'produkt_name'>
            <p>".$product['name']."</p>
   
                <form method='post' action=''>
                <input type='hidden' name='code' value=".$product['code']." />

                </form>
                <form method='post' action=''>
                <input type='hidden' name='code' value=".$product['code']." />
                <input type='hidden' name='action' value='change' />
        </div>  
        <div class = 'price_cart'>
            <span>".$product["price"]." zł</span>
        </div>
    </div>

</div> 
";
$total_price += ($product["price"]);
}

    echo "
<div class='produkt_zamow_suma'>

    <div class='produkt_suma'>
    Całość zamówienia $total_price zł
    </div>
    <div class='produkt_suma'>
    Przewidywany czas dostawy: 8 dni
    </div>
    


</div>";
}

 else{
    echo "<div class='produkt_pusty_koszyk'>Nic nie zamowiles <br><a href='../podstrony/home.php'>KLIKNIJ</a></div>";
    }}
        else{
            echo "<div class='produkt_pusty_koszyk'>Nic nie zamowiles <br><a href='../podstrony/home.php'>KLIKNIJ</a></div>";
        }
   ?>
            <div class='produkt_zamow'>
   <a href='../podstrony/logout.php'> <div class='produkt_button'>WYLOGUJ SIĘ</div></a>
    </div>

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

            $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                    btn.addClass('show');
            } else {
                    btn.removeClass('show');
            }
                });

            btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, '300');
            });

        </script>

</body>

</html>