@extends('layouts.app')

@section('content')

<div class="py-5">
    <div class="container">

        <div class="mb-4">

            <h2 class="fw-bold text-dark">
                Editar Programa
            </h2>

            <p class="text-muted">
                Modifica la información del programa seleccionado.
            </p>

        </div>

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('programa.update', data_get($programa, 'id')) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        <div class="col-md-6">

                            <label class="form-label fw-bold">
                                Nombre del programa
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', data_get($programa, 'name')) }}"
                                   required>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label fw-bold">
                                Tipo de formación
                            </label>

                            <select name="type" class="form-select" required>

                                <option value="Técnico"
                                    {{ old('type', data_get($programa, 'type')) == 'Técnico' ? 'selected' : '' }}>
                                    Técnico
                                </option>

                                <option value="Tecnólogo"
                                    {{ old('type', data_get($programa, 'type')) == 'Tecnólogo' ? 'selected' : '' }}>
                                    Tecnólogo
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label fw-bold">
                                Duración
                            </label>

                            <div class="input-group">

                                <input type="number"
                                       name="duration"
                                       class="form-control"
                                       value="{{ old('duration', data_get($programa, 'duration')) }}"
                                       min="1"
                                       required>

                                <span class="input-group-text">
                                    meses
                                </span>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label fw-bold">
                                Área
                            </label>

                            <select name="area_id" class="form-select" required>

                                @foreach($areas as $area)

                                    <option value="{{ data_get($area, 'id') }}"
                                        {{ old('area_id', data_get($programa, 'area_id')) == data_get($area, 'id') ? 'selected' : '' }}>

                                        {{ data_get($area, 'name') }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-12">

                            <label class="form-label fw-bold">
                                Descripción
                            </label>

                            <textarea name="description"
                                      class="form-control"
                                      rows="4">{{ old('description', data_get($programa, 'description')) }}</textarea>

                        </div>

                    </div>

                    <div class="mt-4 d-flex gap-2">

                        <button type="submit" class="btn btn-success">
                            Actualizar Programa
                        </button>

                        <a href="{{ route('programa.index') }}"
                           class="btn btn-secondary">
                            Cancelar
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection