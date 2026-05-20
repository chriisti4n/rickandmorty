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

                    <div class="mt-4">

                        <?php if(isset($_SESSION['user'])): ?>

                            <button class="btn btn-success"
                                    onclick="salvarPersonagem()">

                                Salvar Personagem

                            </button>

                        <?php else: ?>

                            <a href="login.php"
                               class="btn btn-warning">

                                Faça login para salvar

                            </a>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    <?php else: ?>

        <div class="alert alert-danger">
            Personagem não encontrado.
        </div>

    <?php endif; ?>

</div>

<script>

function salvarPersonagem(){

    console.log("clicou");

    const formData = new FormData();

    formData.append("name", "<?= $character['name'] ?>");
    formData.append("species", "<?= $character['species'] ?>");
    formData.append("image", "<?= $character['image'] ?>");
    formData.append("url", "<?= $character['url'] ?>");

    fetch("api/salvar.php", {

        method: "POST",
        body: formData

    })

    .then(response => response.json())

    .then(data => {

        console.log(data);

        alert(data.message);

    })

    .catch(error => {

        console.error(error);

        alert("Erro ao salvar personagem.");

    });

}

</script>

</body>
</html>