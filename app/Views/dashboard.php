<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel principal</title>
</head>
<body>
    <h1>Bienvenido al sistema</h1>

    <p>
        Usuario autenticado: 
        <strong><?= esc(session()->get('usuario')) ?></strong>
    </p>

    <p>Has iniciado sesión correctamente.</p>

    <form action="<?= site_url('logout') ?>" method="post">
        <?= csrf_field() ?>
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>