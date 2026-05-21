<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

    <title>Cadastro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
      href="assets/style.css">

</head>

<body class="bg-dark text-white">

<?php include 'navbar.php'; ?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card bg-secondary text-white p-4">

                <h2 class="mb-4 text-center">
                    Cadastro
                </h2>

                <form id="cadastroForm">

                    <div class="mb-3">

                        <label class="form-label">
                            Nome
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            E-mail
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Senha
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>

                    </div>

                    <button type="submit"
                            class="btn btn-primary w-100">

                        Cadastrar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

const form = document.getElementById("cadastroForm");

form.addEventListener("submit", function(event){

    event.preventDefault();

    const formData = new FormData(form);

    fetch("api/cadastro.php", {

        method: "POST",
        body: formData

    })

    .then(response => response.json())

    .then(data => {

        showToast(data.message);

        if(data.success){

            window.location.href = "login.php";

        }

    })

    .catch(error => {

        console.error(error);

        alert("Erro ao cadastrar.");

    });

});

</script>

</body>
</html>