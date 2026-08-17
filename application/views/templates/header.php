<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Perpustakaan Digital'; ?></title>
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .navbar-brand { font-weight: 700; }
        .card { border: none; box-shadow: 0 1px 4px rgba(0,0,0,.08); }
        footer { padding: 20px 0; color: #888; font-size: 14px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('buku'); ?>">📚 Perpustakaan Digital</a>
        <div class="d-flex ms-auto">
            <?php if ($this->session->userdata('logged_in')): ?>
                <span class="navbar-text text-white me-3">
                    Halo, <b><?= htmlspecialchars($this->session->userdata('nama')); ?></b>
                </span>
                <a href="<?= base_url('logout'); ?>" class="btn btn-outline-light btn-sm">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container mb-5">

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($this->session->flashdata('success')); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($this->session->flashdata('error')); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
