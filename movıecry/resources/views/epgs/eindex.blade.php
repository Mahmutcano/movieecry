<x-app-layout>

<div class="card">
    <div class="card-header">
        <div class="float-left font-weight-bolder">Movie</div>
        <div class="float-right">
            <a href="{{ route('epgs.ecreate') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Movie</a>
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
                    <th scope="col">Channels Id</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Timezone</th>
                    <th scope="col">İmage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($epgs as $epg)
                    <tr>
                        <td scope="row"><img src="{{ asset('images') }}/{{ $epg->eimg }}" alt="" style="width: 50px"></td>
                        <td>{{ $epg->channels_id }}</td>
                        <td>{{ $epg->start_time }}</td>
                        <td>{{ $epg->end_time }}</td>
                        <td>{{ $epg->timezone }}</td>

                        <td>
                            <a href="{{ route('epgs.eedit',$epg->id) }}" class="btn btn-sm btn-success"><i class="far fa-edit"></i></a>
                            <a href="{{ route('epg.eshow',$epg->id) }}" class="btn btn-sm btn-warning mt-1"><i class="fas fa-info"></i></a>
                            <a href="{{ route('epgs.edelete',$epg->id) }}" class="btn btn-sm btn-danger mt-1"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

</x-app-layout>
