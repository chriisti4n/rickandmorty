<?php

session_start();

require_once 'config/database.php';

if(!isset($_SESSION['user'])){

    header("Location: login.php");
    exit;

}

$db = Database::getConnection();

$stmt = $db->prepare("
    SELECT *
    FROM characters
    WHERE user_id = ?
    ORDER BY id DESC
");

$stmt->execute([
    $_SESSION['user']['id']
]);

$characters = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Personagens</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-dark text-white">

<?php include 'navbar.php'; ?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Meus Personagens
        </h1>

        <input type="text"
               id="searchInput"
               class="form-control w-25"
               placeholder="Pesquisar personagem...">

    </div>

    <div class="row" id="charactersContainer">

        <?php if(count($characters) > 0): ?>

            <?php foreach($characters as $character): ?>

                <div class="col-md-3 mb-4 character-card">

                    <div class="card bg-secondary text-white h-100 shadow border-0">

                        <img src="<?= $character['image'] ?>"
                             class="card-img-top">

                        <div class="card-body d-flex flex-column text-center">

                            <h5 class="character-name">
                                <?= $character['name'] ?>
                            </h5>

                            <p>
                                <?= $character['species'] ?>
                            </p>

                            <a href="detalhes.php?id=<?= $character['id'] ?>"
                               class="btn btn-primary mt-auto"
                               onclick="showLoading()">

                                Ver detalhes

                            </a>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="alert alert-warning">

                Nenhum personagem salvo.

            </div>

        <?php endif; ?>

    </div>

</div>

<script>

const searchInput =
    document.getElementById("searchInput");

searchInput.addEventListener("keyup", function(){

    const value =
        this.value.toLowerCase();

    const cards =
        document.querySelectorAll(".character-card");

    cards.forEach(card => {

        const name =
            card.querySelector(".character-name")
                .innerText
                .toLowerCase();

        if(name.includes(value)){

            card.style.display = "block";

        } else {

            card.style.display = "none";

        }

    });

});

</script>

</body>
</html>