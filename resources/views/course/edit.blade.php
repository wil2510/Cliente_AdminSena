@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0">Editar Curso</h5>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('course.update', $course) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Curso</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $course->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="code" class="form-label">Código del Curso</label>
                            <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $course->code) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="area_id" class="form-label">Área</label>
                            <select name="area_id" id="area_id" class="form-select" required>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" {{ old('area_id', $course->area_id) == $area->id ? 'selected' : '' }}>
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="training_center_id" class="form-label">Centro de Formación</label>
                            <select name="training_center_id" id="training_center_id" class="form-select" required>
                                @foreach ($trainingCenters as $center)
                                    <option value="{{ $center->id }}" {{ old('training_center_id', $course->training_center_id) == $center->id ? 'selected' : '' }}>
                                        {{ $center->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar Curso</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection