<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Login'; ?></title>
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #224abe);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card { border: none; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,.25); }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card login-card">
                <div class="card-body p-4">
                    <h4 class="text-center mb-1">📚 Perpustakaan Digital</h4>
                    <p class="text-center text-muted mb-4">Silakan login untuk mengelola data buku</p>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($this->session->flashdata('error')); ?></div>
                    <?php endif; ?>

                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger"><?= validation_errors(); ?></div>
                    <?php endif; ?>

                    <?= form_open('auth/login'); ?>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control"
                                   value="<?= set_value('username'); ?>" placeholder="Masukkan username" autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    <?= form_close(); ?>

                    <p class="text-muted text-center mt-3 mb-0" style="font-size: 13px;">
                        Default: <b>admin</b> / <b>admin123</b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
