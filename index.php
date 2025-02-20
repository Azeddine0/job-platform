<?php 
include 'database/db.php';
$khadma = $pdo->query("SELECT o.*, e.*, e.ville AS vv FROM offres o, entreprise e WHERE e.email = o.email ")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indeed - Offres d'emploi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container my-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-primary">Solijob</h1>
            <nav>
                <a href="#" class="me-3 text-dark text-decoration-none">Page d'accueil</a>
                <a href="#" class="me-3 text-dark text-decoration-none">Avis sur les entreprises</a>
                <a href="#" class="text-dark text-decoration-none">Estimation de salaire</a>
            </nav>
        </div>

        <!-- Barre de recherche -->
        <div class="input-group mb-4">
            <span class="input-group-text">
                <i class="bi bi-geo-alt-fill"></i>
            </span>
            <input id="jobTitleInput" type="text" class="form-control" placeholder="Intitulé de poste">
            <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>
            <input id="cityInput" type="text" class="form-control" placeholder="Ville">
            <button id="searchButton" class="btn btn-primary" type="button">Rechercher</button>
        </div>

        <!-- Liste des offres d'emploi -->
        <div class="row row-cols-1 row-cols-md-2 g-4" id="jobContainer">
            <?php foreach($khadma as $key=>$value): ?>
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value['titre'] ?></h5>
                        <p class="card-text mb-1">
                            <?= $value['nom'] ?> 
                            <span class="text-muted">3.6<i class="bi bi-star-fill"></i></span>
                        </p>
                        <p class="card-text mb-3">
                            <i class="bi bi-geo-alt"></i> <?= $value['vv'] ?> <!-- Ville -->
                        </p>
                        <p class="card-text mb-3">
                            <i class="bi bi-building"></i> <?= $value['activite'] ?> <!-- Activité de l'entreprise -->
                        </p>
                        <p class="card-text mb-3">
                            <i class="bi bi-calendar"></i> <?= $value['date'] ?> <!-- Date de l'offre -->
                        </p>
                        <span class="badge bg-secondary mb-3">CDI</span>
                        <p class="card-text">Candidature simplifiée</p>
                        <ul class="list-unstyled">
                            <li>&#8226; <?= $value['description'] ?></li> <!-- Description de l'offre -->
                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>