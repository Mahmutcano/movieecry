<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <a type="button" href="{{ route('actors.create') }}" class=" my-3 btn btn-primary">Create</a>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">NATIONATILY</th>
                                <th scope="col">BIRTHDAY</th>
                                <th scope="col">IMAGE</th>
                                <th class="text-center" scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actors as $actor)
                            <tr>
                                <td scope="row">{{ $actor->id }}</td>
                                <td scope="row">{{ $actor->name }}</td>
                                <td scope="row">{{ $actor->nationality }}</td>
                                <td scope="row">{{ $actor->birthday }}</td>
                                <td scope="row">
                                    <img src="/images/{{ $actor->image }}" width="10%">
                                </td>
                                <td scope="row">
                                    <div class="d-flex justify-content-center">
                                        <a class="me-2 btn btn-primary" href="{{ route('actors.edit', $actor->id) }}">Edit</a>
                                        <form action="{{ route('actors.destroy', $actor->id) }}" method="POST" class="deleteForm">
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
                        {!! $actors->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>