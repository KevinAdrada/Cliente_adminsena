@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 30px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white p-4 shadow-sm"
                        style="background: linear-gradient(135deg, #2ecc71 0%, #00b646 100%); border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-white text-success rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                    style="width: 50px; height: 50px;">
                                    <i class="bi bi-pencil-square fs-3"></i>
                                </div>
                                <div>
                                    <h3 class="mb-0 fw-bold">Editar Administrador</h3>
                                    <p class="mb-0 text-white-50 small">Actualizar información del perfil</p>
                                </div>
                            </div>
                            <a href="{{ route('admin.index') }}"
                                class="btn btn-outline-light btn-sm fw-bold d-inline-flex align-items-center px-3 py-1 shadow-sm"
                                style="border-width: 2px; border-radius: 1rem;">
                                <i class="bi bi-arrow-left me-1"></i> Volver
                            </a>
                        </div>
                    </div>

                    <div class="card-body p-4 bg-light">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('admin.update', $admin['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card border-0 shadow-sm p-3 mb-4">
                                <h5 class="text-success fw-bold mb-3 border-bottom pb-2">
                                    <i class="bi bi-person-lines-fill me-2"></i> Información Personal y Fotografía
                                </h5>

                            

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Nombre Completo</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $admin['user']['name'] ?? '') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="documento" class="form-label fw-semibold">Número de Documento</label>
                                        <input type="text" name="documento" id="documento"
                                            class="form-control @error('documento') is-invalid @enderror"
                                            value="{{ old('documento', $admin['user']['documento'] ?? '') }}" required>
                                        @error('documento')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="celular" class="form-label fw-semibold">Celular</label>
                                        <input type="text" name="celular" id="celular"
                                            class="form-control @error('celular') is-invalid @enderror"
                                            value="{{ old('celular', $admin['user']['celular'] ?? '') }}" required>
                                        @error('celular')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm p-3 mb-4">
                                <h5 class="text-success fw-bold mb-3 border-bottom pb-2">
                                    <i class="bi bi-shield-lock-fill me-2"></i> Datos del Sistema y Cargo
                                </h5>

                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $admin['user']['email'] ?? '') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tipo_cargo" class="form-label fw-semibold">Tipo de Cargo</label>
                                        <select name="tipo_cargo" id="tipo_cargo"
                                            class="form-select @error('tipo_cargo') is-invalid @enderror" required>
                                            <option value="">Seleccione el tipo de cargo...</option>
                                            <option value="directivo"
                                                {{ old('tipo_cargo', $admin['tipo_cargo']) == 'directivo' ? 'selected' : '' }}>
                                                Directivo</option>
                                            <option value="subdirectivo"
                                                {{ old('tipo_cargo', $admin['tipo_cargo']) == 'subdirectivo' ? 'selected' : '' }}>
                                                Subdirectivo</option>
                                            <option value="coordinador"
                                                {{ old('tipo_cargo', $admin['tipo_cargo']) == 'coordinador' ? 'selected' : '' }}>
                                                Coordinador</option>
                                        </select>
                                        @error('tipo_cargo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label fw-semibold">Contraseña <span
                                                class="text-muted fw-normal small">(Opcional)</span></label>
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Dejar en blanco para mantener la actual">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                                <a href="{{ route('admin.index') }}" class="btn btn-secondary px-4 fw-semibold"
                                    style="border-radius: 0.5rem;">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-success px-4 fw-semibold shadow-sm"
                                    style="border-radius: 0.5rem; background-color: #2ecc71; border-color: #2ecc71;">
                                    Actualizar Administrador
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection