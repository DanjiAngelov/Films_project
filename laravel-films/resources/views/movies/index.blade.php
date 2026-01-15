<x-app-layout>
<div class="max-w-3xl mx-auto py-6">
@foreach($movies as $movie)
<div class="border p-3 mb-2 flex justify-between">
<div>{{ $movie->title }} ({{ $movie->year }})</div>
<form method="POST" action="{{ route('movies.destroy',$movie) }}">
@csrf @method('DELETE')
<button class="text-red-600">✖</button>
</form>
</div>
@endforeach
</div>
</x-app-layout>
