<x-template>
    @section('main-content')
        <h1 class="text-center page-title">Genre: {{ $genre->name }}</h1>
        <div class="my-4 container d-flex">
            <div class="row">
                @foreach($movies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach
            </div>
        </div>
    @endsection
</x-template>
