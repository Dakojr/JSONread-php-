<?php

$jsondata = file_get_contents('repliques_batman.json');
$jsondata = json_decode($jsondata, true);

if(!isset($_POST['charac'])){
    header("Location: index.php");
}

function getRepliques($jsondata) {
    foreach($jsondata['texts'] as $data) {
        if($data['id_character'] == $_POST['charac']) {
            echo "<p>" . $data['text'] . "</p>";
        }
    }
}

function getName($jsondata) {
    foreach($jsondata['characters'] as $cara) {
        if($cara['id'] == $_POST['charac']) {
            echo $cara['name'];
        }
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Characters</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
</head>

<body>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"><?php getName($jsondata);?></h1>
    </div>

    <div class="container">
        <div class="py-5 text-center">
        <h5 style="margin-bottom: 3em;"> Les répliques </h5>
        <?php
            getRepliques($jsondata);
            ?>
    </div>
</body>

</html>