<!DOCTYPE html>

<html lang="fr">
    <head> <!-- Meta-donnée -->
        <meta charset='utf-8'>  <!-- Type d'encodage -->
        <meta name="viewport" content=""width=device-width, initial-scale="1.0"> <!-- Accessible sur les téléphone -->
        <meta author="Pauline DEHORS">
        <title>CyberSimulator</title> <!-- Titre de la page -->
        <link rel="stylesheet" href="styles/HeaderFooter.css">
        <link rel="stylesheet" href="styles/SimuBF.css">
        

       <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">-->
    </head>

<?php

// Validation du formulaire
if (isset($_POST['username']) &&  isset($_POST['password'])) {
        if (
            $_POST['username'] == 'admin' &&
            $_POST['password'] == 'admin'
        ) {
            $loggedUser = $_POST['username'];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['username'],
                $_POST['password']
            );
        }
}
?>

<body> <!-- Va contenir tout le contenu visible sur la page -->
        <header>
            <nav>
                <a id="logo" href="index.html"><img src="images/logo.jpg"></a>
            </nav>
        </header>
        <main>
            <div class="bg">
                <!--
                Si utilisateur/trice est non identifié(e), on affiche le formulaire
                -->
                <?php if(!isset($loggedUser)): ?>
                <div id="container">
                    <form action="home.php" method="post">
                        <!-- si message d'erreur on l'affiche -->
                        <?php if(isset($errorMessage)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errorMessage; ?>
                            </div>
                        <?php endif;?>

                        <h1>Connexion</h1>

                        <input type="text" placeholder="Nom d'utilisateur" name="username" required>
                                        
                        <input type="password" placeholder="Mot de passe" name="password" required>
                                        
                        <input type="submit" id='submit' value='LOGIN' >

                        <p>Vous n'êtes pas inscrit ? <a href="register.php">Inscrivez-vous ici</a></p>
                    </form>
                </div>
                <!-- 
                    Si utilisateur/trice bien connectée on affiche un message de succès
                -->
                <?php else: ?>
                    <div class="alert alert-success" role="alert">
                        <h1>Capture The Flag !</h1>
                        <p>Félicitation <?php echo $loggedUser; ?> vous avez terminé la simulation !</p>
                    </div>
                <?php endif; ?>
            </div>
        </main>
        <footer>
            <ul>
                <il>
                    <a href="#">contact</a>
                </il>
            </ul>
        </footer>
    </body>
</html>