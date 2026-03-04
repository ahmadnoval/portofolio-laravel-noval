<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Portfolio</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">

<!-- NAVBAR -->
<nav class="bg-white shadow-md fixed w-full z-10">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-600">
            MyPortfolio
        </h1>
        <div>
            <a href="#projects" class="mx-3 hover:text-blue-500">Projects</a>
            <a href="#contact" class="mx-3 hover:text-blue-500">Contact</a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-center">
    <div>
        <h2 class="text-4xl md:text-6xl font-bold mb-6">
            Welcome to My Portfolio
        </h2>
        <p class="text-lg mb-8">
            I build modern web applications using Laravel & Tailwind CSS
        </p>
        <a href="#projects" 
           class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold shadow hover:bg-gray-200 transition">
           View My Work
        </a>
    </div>
</section>

<!-- PROJECT SECTION -->
<section id="projects" class="py-20 container mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-12">
        My Projects
    </h2>

    <div class="grid md:grid-cols-3 gap-8">
        @foreach($projects as $project)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-6">
                
                <h3 class="text-xl font-bold mb-3">
                    {{ $project->title }}
                </h3>

                <p class="text-gray-600 mb-4">
                    {{ $project->description }}
                </p>

                @if($project->link)
                    <a href="{{ $project->link }}" 
                       target="_blank"
                       class="text-blue-500 font-semibold hover:underline">
                        Lihat Project →
                    </a>
                @endif

            </div>
        @endforeach
    </div>
</section>

<!-- CONTACT -->
<section id="contact" class="bg-gray-100 py-16 text-center">
    <h2 class="text-3xl font-bold mb-6">Get In Touch</h2>
    <p class="mb-6 text-gray-600">
        Interested in working together? Let's connect!
    </p>
    <a href="mailto:novalahmad846@gmai.com"
       class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition">
       Contact Me
    </a>
</section>

<!-- FOOTER -->
<footer class="bg-gray-800 text-white text-center py-6">
    © {{ date('Y') }} MyPortfolio. All Rights Reserved.
</footer>

</body>
</html>