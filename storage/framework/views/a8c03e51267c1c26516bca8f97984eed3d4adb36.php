<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Hola <?php echo e($name); ?>, gracias por registrarte en <strong>TEDU</strong> !</h2>
    <p>Por favor confirma tu correo electrónico.</p>
    <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>

    <a href="<?php echo e(url('/register/verify/' . $confirmation_code)); ?>">
        Clic para confirmar tu email
    </a>
</body>
</html><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\emails\confirmation_code.blade.php ENDPATH**/ ?>