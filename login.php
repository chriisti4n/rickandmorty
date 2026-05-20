<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-dark text-white">

<?php include 'navbar.php'; ?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card bg-secondary text-white p-4">

                <h2 class="mb-4 text-center">
                    Login
                </h2>

                <form id="loginForm">

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
                            class="btn btn-success w-100">

                        Entrar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

const form = document.getElementById("loginForm");

form.addEventListener("submit", function(event){

    event.preventDefault();

    const formData = new FormData(form);

    fetch("api/login.php", {

        method: "POST",
        body: formData

    })

    .then(response => response.json())

    .then(data => {

        showToast(data.message);

        if(data.success){

            window.location.href = "index.php";

        }

    })

    .catch(error => {

        console.error(error);

        alert("Erro ao realizar login.");

    });

});

</script>

</body>
</html>