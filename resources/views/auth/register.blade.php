<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - RegeneraMyPE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/maicons.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 30px 0;
        }
        .register-container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
        }
        .register-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .register-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .register-header img {
            width: 70px;
            height: 70px;
            margin-bottom: 12px;
            background: white;
            padding: 8px;
            border-radius: 50%;
        }
        .register-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .register-header p {
            margin: 5px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }
        .register-body {
            padding: 35px 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
            display: block;
            font-size: 14px;
        }
        .form-control, .form-select {
            height: 48px;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            padding: 10px 15px;
            font-size: 15px;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .form-control.is-invalid, .form-select.is-invalid {
            border-color: #dc3545;
        }
        .input-group {
            position: relative;
        }
        .input-group-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
        }
        .input-group .form-control, .input-group .form-select {
            padding-left: 45px;
        }
        .btn-register {
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        .register-footer {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
        }
        .register-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        .register-footer a:hover {
            text-decoration: underline;
        }
        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .invalid-feedback {
            font-size: 13px;
            margin-top: 5px;
        }
        .password-hint {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="register-card">
        <div class="register-header">
            <img src="{{ asset('assets/img/icons/logo.png') }}" alt="RegeneraMyPE">
            <h2>Regenera<span style="font-weight: 300;">MyPE</span></h2>
            <p>Crear Cuenta Nueva</p>
        </div>

        <div class="register-body">
            <!-- Mensajes de error -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <span class="mai-close-circle"></span>
                    <ul class="mb-0 pl-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div class="form-group">
                    <label for="name">
                        <span class="mai-person"></span> Nombre Completo
                    </label>
                    <div class="input-group">
                        <span class="input-group-icon mai-person"></span>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}" 
                               placeholder="Juan Pérez"
                               required 
                               autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">
                        <span class="mai-mail"></span> Correo Electrónico
                    </label>
                    <div class="input-group">
                        <span class="input-group-icon mai-mail"></span>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email') }}" 
                               placeholder="tu@email.com"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Rol -->
                <div class="form-group">
                    <label for="role">
                        <span class="mai-shield"></span> Rol
                    </label>
                    <div class="input-group">
                        <span class="input-group-icon mai-shield"></span>
                        <select name="role" 
                                id="role" 
                                class="form-control @error('role') is-invalid @enderror" 
                                required>
                            <option value="">Seleccionar rol...</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                            <option value="auxiliar" {{ old('role') == 'auxiliar' ? 'selected' : '' }}>Auxiliar</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">
                        <span class="mai-lock"></span> Contraseña
                    </label>
                    <div class="input-group">
                        <span class="input-group-icon mai-lock"></span>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               placeholder="••••••••"
                               required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <small class="password-hint">Mínimo 8 caracteres</small>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">
                        <span class="mai-lock"></span> Confirmar Contraseña
                    </label>
                    <div class="input-group">
                        <span class="input-group-icon mai-lock"></span>
                        <input type="password" 
                               name="password_confirmation" 
                               id="password_confirmation" 
                               class="form-control" 
                               placeholder="••••••••"
                               required>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-register">
                    <span class="mai-person-add"></span> Crear Cuenta
                </button>
            </form>
        </div>

        <div class="register-footer">
            <p class="mb-0">
                ¿Ya tienes cuenta? 
                <a href="{{ route('login') }}">Iniciar Sesión</a>
            </p>
            <p class="mt-2 mb-0">
                <a href="{{ route('home') }}">
                    <span class="mai-arrow-back"></span> Volver al sitio web
                </a>
            </p>
        </div>
    </div>

    <div class="text-center mt-3">
        <p style="color: white; font-size: 13px;">
            © {{ date('Y') }} Universidad Politécnica de Puebla
        </p>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>