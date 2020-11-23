<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css" />
    <title>Accueil</title>
</head>

<body>
    <header>
        <nav>
            <a href='index.php'>Accueil</a>
            <?php if (isset($_SESSION['id'])) { ?>
                <a href="pages/profil.php?id=" <?php $_SESSION['id'] ?>>Profil</a>
            <?php
            } else { ?><a href="pages/inscription.php">Inscription</a><?php } ?>

            <?php if (isset($_SESSION['id'])) { ?>
                <a href="pages/deconnexion.php">Deconnexion</a>
            <?php } else { ?>
                <a href="pages/connexion.php">Connexion</a>
            <?php } ?>
        </nav>
    </header>
    <main>
        <section>
            <article class="gif-container">
                <div></div>
                <img src="http://jaipasfini.org/wp-content/uploads/2015/02/airporco.gif" alt="avion" class="avion">
            </article>
            <article class="gif-container">
                <img src="images/ghibli.png" alt="totorro" class="totoro">
                <div></div>
            </article>
        </section>
    </main>
    <footer></footer>
</body>

</html>