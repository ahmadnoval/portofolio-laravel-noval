<x-app-layout>
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Data Portofolio</h1>

    <a href="{{ route('portofolio.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">
       Tambah Portofolio
    </a>

    <div class="grid grid-cols-3 gap-4 mt-6">
        @foreach($portofolios as $item)
        <div class="border p-4 rounded shadow">
            @if($item->image)
                <img src="{{ asset('storage/'.$item->image) }}"
                     class="h-40 w-full object-cover mb-2">
            @endif

            <h2 class="font-bold">{{ $item->title }}</h2>
            <p class="text-sm">{{ $item->description }}</p>

            <div class="mt-3 flex gap-2">
                <a href="{{ route('portofolio.edit', $item->id) }}"
                   class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>

                <form action="{{ route('portofolio.destroy', $item->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')   
                    <button class="bg-red-500 text-white px-2 py-1 rounded">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
</x-app-layout>