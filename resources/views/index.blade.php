<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body class="bg-light min-vh-100 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">
                <i class="bi bi-box-seam me-2 text-primary"></i>Panel de Administración
            </h2>
            <small class="text-muted">Gestiona tu catálogo de productos</small>
        </div>
        <a href="{{ route('productos.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Crear Producto
        </a>
    </div>
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
            <span class="fw-semibold">
                Productos {{$productos->count()}}
                <span class="text-muted fw-normal"></span>
            </span>
            <div class="input-group" style="width:220px;">
                <span class="input-group-text bg-light border-end-0">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Buscar..." id="buscar">
            </div>
        </div>
    <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th class="text-uppercase text-muted fw-semibold small ps-4">ID</th>
                <th class="text-uppercase text-muted fw-semibold small">Nombre</th>
                <th class="text-uppercase text-muted fw-semibold small">Precio</th>
                <th class="text-uppercase text-muted fw-semibold small">Stock</th>
                <th class="text-uppercase text-muted fw-semibold small">Descripción</th>
                <th class="text-uppercase text-muted fw-semibold small">Categoría</th>
                <th class="text-uppercase text-muted fw-semibold small">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $item)
            <tr>
                <td class="ps-4">
                    <span class="badge bg-primary bg-opacity-10 text-primary fw-bold">
                        #{{ $item->id }}
                    </span>
                </td>
                <td class="fw-semibold">{{ $item->nombre }}</td>
                <td class="fw-bold text-dark">${{ $item->precio }}</td>
                <td>
                    @if ($item->stock <= 30)
                        <span class="badge bg-warning bg-opacity-10 text-warning">
                            <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $item->stock }}
                        </span>
                    @else
                        <span class="badge bg-success bg-opacity-10 text-success">
                            <i class="bi bi-check-circle-fill me-1"></i>{{ $item->stock }}
                        </span>
                    @endif
                </td>
                <td class="text-muted small">{{ $item->descripcion }}</td>
                <td>
                    <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary">
                        {{ $item->categoria }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('productos.edit',$item->id) }}" class="btn btn-sm btn-outline-primary me-1">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="/productos/{{ $item->id }}" method="POST" class="d-inline form-eliminar">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                        <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                        No hay productos registrados
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="card-footer bg-white border-top d-flex justify-content-between align-items-center py-3">
        <small class="text-muted">Mostrando {{ $productos->count() }} de {{ $productos->total() }} productos</small>
        {{ $productos->links('pagination::bootstrap-5') }}
    </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>




<script>

$(document).ready(function(){

    // BUSCADOR
    $('#buscar').on('keyup', function(){

        var valor = $(this).val().toLowerCase();

        $('tbody tr').filter(function(){

        $(this).toggle(
        $(this).text().toLowerCase().indexOf(valor) > -1
        );

        });

    });


    // CONFIRMAR ELIMINAR
    $('.form-eliminar').submit(function(e){

    if(!confirm("¿Eliminar producto?")){
    e.preventDefault();
    }

    });

});


    // CREAR
    @if(session('success'))

    Toastify({
        text: "{{ session('success') }}",
        duration: 3000,
        gravity: "top",
        position: "right",
        close: true,
        style: {
            background: "#198754"
        }
    }).showToast();

    @endif


    // EDITAR
    @if(session('info'))

    Toastify({
        text: "{{ session('info') }}",
        duration: 3000,
        gravity: "top",
        position: "right",
        close: true,
        style: {
            background: "#0d6efd"
        }
    }).showToast();

    @endif


// ELIMINAR
    @if(session('error'))

    Toastify({
        text: "{{ session('error') }}",
        duration: 3000,
        gravity: "top",
        position: "right",
        close: true,
        style: {
            background: "#dc3545"
        }
    }).showToast();

    @endif

</script>

</html>
