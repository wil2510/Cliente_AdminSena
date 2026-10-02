@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 mx-auto" style="max-width: 650px;">
        
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-1" style="color: #39a900;">Editar Sección #{{ $quienesSomos->id }}</h2>
            <p class="text-muted small">Modifica el contenido institucional del registro</p>
        </div>

        <form action="{{ route('quienes-somos.update', $quienesSomos->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Título -->
            <div class="form-floating mb-4">
                <input type="text" 
                    class="form-control @error('title') is-invalid @enderror" 
                    id="title" 
                    name="title" 
                    placeholder="Título" 
                    value="{{ old('title', $quienesSomos->title) }}" 
                    required>
                <label for="title" class="text-secondary fw-semibold">Título</label>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción / Contenido -->
            <div class="form-floating mb-4">
                <textarea class="form-control @error('description') is-invalid @enderror" 
                    id="description" 
                    name="description" 
                    placeholder="Descripción" 
                    style="height: 160px;" 
                    required>{{ old('description', $quienesSomos->description) }}</textarea>
                <label for="description" class="text-secondary fw-semibold">Descripción / Contenido</label>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botones de Acción -->
            <div class="d-flex justify-content-between align-items-center mt-4 pt-2">
                <a href="{{ route('quienes-somos.index') }}" class="btn btn-outline-secondary px-4 py-2 fw-medium rounded-3">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-dark px-4 py-2 fw-bold rounded-3 shadow-sm">
                    Actualizar Cambios
                </button>
            </div>
        </form>

    </div>
</div>
@endsection