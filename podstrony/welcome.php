
<?php
session_start();
include('db.php');
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
    <link rel="stylesheet" href="../style/produkt_style.css">
    <link rel="stylesheet" href="../style/zakup_bez_logowania.css">

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
            <div class="cart_icon">
                <?php
                if(!empty($_SESSION["shopping_cart"])) {
                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                ?>
                <div class="cart_div">
                    <a href="cart.php"><img src="../IMG_INNE/cart-icon.png" /><span class="cyferka">
                            <?php echo $cart_count; ?>
                        </span></a>
                </div>
                <?php
                }
                    ?>

            </div>
        </ul>
    </nav>

    <section class="main-section">

        <div class="produkty">

        <div class="wrapper">
    <form action="zamowienie.php" method="post">
  <div class="mb-3">
    <label for="imie" class="form-label">Imię</label>
    <input type="text" class="form-control" id="imie" name="imie" maxlength="25" required pattern="[A-Za-z]{1,10}">
  </div>
        <br>
  <div class="mb-3">
    <label for="Nazwisko" class="form-label">Nazwisko</label>
      <input type="text" class="form-control" id="nazwisko" name="nazwisko" maxlength="25" required pattern="[A-Za-z]{1,15}">
  </div>
        <br>
        <div class="mb-3">
    <label for="Ulica" class="form-label">Ulica</label>
            <input type="text" class="form-control" id="ulica" name="ulica" maxlength="25" required pattern="[A-Za-z0-9]{1,15}">
  </div>
        <br>
          <div class="mb-3">
    <label for="Ndomu" class="form-label">Numer domu</label>
              <input type="text" class="form-control" id="numerdomu" name="numer_domu" maxlength="5" required>
  </div>
        <br>
                  <div class="mb-3">
    <label for="Kpocz" class="form-label">Kod pocztowy</label>
              <input type="text" class="form-control" id="kodpocztowy" name="kod_pocztowy" maxlength="6" required pattern="^[0-9]{2}-[0-9]{3}$" title="Format xx-xxx">
  </div>
        <br>
          <div class="mb-3">
    <label for="miejscowosc" class="form-label">Miejscowość</label>
              <input type="text" class="form-control" id="miejscowosc" name="miejscowosc" maxlength="25" required pattern="[A-Za-z]{1,15}">
  </div>
        <br>
    <div class="mb-3">
    <label for="numertelefonu" class="form-label">Numer telefonu</label>
        <input type="text" class="form-control" id="ntelefonu" name="numer_telefonu" maxlength="9" minlength="9" required pattern="[0-9]{1,10}">
  </div>
        <br>
        <label for="numertelefonu" class="form-label">Wybór dostawy</label></br>
        <select class="form-select" aria-label="Default select example" name="dostawa" required>
         <option value="Paczkomaty" selected>Paczkomaty 15 zł</option>
        <option value="Kurier_DPD">Kurier DPD 30 zł</option>
        <option value="Poczta_Polska">Poczta Polska 20 zł</option>
</select>
        <br>
        <br>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter">
    <label class="form-check-label" for="newsletter">Dołącz do newslettera</label>
  </div>
        <br>
  <button type="submit" name="submit" class="btn btn-primary">Zapłać i zamów</button>
    <a href="logout.php" class="btn btn-danger">Wyloguj się</a>
</form>
            
   
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