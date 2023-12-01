<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prueba PHPMailer isSMTP()</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-5">
                <h1 class="text-center">Prueba PHPMailer isSMTP()</h1>

                <form method="POST">
                    <?php

                    // Send Email and storage in db
                    $msg = '';
                    $submit = new SubscriberController();
                    $repsonse = $submit->sendEmail();
                    if ($repsonse == 'success') {
                        $msg = '<div class="alert bg-success text-white alert-dismissible fade show mt-3" role="alert">
                                    <strong>¡Correcto!</strong> Mensaje enviado con exito
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                    } else {
                        $msg = '<div class="alert bg-danger text-white alert-dismissible fade show mt-3" role="alert">
                                    <strong>Error!</strong> ' . $repsonse . ' 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                    }
                    if ($repsonse != NULL && $msg != '') echo $msg;

                    ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="name" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Suscribir</button>

                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>