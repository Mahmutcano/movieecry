<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Movie Update</div>
            <div class="float-right">
                <a href="/eindex" class="btn btn-sm btn-primary">Movie List</a>
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

            <form action="{{ route('epg.eupdate',$epg->ename) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="etitle" class="form-control" id="exampleFormControlInput1" value="{{ $epg->etitle }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Time</label>
                    <textarea class="form-control" name="etime" id="exampleFormControlTextarea1" value="{{ $epg->etime }}"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Name</label>
                    <textarea class="form-control" name="ename" id="exampleFormControlTextarea1" value="{{ $epg->ename }}"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Choose Image</label>
                    <img src="{{ asset('images') }}/{{ $epg->eimg }}" alt="" style="width: 190px">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1" style="border-radius: 20px">Choose Image</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                </div>

                <button type="submit" class="btn btn-sm btn-success float-right">Movie Update</button>
            </form>
        </div>
    </div>

</x-app-layout>
