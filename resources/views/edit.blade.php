<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>Productos</title>
    </head>
    <body class="bg-light min-vh-100 d-flex align-items-center justify-content-center py-4">
        <div class="card shadow-sm w-75 mx-4">
            <div class="card-body p-4">
                <h3 class="mb-4">
                    <i class="bi bi-box-seam me-2"></i>
                    Editar Producto
                </h3>
                <form class="row g-4 needs-validation" novalidate method="POST" action="/productos/{{ $producto->id }}">
                @csrf
                @method('PUT')
                    <div class="col-md-4">
                        <label class="form-label">Nombre del Producto</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}" required>
                            <div class="invalid-feedback">Por favor seleccione un nombre para el producto.</div>
                            <div class="valid-feedback">Dato Correcto..!!</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Precio</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">
                                <i class="bi bi-currency-dollar"></i>
                            </span>
                            <input type="number" class="form-control" step="0.01" name="precio" value="{{ $producto->precio }}" required>
                            <div class="invalid-feedback">Por favor agregue un precio para el producto.</div>
                            <div class="valid-feedback">Dato Correcto..!!</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Stock</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">
                                <i class="bi bi-bar-chart"></i>
                            </span>
                            <input type="number" class="form-control" name="stock" value="{{ $producto->stock }}" required>
                            <div class="invalid-feedback">Por favor agregue un stock para el producto.</div>
                            <div class="valid-feedback">Dato Correcto..!!</div>
                        </div>
                    </div>

                    <div class="col-12"><hr class="my-0"></div>

                    <div class="col-md-6">
                        <label class="form-label">Descripción</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">
                                <i class="bi bi-card-text"></i>
                            </span>
                            <input type="text" class="form-control" name="descripcion" value="{{ $producto->descripcion }}" required>
                            <div class="invalid-feedback">Por favor agregue una descripción para el producto.</div>
                            <div class="valid-feedback">Dato Correcto..!!</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Categoría</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="bi bi-tags"></i></span>
                            <select class="form-select" name="categoria" required>

                            <option disabled>Seleccione una categoría</option>

                            <option value="Electrónica"
                            {{ $producto->categoria == 'Electrónica' ? 'selected' : '' }}>
                            Electrónica
                            </option>

                            <option value="Ropa"
                                {{ $producto->categoria == 'Ropa' ? 'selected' : '' }}>
                                Ropa
                            </option>

                            </select>

                            <div class="invalid-feedback">Por favor seleccione una categoría.</div>
                            <div class="valid-feedback">Dato Correcto..!!</div>
                        </div>
                    </div>

                    <div class="col-12 pt-3 d-flex justify-content-between">

                        <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>
                            Regresar
                        </a>

                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-floppy2 me-1"></i>
                            Actualizar
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </body>
    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {

                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')

                }, false)
            })
        })();
    </script>

</html>
