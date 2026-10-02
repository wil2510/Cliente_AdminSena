@extends('layouts.app')

@section('content')

<div style="background: #f6f8f7; min-height: 92vh; padding: 45px 0;">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="d-flex align-items-start gap-3">

                <div style="width: 6px; height: 70px; background: #39A900; border-radius: 10px;"></div>

                <div>

                    <div class="fw-bold text-uppercase"
                        style="color: #39A900; font-size: 13px; letter-spacing: 1px;">
                        Administración Académica
                    </div>

                    <h1 class="fw-bold mb-1">
                        Nuevo Aprendiz
                    </h1>

                    <p class="text-muted mb-0">
                        Registra un nuevo aprendiz en el sistema.
                    </p>

                </div>

            </div>

            <div class="bg-white shadow-sm rounded-3 px-4 py-3 text-center">

                <i class="bi bi-person-badge-fill"
                    style="font-size: 28px; color: #39A900;"></i>

                <div class="small fw-bold text-muted mt-1">
                    APRENDICES
                </div>

            </div>

        </div>


        <div class="row g-4">

            <div class="col-lg-5">

                <div class="h-100 p-4 p-lg-5 text-white"
                    style="
                        background: linear-gradient(145deg, #17202a 0%, #263746 100%);
                        border-radius: 18px;
                    ">

                    <div class="d-flex align-items-center justify-content-center mb-4"
                        style="
                            width: 60px;
                            height: 60px;
                            background: #39A900;
                            border-radius: 15px;
                        ">

                        <i class="bi bi-person-badge-fill" style="font-size: 28px;"></i>

                    </div>

                    <h2 class="fw-bold">
                        Crear aprendiz
                    </h2>

                    <p class="text-white-50" style="line-height: 1.7;">
                        Registra la información de los aprendices
                        para facilitar la gestión académica.
                    </p>


                    <div class="mt-4">

                        <div class="d-flex gap-3 mb-4">
                            <div class="fw-bold" style="color: #39A900;">01</div>

                            <div>
                                <div class="fw-bold">Información personal</div>
                                <small class="text-white-50">
                                    Nombre, correo y celular.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-4">
                            <div class="fw-bold" style="color: #39A900;">02</div>

                            <div>
                                <div class="fw-bold">Formación</div>
                                <small class="text-white-50">
                                    Asocia el aprendiz a un curso.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="fw-bold" style="color: #39A900;">03</div>

                            <div>
                                <div class="fw-bold">Equipo</div>
                                <small class="text-white-50">
                                    Asigna un computador disponible.
                                </small>
                            </div>
                        </div>

                    </div>

                    <div class="border-top border-secondary mt-5 pt-4">
                        <small class="text-white-50">
                            Admin SENA · Gestión académica
                        </small>
                    </div>

                </div>

            </div>


            <div class="col-lg-7">

                <div class="bg-white shadow-sm h-100" style="border-radius: 18px;">

                    <div class="p-4 border-bottom">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h4 class="fw-bold mb-1">
                                    Información del aprendiz
                                </h4>

                                <p class="text-muted mb-0 small">
                                    Completa los datos solicitados.
                                </p>

                            </div>

                            <i class="bi bi-three-dots"
                                style="font-size: 24px; color: #6c757d;"></i>

                        </div>

                    </div>


                    <form action="{{ route('apprentice.admin') }}" method="POST">

                        @csrf

                        <div class="p-4">

                            @if ($errors->any())

                                <div class="alert alert-danger d-flex align-items-start gap-2">

                                    <i class="bi bi-exclamation-triangle-fill"></i>

                                    <div>

                                        <strong>Revisa la información:</strong>

                                        <ul class="mb-0 mt-1">

                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </ul>

                                    </div>

                                </div>

                            @endif


                            {{-- NOMBRE --}}
                            <div class="mb-4">

                                <label for="name" class="form-label fw-semibold">

                                    <i class="bi bi-person-fill me-2 text-success"></i>

                                    Nombre completo

                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    placeholder="Ej: Juan Pérez"
                                    style="border-radius: 10px;"
                                >

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="row">

                                {{-- EMAIL --}}
                                <div class="col-md-6 mb-4">

                                    <label for="email" class="form-label fw-semibold">

                                        <i class="bi bi-envelope-fill me-2 text-success"></i>

                                        Correo electrónico

                                    </label>

                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="correo@ejemplo.com"
                                        style="border-radius: 10px;"
                                    >

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>


                                {{-- CELULAR --}}
                                <div class="col-md-6 mb-4">

                                    <label for="cell_number" class="form-label fw-semibold">

                                        <i class="bi bi-phone-fill me-2 text-success"></i>

                                        Celular

                                    </label>

                                    <input
                                        type="text"
                                        id="cell_number"
                                        name="cell_number"
                                        value="{{ old('cell_number') }}"
                                        class="form-control form-control-lg @error('cell_number') is-invalid @enderror"
                                        placeholder="Ej: 3001234567"
                                        style="border-radius: 10px;"
                                    >

                                    @error('cell_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>


                            <div class="row">

                                {{-- CURSO --}}
                                <div class="col-md-6 mb-4">

                                    <label for="course_id" class="form-label fw-semibold">

                                        <i class="bi bi-journal-bookmark-fill me-2 text-success"></i>

                                        Curso

                                    </label>

                                    <select
                                        id="course_id"
                                        name="course_id"
                                        class="form-select form-select-lg @error('course_id') is-invalid @enderror"
                                        style="border-radius: 10px;"
                                    >

                                        <option value="">
                                            Selecciona
                                        </option>

                                        @foreach ($courses as $course)

                                            <option
                                                value="{{ $course->id }}"
                                                {{ old('course_id') == $course->id ? 'selected' : '' }}
                                            >
                                                {{ $course->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('course_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>


                                {{-- COMPUTADOR --}}
                                <div class="col-md-6 mb-4">

                                    <label for="computer_id" class="form-label fw-semibold">

                                        <i class="bi bi-pc-display me-2 text-success"></i>

                                        Computador

                                    </label>

                                    <select
                                        id="computer_id"
                                        name="computer_id"
                                        class="form-select form-select-lg @error('computer_id') is-invalid @enderror"
                                        style="border-radius: 10px;"
                                    >

                                        <option value="">
                                            Selecciona
                                        </option>

                                        @foreach ($computers as $computer)

                                            <option
                                                value="{{ $computer->id }}"
                                                {{ old('computer_id') == $computer->id ? 'selected' : '' }}
                                            >
                                                Computador {{ $computer->number }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('computer_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>


                            <div class="p-3 mt-2"
                                style="background: #eef8e9; border-radius: 10px;">

                                <div class="d-flex gap-2">

                                    <i class="bi bi-info-circle-fill text-success"></i>

                                    <small>
                                        Verifica los datos personales, curso y
                                        computador antes de registrar al aprendiz.
                                    </small>

                                </div>

                            </div>

                        </div>


                        <div class="p-4 border-top d-flex justify-content-end gap-2">

                            <a href="{{ route('apprentice.index') }}"
                                class="btn btn-light px-4">

                                <i class="bi bi-x-lg me-2"></i>
                                Cancelar

                            </a>

                            <button
                                type="submit"
                                class="btn btn-success px-4"
                                style="background: #39A900; border-color: #39A900;"
                            >

                                <i class="bi bi-check-lg me-2"></i>
                                Guardar aprendiz

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <div class="text-center mt-4">
            <small class="text-muted">
                Sistema de Administración Académica · SENA
            </small>
        </div>

    </div>
</div>

@endsection