## Saisie de fichier avant envoi
C'est un formulaire qui permet aux élèves de remettre leur exercices, TP TD compressés au format zip en laissant un commentaire au besoin.
Les données entrées doivent être vérifiées et l'élève doit savoir si sa remise a bien été effectuée ou pas de façon sécurisée.

## Champs du formulaire
Le bouton de type submit qui envoie sur une page php de traitement du formulaire, les données en POST (datas input et fichiers pour traitement)
| Champ | Requis | Description |
| - | -| - |
| nom | oui | type texte, longueur maximale de 25 charactères
| prénom | oui | type texte, longueur maximale de 25 charactères
| commentaire | non | Caractères alphanumériques et des espaces, longueur maximale de 255 charactères
| fichier | oui | Les fichiers dont le type mime n'est pas une archive zip seront refusés. Les fichiers vides (de 0 octets) seront refusés. Les fichiers supérieurs à la valeur de la config seront refusés.  Le nom du fichier soumit doit obligatoirement être nom_prenom.zip (nom et prenom sont les valeurs des inputs), le script devra le passer en minuscule.  

## Traitement du formulaire

La page de traitement (qui ne sera jamais affichée car faisant partie du Back Office) vérifiera les datas (Caractères autorisés, Longueur maximale, Suppression des espaces indésirables, Données obligatoires.  

Elle sauvegardera le commentaire dans un fichier texte de cette façon :  
- Nom du fichier : nom_prenom_IdentifiantDeRendu_date.txt (la date sera la date au moment de l'envoi au format AAAAMMJJHHMM, l' IdentifiantDeRendu sera celui renseigné dans le fichier config.ini).  
- Sauvegardé dans le dossier DossierDeRemise renseigné dans le fichier config.ini.  
- Elle sauvegardera le fichier nom_prenom.zip au format (tout en minuscule)   nom_prenom_ IdentifiantDeRendu_date .zip dans le dossier DossierDeRemise renseigné dans le fichier config.ini.  

Si tout est ok, elle redirigera sur la page appelante qui affichera un message.  
 S'il y a une erreur, elle redirigera sur la page appelante en remettant les valeurs des noms, prénoms, commentaires et fichiers dans les différents Inputs afin d'améliorer l'expérience utilisateur