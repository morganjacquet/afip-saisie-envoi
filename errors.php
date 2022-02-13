<?php
$messages_error = array();

$input_name = array(
    'lastname' => 'Nom',
    'firstname' => 'Prénom',
    'comment' => 'Commentaire',
    'file' => 'Fichier'
);

if (!empty($_SESSION['errors'])) {
    //generation du message d'erreur pour les champs requis
    if (!empty($_SESSION['errors']['required'])) {
        foreach ($_SESSION['errors']['required'] as $value_required) {
            array_push($messages_error, 'Le champ "' . $input_name[$value_required] . '" est requis');
        }
    }

    //generation du message d'erreur pour les champs de plus de 25 charactères
    if (!empty($_SESSION['errors']['max_len_25'])) {
        foreach ($_SESSION['errors']['max_len_25'] as $value_required) {
            array_push($messages_error, 'Le champ "' . $input_name[$value_required] . '" ne doit pas faire plus de 25 charactères');
        }
    }

    //generation du message d'erreur pour les champs contenant de chiffre
    if (!empty($_SESSION['errors']['type_text'])) {
        foreach ($_SESSION['errors']['type_text'] as $value_required) {
            array_push($messages_error, 'Le champ "' . $input_name[$value_required] . '" doit contenir uniquement des lettres');
        }
    }

    //generation du message d'erreur pour les erreurs du fichier
    if (!empty($_SESSION['errors']['code_file'])) {
        switch ($_SESSION['errors']['code_file']){
            case 1: // UPLOAD_ERR_INI_SIZE
              array_push($messages_error, "Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !");
              break;
            case 2: // UPLOAD_ERR_FORM_SIZE
              array_push($messages_error, "Le fichier dépasse la limite autorisée dans le formulaire HTML !");
              break;
            case 3: // UPLOAD_ERR_PARTIAL
              array_push($messages_error, "L'envoi du fichier a été interrompu pendant le transfert !");
              break;
            case 4: // UPLOAD_ERR_NO_FILE
              array_push($messages_error, "Le fichier que vous avez envoyé a une taille nulle !");
              break;
          }
    }
}