<?php
     $post = get_post();
     if($post == false){

        echo"<script>window.location.replace(\"index.php?page=error\")</script>";


     exit();//need to recheck that
     }else{
?>
        </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>">
        </div>
    </div>
        <div class="container">

            <h2><?= $post->title ?></h2>
            <h6><?= $post->name ?> le <?= date("d/m/Y à H:i", strtotime($post->date))?></h6>
            <p><?= nl2br($post->content)  ?></p>
<?php
}
?>
            <hr>
            <h4>Commentaires:</h4>
            <?php
                $replies = get_comments();
                    if($replies != false){
                        foreach ($replies as $reply){
                            ?>

                            <blockquote>
                                <strong><?= $reply->name?> (<?= date("d/m/Y", strtotime($reply->date))?>)</strong>
                                <p><?= nl2br($reply->comment)?></p>

                            </blockquote>
                            <?php
                        }
                    }else{ echo "Aucun commentaire n'a été publie !";
                    }
            ?>
                <h4>Commenter:</h4>
            <?php
                if(isset($_POST['submit']) ){
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $comment = htmlspecialchars(trim($_POST['comment']));

                    $errors =[];


                    if(empty($name) || empty($email) || empty($comment)){
                        $errors['empty'] = "Tous les champs n'ont pas été rempli";
                    }else{
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $errors['$email']= "L'addresse est pas valide !";
                        }
                    }

                    if(!empty($errors)){
                       ?>
                        <div class="card red">
                            <div class="card-content white-text">
                                <?php
                                        foreach ($errors as $error){
                                           echo $error . "<br/>";
                                        }
                                ?>
                            </div>
                        </div>
                        <?php

                    }else{
                        comment($name, $email, $comment);
                        ?>

                        <script>
                            window.location.replace("index.php?page=post&id=<?= $_GET['id']?>");
                        </script>

                        <?php
                    }
                }
            ?>
            <form method="post">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="name" id="name"/>
                        <label for="name">Nom</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" name="email" id="email"/>
                        <label for="email">Adresse email</label>
                    </div>

                    <div class="input-field col s12">
                        <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
                        <label for="comment">commentaire</label>
                    </div>
                    <div class="col s12">
                        <button type="submit" name="submit" class="btn waves-effect">commenter ce post
                        </button>
                    </div>
                </div>
            </form>




