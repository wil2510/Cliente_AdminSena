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
                    <p><strong>ID:</strong> {{ $course->id }}</p>
                    <p><strong>Código:</strong> {{ $course->code }}</p>
                    <p><strong>Nombre:</strong> {{ $course->name }}</p>
                    <p><strong>Área:</strong> {{ $course->area->name ?? 'N/A' }}</p>
                    <p><strong>Centro de Formación:</strong> {{ $course->trainingCenter->name ?? 'N/A' }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('course.index') }}" class="btn btn-secondary">Volver</a>
                    <a href="{{ route('course.edit', $course) }}" class="btn btn-warning text-white">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection