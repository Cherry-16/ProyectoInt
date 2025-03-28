@extends('layouts.navprincipal')

@section('titulo', 'Mi Perfil')

@section('estilos')
<style>
    .profile-section {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }
    .form-control:focus {
        border-color: #457B9D;
        box-shadow: 0 0 0 0.2rem rgba(69, 123, 157, 0.25);
    }
    .edit-form {
        display: none;
    }
    .profile-info {
        padding: 20px;
    }
    .profile-info p {
        margin-bottom: 10px;
        font-size: 1.1em;
    }
    .profile-label {
        font-weight: bold;
        color: #457B9D;
    }
    .profile-info img {
        border: 4px solid #457B9D;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    .profile-info img:hover {
        transform: scale(1.05);
    }
    .btn-danger {
        background-color: #e63946;
        border-color: #e63946;
        transition: all 0.3s ease;
    }
    .btn-danger:hover {
        background-color: #dc2f3d;
        border-color: #dc2f3d;
        transform: translateY(-2px);
    }
</style>
@endsection

@section('contenido')
<main class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3>Mi Perfil</h3>
                    <button class="btn btn-primary" onclick="toggleEditForm()">
                        <i class="fas fa-edit"></i> Editar Perfil
                    </button>
                </div>

                <!-- Información estática -->
                <div class="profile-info" id="profileInfo">
                    <div class="text-center mb-4">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" 
                                 class="rounded-circle mb-3" 
                                 style="width: 150px; height: 150px; object-fit: cover;"
                                 alt="Avatar">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff&size=150&bold=true" 
                                 class="rounded-circle mb-3"
                                 style="width: 150px; height: 150px; object-fit: cover;"
                                 alt="Avatar">
                        @endif
                    </div>
                    <p><span class="profile-label">Nombre:</span> {{ $user->name }}</p>
                    <p><span class="profile-label">Correo:</span> {{ $user->email }}</p>
                    
                    <!-- Agregar el botón de cerrar sesión -->
                    <div class="text-center mt-4">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Formulario de edición (oculto por defecto) -->
                <div class="edit-form" id="editForm">
                    <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Avatar actual y subida -->
                        <div class="mb-4 text-center">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" 
                                     class="rounded-circle mb-3" 
                                     style="width: 150px; height: 150px; object-fit: cover;"
                                     alt="Avatar">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff&size=150&bold=true" 
                                     class="rounded-circle mb-3"
                                     style="width: 150px; height: 150px; object-fit: cover;"
                                     alt="Avatar">
                            @endif
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Cambiar foto de perfil</label>
                                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                                @error('avatar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" 
                                   placeholder="Dejar en blanco para mantener la actual">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <button type="button" class="btn btn-secondary" onclick="toggleEditForm()">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script>
function toggleEditForm() {
    const profileInfo = document.getElementById('profileInfo');
    const editForm = document.getElementById('editForm');
    
    if (editForm.style.display === 'none' || editForm.style.display === '') {
        profileInfo.style.display = 'none';
        editForm.style.display = 'block';
    } else {
        profileInfo.style.display = 'block';
        editForm.style.display = 'none';
    }
}
</script>
@endsection