<?php
session_start();
require_once('php/connection.php');

if (isset($_SESSION['userID'])){

    die();
}

?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bejelentkezés</title>
        <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
        <link rel="stylesheet" href="./css/style.css">
        <script src="./js/app.js" defer></script>
    </head>

    <body>
        <nav class="navbar">
           <a class="brand" href="./index.html">Receptoldal</a>

            <ul class="nav-menu">
                <li class="nav-item"><a class="nav-link" href="./index.html">Főoldal</a></li>
                <li class="nav-item"><a class="nav-link" href="./recipes.html">Receptek</a></li>
                <li class="nav-item"><a class="nav-link active" href="login.php">Bejelentkezés</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php">Regisztráció</a></li>

                <li class="nav-item"><a class="nav-link" href="profile.php">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="php/logout.php">Kijelentkezés</a></li>
            </ul>

            <div class="burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>

        <main>
            <div class="form-container">
                <form class="default-form login-form" action="php/loginValidator.php" method="POST">
                    <fieldset>
                        <legend><h1>Bejelentkezés</h1></legend>
                        <label for="username">Felhasználónév:</label>
                        <input type="text" name="username" id="username" maxlength="80" placeholder="Felhasználónév" required>

                        <label for="password">Jelszó:</label>
                        <input type="password" name="password" id="password" placeholder="Jelszó" required>

                        <div class="form-btn-container">
                            <input type="submit" name="login" value="Bejelentkezés">
                        </div>
                    </fieldset>
                </form>
            </div>
        </main>

        <footer>
            <ul>
                <li><a href="./index.html">Főoldal</a></li>
                <li><a href="./recipes.html">Receptek</a></li>
                <li><a href="login.php">Bejelentkezés</a></li>
                <li><a href="register.php">Regisztráció</a></li>

                <li><a href="profile.php">Profil</a></li>
                <li><a href="php/logout.php">Kijelentkezés</a></li>
            </ul>
            <p class="copyright">
                Copyright &copy; 2022 Receptoldal
            </p>
        </footer>

    </body>
</html>
