<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <a type="button" href="{{ route('movies.create') }}" class=" my-3 btn btn-primary">Create</a>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">RATE</th>
                                <th scope="col">DIRECTOR</th>
                                <th scope="col">DESC</th>
                                <th scope="col">FİLM</th>
                                <th scope="col">START</th>
                                <th scope="col">END</th>
                                <th scope="col">AGE</th>
                                <th scope="col">SEASSON</th>
                                <th scope="col">POSTER</th>
                                <th scope="col">VİDEO</th>
                                <th scope="col">POSTER</th>
                                <th scope="col">FRAGMAN</th>
                                <th scope="col">FİLM</th>
                                <th scope="col">GENRES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie)
                            <tr>
                                <td scope="row">{{ $movie->id }}</td>
                                <td scope="row">{{ $movie->mov_title }}</td>
                                <td scope="row">{{ $movie->mov_rate }}</td>
                                <td scope="row">{{ $movie->director->name }}</td>
                                <td scope="row">{{ $movie->desc }}</td>
                                <td scope="row">{{ $movie->mov_startime }}</td>
                                <td scope="row">{{ $movie->mov_endtime }}</td>
                                <td scope="row">{{ $movie->mov_old }}</td>
                                <td scope="row">{{ $movie->sesson }}</td>
                                <td scope="row">
                                    <img src="/images/{{ $movie->poster }}" width="23%">
                                </td>
                                <td scope="row">
                                    <img src="/videos/{{ $movie->video }}" width="23%">
                                </td>
                                <td scope="row">
                                    <img src="/videos/{{ $movie->mov_lınk }}" width="23%">
                                </td>
                                <td scope="row">
                                    @foreach($movie->genres as $genre)
                                        {{ $genre->name }}
                                    @endforeach
                                </td>
                                <td scope="row">
                                    <div class="d-flex justify-content-center">
                                        <a class="me-2 btn btn-primary" href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mb-3">
                        {!! $movies->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

