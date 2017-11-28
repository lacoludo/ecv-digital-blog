<div class="row">
    <div class="col l6 m6 s12 offset-l3 offset-m3">
        <div class="card-panel">
            <div class="row">
            <h4 class="center-align">Inscription</h4>
            <?php
            if (isset($_POST['submit'])){
                $name = htmlspecialchars(trim($_POST['name']));
                $email = htmlspecialchars(trim($_POST['email']));
                $password = htmlspecialchars(trim($_POST['password']));

                $errors = [];

                if ( empty($name) || empty($email)){
                    $errors['empty'] = "Veuillez remplir tous les champs";
                }
                if ( empty( $password ) ) {
                    $erreur['password'] = 'Mot de passe manquant';
                }
                elseif ( strlen( $password ) < 8 ) {
                    $erreur['password'] = 'Le mot de passe doit faire au moins 8 caractères';
                }

                if ( empty( $passwordconf ) ) {
                    $erreur['passwordconf'] = 'Confirmation du mot de passe manquante';
                }
                elseif ( $passwordconf != $password ) {
                    $erreur['passwordconf'] = 'Confirmation du mot de passe différente';
                }

                if(email_taken($email)){
                    $errors['taken'] = "l'adresse email est déja prise";
                }
                if(!empty($_FILES['image']['name'])){
                    $file = $_FILES['image']['name'];
                    $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
                    $extension = strrchr($file, '.');

                    if (!in_array($extension,$extensions)){
                        $errors['image'] = "Cette image n'est pas valable";
                    }
                }

                if (!empty($errors)){
                    ?>
                    <div class="card red">
                        <div class="card-content white-text">
                            <?php

                            foreach ($errors as $error){
                                echo $error."<br/>";
                            }

                            ?>
                        </div>
                    </div>
                    <?php
                }else{
                    new_member($name,$email,$password);
                    ?>
                    <div class="card green">
                        <div class="card-content white-text">
                            <?php
                                $validation = 'Inscription réussie !';
                                echo $validation;
                            ?>
                        </div>
                    </div>
                    <?php

                    if(!empty($_FILES['photo']['name'])){
                        post_img($_FILES['photo']['tmp_name'], $extension);
                    }else{
                        $id = $db->lastInsertId();
                        echo"<script>window.location.replace(\"index.php?page=post&id=$id\");</script>";

                    }
                }
            }
            ?>
            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="name" id="name">
                        <label for="name">Nom</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="email" name="email" id="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="password" name="password" id="password">
                        <label for="password">Mot de passe</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="password" name="passwordconf" id="passwordconf">
                        <label for="passwordconf">Confirmez le mot de passe</label>
                    </div>
                    <div class="col s12">
                        <div class="file-field input-field">
                            <div class="btn col 5">
                                <span>Image de profile</span>
                                <input type="file" name="image">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate col s12" type="text" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 right-align">
                        <button type="submit" name="submit" class="btn">Inscrire</button>
                    </div>
                </div>
            </form>

        </div>




    </div>
</div>