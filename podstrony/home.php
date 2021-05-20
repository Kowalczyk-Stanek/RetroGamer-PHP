<?php
session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$details = $row['details'];
$tag = $row['tag'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
 
$cartArray = array(
 $code=>array(
 'name'=>$name,
 'details'=>$details,
 'tag'=>$tag,
 'code'=>$code,
 'price'=>$price,
 'quantity'=>1,
 'image'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Produkt dodany do koszyka</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Produkt jest już w twoim koszyku</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Produkt dodany do koszyka</div>";
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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
            <div class="cart_icon">
                <?php
                if(!empty($_SESSION["shopping_cart"])) {
                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                ?>
                <div class="cart_div">
                <a href="cart.php"><img src="../IMG_INNE/cart-icon.png" /><span class="cyferka">
                <?php echo $cart_count; ?></span></a>
                </div>
                <?php
                }
                    ?>
 
            </div>
        </ul>
    </nav>

    <section class="main-section">

<div class="produkty">


<?php
$id = 0;
$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
    $id++;
    echo  
    "
    <form method='post' action='home.php#$id' id='$id'>
        <div class='product_card'>
        <input type='hidden' name='code' value=".$row['code']." />
            <div class='product_img'>
             <img src='../".$row['image']."' >
            </div>
            <div class='product-details'>
            <span class='product-catagory'>".$row['tag']."</span>
            <h4>".$row['name']."</h4>
            <div class= 'product-description'>
              <p>".$row['details']."</p>
            </div>
          
            <div class='product-bottom-details'>
            <div class='product-price'>".$row['price']."zł</div>
            <div class='product-links'>
            <button type='submit' class='button_add'> <a href=''><i class='fa fa-shopping-cart'></i></a> </button>

            </form>
            </div>
        </div>
    </div>
</div>
        ";}


mysqli_close($con);
?>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<a id="button"></a>

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