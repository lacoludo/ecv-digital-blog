<?php
    if ( isset($_SESSION['admin']) ) {
        header( 'Location: index.php?page=dashboard' );
    }
//    if(isset($_SESSION['admin'])){
//        echo"<script>window.location.replace(\"index.php?page=dashboard\");</script>";
//    }
?>


<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3">
        <div class="div card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="img/membre.png" alt="Membre" width="100%">
                </div>
            </div>

            <h4 class="center-align">Se connecter</h4>
            <?php
                if(isset($_POST['submit'])){
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));

                    $errors = [];

                    if(empty($email) || empty($password)){

                        $errors['empty'] =  "Tous les champs n'ont pas été remplis !";
                    }else if (is_admin($email, $password) == 0){
                        $errors['exists'] = "Cet membre n'existe pas !";

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
                        $_SESSION['admins'] = $email;
                        echo"<script>window.location.replace(\"index.php?page=dashboard\");</script>";
                    }

                }
                            ?>
            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" id="email" name="email">
                        <label for="email">Addresse email</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="password" id="password" name="password">
                        <label for="password">Password</label>
                    </div>


                <center><button type="submit" name="submit" class="waves-effect waves-light btn light-blue">
                    <i class="material-icons left">perm_identity</i>
                    Se connecter
                </button>
                    <br><br>
                    <a href="index.php?page=new">Nouveau membre</a>

                </center>

                </div>
            </form>


        </div>
    </div>
</div>