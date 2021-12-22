<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Epg Add</div>
            <div class="float-right">
                <a href="/eindex" class="btn btn-sm btn-primary">Epg List</a>
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

            <form action="{{ route('epgs.epgstore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Channel İd</label>
                    <input type="text" name="channels_id" class="form-control" id="exampleFormControlInput1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Start Time</label>
                    <textarea class="form-control" name="start_time" id="exampleFormControlTextarea1"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">End Time</label>
                    <textarea class="form-control" name="end_time" id="exampleFormControlTextarea1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Timezone</label>
                    <textarea class="form-control" name="timezone" id="exampleFormControlTextarea1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                </div>
                <button type="submit" class="btn btn-sm btn-success float-right">Epg Add</button>
            </form>
        </div>
    </div>

</x-app-layout>
