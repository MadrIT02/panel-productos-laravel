<div class="col-md-4">
    <label class="form-label">Nombre del Producto</label>
    <div class="input-group has-validation">
        <span class="input-group-text">
            <i class="bi bi-person"></i>
        </span>

        <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}" placeholder="Ej. Laptop Pro" required>

        <div class="invalid-feedback">
            Por favor seleccione un nombre para el producto.
        </div>

        <div class="valid-feedback">
            Dato Correcto..!!
        </div>

    </div>
</div>


<div class="col-md-4">
    <label class="form-label">Precio</label>
    <div class="input-group has-validation">
        <span class="input-group-text">
            <i class="bi bi-currency-dollar"></i>
        </span>
        <input type="number" step="0.01" class="form-control" name="precio" value="{{ old('precio', $producto->precio ?? '') }}" placeholder="0.00" required>
        <div class="invalid-feedback">
            Por favor agregue un precio para el producto.
        </div>
        <div class="valid-feedback">
            Dato Correcto..!!
        </div>
    </div>
</div>


<div class="col-md-4">

    <label class="form-label">Stock</label>

    <div class="input-group has-validation">

        <span class="input-group-text">
            <i class="bi bi-bar-chart"></i>
        </span>

        <input type="number" class="form-control" name="stock" value="{{ old('stock', $producto->stock ?? '') }}" placeholder="0" required>

        <div class="invalid-feedback">
            Por favor agregue un stock para el producto.
        </div>

        <div class="valid-feedback">
            Dato Correcto..!!
        </div>
    </div>
</div>


<div class="col-12">
    <hr class="my-0">
</div>


<div class="col-md-6">

    <label class="form-label">Descripción</label>

    <div class="input-group has-validation">
        <span class="input-group-text">
            <i class="bi bi-card-text"></i>
        </span>

        <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion', $producto->descripcion ?? '') }}" placeholder="Descripción del producto" required>

        <div class="invalid-feedback">
            Por favor agregue una descripción para el producto.
        </div>

        <div class="valid-feedback">
            Dato Correcto..!!
        </div>
    </div>

</div>


<div class="col-md-6">

    <label class="form-label">Categoría</label>

    <div class="input-group has-validation">

        <span class="input-group-text">
            <i class="bi bi-tags"></i>
        </span>

        <select class="form-select" name="categoria" required>

            <option disabled value="">Seleccione una categoría...</option>

            <option value="Electrónica" {{ old('categoria', $producto->categoria ?? '') == 'Electrónica' ? 'selected' : '' }}>
                Electrónica
            </option>

            <option value="Ropa" {{ old('categoria', $producto->categoria ?? '') == 'Ropa' ? 'selected' : '' }}>
                Ropa
            </option>

        </select>

        <div class="invalid-feedback">
            Por favor seleccione una categoría.
        </div>

        <div class="valid-feedback">
            Dato Correcto..!!
        </div>
    </div>
</div>
