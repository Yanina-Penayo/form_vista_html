<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .container {
            background-color: #d3d3d3;
            padding: 30px;
            border-radius: 10px;
            margin-top: 50px;
        }
        .btn-custom {
            background-color: #4B5320;
            color: white;
        }
        .form-control {
            border-radius: 5px;
        }
        .form-select {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container shadow-sm">
        <h2 class="text-center mb-4">Formulario de Búsqueda</h2>
        <form action="./buscar.php" method="get">
            <div class="mb-3">
                <label for="criterio" class="form-label">Buscar por:</label>
                <select name="criterio" id="criterio" class="form-select">
                    <option value="autor">Autor</option>
                    <option value="editorial">Editorial</option>
                    <option value="genero">Género</option>
                    <option value="titulo">Título</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="termino" class="form-label">Término de búsqueda:</label>
                <input type="text" name="termino" id="termino" class="form-control" minlength="3" required>
                <small id="terminoHelp" class="form-text text-muted">El término de búsqueda debe tener al menos 3 caracteres.</small>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-custom">Buscar</button>
            </div>
        </form>
    </div>
    
    <!-- Enlazar los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
