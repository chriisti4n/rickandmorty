<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>

    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-dark text-white">

<?php include 'navbar.php'; ?>

<div class="container mt-4">

    <h2 class="mb-4">
        Personagens
    </h2>

    <div class="row" id="characters"></div>

</div>

<script>

fetch("https://rickandmortyapi.com/api/character")

.then(response => response.json())

.then(data => {

    const container = document.getElementById("characters");

    data.results.forEach(character => {

        container.innerHTML += `
        
            <div class="col-md-3 mb-4">

                <div class="card bg-secondary text-white h-100">

                    <img src="${character.image}" 
                         class="card-img-top">

                    <div class="card-body d-flex flex-column text-center">

                        <h5 class="card-title">
                            ${character.name}
                        </h5>

                        <p>
                            ${character.species}
                        </p>

                        <a href="detalhes.php?api_url=${character.url}"
                           class="btn btn-primary mt-auto">

                            Ver detalhes

                        </a>

                    </div>

                </div>

            </div>

        `;

    });

})

</script>

</body>
</html>