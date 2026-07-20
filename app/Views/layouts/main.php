<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ? $this->renderSection('title') : 'Mobile Money Dashboard' ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS (keeps existing styles) -->
    <link rel="stylesheet" href="/assets/css/custom.css">

    <?= $this->renderSection('styles') ?>
</head>
<body class="bg-light">

    <?= $this->include('layouts/partials/header') ?>

    <main class="container-fluid py-4">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('layouts/partials/footer') ?>

    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/custom.js"></script>

    <?= $this->renderSection('scripts') ?>
</body>
</html>
