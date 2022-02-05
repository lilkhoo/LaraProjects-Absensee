<x-layouts.main>

    <title>{{ $title }}</title>
    <div class="card my-5">
        <div class="card-body">

            @if (Auth::user()->roles == 'admin')
                <a href="{{ route('rayons.create') }}" class="btn btn-primary mb-3">Create</a>

            @endif

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded mb-3">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Rayon</th>
                            <th class="border-0 {{ (Auth::user()->roles == 'admin') ? '' : 'rounded-end' }}">Pembimbing</th>
                            @if (Auth::user()->roles == 'admin')
                                <th class="border-0 rounded-end">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($rayons as $rayon)

                            <tr>
                                <td>{{ $rayon->nama_rayon }}</td>
                                <td>{{ $rayon->pembimbing_rayon }}</td>
                                @if (Auth::user()->roles == 'admin')
                                    <td>
                                        <a href="{{ route('rayons.edit', $rayon->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form class="d-inline-block"
                                            action="{{ route('rayons.destroy', $rayon->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('R u sure to delete this Rayon?')"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $rayons->links() !!}
        </div>
    </div>

</x-layouts.main>
