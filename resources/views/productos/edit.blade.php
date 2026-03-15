@extends('layouts.app')

@section('title','Editar Producto')

@section('content')

<div class="card shadow-sm w-75 mx-auto">
    <div class="card-body p-4">
        <h3 class="mb-4">
            <i class="bi bi-box-seam me-2"></i>
            Editar Producto
        </h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form class="row g-4 needs-validation" novalidate method="POST" action="{{ route('productos.update',$producto->id) }}">
            @csrf
            @method('PUT')
            @include('productos.form')

            <div class="col-12 pt-3 d-flex justify-content-between">
                <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>
                    Regresar
                </a>
                <button class="btn btn-primary">
                    <i class="bi bi-floppy2 me-1"></i>
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
