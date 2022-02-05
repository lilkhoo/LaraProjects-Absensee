<x-layouts.main>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2 class="text-center">Edit</h2>
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

    <form action="{{ route('absent.update', $absent->id) }}" method="POST" enctype="multipart/form-data" class="card">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="nama_absen" class="form-label">Nama Absen</label>
                        <input type="text" name="nama_absen" id="nama_absen" class="form-control"
                            placeholder="Nama Absen" value="{{ old('nama_absen', $absent->nama_absen) }}">
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="tgl_dibuat" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" value="{{ old('tgl_dibuat', $absent->tgl_dibuat) }}" name="tgl_dibuat">
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="rombel_id" class="form-label">Rombel</label>
                        <select class="form-select" name="rombel_id" id="rombel_id">
                            <option value="" disabled selected>Pilih...</option>
                            @foreach ($rombels as $rombel)
                                <option value="{{ $rombel->id }}" {{ old('rombel_id', $rombel->id) == $rombel->id ? 'selected' : '' }}>{{ $rombel->nama_rombel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="rayon_id" class="form-label">Rayon</label>
                        <select class="form-select" name="rayon_id" id="rayon_id">
                            <option value="" disabled selected>Pilih...</option>
                            @foreach ($rayons as $rayon)
                                <option value="{{ $rayon->id }}" {{ old('rayon_id', $rayon->id) == $rayon->id ? 'selected' : '' }}>{{ $rayon->nama_rayon }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</x-layouts.main>
