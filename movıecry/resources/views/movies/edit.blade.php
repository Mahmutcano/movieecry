<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Movie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-5">
                    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 form-floating mb-3">
                            <input value="{{ $movie->mov_title }}" type="text" name="title" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">Title</label>
                        </div>
                        <div class="col-md-6 form-floating mb-3">
                            <input value="{{ $movie->mov_rate }}" type="text" name="rate" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">Rate</label>
                        </div>
                        <div class="col-md-6 form-floating mb-3">
                            <select class="form-select" name="director_id" id="floatingSelect">
                                <option selected="{{ $movie->director->id }}" selected disabled hidden>{{ $movie->director->name }}</option>
                                @foreach($directors as $director)
                                    <option value="{{ $director->id }}">{{ $director->name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Director</label>
                        </div>
                        <div class="col-md-12 form-floating mb-3" style="padding: 0 14px;">
                            <p>Genres</p>
                            @foreach ($genres as $genre)
                                <div class="form-check form-check-inline" style="margin-right: 8px">
                                    <input name="genres[]" class="form-check-input" type="checkbox" value="{{ $genre->id }}"
                                    @if($movie->genres)
                                        @if(in_array($genre->id, $movie->genres->pluck('id')->toArray()))
                                            checked
                                        @endif
                                    @endif id="inlineCheckbox1">
                                    <label class="form-check-label" for="inlineCheckbox1">
                                        {{ $genre->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 form-floating mb-3">
                            <textarea name="description" class="h-auto form-control" id="floatingInput">{{ $movie->desc }}</textarea>
                            <label class="ms-2" for="floatingInput">Description</label>
                        </div>
                        <div class="col-md-12 form-floating mb-3">
                            <textarea style="height: 100px" name="plot" class="form-control" id="floatingInput">{{ $movie->mov_old }}</textarea>
                            <label class="ms-2" for="floatingInput">Age Limit</label>
                        </div>
                        <div class="col-md-12 form-floating mb-3">
                            <textarea style="height: 100px" name="plot" class="form-control" id="floatingInput">{{ $movie->mov_sesson }}</textarea>
                            <label class="ms-2" for="floatingInput">Seasson</label>
                        </div>
                        <div class="col-md-12 form-floating">
                            <input value="{{ $movie->poster }}" type="file" name="poster" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">Poster</label>
                        </div>
                        <div class="col-md-12 form-floating">
                            <input value="{{ $movie->video }}" type="file" name="video" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">Fragman</label>
                        </div>
                        <div class="col-md-12 form-floating">
                            <input value="{{ $movie->mov_lınk }}" type="file" name="video" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">FİLM</label>
                        </div>
                        <div class="col-md-6 form-floating mb-3">
                            <input value="{{ $movie->mov_startime }}" type="text" name="birthday" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">Star Time</label>
                        </div>
                        <div class="col-md-6 form-floating mb-3">
                            <input value="{{ $movie->mov_endtime }}" type="text" name="birthday" class="form-control" id="floatingInput">
                            <label class="ms-2" for="floatingInput">End Tİme</label>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-3">Save</button>
                            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
