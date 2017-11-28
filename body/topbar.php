<nav class="light-blue">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=blog" class="brand-logo">ECV DIGITAL : BLOG</a>

            <a href="#" data-activates="mobile-responsive" class="button-collapse"><i class="material-icons">menu</i></a>


            <ul class="right hide-on-med-and-down">
                <li class="<?php echo ($page=="blog")?"active" : "";?>"><a href="index.php?page=blog">Accueil</a></li>
                <?php if ( isset( $_SESSION['admins'] ) ) : ?>
                    <li><a href="index.php?page=dashboard">Compte</a></li>
                    <li><a href="index.php?page=logout">Deconnexion</a></li>
                    <?php else : ?>
                    <li class="<?php echo ($page=="login")?"active" : "";?>"><a href="index.php?page=login">Login</a></li>
                <?php endif; ?>
            </ul>

            <ul class="side-nav" id="mobile-responsive">
                <li class="<?php echo ($page=="blog")?"active" : "";?>"><a href="index.php?page=blog">Accueil</a></li>
                <?php if ( isset( $_SESSION['admins'] ) ) : ?>
                    <li><a href="index.php?page=dashboard">Compte</a></li>
                    <li><a href="index.php?page=logout">Deconnexion</a></li>
                    <?php else : ?>
                <li class="<?php echo ($page=="login")?"active" : "";?>"><a href="index.php?page=login">Login</a></li>


                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav>