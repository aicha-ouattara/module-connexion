<?php
session_start();

$bdd = mysqli_connect("localhost", "root", "root", "moduleconnexion"); // Connexion database...

if(isset($_SESSION["id"]))
{

    $sql = "SELECT * FROM utilisateurs WHERE id = '".$_SESSION["id"]."'";  // Recovery User session ...
    $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
    $userinfo = mysqli_fetch_array($result);
}

    $newlogin = "";
    $newprenom  = "";
    $newnom = "";
    $newpassword  = "";

if(isset($_POST) && isset($_POST["newlogin"]) && isset($_POST["newprenom"])  && isset($_POST["newnom"])  && isset($_POST["newpassword"]) && $_POST["newpassword"] != $userinfo["password"] )
{
    $newlogin = htmlspecialchars($_POST["newlogin"]);
    $newprenom = htmlspecialchars($_POST["newprenom"]);
    $newnom = htmlspecialchars($_POST["newnom"]);
    $newpassword = htmlspecialchars($_POST["newpassword"]);

    $sql = "UPDATE utilisateurs SET login = '$newlogin', prenom ='$newprenom', nom ='$newnom', password ='$newpassword'  WHERE id = '".$_SESSION["id"]."';";
    $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
}



?>

<!-- Debut page display -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <header>
        <nav>
        <h1> Bienvenue <?php echo $userinfo["login"] ?> ! </h1>
        </nav>
    </header>

    <main>
        <article>
            <section>
                <!--Debut form -->
                <form method="post" action="profil.php">
                    <label for="login">login</label>
                    <input type="text" name="newlogin" id="login" placeholder="votre login"  value="<?php echo $userinfo["login"]?>">

                    <label for="prenom">prenom</label>
                    <input type="text" name="newprenom" id="prenom" placeholder="Votre prenom"  value="<?php echo $userinfo["prenom"]?>">

                    <label for="nom">nom</label>
                    <input type="text" name="newnom" id="nom" placeholder="Votre nom"  value="<?php echo $userinfo["nom"]?>">

                    <label for="password">Mot de passe</label>
                    <input type="password" name="newpassword" id="password" placeholder="Votre mot de passe">

                    <input type="submit" name="submit" value="Modifier son profile">
                </form>
                <!--End form -->
            </section>
        </article>
    </main>
    <footer>
        <p>Copyright 2020 </p>
    </footer>

</body>

</html>

<!--End page display -->