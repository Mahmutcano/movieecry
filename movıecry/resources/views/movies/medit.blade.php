<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Movie Update</div>
            <div class="float-right">
                <a href="/index" class="btn btn-sm btn-primary">Movie List</a>
            </div>
        </div>
        <div class="card-body">
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

            <form action="{{ route('movie.mupdate',$movie->mname) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $movie->mtitle }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Time</label>
                    <textarea class="form-control" name="mtime" id="exampleFormControlTextarea1" value="{{ $movie->mtime }}"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Name</label>
                    <textarea class="form-control" name="mname" id="exampleFormControlTextarea1" value="{{ $movie->mname }}"></textarea>
                </div>
                    <div class="form-group">
                        <label for="genre"> <b>Genre</b></label>
                        <div class="col-sm-20">
                            <select name="genre" id="genre" class="form-control">
                                <option value="">Select Genre</option>
                                @if ($genres)

                                @foreach ($genres as $genre)

                                <option value="{{($genre)}}">{{($genre)}}</option>

                                @endforeach

                                @endif



                            </select>

                        </div>
                    </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Age Limit</label>
                    <textarea class="form-control" name="mold" id="exampleFormControlTextarea1" value="{{ $movie->mold }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Year</label>
                    <textarea class="form-control" name="myear" id="exampleFormControlTextarea1" value="{{ $movie->myear }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Season</label>
                    <textarea class="form-control" name="mseason" id="exampleFormControlTextarea1" value="{{ $movie->mseason }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Max Title</label>
                    <textarea class="form-control" name="alttitle" id="exampleFormControlTextarea1" value="{{ $movie->alttitle }}"></textarea>
                </div>
               <div class="form-group">
                    <label for="exampleFormControlTextarea1">Desc</label>
                    <textarea class="form-control" name="altdesc" id="exampleFormControlTextarea1" row="3" value="{{ $movie->altdesc }}"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Choose Image</label>
                    <img src="{{ asset('images') }}/{{ $movie->mimg }}" alt="" style="width: 190px">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1" style="border-radius: 20px">Choose Image</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Choose Video</label>
                    <video autoplay muted loop  style="width: 200px">
        <source src="{{asset('videos')}}/{{ $movie->mvideo }}" >
    </video>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Choose Video</label>
                    <input type="file" name="video" class="form-control" style="border-radius: 20px" id="exampleFormControlInput1">
                </div>
                <button type="submit" class="btn btn-sm btn-success float-right">Movie Update</button>
            </form>
        </div>
    </div>

</x-app-layout>
