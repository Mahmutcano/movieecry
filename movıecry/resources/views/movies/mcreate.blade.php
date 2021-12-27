<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Movie Add</div>
            <div class="float-right">
                <a href="/mindex" class="btn btn-sm btn-primary">Movie List</a>
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

            <form action="{{ route('movie.mstore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="mtitle" class="form-control" id="exampleFormControlInput1">
                </div>

                        <div class="exampleFormControlTextarea1">
                            <label class="ms-2" for="floatingInput">Time</label>
                            <input type="time" name="mtime" class="form-control" id="floatingInput">
                        </div><br>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Name</label>
                    <textarea class="form-control" name="mname" id="exampleFormControlTextarea1"></textarea>
                </div><br>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Genre</label>
                    <input type="number" name="genre_id" class="form-select" id="exampleFormControlTextarea1">
                </div><br>
                        <div class="exampleFormControlTextarea1">
                            <label class="ms-2" for="floatingInput">Age Limit</label>
                            <input type="number" name="mold" class="form-control" id="floatingInput" placeholder="+">
                        </div><br>
                        <div class="exampleFormControlTextarea1">
                            <label class="ms-2" for="floatingInput">Year</label>
                            <input type="date" name="myear" class="form-control" id="floatingInput">
                        </div><br>
                        <div class="exampleFormControlTextarea1">
                            <label class="ms-2" for="floatingInput">Seasson</label>
                            <input type="number" name="mseason" class="form-control" id="floatingInput" placeholder="Part">
                        </div><br>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Max Title</label>
                    <textarea class="form-control" name="alttitle" id="exampleFormControlTextarea1"></textarea>
                </div>
               <div class="form-group">
                    <label for="exampleFormControlTextarea1">Desc</label>
                    <textarea class="form-control" name="altdesc" id="exampleFormControlTextarea1" row="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Video</label>
                    <input type="file" name="video" class="form-control" id="exampleFormControlInput1">
                </div>
                <button type="submit" class="btn btn-sm btn-success float-right">Movie Add</button>
            </form>
        </div>
    </div>

</x-app-layout>
