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
                        Nuevo Computador
                    </h1>

                    <p class="text-muted mb-0">
                        Registra un nuevo computador en el sistema.
                    </p>

                </div>

            </div>

            <div class="bg-white shadow-sm rounded-3 px-4 py-3 text-center">

                <i class="bi bi-pc-display"
                    style="font-size: 28px; color: #39A900;"></i>

                <div class="small fw-bold text-muted mt-1">
                    COMPUTADORES
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

                        <i class="bi bi-pc-display" style="font-size: 28px;"></i>

                    </div>

                    <h2 class="fw-bold">
                        Crear computador
                    </h2>

                    <p class="text-white-50" style="line-height: 1.7;">
                        Registra los equipos tecnológicos utilizados
                        en los espacios de formación.
                    </p>


                    <div class="mt-4">

                        <div class="d-flex gap-3 mb-4">
                            <div class="fw-bold" style="color: #39A900;">01</div>

                            <div>
                                <div class="fw-bold">Identificación</div>
                                <small class="text-white-50">
                                    Registra el número del equipo.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-4">
                            <div class="fw-bold" style="color: #39A900;">02</div>

                            <div>
                                <div class="fw-bold">Marca</div>
                                <small class="text-white-50">
                                    Selecciona o escribe la marca.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="fw-bold" style="color: #39A900;">03</div>

                            <div>
                                <div class="fw-bold">Registro</div>
                                <small class="text-white-50">
                                    Guarda el equipo en el sistema.
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
                                    Información del computador
                                </h4>

                                <p class="text-muted mb-0 small">
                                    Completa los datos solicitados.
                                </p>

                            </div>

                            <i class="bi bi-three-dots"
                                style="font-size: 24px; color: #6c757d;"></i>

                        </div>

                    </div>


                    <form action="{{ route('computer.admin') }}" method="POST">

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


                            {{-- NÚMERO --}}
                            <div class="mb-4">

                                <label for="number" class="form-label fw-semibold">

                                    <i class="bi bi-hash me-2 text-success"></i>

                                    Número del computador

                                </label>

                                <input
                                    type="number"
                                    id="number"
                                    name="number"
                                    value="{{ old('number') }}"
                                    class="form-control form-control-lg @error('number') is-invalid @enderror"
                                    placeholder="Ej: 01"
                                    style="border-radius: 10px;"
                                >

                                @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                            {{-- MARCA --}}
                            <div class="mb-3">

                                <label for="brand" class="form-label fw-semibold">

                                    <i class="bi bi-laptop-fill me-2 text-success"></i>

                                    Marca

                                </label>

                                <input
                                    type="text"
                                    id="brand"
                                    name="brand"
                                    value="{{ old('brand') }}"
                                    class="form-control form-control-lg @error('brand') is-invalid @enderror"
                                    placeholder="Ej: Lenovo"
                                    style="border-radius: 10px;"
                                >

                                @error('brand')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="p-3 mt-4"
                                style="background: #eef8e9; border-radius: 10px;">

                                <div class="d-flex gap-2">

                                    <i class="bi bi-info-circle-fill text-success"></i>

                                    <small>
                                        Verifica el número y la marca del equipo
                                        antes de guardarlo.
                                    </small>

                                </div>

                            </div>

                        </div>


                        <div class="p-4 border-top d-flex justify-content-end gap-2">

                            <a href="{{ route('computer.index') }}"
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
                                Guardar computador

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