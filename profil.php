<?php
session_start();

$bdd = mysqli_connect("localhost", "root", "root", "moduleconnexion"); // Connexion database...
if (isset($_SESSION["id"])) {
    if (isset($_POST['newlogin']) and !empty($_POST['newlogin'])) {
        $newlogin = htmlspecialchars($_POST["newlogin"]);

        $sql = "UPDATE utilisateurs SET login = '$newlogin' WHERE id = '" . $_SESSION["id"] . "'";
        $result = mysqli_query($bdd, $sql) or die(mysqli_error($bdd));
    }

    if (isset($_POST['newprenom']) and !empty($_POST['newprenom'])) {
        $newprenom = htmlspecialchars($_POST["newprenom"]);

        $sql = "UPDATE utilisateurs SET prenom = '$newprenom' WHERE id = '" . $_SESSION["id"] . "'";
        $result = mysqli_query($bdd, $sql) or die(mysqli_error($bdd));
    }

    if (isset($_POST['newnom']) and !empty($_POST['newnom'])) {
        $newnom = htmlspecialchars($_POST["newnom"]);

        $sql = "UPDATE utilisateurs SET nom = '$newnom' WHERE id = '" . $_SESSION["id"] . "'";
        $result = mysqli_query($bdd, $sql) or die(mysqli_error($bdd));
    }
    if (isset($_POST['newpassword']) and !empty($_POST['newpassword'])) {
        $newpassword = htmlspecialchars($_POST["newpassword"]);

        $sql = "UPDATE utilisateurs SET password = '$newpassword' WHERE id = '" . $_SESSION["id"] . "'";
        $result = mysqli_query($bdd, $sql) or die(mysqli_error($bdd));
    }

    $message = "Vous avez bien modifié votre profil !";

    $sql = "SELECT * FROM utilisateurs WHERE id = '" . $_SESSION["id"] . "'";  // Recovery User session ...
    $result = mysqli_query($bdd, $sql) or die(mysqli_error($bdd));
    $userinfo = mysqli_fetch_array($result);

    mysqli_close($bdd);
}

?>

<!-- Debut page display -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../module-connexion/css/profil.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="profil.php">Profil</a>
        </nav>
    </header>

    <main>
        <article>
            <h1> Bienvenue <?php echo $userinfo["login"] ?> ! </h1>
            <h2>Tu peux modifier ton profil ici avec les champs deja prérempli ...</h2>
            <section>
                <!--Debut form -->
                <form method="post" action="profil.php">
                    <fieldset>
                        <div class="formflex">
                            <div>
                                <label for="login">login</label>
                                <input type="text" name="newlogin" id="login" placeholder="votre login" value="<?php echo $userinfo["login"] ?>">
                            </div>
                            <div>
                                <label for="prenom">prenom</label>
                                <input type="text" name="newprenom" id="prenom" placeholder="Votre prenom" value="<?php echo $userinfo["prenom"] ?>">
                            </div>
                            <div>
                                <label for="nom">nom</label>
                                <input type="text" name="newnom" id="nom" placeholder="Votre nom" value="<?php echo $userinfo["nom"] ?>">
                            </div>
                            <div>
                                <label for="password">Mot de passe</label>
                                <input type="password" name="newpassword" id="password" placeholder="Votre mot de passe" value="<?php echo $userinfo["nom"] ?>">
                            </div>
                            <input type="submit" name="submit" value="Modifier son profile">
                        </div>
                    </fieldset>
                </form>
                <!--End form -->
            </section>
            <section class="ghiblistory">
                <h3>Le studio Ghibli aura son propre parc d’attractions dès 2022 !</h3>
                <h4>Un premier aperçu en a été dévoilé sous la forme d’illustrations inspirées.</h4>
                <p>Ceux qui ont toujours préféré l’univers poético-nippon du studio Ghibli aux romances de Disney verront
                    « bientôt » leur patience récompensée : le mythique studio d’animation japonais, parent de films tels
                    que Le voyage de Chihiro, Princesse Mononoké ou encore Le château ambulant, aura bel et bien son parc thématique,
                    , qui devrait ouvrir à l’horizon 2022 d’après la préfecture d’Aichi.
                    C’est sur le site de l’exposition internationale de 2005, à Nagakute, que se dressera la réserve d’esprits Ghibli,
                    qui n’aura manifestement rien à envier à son musée déjà existant à Tokyo, à en croire une série d’illustrations
                    divulguant les plans du parc.
                </p>
                <section class="monoke-container">
                    <img src="../module-connexion/images/ima1.jpeg" alt="monoke">
                    <img src="../module-connexion/images/ima2.jpeg" alt="monoke">
                    <img src="../module-connexion/images/ima3.jpeg" alt="monoke">
                </section>
            </section>
        </article>
    </main>
    <footer>
    </footer>

</body>

</html>

<!--End page display -->