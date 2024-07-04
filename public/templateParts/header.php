<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>/assets/css/style.css">
    <title>Document</title>
</head>


<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo ROOT_URL; ?>?page=homePage">PHP E-COMMERCE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>public/?page=about">Chi siamo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>public/?page=services">Servizi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>shop/?page=productsList">Prodotti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>public/?page=conttatti">Contatti</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto m-3 ">
                    <li class="nav-item">
                        <a href='<?php echo ROOT_URL; ?>shop?page=cart' class="nav-link" w-3>carrello
                            <i class="bi bi-cart "> </i>
                            <span class="badge rounded-pill text-bg-success js-totCartsItems"></span>
                        </a>
                    </li>

                </ul>
            </div>

            <?php if (!$loggedInUser) : ?>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Area riservata
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo ROOT_URL; ?>auth?page=login">Login</a></li>
                    <?php endif; ?>

                    </ul>

                </div>

                <?php if ($loggedInUser) : ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $loggedInUser->email; ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo ROOT_URL; ?>auth?page=logout">Logout</a></li>

                        </ul>

                    </div>
                <?php endif; ?>

                <?php if ($loggedInUser && $loggedInUser->is_admin) : ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                           Amministrazione
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo ROOT_URL; ?>admin">dashboard</a></li>

                        </ul>

                    </div>
                <?php endif; ?>

        </div>
    </nav>
</header>

<body>
    <main class="container">