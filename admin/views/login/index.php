<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<section class="vh-100" style="background-color: #FFFFFF;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">
                        <form method="POST" action="login.php?action=login">
                            <h3 class="mb-5 text-center">Bienvenido</h3>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="username">Nombre de usuario</label>
                                <input type="text" id="username" name="usuario" class="form-control form-control-lg"
                                    required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="typePasswordX-2">Contraseña</label>
                                <input type="password" id="typePasswordX-2" name="contrasena"
                                    class="form-control form-control-lg" required />
                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary btn-lg btn-block center" type="submit"
                                    name="enviar">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>