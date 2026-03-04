<!DOCTYPE html>
<html>
<head>
    <title>Portofolio Ahmad Noval</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-8">

        <h1 class="text-4xl font-bold mb-4">
            Ahmad Noval Fahmi
        </h1>

        <p class="mb-8">
            Backend Developer | Laravel | NodeJS
        </p>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Deskripsi</label>
            <p>I am a full-stack web developer who graduated with a degree in information engineering. Experience working on projects through Independent Study in the Kampus Merdeka program, volunteering, 
            and collaborative projects. As an adaptable learner, I have successfully tackled various problem-solving challenges both individually and as part of a team.
            I am motivated to continue growing and contributing.Experience</p>
        </div>
                
        <!-- Projects -->
        <h2 class="text-2xl font-semibold mb-4">Projects</h2>

        <div class="mb-4">
            <a href="https://portofolio-ahmad-noval.vercel.app/" target="blank">Portofolio Ahmad Noval React JS</a>
        </div>
        <div class="mb-4">
            <a href="https://github.com/ahmadnoval/live-chat" target="blank">Live chat</a>
        </div>
        <div class="mb-4">
            <a href="https://github.com/ahmadnoval/project_medical" target="blank">Project medical</a>
        </div>
        <div class="mb-4">
            <a href="https://github.com/ahmadnoval/FE-REMEDIAL" target="blank">Project Campus</a>
        </div>
        <div class="mb-4">
            <a href="https://github.com/ahmadnoval/crud_ajax" target="blank">CRUD menggunakan Ajax</a>
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
</x-app-layout>
