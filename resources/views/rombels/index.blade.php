<x-layouts.main>

    <title>{{ $title }}</title>
    <div class="card my-5">
        <div class="card-body">
            @if (Auth::user()->roles == 'admin')
                <a href="{{ route('rombels.index') }}" class="btn btn-primary mb-3">Create</a>
            @endif


            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive mb-3">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Rombel</th>
                            @if (Auth::user()->roles == 'admin')
                                <th class="border-0 rounded-end">Action</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($rombels as $rombel)

                            <tr>
                                <td>{{ $rombel->nama_rombel }}</td>
                                @if (Auth::user()->roles == 'admin')
                                    <td>
                                        <a href="{{ route('rombels.edit', $rombel->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form class="d-inline-block"
                                            action="{{ route('rombels.destroy', $rombel->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                onclick="return confirm('IYAHHHHHHHHHHHHHHHHHHHHH!!!!!!!!!!!!!!!!!!!!')"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                @endif

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

            {!! $rombels->links() !!}
        </div>
    </div>

</x-layouts.main>
