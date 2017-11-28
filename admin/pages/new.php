<?php
session_start();
?>
<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/membre.png" alt="Membre" width="100%">
                </div>
            </div>
            <h4 class="center-align">Se connecter</h4>
            <?php
                if (isset($_POST['submit'])){
                    $email = htmlspecialchars(trim($_POST['email']));
                    $token = htmlspecialchars(trim($_POST['token']));

                    $errors = [];

                    if (empty($email) || empty($password)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis";
                    }elseif (is_member($email,$token) == 0 ){
                        $errors['exist'] = "Ce membre n'existe pas";
                    }


                    if(!empty($errors)){
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
                    $_SESSION['admin'] = $email;
                        echo"<script>window.location.replace(\"index.php?page=password\");</script>";

                    }
                }

            ?>


            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" id="email" name="email">
                        <label for="email">Adresse email</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="token" name="token">
                        <label for="token">Code unique</label>
                    </div>
                    <center>
                        <button type="submit" name="submit" class="btn waves-effect waves-light light-blue">
                            <i class="material-icons left">perm_identity</i>
                            Se connecter
                        </button>
                        <br><br>
                        <a href="index.php?page=login">Déja membre</a>
                    </center>
                </div>
            </form>

        </div>




    </div>
</div>