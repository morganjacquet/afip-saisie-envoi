<?php 
include 'parse_config.php';
include 'errors.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <form class="col-6" method="POST" action="send_file.php">
                <fieldset class="border p-2">
                    <legend  class="float-none w-auto p-2">Envoi de fichier</legend>
                    <?php
                        if (!empty($result_config['information'])) {
                    ?>
                    <fieldset class="border p-2">
                        <legend  class="float-none w-auto p-2">Informations</legend>
                        <p><?=$result_config['information']?></p>
                    </fieldset>
                    <?php
                        }
                    ?>

                    <div class="form-group">
                        <div class="col-auto row p-2">
                            <label for="input-name" class="col-3 col-form-label">Votre Nom :</label>
                            <div class="col-9">
                                <input type="text" name="lastname" class="form-control" id="input-name" value="<?= !empty($_SESSION['post_data']['lastname']) ? $_SESSION['post_data']['lastname'] : '';?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-auto row p-2">
                            <label for="input-firstname" class="col-3 col-form-label">Votre Prénom :</label>
                            <div class="col-9">
                                <input type="text" name="firstname" class="form-control" id="input-firstname" value="<?= !empty($_SESSION['post_data']['firstname']) ? $_SESSION['post_data']['firstname'] : '';?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-auto row p-2">
                            <label for="input-comment">Votre commentaire (au besoin) :</label>
                            <textarea class="form-control" name="comment" id="input-comment" rows="3"><?= !empty($_SESSION['post_data']['comment']) ? $_SESSION['post_data']['comment'] : '';?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-auto row p-2">
                            <label for="input-file" class="form-label">Vos fichier au format nom_prenom.zip :</label>
                            <input class="form-control" name="file" type="file" id="input-file"  accept="application/zip">
                        </div>
                    </div>

                    <div class="row justify-content-md-center p-2">
                        <button type="submit" class="col-6 btn btn-primary mb-3">Valider</button>
                    </div>
                </fieldset>
            </form>
            <div class="row p-5">
                <?php
                if (!empty($messages_error)) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        foreach ($messages_error as $value_message) {
                            echo "- " . $value_message . "<br>";
                        }
                    ?>
                </div>
                <?php
                } elseif (!empty($messages_success)) {
                ?>
                <div class="alert alert-success" role="alert">
                    
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
<?php
session_unset();
?>