<?php
// Initialisation variables contact
$userFirstName= null;
$userMail= null;
$userSujet= null;
$userMsg= null;

// Stockage des erreurs
$erreurs=[];

//Décomposition du POST contact
if(!empty($_POST)){
    $userFirstName = trim($_POST['firstname']);
    $userMail = trim($_POST['mail']);
    $userSujet = trim($_POST['sujet']);
    $userMsg = trim($_POST['msg']);
    // Vérification des erreurs
    if (empty($userFirstName)){
        $erreurs['firstname']=true;
    }
    if (!filter_var($userMail, FILTER_VALIDATE_EMAIL) || empty($userMail)){
        $erreurs['mail']=true;
    }
    if (empty($userSujet)){
        $erreurs['sujet']=true;
    }
    if (empty($userMsg)){
        $erreurs['msg']=true;
    }
    else{
        header('Location: ?page=contact&send=1');
    }
}
//Redirection pour le message envoyé
if(isset($_GET['send'])){
    echo '<div class="alert alert-primary d-flex align-items-center" role="alert">Message envoyé</div>';
}

?>

<form action="" method="POST" class="w-75 m-auto">
    <fieldset>
        <legend>Vos informations</legend>
        <ul class="list-unstyled w-50">
            <li class="my-2">
                <label for="firstname">Votre nom :</label>
                <input type="texte" name="firstname" placeholder="Jean Didier" value="<?php echo $userFirstName ?>">
                <?php if (!empty($erreurs['firstname'])){
                    echo '<p class="badge text-bg-danger">Renseignez votre nom</p>';
                }?>
            </li>
            <li class="my-2">
                <label for="mail">Votre email (*) :</label>
                <input type="email" name="mail" placeholder="jean-didier@email.com" value="<?php echo $userMail ?>">
                <?php
                if (!empty($erreurs['mail'])) {
                    echo '<p class="badge text-bg-danger">Renseignez un mail valide</p>';
                }?>
            </li>
        </fieldset>
    <fieldset>
        <legend>Votre message</legend>
        <ul class="list-unstyled w-50">
            <li class="my-2">
                <label for="sujet">Sujet :</label>
                <input type="texte" name="sujet" placeholder="Objet de votre message" value="<?php echo $userSujet ?>">
                <?php if (!empty($erreurs['sujet'])){
                    echo '<p class="badge text-bg-danger">Entrez le sujet de votre message<p>';
                }?>
            </li>
            <li><textarea placeholder="Message" name="msg" class="w-100"><?php echo $userMsg ?></textarea></li>
                <?php if (!empty($erreurs['msg'])){
                    echo '<p class="badge text-bg-danger">Entrez votre message</p>';
                }?>
            <li class="my-4 text-center"><button type="submit" class="btn btn-primary">Envoyer</button></li>
        </ul>
    </fieldset>
</form>