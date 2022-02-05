<x-layouts.main>
    <title>{{ $title }}</title>
    <div class="card mt-5">
        <div class="card-body">

            @if (Auth::user()->roles == 'admin')
                <a class="btn btn-primary mb-3" href="{{ route('absent.create') }}">Create</a>
            @endif

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">No</th>
                            <th class="border-0">User</th>
                            <th class="border-0">Absen</th>
                            <th class="border-0">Jam Kedatangan</th>
                            <th class="border-0">Jam Kepulangan</th>
                            <th class="border-0 rounded-end">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($presence as $row)

                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ $row->absent->nama_absen }}</td>
                                <td>{{ $row->jam_kedatangan }}</td>
                                <td>{{ $row->jam_kepulangan }}</td>
                                <td>
                                    <span class="badge bg-{{ $row->keterangan == 'Hadir' ? 'success' : 'info' }}">{{ $row->keterangan }}</span>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.main>
