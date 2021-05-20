<?php
require_once "config.php";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  
    if(empty(trim($_POST["username"]))){
        $username_err = "Podaj E-mail";
    } else{
    
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
         
            $param_username = trim($_POST["username"]);
         
            if(mysqli_stmt_execute($stmt)){
            
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Ten Email jest już zajęty";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Coś poszło nie tak :(";
            }

       
            mysqli_stmt_close($stmt);
        }
    }
    

    if(empty(trim($_POST["password"]))){
        $password_err = "Podaj hasło";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Hasło musi zawierać conajmniej 6 znaków";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Potwierdź hasło";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasła niezgadzają się";
        }
    }
    

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
    
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
        
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
       
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
           
            if(mysqli_stmt_execute($stmt)){
              
                header("location: login.php");
            } else{
                echo "Coś poszło nie tak :(";
            }

          
            mysqli_stmt_close($stmt);
        }
    }
    
   
    mysqli_close($link);
}
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
                    <a href="cart.php"><img src="cart-icon.png" /><span class="cyferka">
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
        <h2>Zarejestruj się</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>E-mail</label>
                <input type="email" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Hasło</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Potwierdź hasło</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Zarejestruj się">
            </div>
            <p>Masz już u nas konto? <a href="login.php">Zaloguj się tutaj</a>.</p>
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