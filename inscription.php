<?php
$bdd = mysqli_connect("localhost", "root", "root", "moduleconnexion"); // Connexion database...

if(isset($_POST["submit"])) //If we press the submit button
{
    if(!empty($_POST["login"]) AND !empty($_POST["prenom"]) AND !empty($_POST["nom"]) AND !empty($_POST["password"]) AND !empty($_POST["password2"]))  //If every value are not empty
    {
        //Users variable information
        $login = htmlspecialchars($_POST["login"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $password = htmlspecialchars($_POST["password"]);
        $password2 = htmlspecialchars($_POST["password2"]);
        //Variable for the login lenght
        $loginlenght = strlen($login);

      if($loginlenght <= 255)
      {
        if($password == $password2)
        {
          $sql=" INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('" .$login. "', '" .$prenom. "', '" .$nom. "', '" .$password. "');";
  
          if (!mysqli_query($bdd, $sql))
              {
              die('impossible d’ajouter cet enregistrement : ' .  mysqli_error ($bdd));
              }
              else
              {
              mysqli_close($bdd);
              header('Location:connexion.php');
              }
  
        }
        else
        {
          $erreur = "Les mots de passe ne sont pas identique !";
        }
      }
      else
      {
        $erreur = "Votre pseudo ne doit pas depasser 255 caracteres !";
      }
    }
    else
    {
    $erreur = "Tous les champs ne sont pas remplis !";
    }
}

?>


<!-- Debut page display -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <header>
        <nav>
            <h1>Inscription</h1>
        </nav>
    </header>

    <main>
        <article>
            <section>
                <!--Debut form -->
                <form method="post" action="">
                    <label for="login">login</label>
                    <input type="text" name="login" id="login" placeholder="votre login">

                    <label for="prenom">prenom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Votre prenom">

                    <label for="nom">nom</label>
                    <input type="text" name="nom" id="nom" placeholder="Votre nom">

                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe">

                    <label for="password2">Confirmation du mot de passe</label>
                    <input type="password" name="password2" id="password2" placeholder="Confirmation">

                    <input type="submit" name="submit" value="Je m'inscris">
                </form>
                <!--End form -->
            </section>
        </article>
        <?php
        if(isset($erreur))
        {
            echo $erreur;
        }
        ?>
    </main>

    <footer>
        <p>Copyright 2020 </p>
    </footer>

</body>

</html>

<!--End page display -->
