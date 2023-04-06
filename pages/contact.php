<?php
if(!empty($_POST)){
    $userFirstName = trim($_POST['firstname']);
    $userMail = trim($_POST['mail']);
    $userMsg = trim($_POST['msg']);
    $userSujet = trim($_POST['sujet']);
}
?>

<form action="" method="POST" class="w-75 m-auto">
    <fieldset>
        <legend>Vos informations</legend>
        <ul class="list-unstyled w-50">
            <li class="my-2">
                <label for="firstname">Votre nom :</label>
                <input type="texte" name="firstname" placeholder="Jean Didier">
                <?php if (empty($userFirstName)){
                    echo '<p class="badge text-bg-danger">Renseignez votre nom</p>';
                }?>
            </li>
            <li class="my-2">
                <label for="mail">Votre email (*) :</label>
                <input type="email" name="mail" placeholder="jean-didier@email.com">
                <?php
                if (!filter_var($userMail, FILTER_VALIDATE_EMAIL) || empty($userMail)) {
                    echo '<p class="badge text-bg-danger">Renseignez un mail valide</p>';
                }?>
            </li>
        </fieldset>
    <fieldset>
        <legend>Votre message</legend>
        <ul class="list-unstyled w-50">
            <li class="my-2">
                <label for="sujet">Sujet :</label>
                <input type="texte" name="sujet" placeholder="Objet de votre message">
                <?php if (empty($userSujet)){
                    echo '<p class="badge text-bg-danger">Entrez le sujet de votre message<p>';
                }?>
            </li>
            <li><textarea placeholder="Message" name="msg" class="w-100"></textarea></li>
                <?php if (empty($userMsg)){
                    echo '<p class="badge text-bg-danger">Entrez votre message</p>';
                }?>
            <li class="my-4 text-center"><button type="submit" class="btn btn-primary">Envoyer</button></li>
        </ul>
    </fieldset>
</form>