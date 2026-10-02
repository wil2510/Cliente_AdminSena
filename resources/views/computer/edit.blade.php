@extends('layouts.app')

@section('content')
<div class="py-5 rounded-4" style="background-color: #f4f6f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    
                    <div class="card-header text-white text-center py-4" style="background-color: #39A900; border-bottom: none;">
                        <h4 class="mb-0 fw-bold">Actualizar Computador</h4>
                        <p class="mb-0 mt-1 small opacity-75">Modifique el inventario y marca del equipo</p>
                    </div>
                    
                    <div class="card-body p-4 p-md-5 bg-white">
                        <form action="{{ route('computer.update', $computer) }}" method="POST">
                            @csrf
                            @method('put')

                            <div class="mb-4">
                                <label for="number" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Número de Computador</label>
                                <input type="number" 
                                    id="number"
                                    name="number" 
                                    class="form-control form-control-lg bg-light border-0 rounded-3 text-dark fw-bold" 
                                    placeholder="Ej: 105"
                                    value="{{ old('number', $computer->number) }}" 
                                    required>
                            </div>

                            <div class="mb-4">
                                <label for="brand" class="form-label text-muted small fw-bold text-uppercase tracking-wider">Marca / Fabricante</label>
                                <input type="text" 
                                    id="brand"
                                    name="brand" 
                                    class="form-control form-control-lg bg-light border-0 rounded-3 text-dark fw-medium" 
                                    placeholder="Ej: Lenovo, HP, Dell"
                                    value="{{ old('brand', $computer->brand) }}" 
                                    required>
                            </div>

                            <hr class="my-4 opacity-25">

                            <div class="d-flex justify-content-center align-items-center gap-2 mt-4">
                                <a href="{{ url()->previous() }}" class="btn btn-light border fw-bold px-4 py-2 rounded-3">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 rounded-3 shadow-sm" style="background-color: #39A900;">
                                    Actualizar Computador
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