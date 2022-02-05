<x-layouts.main>

    <title>{{ $title }}</title>
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

    <form action="{{ route('rayons.update', $rayon->id) }}" method="POST" enctype="multipart/form-data"
        class="card">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="nama_rayon" class="form-label">Rayon</label>
                        <input value="{{ old('nama_rayon', $rayon->nama_rayon) }}" type="text" name="nama_rayon"
                            id="nama_rayon" class="form-control" placeholder="Nama Rayon">
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="pembimbing_rayon" class="form-label">Pembimbing</label>
                        <input value="{{ old('pembimbing_rayon', $rayon->pembimbing_rayon) }}" type="text"
                            name="pembimbing_rayon" id="pembimbing_rayon" class="form-control"
                            placeholder="Nama Pembimbing">
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    </form>
</x-layouts.main>
