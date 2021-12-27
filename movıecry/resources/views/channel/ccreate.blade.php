<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Channel Add</div>
            <div class="float-right">
                <a href="/cindex" class="btn btn-sm btn-primary">Channel Edit</a>
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

            <form action="{{ route('channel.cstore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="ctitle" class="form-control" id="exampleFormControlInput1">
                </div>

                        <div class="exampleFormControlTextarea1">
                            <label class="ms-2" for="floatingInput">Channel Time</label>
                            <input type="time" name="ctime" class="form-control" id="floatingInput">
                        </div><br>
                        <div class="exampleFormControlTextarea1">
                            <label class="ms-2" for="floatingInput">Channel Date</label>
                            <input type="date" name="cdate" class="form-control" id="floatingInput">
                        </div><br>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Channel Name</label>
                    <textarea class="form-control" name="cname" id="exampleFormControlTextarea1" rows="1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                </div>
                <button type="submit" class="btn btn-sm btn-success float-right">Channel Add</button>
            </form>
        </div>
    </div>

</x-app-layout>
