<?php

require_once("php/profileSelect.php");


$dataBase = new Database();
$id = $_SESSION["userID"];

$dataListTable = $dataBase->run_select_query("SELECT * FROM users WHERE userID = $id");
$userArray = array();
foreach ($dataListTable as $DLT) {
    $userData = new User($DLT["userID"],$DLT["username"],$DLT["email"],$DLT["password"],$DLT["birthdate"],$DLT["picture"]);
    $userArray[] = $userData;
}

?>


<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>firstuser</title>
        <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
        <link rel="stylesheet" href="./css/style.css">
        <script src="./js/app.js" defer></script>
    </head>

    <body>
        <nav class="navbar">
           <a class="brand" href="./index.php">Receptoldal</a>

            <ul class="nav-menu">
                <li class="nav-item"><a class="nav-link" href="./index.php">Főoldal</a></li>
                <li class="nav-item"><a class="nav-link" href="./recipes.html">Receptek</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Bejelentkezés</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php">Regisztráció</a></li>

                <li class="nav-item"><a class="nav-link active" href="profile.php">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="php/logout.php">Kijelentkezés</a></li>
            </ul>

            <div class="burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>

        <main>
            <div class="profile-container">
                <h1><?php echo $userData -> getUsername() ?> profilja</h1>
                <div class="profile-informations">


                    <form class="profile-form" action="php/profilePicture.php" method="post" enctype="multipart/form-data">


                        <div class="profile-picture-container">
                            <img class="img-rounded" height="200" src="profilepics/<?php echo $userData -> getPicture() ?>" alt="profile picture">

                            <label for="profile-picture">Feltöltés</label>
                            <input type="file" name="profile-picture" onchange="form.submit()" id="profile-picture">

                        </div>

                    </form>

                    <form class="profile-form" action="php/profileEdit.php" method="POST" autocomplete="off" enctype="multipart/form-data">


                        <label for="username">Felhasználónév:</label>
                        <input type="text" name="username" id="username" maxlength="80" value="<?php echo $userData -> getUsername() ?>" required>

                        <label for="email">E-mail cím:</label>
                        <input type="email" name="email" id="email" value="<?php echo $userData -> getEmail() ?>" required>

                        <label for="password">Aktuális jelszó:</label>
                        <input type="password" name="aPassword" id="password" placeholder="Aktuális jelszó" required>

                        <label for="password">Új jelszó: (opcionális)</label>
                        <input type="password" name="newPassword" id="password" placeholder="Új jelszó" >

                        <label for="birthday">Születési dátum:</label>
                        <input type="date" id="birthday" name="birthday" min="1900-01-01">

                        <input type="submit" name="update" value="Mentés">
                    </form>
                </div>

                <hr>

                <h2>Kedvenc receptek:</h2>
                <div class="recipe-list-container">
                    <div class="card-container">
                        <a href="./recipes/bolognai-raguval-toltott-langos.html">
                            <img src="./img/bolognai-raguval-toltott-langos.jpg" alt="bolognai-raguval-toltott-langos">
                            <h3 class="recipe-name text-center">Bolognai raguval töltött lángos</h3>
                        </a>
                    </div>

                    <div class="card-container">
                        <a href="./recipes/az-eredeti-carbonara.html">
                            <img src="./img/az-eredeti-carbonara.jpg" alt="carbonara">
                            <h3 class="recipe-name text-center">Az eredeti carbonara</h3>
                        </a>
                    </div>

                    <div class="card-container">
                        <a href="./recipes/tiramisu.html">
                            <img src="./img/tiramisu.jpg" alt="tiramisu.jpg">
                            <h3 class="recipe-name text-center">Tiramisu</h3>
                        </a>
                    </div>
                </div>

                <hr>

                <div class="own-create-container">
                    <h2 class="own-recipes">Saját receptek:</h2>
                    <h4 class="create-recipe-link"><a href="./create-recipe.html">Új recept hozzáadása</a></h4>
                </div>
                <div class="recipe-list-container">
                    <div class="card-container">
                        <a href="./recipes/homemade-duplasajtos-hamburger.html">
                            <img src="./img/homemade-duplasajtos-hamburger.jpg" alt="homemade duplasajtos hamburger">
                            <h3 class="recipe-name text-center">Homemade duplasajtos hamburger</h3>
                        </a>
                    </div>
                    <div class="card-container">
                        <a href="./recipes/grillezett-kenyerlangos.html">
                            <img src="./img/grillezett-kenyerlangos.jpg" alt="grillezett kenyerlangos">
                            <h3 class="recipe-name text-center">Grillezett kenyérlángos</h3>
                        </a>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <ul>
                <li><a href="./index.php">Főoldal</a></li>
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
