<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            Rick and Morty
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

            <ul class="navbar-nav">

                <?php if(isset($_SESSION['user'])): ?>

                    <li class="nav-item">
                        <span class="nav-link">
                            Olá, <?= $_SESSION['user']['name'] ?>
                        </span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">
                            Sair
                        </a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">
                            Cadastro
                        </a>
                    </li>

                <?php endif; ?>

            </ul>

        </div>
    </div>
</nav>