<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción a Materias</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #f3e5f5, #e1f5fe, #e8f5e9, #fffde7);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .card {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 2rem auto;
            text-align: center;
        }

        #message {
            display: none;
        }

        .volver-home-btn {
            display: inline-block;
            background-color: #1a202c;
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .volver-home-btn:hover {
            background-color: #2d3748;
        }

        .materia-card {
            background-color: white;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            text-align: center;
            transition: transform 0.3s;
        }

        .materia-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="font-sans antialiased flex flex-col min-h-screen">

    <div class="card flex-grow">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Inscripción a Materias</h2>

        <div id="message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span id="message-text"></span>
        </div>

        <form id="inscripcion-form" class="mt-8">
            @csrf
            <div class="mb-4">
                <label for="materia_id" class="block text-gray-700 text-sm font-bold mb-2">Selecciona una materia:</label>
                <select id="materia_id" name="materia_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">-- Elige una materia --</option>
                    @foreach($materiasDisponibles as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-green-600 text-black font-bold py-2 px-4 rounded hover:bg-blue-700 transition">
                Inscribirme
            </button>
        </form>

        <h3 class="text-xl font-semibold text-gray-700 mt-6 mb-2">Materias en Curso</h3>
        <div id="materias-en-curso" class="flex flex-wrap justify-center gap-4">
            @forelse(Auth::user()->materias as $materia)
            <div class="materia-card">
                <span class="text-gray-700 font-bold">{{ $materia->nombre }}</span>
            </div>
            @empty
            <div class="text-gray-500">No estás inscrito en ninguna materia.</div>
            @endforelse
        </div>
    </div>

    <div class="w-full text-center py-4 bg-red-900 text-black flex justify-center items-center">
        <a href="{{ route('home') }}" class="volver-home-btn">Volver a Inicio</a>
    </div>

    <div class="w-full text-center mt-auto py-4 bg-blue-900 text-white">
        2025 © UTN - Todos los derechos reservados
    </div>

    <script>
        document.getElementById('inscripcion-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);
            const selectElement = document.getElementById('materia_id');
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const materiaNombre = selectedOption.text;

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const messageDiv = document.getElementById('message');
                    const messageText = document.getElementById('message-text');
                    const materiasList = document.getElementById('materias-en-curso');

                    if (data.success) {
                        messageDiv.style.display = 'block';
                        messageText.textContent = '¡Te has inscrito a ' + materiaNombre + ' con éxito!';
                        messageDiv.classList.remove('bg-red-100', 'border-red-400', 'text-red-700');
                        messageDiv.classList.add('bg-green-100', 'border-green-400', 'text-green-700');

                        // Limpia el mensaje de "No estás inscrito" si existe
                        if (materiasList.querySelector('.text-gray-500')) {
                            materiasList.innerHTML = '';
                        }

                        // Crea la nueva tarjeta para la materia inscrita
                        const newCard = document.createElement('div');
                        newCard.classList.add('materia-card');
                        const newSpan = document.createElement('span');
                        newSpan.classList.add('text-gray-700', 'font-bold');
                        newSpan.textContent = materiaNombre;
                        newCard.appendChild(newSpan);
                        materiasList.appendChild(newCard);

                        form.reset();
                    } else {
                        messageDiv.style.display = 'block';
                        messageText.textContent = data.message || 'Error al inscribir la materia.';
                        messageDiv.classList.remove('bg-green-100', 'border-green-400', 'text-green-700');
                        messageDiv.classList.add('bg-red-100', 'border-red-400', 'text-red-700');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    const messageDiv = document.getElementById('message');
                    const messageText = document.getElementById('message-text');
                    messageDiv.style.display = 'block';
                    messageText.textContent = 'Ocurrió un error inesperado.';
                    messageDiv.classList.remove('bg-green-100', 'border-green-400', 'text-green-700');
                    messageDiv.classList.add('bg-red-100', 'border-red-400', 'text-red-700');
                });
        });
    </script>
</body>

</html>