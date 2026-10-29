@extends('layouts.app')

@section('content')

<div class="py-4">
    <div class="container">

        <div class="mb-4">
            <h2 class="fw-bold">Editar Ficha</h2>
            <p class="text-muted">
                Actualiza la información de la ficha.
            </p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form action="{{ route('ficha.update', data_get($ficha, 'id')) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Código de la ficha
                        </label>

                        <input type="text"
                               name="code"
                               class="form-control"
                               value="{{ old('code', data_get($ficha, 'code')) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Fecha de inicio
                        </label>

                        <input type="date"
                               name="start_date"
                               class="form-control"
                               value="{{ old('start_date', data_get($ficha, 'start_date')) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Horario
                        </label>

                        <select name="schedule" class="form-select" required>

                            <option value="Mañana"
                                {{ data_get($ficha, 'schedule') == 'Mañana' ? 'selected' : '' }}>
                                Mañana
                            </option>

                            <option value="Tarde"
                                {{ data_get($ficha, 'schedule') == 'Tarde' ? 'selected' : '' }}>
                                Tarde
                            </option>

                            <option value="Noche"
                                {{ data_get($ficha, 'schedule') == 'Noche' ? 'selected' : '' }}>
                                Noche
                            </option>

                            <option value="Mixta"
                                {{ data_get($ficha, 'schedule') == 'Mixta' ? 'selected' : '' }}>
                                Mixta
                            </option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            Oferta
                        </label>

                        <select name="oferta_id" class="form-select" required>

                            @foreach($ofertas as $oferta)

                                <option value="{{ data_get($oferta, 'id') }}"
                                    {{ data_get($ficha, 'oferta_id') == data_get($oferta, 'id') ? 'selected' : '' }}>

                                    {{ data_get($oferta, 'jornada') }}
                                    -
                                    {{ data_get($oferta, 'programa.name') ?? 'Sin programa' }}

                                </option>

                            @endforeach

                        </select>
                    </div>

                    <a href="{{ route('ficha.index') }}"
                       class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit"
                            class="btn btn-success">
                        Actualizar Ficha
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection