@extends('layouts.PlantillaNavinicio')

@section('titulo', 'Registro')

@section('estilos')
<style>
    .form-container {
        background-color: #FFFFFF;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: auto;
    }
    .header-title {
        color: #1D3557;
    }
    .btn-primary {
        background-color: #457B9D;
        color: #FFFFFF;
    }
    .btn-primary:hover {
        background-color: #1D3557;
    }
    .btn-secondary {
        background-color: #A8DADC;
        color: #1D3557;
    }
    .btn-secondary:hover {
        background-color: #1D3557;
        color: #FFFFFF;
    }
    .form-group label {
        color: #1D3557;
    }
    .form-group input,
    .form-group select {
        border-color: #457B9D;
        box-shadow: none;
    }
    .form-group input:focus,
    .form-group select:focus {
        border-color: #1D3557;
        box-shadow: 0 0 5px #1D3557;
    }
</style>
@endsection

@section('contenido')
<div class="container mt-5">
    <div class="form-container">
        <h2 class="header-title text-center mb-4">Registro</h2>
        <form id="authForm" method="POST" action="">
            @csrf
            <!-- Nombre -->
            <div class="form-group mb-3">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre Completo" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- Correo -->
            <div class="form-group mb-3">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Correo Electrónico" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- Contraseña -->
            <div class="form-group mb-3">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
       
            <button type="submit" class="btn btn-primary w-100">Crear Cuenta</button>
        </form>
        <div class="mt-4 text-center">
            <button class="btn btn-secondary">
                <i class="fab fa-google me-2"></i> Google
            </button>
            <button class="btn btn-secondary mt-2">
                <i class="fab fa-facebook me-2"></i> Facebook
            </button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Aquí puedes agregar tu JavaScript personalizado
</script>
@endsection