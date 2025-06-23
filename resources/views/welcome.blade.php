<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager - Bienvenido</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        /* Variables de colores */
        :root {
            --dark-bg: #121212;
            --darker-bg: #0d0d0d;
            --dark-card: #1e1e1e;
            --darker-card: #1a1a1a;
            --primary-text: #e0e0e0;
            --secondary-text: #a0a0a0;
            --accent-blue: #3498db;
            --accent-green: #2ecc71;
            --accent-yellow: #f1c40f;
            --accent-red: #e74c3c;
            --accent-orange: #f39c12;
            --border-dark: #2a2a2a;
            --hover-bg: #2a2a2a;
            --shadow-dark: rgba(0, 0, 0, 0.4);
            --shadow-light: rgba(255, 255, 255, 0.05);
        }

        /* Animaciones clave */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
            }

            50% {
                box-shadow: 0 0 25px rgba(52, 152, 219, 0.8);
            }

            100% {
                box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
            }
        }

        /* Estilos Generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Figtree', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: var(--primary-text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            animation: fadeIn 1s ease-out;
        }

        /* Header */
        header {
            width: 100%;
            max-width: 1200px;
            display: flex;
            justify-content: flex-end;
            padding: 20px 0;
            margin-bottom: 50px;
        }

        nav {
            display: flex;
            gap: 15px;
        }

        nav a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .login-btn {
            color: var(--primary-text);
            border: 1px solid var(--border-dark);
        }

        .login-btn:hover {
            background-color: rgba(52, 73, 94, 0.5);
            border-color: var(--accent-blue);
        }

        .register-btn {
            background: linear-gradient(135deg, var(--accent-blue), #2980b9);
            color: white;
            border: none;
        }

        .register-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Contenido Principal */
        .welcome-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            width: 100%;
            max-width: 800px;
            text-align: center;
            padding: 40px 20px;
        }

        .welcome-title {
            font-size: 3.5rem;
            margin-bottom: 20px;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: slideIn 0.8s ease-out;
        }

        .welcome-subtitle {
            font-size: 1.5rem;
            margin-bottom: 40px;
            color: var(--secondary-text);
            animation: slideIn 1s ease-out;
        }

        .feature-card {
            background: var(--dark-card);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 10px 30px var(--shadow-dark);
            border: 1px solid var(--border-dark);
            max-width: 600px;
            width: 100%;
            margin-bottom: 30px;
            animation: slideIn 1.2s ease-out;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #3498db, #2ecc71, #f1c40f, #e74c3c);
            z-index: -1;
            border-radius: 18px;
            animation: glow 3s linear infinite;
        }

        .card-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--primary-text);
        }

        .card-content {
            font-size: 1.1rem;
            line-height: 1.6;
            color: var(--secondary-text);
            margin-bottom: 30px;
        }

        .card-button {
            background: linear-gradient(135deg, var(--accent-green), #27ae60);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            animation: float 3s ease-in-out infinite;
        }

        .card-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(46, 204, 113, 0.5);
            animation: none;
        }

        /* Características */
        .features-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            width: 100%;
            max-width: 1200px;
            margin-top: 60px;
            animation: slideIn 1.4s ease-out;
        }

        .feature {
            background: rgba(30, 30, 30, 0.7);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            border: 1px solid var(--border-dark);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--accent-blue);
        }

        .feature-title {
            font-size: 1.4rem;
            margin-bottom: 15px;
            color: var(--primary-text);
        }

        .feature-description {
            font-size: 1rem;
            color: var(--secondary-text);
        }

        /* Footer */
        footer {
            margin-top: 80px;
            padding: 20px;
            text-align: center;
            color: var(--secondary-text);
            font-size: 0.9rem;
            width: 100%;
            border-top: 1px solid var(--border-dark);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .welcome-title {
                font-size: 2.5rem;
            }

            .welcome-subtitle {
                font-size: 1.2rem;
            }

            .card-title {
                font-size: 2rem;
            }

            .feature-card {
                padding: 30px;
            }
        }

        @media (max-width: 480px) {
            nav {
                width: 100%;
                justify-content: center;
            }

            .welcome-title {
                font-size: 2rem;
            }

            .welcome-subtitle {
                font-size: 1rem;
            }

            .feature-card {
                padding: 20px;
            }

            .card-title {
                font-size: 1.6rem;
            }

            .features-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header>
        @if (Route::has('login'))
            <nav>
                @auth
                    <a href="{{ url('/task') }}" class="login-btn">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="login-btn">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="register-btn">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="welcome-container">
        <h1 class="welcome-title">Task Manager</h1>
        <p class="welcome-subtitle">Organiza tus tareas de manera eficiente</p>

        <div class="feature-card">
            <h2 class="card-title">Crea tus propias tareas</h2>
            <p class="card-content">Comienza a organizar tu día a día con nuestra aplicación de gestión de tareas.
                Registrate ahora y disfruta de una experiencia sencilla y eficaz.</p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="card-button">Comenzar ahora</a>
            @else
                <a href="{{ route('login') }}" class="card-button">Comenzar ahora</a>
            @endif
        </div>

        <div class="features-container">
            <div class="feature">
                <div class="feature-icon">📝</div>
                <h3 class="feature-title">Creación Sencilla</h3>
                <p class="feature-description">Agrega nuevas tareas en segundos con nuestro sistema intuitivo.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">🗂️</div>
                <h3 class="feature-title">Organización</h3>
                <p class="feature-description">Clasifica tus tareas por categorías para una mejor gestión.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">🔔</div>
                <h3 class="feature-title">Recordatorios</h3>
                <p class="feature-description">Nunca olvides una tarea importante con nuestras alertas.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">📊</div>
                <h3 class="feature-title">Seguimiento</h3>
                <p class="feature-description">Monitorea tu progreso con estadísticas visuales.</p>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Task Manager. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
