<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Genres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <a type="button" href="{{ route('genres.create') }}" class=" my-3 btn btn-primary">Create</a>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NAME</th>
                                <th class="text-center" scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($genres as $genre)
                            <tr>
                                <td scope="row">{{ $genre->id }}</td>
                                <td scope="row">{{ $genre->name }}</td>
                                <td scope="row">
                                    <div class="d-flex justify-content-center">
                                        <a class="me-2 btn btn-primary" href="{{ route('genres.edit', $genre->id) }}">Edit</a>
                                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="deleteForm">
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
                        {!! $genres->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
