<x-app-layout>

<div class="card">
    <div class="card-header">
        <div class="float-left font-weight-bolder">My Post</div>
        <div class="float-right">
            <a href="{{ route('channel.ccreate') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Post</a>
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
                    <th scope="col">Title</th>
                    <th scope="col">Channel Time</th>
                    <th scope="col">Channel Date</th>
                    <th scope="col">Channel Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($channels as $channel)
                    <tr>
                        <td scope="row"><img src="{{ asset('images') }}/{{ $channel->cimg}}" alt="" style="width: 50px"></td>
                        <td>{{ $channel->ctitle }}</td>
                        <td>{{ $channel->ctime }}</td>
                        <td>{{ $channel->cdate }}</td>
                        <td>{{ $channel->cname }}</td>
                        <td>{{ $channel->cimg }}</td>
                        <td>
                            <a href="{{ route('channel.cedit',$channel->cname) }}" class="btn btn-sm btn-success"><i class="far fa-edit"></i></a>
                            <a href="{{ route('channel.cshow',$channel->cname) }}" class="btn btn-sm btn-warning"><i class="fas fa-info"></i></a>
                            <a href="{{ route('channel.cdelete',$channel->id) }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $channels->links() }}
    </div>
</div>

</x-app-layout>
