<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Movie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-5">
            @if (Session::has('messages'))
            <div class="alert alert-primary" role="alert">
                {{Session::get('messages')}}
            </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-primary" role="alert">
                    {{$error}}
                </div>
                @endforeach
            @endif
                    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        <div class="col-md-8 form-floating mb-3">
                            <input type="file" name="video" class="form-control" id="floatingInput"><br>
                            <label class="ms-2" for="floatingInput">FRAGMAN</label>
                        </div>
                        <div class="col-md-8 form-floating mb-3">
                            <input type="file" name="poster" class="form-control" id="floatingInput"><br>
                            <label class="ms-2" for="floatingInput">POSTER</label>
                        </div>
                        <div class="col-md-8 form-floating mb-3">
                            <input type="file" name="video" class="form-control" id="floatingInput"><br>
                            <label class="ms-2" for="floatingInput">FİLM</label>
                        </div>
                        <div class="col-md-8 form-floating mb-3">
                            <input type="text" name="title" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">Title</label>
                        </div>
                        <div class="col-md-4 form-floating mb-3">
                            <input type="text" name="year" class="form-control" id="floatingInput" placeholder="%">
                            <label class="ms-2" for="floatingInput">RATE</label>
                        </div>
                        <div class="col-md-6 form-floating mb-3">
                            <select class="form-select" name="director_id" id="floatingSelect">
                                @foreach($directors as $director)
                                    <option value="{{ $director->id }}">{{ $director->name }}</option>
                                @endforeach
                            </select>
                            <label class="ms-2" for="floatingSelect">DİRECTOR</label>
                        </div>
                        <div class="col-md-12 form-floating mb-3" style="padding: 0 14px;">
                            <p>GENRES</p>
                            @foreach ($genres as $genre)
                                <div class="form-check form-check-inline" style="margin-right: 8px">
                                    <input name="genres[]" class="form-check-input" type="checkbox" value="{{ $genre->id }}" id="inlineCheckbox1">
                                    <label class="form-check-label" for="inlineCheckbox1">
                                        {{ $genre->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 form-floating mb-3">
                            <textarea name="description" class="form-control" id="floatingInput" style="height: 50px"></textarea>
                            <label class="ms-2" for="floatingInput">DESC</label>
                        </div>
                        <div class="col-md-12 form-floating mb-3">
                            <textarea name="plot" class="form-control" id="floatingInput" style="height: 40px"></textarea>
                            <label class="ms-2" for="floatingInput">AGE LİMİT</label>
                        </div>
                        <div class="col-md-12 form-floating mb-3">
                            <textarea name="plot" class="form-control" id="floatingInput" style="height: 40px"></textarea>
                            <label class="ms-2" for="floatingInput">SEASSON</label>
                        </div>
                        <div class="col-md-6 form-floating mb-3">
                            <input type="date" name="birthday" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">START TİME</label>
                        </div>
                        <div class="col-md-6 form-floating mb-3">
                            <input type="date" name="birthday" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">END TİME</label>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-3">Create</button>
                            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

