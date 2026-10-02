@extends('layouts.app')

@section('content')
<div class="py-5 rounded-4" style="background-color: #f4f6f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    
                    <div class="card-header text-white text-center py-4" style="background-color: #39A900; border-bottom: none;">
                        <h4 class="mb-0 fw-bold">Actualizar Aprendiz</h4>
                        <p class="mb-0 mt-1 small opacity-75">Modifique la información y asignaciones del estudiante</p>
                    </div>
                    
                    <div class="card-body p-4 p-md-5 bg-white">
                        <form action="{{ route('apprentice.update', $apprentice) }}" method="POST">
                            @csrf
                            @method('put')

                            <div class="mb-4">
                                <label for="name" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Nombre Completo</label>
                                <input type="text" 
                                        id="name"
                                        name="name" 
                                        class="form-control form-control-lg bg-light border-0 rounded-3 text-dark fw-medium" 
                                        value="{{ old('name', $apprentice->name) }}" 
                                        required>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Correo Electrónico</label>
                                <input type="email" 
                                        id="email"
                                        name="email" 
                                        class="form-control form-control-lg bg-light border-0 rounded-3 text-dark fw-medium" 
                                        value="{{ old('email', $apprentice->email) }}" 
                                        required>
                            </div>

                            <div class="mb-4">
                                <label for="cell_number" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Número de Teléfono</label>
                                <input type="number" 
                                        id="cell_number"
                                        name="cell_number" 
                                        class="form-control form-control-lg bg-light border-0 rounded-3 text-dark font-monospace" 
                                        value="{{ old('cell_number', $apprentice->cell_number) }}" 
                                        required>
                            </div>

                            <div class="mb-4">
                                <label for="course_id" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Ficha de Curso Vincular</label>
                                <select name="course_id" id="course_id" class="form-select form-select-lg bg-light border-0 rounded-3 text-dark fw-medium" required>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ old('course_id', $apprentice->course_id) == $course->id ? 'selected' : '' }}>
                                            {{ $course->course_number }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="computer_id" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Computador Coasociado</label>
                                <select name="computer_id" id="computer_id" class="form-select form-select-lg bg-light border-0 rounded-3 text-dark fw-medium" required>
                                    @foreach($computers as $computer)
                                        <option value="{{ $computer->id }}" {{ old('computer_id', $apprentice->computer_id) == $computer->id ? 'selected' : '' }}>
                                            Equipo N° {{ $computer->number }}
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
                                    Actualizar Aprendiz
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