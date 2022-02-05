<x-layouts.main>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2 class="text-center">Create</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('absent.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rombels.store') }}" method="POST" enctype="multipart/form-data" class="card">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label for="nama_rombel" class="form-label">Rombel</label>
                        <input type="text" name="nama_rombel" id="nama_rombel" class="form-control"
                            placeholder="Nama Rombel" value="{{ old('nama_rombel') }}">
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</x-layouts.main>
