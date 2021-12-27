<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Channel Update</div>
            <div class="float-right">
                <a href="/cindex" class="btn btn-sm btn-primary">Channel</a>
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

            <form action="{{ route('channel.cupdate',$channel->cname) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="ctitle" class="form-control" value="{{ $channel->ctitle }}" id="exampleFormControlInput1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Channel Name</label>
                    <textarea class="form-control" name="cname" id="exampleFormControlTextarea1" rows="3">{{ $channel->cname }}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Channel Time</label>
                    <textarea class="form-control" name="ctime" id="exampleFormControlTextarea1" rows="3">{{ $channel->ctime}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Choose Image</label>
                    <img src="{{ asset('images') }}/{{ $channel->cimg }}" alt="" style="width: 300px">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Choose Image</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                </div>
                <button type="submit" class="btn btn-sm btn-success float-right">Channel Update</button>
            </form>
        </div>
    </div>

</x-app-layout>
