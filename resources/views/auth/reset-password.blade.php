<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - RegeneraMyPE</title>
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
        .reset-container {
            max-width: 450px;
            width: 100%;
            padding: 20px;
        }
        .reset-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .reset-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .reset-header .icon-circle {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .reset-header .icon-circle span {
            font-size: 40px;
            color: #667eea;
        }
        .reset-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .reset-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }
        .reset-body {
            padding: 40px 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
        }
        .form-control {
            height: 50px;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            padding: 10px 15px;
            font-size: 15px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .form-control.is-invalid {
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
        .input-group .form-control {
            padding-left: 45px;
        }
        .btn-reset {
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
        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        .reset-footer {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
        }
        .reset-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        .reset-footer a:hover {
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

<div class="reset-container">
    <div class="reset-card">
        <div class="reset-header">
            <div class="icon-circle">
                <span class="mai-lock"></span>
            </div>
            <h2>Restablecer Contraseña</h2>
            <p>Ingresa tu nueva contraseña</p>
        </div>

        <div class="reset-body">
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

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Token oculto -->
                <input type="hidden" name="token" value="{{ $token }}">

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
                               value="{{ $email ?? old('email') }}" 
                               placeholder="tu@email.com"
                               required 
                               autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Nueva Contraseña -->
                <div class="form-group">
                    <label for="password">
                        <span class="mai-lock"></span> Nueva Contraseña
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

                <!-- Confirmar Contraseña -->
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
                <button type="submit" class="btn btn-reset">
                    <span class="mai-checkmark"></span> Restablecer Contraseña
                </button>
            </form>
        </div>

        <div class="reset-footer">
            <p class="mb-0">
                <a href="{{ route('login') }}">
                    <span class="mai-arrow-back"></span> Volver al inicio de sesión
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