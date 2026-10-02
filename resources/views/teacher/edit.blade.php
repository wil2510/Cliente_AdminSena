@extends('layouts.app')

@section('content')
<div class="py-5 rounded-4" style="background-color: #f4f6f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    
                    <div class="card-header text-white text-center py-4" style="background-color: #39A900; border-bottom: none;">
                        <h4 class="mb-0 fw-bold">Actualizar Instructor</h4>
                        <p class="mb-0 mt-1 small opacity-75">Modifique la vinculación y credenciales del docente</p>
                    </div>
                    
                    <div class="card-body p-4 p-md-5 bg-white">
                        <form action="{{ route('teacher.update', $teacher) }}" method="POST">
                            @csrf
                            @method('put')

                            <div class="mb-4">
                                <label for="name" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Nombre Completo</label>
                                <input type="text" 
                                        id="name"
                                        name="name" 
                                        class="form-control form-control-lg bg-light border-0 rounded-3 text-dark fw-medium" 
                                        value="{{ old('name', $teacher->name) }}" 
                                        required>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Correo Institucional</label>
                                <input type="email" 
                                        id="email"
                                        name="email" 
                                        class="form-control form-control-lg bg-light border-0 rounded-3 text-dark fw-medium" 
                                        value="{{ old('email', $teacher->email) }}" 
                                        required>
                            </div>

                            <div class="mb-4">
                                <label for="area_id" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Área de Especialidad</label>
                                <select name="area_id" id="area_id" class="form-select form-select-lg bg-light border-0 rounded-3 text-dark fw-medium" required>
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}" {{ old('area_id', $teacher->area_id) == $area->id ? 'selected' : '' }}>
                                            {{ $area->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="training_center_id" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Centro de Formación Adscrito</label>
                                <select name="training_center_id" id="training_center_id" class="form-select form-select-lg bg-light border-0 rounded-3 text-dark fw-medium" required>
                                    @foreach($trainingcenters as $trainingcenter)
                                        <option value="{{ $trainingcenter->id }}" {{ old('training_center_id', $teacher->training_center_id) == $trainingcenter->id ? 'selected' : '' }}>
                                            {{ $trainingcenter->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <hr class="my-4 opacity-25">

                            <div class="d-flex justify-content-center align-items-center gap-2 mt-4">
                                <a href="{{ url()->previous() }}" class="btn btn-light border fw-bold px-4 py-2 rounded-3">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 rounded-3 shadow-sm" style="background-color: #39A900;">
                                    Actualizar Instructor
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection