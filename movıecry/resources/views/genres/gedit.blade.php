<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Genre Update</div>
            <div class="float-right">
                <a href="/gindex" class="btn btn-sm btn-primary">Genre List</a>
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

            <form action="{{ route('genres.gupdate',$genre->name) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Genres Name</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $genre->name}}">
                </div>

                <button type="submit" class="btn btn-sm btn-success float-right">Genre Update</button>
            </form>
        </div>
    </div>

</x-app-layout>
