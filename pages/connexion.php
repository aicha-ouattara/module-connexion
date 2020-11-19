<?php
session_start(); //Session connexion
$bdd = mysqli_connect("localhost", "root", "root", "moduleconnexion"); // Database connexion ...

if (isset($_POST["submit"])) {

    $login = htmlspecialchars($_POST["login"]);
    $password = htmlspecialchars($_POST["password"]);

    if (!empty($_POST["login"]) AND !empty($_POST["password"])) {
        
        $sql = "SELECT * FROM utilisateurs WHERE login = '" . $login . "' AND password = '" . $password . "'"; //Request for login and password from table
        $result = mysqli_query($bdd, $sql) or die(mysqli_error($bdd));
         mysqli_num_rows($result);

        if (mysqli_num_rows($result) == 1) {
            $userinfo = mysqli_fetch_assoc($result); 

            $_SESSION["id"] = $userinfo["id"];
            $_SESSION["login"] = $userinfo["login"];
            $_SESSION["prenom"] = $userinfo["prenom"];
            $_SESSION["nom"] = $userinfo["nom"];
            $_SESSION["password"] = $userinfo["password"];

            if ($userinfo['login'] == 'admin' AND $userinfo['password'] == 'admin') // Verification if user is an admin or an user 
            { 
                header('location:admin.php');
            } 
            else 
            {
                header("Location:profil.php?id=" . $_SESSION["id"]);
            }
        } 
        else 
        {
            $erreur = "Le login ou le mot de passe est incorrect.";
        }
    } 
    else 
    {
        $erreur = " Tous les champs ne sont pas renseignés ! ";
    }
}

mysqli_close($bdd);
?>

<!-- Debut page display -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/connexion.css" />
    <title>Connexion</title>
</head>

<body>
    <header>
        <nav>
            <a href="../index.php">Accueil</a>
        </nav>
    </header>

    <main>
        <article>
            <section class="monoke-container">
                <img src="https://media.giphy.com/media/J341iqpI1Xrb4zee4O/giphy.gif" alt="monoke">
                <img src="https://media.giphy.com/media/frTMQHQUaDI3VsClZK/giphy.gif" alt="monoke">
                <img src="https://media.giphy.com/media/gEYosJxrPkiOG63we7/giphy.gif" alt="monoke">
            </section>

            <section>
                <!--Debut form -->
                <form method="post" action="">
                    <fieldset>
                        <div class="formflex">
                            <div>
                                <label for="login">Login</label>
                                <input type="text" name="login" id="login" placeholder="votre login" required>
                            </div>

                            <div>
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" placeholder="Votre mot de passe " required>
                            </div>
                            <input type="submit" name="submit" value="Connexion">
                        </div>
                    </fieldset>
                    <?php
                    if (isset($erreur)) {
                        echo $erreur;
                    }
                    ?>
                </form>
                <!--End form -->
            </section>
        </article>


        <section class="ghiblistory">
            <h1>CONNECTEZ-VOUS ET VENEZ DECOUVRIR LES DERNIERS MIYASAKI !</h1>
            <p>
                Le Studio Ghibli a été fondé en 1985 par les réalisateurs de films d'animation Isao Takahata et Hayao Miyazaki, et a
                produit vingt-deux longs métrages. La plupart des films du Studio Ghibli se sont classés numéro un au box-office au
                Japon l'année de leur sortie. SPIRITED AWAY, réalisé par Hayao Miyazaki et sorti en 2001, est le film le plus rentable
                de tous les temps au Japon, avec plus de 30 milliards de yens au box-office.
            </p>
            <article class="studio-container">
                <img src="../images/baron.jpg" alt="baron">
                <img src="../images/ghiblies.jpg" alt="baron">
                <img src="../images/kazetachinu.jpg" alt="baron">

                <img src="../images/marnie.jpg" alt="baron">
                <img src="../images/mimi.jpg" alt="baron">
                <img src="../images/mononoke.jpg" alt="baron">

                <img src="../images/red-turtle.jpg" alt="baron">
                <img src="../images/vielle.jpg" alt="baron">
            </article>
        </section>
    </main>

    <footer>
    </footer>

</body>

</html>

<!--End page display -->