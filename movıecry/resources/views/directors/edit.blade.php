<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Director') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-5">
                    <form action="{{ route('directors.update', $director->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 form-floating mb-3">
                            <input value="{{ $director->name }}" type="text" name="name" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">Name</label>
                        </div>
                        <div class="col-md-6 form-floating mb-3">
                            <input value="{{ $director->nationality }}" type="text" name="nationality" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">Nationality</label>
                        </div>
                        <div class="col-md-6 form-floating mb-3">
                            <input value="{{ $director->birthday }}" type="text" name="birthday" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">Birthday</label>
                        </div>
                        <div class="col-md-12 form-floating mb-3">
                            <textarea name="biography" class="form-control" id="floatingInput" style="height: 200px">{{ $director->biography }}</textarea>
                            <label class="ms-2" for="floatingInput">Biography</label>
                        </div>
                        <div class="col-md-12 form-floating">
                            <input value="{{ $director->image }}" type="file" name="image" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">Image</label>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-3">Save</button>
                            <a href="{{ route('directors.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>