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

    <form action="{{ route('rayons.store') }}" method="POST" enctype="multipart/form-data" class="card">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="nama_rayon" class="form-label">Rayon</label>
                        <input type="text" name="nama_rayon" id="nama_rayon" class="form-control"
                            placeholder="Nama Rayon">
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="pembimbing_rayon" class="form-label">Pembimbing</label>
                        <input type="text" name="pembimbing_rayon" id="pembimbing_rayon" class="form-control"
                            placeholder="Nama Rayon">
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    </form>
</x-layouts.main>
