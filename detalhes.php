<?php

session_start();

require_once 'config/database.php';

$db = Database::getConnection();

$character = null;
$fromApi = false;

if(isset($_GET['api_url'])){

    $apiUrl = $_GET['api_url'];

    $json = file_get_contents($apiUrl);

    $character = json_decode($json, true);

    $fromApi = true;

} elseif(isset($_GET['id'])){

    $stmt = $db->prepare("
        SELECT *
        FROM characters
        WHERE id = ?
    ");

    $stmt->execute([
        $_GET['id']
    ]);

    $character = $stmt->fetch(PDO::FETCH_ASSOC);
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

                    <h2 id="nameText">
                        <?= $character['name'] ?>
                    </h2>

                    <input type="text"
                           id="nameInput"
                           class="form-control d-none mb-3"
                           value="<?= $character['name'] ?>">

                    <p id="speciesText">
                        <strong>Espécie:</strong>
                        <?= $character['species'] ?>
                    </p>

                    <input type="text"
                           id="speciesInput"
                           class="form-control d-none mb-3"
                           value="<?= $character['species'] ?>">

                    <p id="genderText">
                        <strong>Gênero:</strong>
                        <?= $character['gender'] ?>
                    </p>

                    <input type="text"
                           id="genderInput"
                           class="form-control d-none mb-3"
                           value="<?= $character['gender'] ?>">

                    <p id="locationText">

                        <strong>Localização:</strong>

                        <?php if($fromApi): ?>

                            <?= $character['location']['name'] ?>

                        <?php else: ?>

                            <?= $character['location'] ?>

                        <?php endif; ?>

                    </p>

                    <input type="text"
                           id="locationInput"
                           class="form-control d-none mb-3"
                           value="<?php if($fromApi): ?><?= $character['location']['name'] ?><?php else: ?><?= $character['location'] ?><?php endif; ?>">

                    <p>
                        <strong>URL:</strong>
                        <?= $character['url'] ?>
                    </p>

                    <div class="mt-4">

                        <?php if($fromApi): ?>

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

                        <?php else: ?>

                            <button class="btn btn-primary me-2"
                                    onclick="ativarEdicao()">

                                Editar

                            </button>

                            <button class="btn btn-danger"
                                    onclick="deletarPersonagem(<?= $character['id'] ?>)">

                                Excluir Personagem

                            </button>

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

<?php if($fromApi): ?>

<script>

function salvarPersonagem(){

    const formData = new FormData();

    formData.append("name", "<?= $character['name'] ?>");
    formData.append("species", "<?= $character['species'] ?>");
    formData.append("gender", "<?= $character['gender'] ?>");
    formData.append("location", "<?= $character['location']['name'] ?>");
    formData.append("image", "<?= $character['image'] ?>");
    formData.append("url", "<?= $character['url'] ?>");

    fetch("api/salvar.php", {

        method: "POST",
        body: formData

    })

    .then(response => response.json())

    .then(data => {

        alert(data.message);

    })

    .catch(error => {

        console.error(error);

        alert("Erro ao salvar personagem.");

    });

}

</script>

<?php endif; ?>

<script>

function deletarPersonagem(id){

    if(!confirm("Deseja excluir este personagem?")){
        return;
    }

    const formData = new FormData();

    formData.append("id", id);

    fetch("api/deletar.php", {

        method: "POST",
        body: formData

    })

    .then(response => response.json())

    .then(data => {

        alert(data.message);

        if(data.success){

            window.location.href = "personagens.php";

        }

    })

    .catch(error => {

        console.error(error);

        alert("Erro ao excluir personagem.");

    });

}

function ativarEdicao(){

    document.getElementById("nameText").classList.add("d-none");
    document.getElementById("speciesText").classList.add("d-none");
    document.getElementById("genderText").classList.add("d-none");
    document.getElementById("locationText").classList.add("d-none");

    document.getElementById("nameInput").classList.remove("d-none");
    document.getElementById("speciesInput").classList.remove("d-none");
    document.getElementById("genderInput").classList.remove("d-none");
    document.getElementById("locationInput").classList.remove("d-none");

    event.target.outerHTML = `
        <button class="btn btn-success me-2"
                onclick="salvarEdicao(<?= $character['id'] ?>)">

            Salvar Alterações

        </button>
    `;
}

function salvarEdicao(id){

    const formData = new FormData();

    formData.append("id", id);

    formData.append(
        "name",
        document.getElementById("nameInput").value
    );

    formData.append(
        "species",
        document.getElementById("speciesInput").value
    );

    formData.append(
        "gender",
        document.getElementById("genderInput").value
    );

    formData.append(
        "location",
        document.getElementById("locationInput").value
    );

    fetch("api/editar.php", {

        method: "POST",
        body: formData

    })

    .then(response => response.json())

    .then(data => {

        alert(data.message);

        if(data.success){

            location.reload();

        }

    })

    .catch(error => {

        console.error(error);

        alert("Erro ao editar personagem.");

    });

}

</script>

</body>
</html>