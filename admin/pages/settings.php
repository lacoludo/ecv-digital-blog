<?php

//if(admin()!= 1){
//    echo"<script>window.location.replace(\"index.php?page=dashboard\");</script>";
//}
//
//?>

<h2>Paramètres</h2>
<div class="row">
    <div class="col m6 s12">
        <h4>Membres</h4>

        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Validé</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $persons = get_persons();
            foreach ($persons as $person){
                ?>
                <tr>
                    <td><?= $person->name ?></td>
                    <td><?= $person->email ?></td>
                    <td><?= $person->role ?></td>
                    <td><i class="material-icons"><?php echo (!empty($person->password)) ? "verified_user" : "av_timer"?></i></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>



    </div>
    <div class="col m6 s12">
        <h4>Ajouter un membre</h4>

        <?php
        if (isset($_POST['submit'])){
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $email_again = htmlspecialchars(trim($_POST['email_again']));
            $role = htmlspecialchars(trim($_POST['role']));
            $token = token(30);

            $errors = [];

            if ( empty($name) || empty($email) || empty($email_again)){
                $errors['empty'] = "Veuillez remplir tous les champs";
            }

            if($email != $email_again){
                $errors['different'] = "Les addresses email ne correspondent pas !";
            }


            if(email_taken($email)){
                $errors['taken'] = "l'adresse email est déja prise";
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
                add_member($name,$email,$role,$token);
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
                    <input type="email" name="email_again" id="email_again">
                    <label for="email_again">Répéter l'adresse email</label>
                </div>

                <div class="input-field col s12">
                    <select name="role" id="role">
                        <option value="member">Membre</option>
                        <option value="admin">Administrateur</option>
                    </select>
                        <label for="role">Rôle</label>
                </div>
                <div class="col s12">
                    <button type="submit" name="submit" class="btn">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>