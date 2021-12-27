<x-app-layout>

<div class="card">
    <div class="card-header">
        <div class="float-left font-weight-bolder">Movie</div>
        <div class="float-right">
            <a href="{{ route('genres.gcreate') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Genre</a>
        </div>
    </div>
    <div class="card-body">
        @if (Session::has('messages'))
        <div class="alert alert-primary" role="alert">
            {{Session::get('messages')}}
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Genre</th>
                    <th scope="col">Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                        <td>{{ $genre->name }}</td>
                        <td>{{ $genre->id }}</td>
                        <td>
                            <a href="{{ route('genres.gedit',$genre->name) }}" class="btn btn-sm btn-success"><i class="far fa-edit"></i></a>
                            <a href="{{ route('genres.gshow',$genre->name) }}" class="btn btn-sm btn-warning mt-1"><i class="fas fa-info"></i></a>
                            <a href="{{ route('genres.gdelete',$genre->id) }}" class="btn btn-sm btn-danger mt-1"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $genres->links() }}
    </div>
</div>

</x-app-layout>
