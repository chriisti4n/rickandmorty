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

    console.log(data);

});

</script>

</body>
</html>