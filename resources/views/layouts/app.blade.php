<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin - RegeneraMyPE')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Colores personalizados - Negro en lugar de azul */
        .bg-primary { background-color: #1f2937; }
        .text-primary { color: #1f2937; }
        .border-primary { border-color: #1f2937; }
        .hover\:bg-primary-dark:hover { background-color: #111827; }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <span class="text-2xl font-bold">Regenera<span class="text-gray-900">MyPE</span></span>
                    </a>
                    <div class="hidden md:ml-10 md:flex md:space-x-8">
                        <a href="{{ route('admin.team.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.team.*') ? 'border-gray-900 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700' }} text-sm font-medium">
                            <i class="fas fa-users mr-2"></i> Equipo
                        </a>
                        <a href="{{ route('admin.publications.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.publications.*') ? 'border-gray-900 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700' }} text-sm font-medium">
                            <i class="fas fa-book mr-2"></i> Publicaciones
                        </a>
                        <a href="{{ route('admin.topics.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.topics.*') ? 'border-gray-900 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700' }} text-sm font-medium">
                            <i class="fas fa-lightbulb mr-2"></i> Temas de Interés
                        </a>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <!-- Usuario actual -->
                    <span class="text-gray-600 px-3 py-2 text-sm">
                        <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }}
                        @if(Auth::user()->isAdmin())
                            <span class="ml-2 px-2 py-1 bg-gray-900 text-white text-xs rounded">Admin</span>
                        @endif
                    </span>
                    
                    <a href="{{ route('home') }}" target="_blank" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-external-link-alt mr-1"></i> Ver Sitio
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="ml-3">
                        @csrf
                        <button type="submit" class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-sign-out-alt mr-1"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensajes de éxito/error -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Título de página -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">@yield('page-title')</h1>
            </div>

            <!-- Contenido -->
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500 text-sm">
                © {{ date('Y') }} Universidad Politécnica de Puebla · RegeneraMyPE
            </p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>