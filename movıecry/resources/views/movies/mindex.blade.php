<x-app-layout>

<div class="card">
    <div class="card-header">
        <div class="float-left font-weight-bolder">Movie</div>
        <div class="float-right">
            <a href="{{ route('movie.mcreate') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Movie</a>
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
                    <th scope="col">Image</th>
                    <th scope="col">Video</th>
                    <th scope="col">Title</th>
                    <th scope="col">Time</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Age Limit</th>
                    <th scope="col">Year</th>
                    <th scope="col">Season</th>
                    <th scope="col">Max Title</th>
                    <th scope="col">Desc</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td scope="row"><img src="{{ asset('images') }}/{{ $movie->mimg }}" alt="" style="width: 190px"></td>
                        <td scope="row"><video autoplay muted loop  style="width: 200px">
        <source src="{{asset('videos')}}/{{ $movie->mvideo }}" >
    </video></td>
                        <td>{{ $movie->mtitle }}</td>
                        <td>{{ $movie->mtime }}</td>
                        <td>{{ $movie->mname }}</td>
                        <td>{{ $movie->genre_id }}</td>
                        <td>{{ $movie->mold }}</td>
                        <td>{{ $movie->myear }}</td>
                        <td>{{ $movie->mseason }}</td>
                        <td>{{ $movie->alttitle }}</td>
                        <td>{{ $movie->altdesc }}</td>
                        <td>
                            <a href="{{ route('movie.medit',$movie->id) }}" class="btn btn-sm btn-success"><i class="far fa-edit"></i></a>
                            <a href="{{ route('movie.mshow',$movie->id) }}" class="btn btn-sm btn-warning mt-1"><i class="fas fa-info"></i></a>
                            <a href="{{ route('movie.mdelete',$movie->id) }}" class="btn btn-sm btn-danger mt-1"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $movies->links() }}
    </div>
</div>

</x-app-layout>
