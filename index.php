<?php

$jsondata = file_get_contents('repliques_batman.json');
$jsondata = json_decode($jsondata, true);

//var_dump($jsondata['texts']);

function listMovie($jsondata){
    ?>
<ul class="list-group">
    <?php
    foreach($jsondata['movies'] as $movies){
        ?>
    <li class="list-group-item">
        <?= $movies['name'];?>
    </li>
    <?php
    }?>
</ul>
<?php
}?>

<?php
function listPerso($jsondata){
    ?>
<ul class="list-group">
    <?php
    foreach($jsondata['characters'] as $cara){
        ?>
    <li class="list-group-item">
        <?= $cara['name'];?>
    </li>
    <?php
    }?>
</ul>
<?php
}?>

<?php
function DropDownPerso($jsondata){

    foreach($jsondata['characters'] as $cara){
        ?>
    <option value="<?= $cara['id'];?>">
        <?= $cara['name'];?>
    </option>
    <?php
    }
}?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Batman</title>

    <link href="https://getbootstrap.com/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
</head>

<body>
    <header>

    </header>
    <main role="main">
        <div class="container">
            <h2>Liste des films</h2>
            <?php listMovie($jsondata);?>
        </div>
        <div class="container">
            <h2>Liste des personnages</h2>
            <?php listPerso($jsondata);?>
        </div>
        <div class="container">
            <h2>Liste des répliques</h2>
            <form class="form-signin" action="controlleur.php" method="post">
                <select class="form-control" name="charac" style="margin-bottom: 1em;">
                    <option value="" selected>Choisir un personnage...</option>
                    <?php
                        DropDownPerso($jsondata);
                        ?>
                </select>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Rechercher</button>
            </form>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP"
        crossorigin="anonymous"></script>
</body>

</html>