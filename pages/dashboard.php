
<div class="row">
    <div class="col l4 m4 s12" style="padding-top:18px;">
        <h4>Mon Compte</h4>
    </div>
    <div class="col l8 m8 s12" style="padding-top:25px;">
        <nav class="nav-extended">
            <div class="nav-wrapper">
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="tabs ">
                    <li class="tab"><a class="active light-green-text" href="#block2">Rediger un article</a></li>
                    <li class="tab"><a class="light-green-text" href="#block1">Profile</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>



<div class="row">
    <div class="col l3 m3 s12">
        <img src="img/membre.png" alt="Membre" width="100%">
    </div>
    <div class="col l8 m8 s12 offset-l1">
        <?php
        $tables = [
            "Publications"  => "posts",
            "Commentaires"  =>  "comments",
        ];

        $colors = [
            "posts"       => "blue-grey",
            "comments"    => "orange",

        ];


        ?>

        <?php
        foreach($tables as $table_name => $table){
            ?>
            <div class="col l6 m6 s12">
                <div class="card">
                    <div class="card-content <?= getcolor($table, $colors)?> white-text">
                        <span class="card-title"><?= $table_name ?></span>
                        <?php $nbrInTable = inTable($table);?>
                        <h4><?= $nbrInTable[0] ?></h4>
                    </div>
                </div>
            </div>
            <?php
        }

        ?>
    </div>
</div>

<div class="row">
    <div id="block1" class="col l12 m12 s12">

    </div>
    <div id="block1" class="col l12 m12 s12">
        <?php
            include 'admin/pages/write.php';
        ?>
    </div>
</div>