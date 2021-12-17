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

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Time</label>
                    <textarea class="form-control" name="mtime" id="exampleFormControlTextarea1"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Name</label>
                    <textarea class="form-control" name="mname" id="exampleFormControlTextarea1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Category</label>
                    <textarea class="form-control" name="mcategory" id="exampleFormControlTextarea1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Age Limit</label>
                    <textarea class="form-control" name="mold" id="exampleFormControlTextarea1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Year</label>
                    <textarea class="form-control" name="myear" id="exampleFormControlTextarea1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Season</label>
                    <textarea class="form-control" name="mseason" id="exampleFormControlTextarea1"></textarea>
                </div>
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
