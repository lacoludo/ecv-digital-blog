<nav class="light-green">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">BLOG PROJET</a>
            <?php
            if($page != 'login' && $page != 'new'){
                    ?>
                <a href="#" data-activates="mobile-responsive" class="button-collapse"><i class="material-icons">menu</i></a>


                <ul class="right hide-on-med-and-down">
                    <li class="<?php echo ($page=="dashboard")?"active" : "";?>"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>

                        <li class="<?php echo ($page=="write")?"active" : "";?>"><a href="index.php?page=write"><i class="material-icons">edit</i></a></li>
                        <li class="<?php echo ($page=="list")?"active" : "";?>"><a href="index.php?page=list"><i class="material-icons">view_list</i></a></li>

                    <?php
//                    if(admin() == 1){
//                        ?>
                        <li class="<?php echo ($page=="settings")?"active" : "";?>"><a href="index.php?page=settings"><i class="material-icons">settings</i></a></li
<!--                        --><?php
//                    }
//                    ?>


                        <li><a href="../index.php?page=home">Quitter</a></li>
                        <li><a href="index.php?page=logout">Deconnexion</a></li>
                </ul>

                <ul class="side-nav" id="mobile-responsive">
                    <li class="<?php echo ($page=="dashboard")?"active" : "";?>"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>
                    <li class="<?php echo ($page=="write")?"active" : "";?>"><a href="index.php?page=write"><i class="material-icons">Publier un article</i></a></li>
                    <li class="<?php echo ($page=="list")?"active" : "";?>"><a href="index.php?page=list"><i class="material-icons">Listing des articles</i></a></li>
<!--                    --><?php
//                    if(admin()== 1){
//                        ?>
                        <li class="<?php echo ($page=="settings")?"active" : "";?>"><a href="index.php?page=settings"><i class="material-icons">Parametres</i></a></li>
<!--                        --><?php
//                    }
//                    ?>

                        <li><a href="../index.php?page=home">Quitter</a></li>
                        <li><a href="index.php?page=logout">Deconnexion</a></li>
                </ul>
            <?php
            }
            ?>
        </div>
    </div>
</nav>