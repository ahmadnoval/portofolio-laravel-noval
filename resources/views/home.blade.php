<!DOCTYPE html>
<html>
<head>
    <title>Portofolio Ahmad Noval</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">

        <h1 class="text-4xl font-bold mb-4">
            Ahmad Noval Fahmi
        </h1>

        <p class="mb-8">
            Backend Developer | Laravel | NodeJS
        </p>

        <!-- Projects -->
        <h2 class="text-2xl font-semibold mb-4">Projects</h2>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-bold text-lg">{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>
                    @if($project->link)
                        <a href="{{ $project->link }}" 
                           class="text-blue-500">Lihat Project</a>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Contact -->
        <h2 class="text-2xl font-semibold mt-12 mb-4">Contact</h2>

        @if(session('success'))
            <div class="bg-green-200 p-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/contact">
            @csrf
            <input type="text" name="name" 
                   placeholder="Nama"
                   class="w-full p-2 mb-3 border rounded">

            <input type="email" name="email"
                   placeholder="Email"
                   class="w-full p-2 mb-3 border rounded">

            <textarea name="message"
                      placeholder="Pesan"
                      class="w-full p-2 mb-3 border rounded"></textarea>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Kirim
            </button>
        </form>

    </div>

</body>
</html>