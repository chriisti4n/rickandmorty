<?php
session_start();

$character = null;

if(isset($_GET['api_url'])){

    $apiUrl = $_GET['api_url'];

    $json = file_get_contents($apiUrl);

    $character = json_decode($json, true);

}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Detalhes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-dark text-white">

<?php include 'navbar.php'; ?>

<div class="container mt-5">

    <?php if($character): ?>

        <div class="card bg-secondary text-white p-4">

            <div class="row">

                <div class="col-md-4 text-center">

                    <img src="<?= $character['image'] ?>"
                         class="img-fluid rounded">

                </div>

                <div class="col-md-8">

                    <h2>
                        <?= $character['name'] ?>
                    </h2>

                    <p>
                        <strong>Espécie:</strong>
                        <?= $character['species'] ?>
                    </p>

                    <p>
                        <strong>Gênero:</strong>
                        <?= $character['gender'] ?>
                    </p>

                    <p>
                        <strong>Localização:</strong>
                        <?= $character['location']['name'] ?>
                    </p>

                    <p>
                        <strong>URL:</strong>
                        <?= $character['url'] ?>
                    </p>

                </div>

            </div>

        </div>

    <?php else: ?>

        <div class="alert alert-danger">
            Personagem não encontrado.
        </div>

    <?php endif; ?>

</div>

</body>
</html>