<?php
session_start();
$bdd = mysqli_connect("localhost", "root", "root", "moduleconnexion"); // Connexion database...

if (isset($_POST["submit"]))
{
    $login = htmlspecialchars($_POST["login"]);
    $password = htmlspecialchars($_POST["password"]);

    if(!empty($_POST["login"]) AND !empty($_POST["password"]))
    {
        $sql = "SELECT * FROM utilisateurs WHERE login = '".$login."' AND password = '". $password ."'"; //request
        $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd)); 
        $userexist = mysqli_num_rows($result);

        if($userexist == 1)
        {
            $userinfo = mysqli_fetch_array($result); // If users connected, we create a variable with his session
            $_SESSION["id"] = $userinfo["id"];
            $_SESSION["login"] = $userinfo["login"];
            $_SESSION["prenom"] = $userinfo["prenom"];
            $_SESSION["nom"] = $userinfo["nom"];
            $_SESSION["password"] = $userinfo["password"];
           
           if ($userinfo ['login'] == 'admin' AND $userinfo ['password'] == 'admin') 
           {
            header('location: admin.php');      
           }
          else
           {
            header("Location: profil.php?id=".$_SESSION["id"]);
           }
        }

        else
        {
          $erreur = "Le login ou le mot de passe est incorrect.";
        }
    }
    else
    {
        $erreur =" Tous les champs ne sont pas renseignés ! ";
    }

}

mysqli_close($bdd);
?>

<!-- Debut page display -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <header>
        <nav>
            <h1>Connexion</h1>
        </nav>
    </header>

    <main>
        <article>
            <section>
                <!--Debut form -->
                <form method="post" action="">
                    <label for="login">Login</label>
                    <input type="text" name="login" id="login" placeholder="votre login" required>

                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe " required>

                    <input type="submit" name="submit" value="Connexion">
         
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