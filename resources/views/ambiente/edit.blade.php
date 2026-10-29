@extends('layouts.app')

@section('content')

<div class="py-4">

    <div class="container">

        <div class="mb-4">

            <h2 class="fw-bold">
                Editar Ambiente
            </h2>

            <p class="text-muted">
                Actualiza la información del ambiente.
            </p>

        </div>

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <form action="{{ route('ambiente.update', data_get($ambiente, 'id')) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Nombre del ambiente
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', data_get($ambiente, 'name')) }}"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Ubicación
                        </label>

                        <input type="text"
                               name="location"
                               class="form-control"
                               value="{{ old('location', data_get($ambiente, 'location')) }}"
                               required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Centro de Formación
                        </label>

                        <select name="training_center_id"
                                class="form-select"
                                required>

                            @foreach($trainingCenters as $trainingCenter)

                                <option value="{{ data_get($trainingCenter, 'id') }}"
                                    {{ data_get($ambiente, 'training_center_id') == data_get($trainingCenter, 'id') ? 'selected' : '' }}>

                                    {{ data_get($trainingCenter, 'name') }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <a href="{{ route('ambiente.index') }}"
                       class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit"
                            class="btn btn-success">
                        Actualizar Ambiente
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection