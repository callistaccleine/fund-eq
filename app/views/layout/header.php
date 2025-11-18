<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle ?? 'Fund EQ') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Fund EQ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link<?= ($_GET['page'] ?? 'home') === 'home' ? ' active' : '' ?>" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link<?= ($_GET['page'] ?? '') === 'team' ? ' active' : '' ?>" href="/?page=team">Team</a></li>
                <li class="nav-item"><a class="nav-link<?= ($_GET['page'] ?? '') === 'tasks' ? ' active' : '' ?>" href="/?page=tasks">Tasks</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="py-5">
    <div class="container">
