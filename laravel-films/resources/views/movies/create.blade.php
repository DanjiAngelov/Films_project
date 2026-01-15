<x-app-layout>
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-xl mb-4">➕ Добави филм</h1>

        <form method="POST" action="{{ route('movies.store') }}" class="space-y-3">
            @csrf

            <input name="title" placeholder="Заглавие" class="border p-2 w-full">

            <input name="year" placeholder="Година" class="border p-2 w-full">

            <input name="genre" placeholder="Жанр" class="border p-2 w-full">

            <textarea name="description" placeholder="Описание" class="border p-2 w-full"></textarea>

<button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
    ➕ Запази филм
</button>

        </form>
    </div>
</x-app-layout>
