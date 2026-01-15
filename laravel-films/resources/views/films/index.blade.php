<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🎬 Film Library
        </h2>
    </x-slot>

    <!-- ADD FILM FORM -->
    <div class="bg-white p-4 rounded shadow mb-6">
        <form method="POST" action="{{ route('films.store') }}" class="space-y-3">
            @csrf

            <div>
                <input type="text" name="title" placeholder="Film title"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <input type="text" name="genre" placeholder="Genre"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <input type="number" name="year" placeholder="Year"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <textarea name="description" placeholder="Film description"
                          class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <div>
                <input type="url" name="image" placeholder="Image URL (poster)"
                       class="w-full border rounded px-3 py-2">
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                ➕ Add Film
            </button>
        </form>
    </div>

    <!-- FILMS LIST -->
    <div class="py-6 max-w-4xl mx-auto">
        @if($films->isEmpty())
            <p class="mt-4 text-sm text-gray-500">
                Няма добавени филми.
            </p>
        @else
            <ul class="mt-4 space-y-4">
                @foreach($films as $film)
                    <li class="p-4 border rounded flex justify-between items-start
                        {{ $film->watched ? 'bg-green-50' : '' }}">

                        <!-- FILM INFO -->
                        <div class="flex gap-4">
                            @if($film->image)
                                <img src="{{ $film->image }}"
                                     class="w-24 h-36 object-cover rounded shadow">
                            @endif

                            <div>
                                <h3 class="text-lg font-semibold">
                                    {{ $film->title }}
                                </h3>

                                <p class="text-sm text-gray-600">
                                    ({{ $film->year }}) – {{ $film->genre }}
                                </p>

                                @if($film->description)
                                    <p class="mt-2 text-sm text-gray-700">
                                        {{ $film->description }}
                                    </p>
                                @endif

                                @if($film->watched)
                                    <span class="inline-block mt-2 text-green-600 text-sm">
                                        ✔ Гледан
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- ACTIONS -->
                        <div class="flex gap-2">
                            <form method="POST" action="{{ route('films.update', $film) }}">
                                @csrf
                                @method('PATCH')
                                <button class="text-blue-600 text-sm">
                                    Toggle
                                </button>
                            </form>

                            <form method="POST" action="{{ route('films.destroy', $film) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 text-sm">
                                    ✖ Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
