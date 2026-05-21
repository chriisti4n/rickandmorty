<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
      href="assets/style.css">

</head>

<body class="bg-dark text-white">

<?php include 'navbar.php'; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            Personagens
        </h2>

        <div class="search-box">

            <input type="text"
            id="searchInput"
            class="search-input"
            placeholder="Pesquisar personagem...">

        </div>

    </div>

    <div class="row" id="characters"></div>

</div>

<script>

fetch("https://rickandmortyapi.com/api/character")

.then(response => response.json())

.then(data => {

    const container = document.getElementById("characters");

    data.results.forEach(character => {

        container.innerHTML += `
        
            <div class="col-md-3 mb-4 character-card">

                <div class="card bg-secondary text-white h-100 shadow border-0">

                    <img src="${character.image}" 
                         class="card-img-top">

                    <div class="card-body d-flex flex-column text-center">

                        <h5 class="card-title character-name">
                            ${character.name}
                        </h5>

                        <p>
                            ${character.species}
                        </p>

                        <a href="detalhes.php?api_url=${character.url}"
                           class="btn btn-primary mt-auto"
                           onclick="showLoading()">

                            Ver detalhes

                        </a>

                    </div>

                </div>

            </div>

        `;

    });

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

})

.catch(error => {

    console.error(error);

    showToast("Erro ao carregar personagens.");

});

</script>

</body>
</html>