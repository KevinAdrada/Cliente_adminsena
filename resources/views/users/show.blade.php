@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 30px; margin-bottom: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white p-4 shadow-sm"
                        style="background: linear-gradient(135deg, #2ecc71 0%, #00b646 100%); border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-white text-success rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                    style="width: 50px; height: 50px;">
                                    <i class="bi bi-person-badge-fill fs-3"></i>
                                </div>
                                <div>
                                    <span class="badge bg-white text-success text-uppercase mb-1 fw-bold small"
                                        style="border-radius: 1rem; padding: 0.25rem 0.6rem;">Ficha de Registro</span>
                                    <h3 class="mb-0 fw-bold">Detalles del Usuario</h3>
                                </div>
                            </div>
                            <a href="{{ route('user.index') }}"
                                class="btn btn-outline-light btn-sm fw-bold d-inline-flex align-items-center px-3 py-1 shadow-sm"
                                style="border-width: 2px; border-radius: 1rem;">
                                <i class="bi bi-arrow-left me-1"></i> Volver
                            </a>
                        </div>
                    </div>

                    <div class="card-body p-4 bg-light">
                        <div class="row align-items-center mb-4 text-center">
                            <div class="col-md-12">
                                <img src="{{ asset('images/default-user.png') }}" alt="Imagen del Usuario"
                                    class="img-fluid rounded-circle shadow-sm mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                                <h4 class="fw-bold text-dark mb-1">{{ $user['name'] }}</h4>
                                <span class="text-muted small"><i class="bi bi-envelope me-1"></i>{{ $user['email'] }}</span>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm p-4 mb-4">
                            <h5 class="text-success fw-bold mb-3 border-bottom pb-2">
                                <i class="bi bi-info-circle-fill me-2"></i> Información General
                            </h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded border-start border-success border-4 h-100">
                                        <span class="text-muted d-block text-uppercase fw-bold small mb-1">Documento de
                                            Identidad</span>
                                        <span class="text-dark fs-6 fw-semibold">{{ $user['documento'] }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded border-start border-success border-4 h-100">
                                        <span class="text-muted d-block text-uppercase fw-bold small mb-1">Celular /
                                            Teléfono</span>
                                        <span class="text-dark fs-6 fw-semibold">{{ $user['celular'] }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded border-start border-success border-4 h-100">
                                        <span class="text-muted d-block text-uppercase fw-bold small mb-2">Rol en el
                                            Sistema</span>
                                        <div>
                                            <span
                                                class="badge bg-success bg-opacity-10 text-success border border-success px-3 py-2 fw-semibold text-uppercase">
                                                <i class="bi bi-shield-lock-fill me-1"></i> {{ $user['rol'] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 pt-3 border-top">
                            <div><i class="bi bi-calendar-plus me-1 text-success"></i><strong>Creado:</strong>
                                {{ \Carbon\Carbon::parse($user['created_at'])->format('d/m/Y H:i') }}</div>
                            <div><i class="bi bi-arrow-clockwise me-1 text-success"></i><strong>Actualizado:</strong>
                                {{ \Carbon\Carbon::parse($user['updated_at'])->format('d/m/Y H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
