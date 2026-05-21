<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand" href="index.php">

            <img src="assets/img/logo.png"
                alt="Rick and Morty"
                height="80"
                class="d-inline-block align-text-top">

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">

                    <a class="nav-link" href="index.php">
                        Home
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="personagens.php">
                        Personagens
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="sobre.php">
                        Sobre
                    </a>

                </li>

            </ul>

            <ul class="navbar-nav align-items-center">

                <?php if(isset($_SESSION['user'])): ?>

                    <li class="nav-item me-3">

                        <span class="nav-link text-light">

                            Olá,
                            <strong>
                                <?= $_SESSION['user']['name'] ?>
                            </strong>

                        </span>

                    </li>

                    <li class="nav-item">

                        <a class="btn btn-outline-danger btn-sm"
                           href="logout.php">

                            Sair

                        </a>

                    </li>

                <?php else: ?>

                    <li class="nav-item me-2">

                        <a class="btn btn-outline-light btn-sm"
                           href="login.php">

                            Login

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="btn btn-success btn-sm"
                           href="cadastro.php">

                            Cadastro

                        </a>

                    </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>

</nav>

<div class="toast-container position-fixed bottom-0 end-0 p-3">

    <div id="liveToast"
         class="toast text-bg-dark border border-light"
         role="alert">

        <div class="d-flex">

            <div class="toast-body"
                 id="toastMessage">

                Mensagem

            </div>

            <button type="button"
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast">

            </button>

        </div>

    </div>

</div>

<div id="loadingOverlay"
     class="d-none position-fixed top-0 start-0 w-100 h-100
            d-flex justify-content-center align-items-center"
     style="background: rgba(0,0,0,0.7);
            z-index: 9999;">

    <div class="spinner-border text-light"
         style="width: 4rem; height: 4rem;"
         role="status">

        <span class="visually-hidden">
            Loading...
        </span>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>

function showToast(message){

    document.getElementById("toastMessage").innerText = message;

    const toastElement =
        document.getElementById("liveToast");

    const toast =
        new bootstrap.Toast(toastElement);

    toast.show();

}

function showLoading(){

    document
        .getElementById("loadingOverlay")
        .classList.remove("d-none");

}

function hideLoading(){

    document
        .getElementById("loadingOverlay")
        .classList.add("d-none");

}

</script>