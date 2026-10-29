@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Detalles del Curso</h5>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $courses['id'] }}</p>
                    <p><strong>Código:</strong> {{ $courses['code'] }}</p>
                    <p><strong>Nombre:</strong> {{ $courses['name'] }}</p>
                    <p><strong>Área:</strong> {{ $courses['area.name'] ?? $courses['area_id'] ?? 'N/A' }}</p>
                    <p><strong>Centro de Formación:</strong> {{ $courses['training_center.name'] ?? $courses['trainingCenter.name'] ?? $courses['training_center_id'] ?? 'N/A' }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('course.index') }}" class="btn btn-secondary">Volver</a>
                    <a href="{{ route('course.edit', $courses['id']) }}" class="btn btn-warning text-white">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection