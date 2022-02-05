<x-layouts.main>

    <div class="py-3">
        <h2><b>Hi! </b>{{ Auth::user()->name }}</h2>
        <p>Have an absen today ?</p>
    </div>

@if (Auth::user()->roles == 'admin')
<div class="card my-1">
   <div class="card-body">
       @if (Auth::user()->roles == 'admin')
       <a class="btn btn-primary mb-3" href="{{ route('absent.create') }}">Create</a>
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
                   <th class="border-0 rounded-start">No</th>
                   <th class="border-0">Nama Absen</th>
                   <th class="border-0">Dibuat Oleh</th>
                   <th class="border-0">Tanggal</th>
                   <th class="border-0">Rombel</th>
                   <th class="border-0">Rayon</th>
                   <th class="border-0 rounded-end">Action</th>
               </tr>
           </thead>
           <tbody>
               @if (count($absent))

                   @foreach ($absent as $row)

                       <tr>
                           <td>{{ ++$i }}</td>
                           <td>{{ $row->nama_absen }}</td>
                           <td>{{ $row->user->name }}</td>
                           <td>{{ $row->tgl_dibuat }}</td>
                           <td>{{ $row->rombel->nama_rombel ?? '-' }}</td>
                           <td>{{ $row->rayon->nama_rayon ?? '-' }}</td>
                           <td class="btn-column">
                               @if (Auth::user()->roles == 'siswa')
                                  @if (count($row->presences->where('user_id', Auth::id())))
                                      @if (is_null($row->presences->firstWhere('user_id', Auth::id())->jam_kedatangan))
                                         <form action="{{ route('absent.present', $row->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Hadir!</button>
                                         </form>
                                         {{-- <a href="/dashboard/absensi/{{ $row->id }}/izin" class="btn btn-warning btn-izin">Tidak Hadir</a> --}}
                                      @else
                                         @if (is_null($row->presences->firstWhere('user_id', Auth::id())->jam_kepulangan))
                                            @if ($row->presences->firstWhere('user_id', Auth::id())->is_present == false)
                                               <button type="button" class="btn btn-primary" disabled>Absen : {{ $row->presences->firstWhere('user_id', Auth::id())->jam_kedatangan }}</button>
                                            @else
                                               <button type="button" class="btn btn-primary" disabled>Hadir!</button>
                                               <form action="{{ route('absent.goHome', $row->id) }}" method="POST" class="d-inline-block">
                                                  @csrf
                                                  <button type="submit" class="btn btn-info btn-pulang">Pulang</button>
                                               </form>
                                            @endif
                                         @else
                                            <button type="button" class="btn btn-primary" disabled>Hadir : {{ $row->presences->firstWhere('user_id', Auth::id())->jam_kedatangan }}</button>
                                            <button type="button" class="btn btn-primary btn-info" disabled>Pulang : {{ $row->presences->firstWhere('user_id', Auth::id())->jam_kepulangan }}</button>
                                         @endif
                                      @endif
                                   @else
                                      <form action="/absent/{{ $row->id }}/hadir" method="POST" class="d-inline-block">
                                         @csrf
                                         <button type="submit" class="btn btn-primary">Hadir!</button>
                                      </form>
                                      {{-- <a href="/dashboard/absensi/{{ $row->id }}/izin" class="btn btn-warning">Tidak Hadir</a> --}}
                                  @endif
                               @else
                                  <a href="/absent/{{ $row->id }}/edit" class="btn btn-warning">Edit</a>
                                   <form class="d-inline-block" action="{{ route('absent.destroy', $row->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger" onclick="return confirm('R U Sure to delete this Absent?');">Hapus</button>
                                   </form>
                               @endif
                            </td>
                       </tr>

                   @endforeach

               @else
                   <tr class="text-center">
                       <td colspan="8">Belum ada data</b></td>
                   </tr>
               @endif
           </tbody>
       </table>
    </div>
    {!! $absent->links() !!}
   </div>
</div>
@endif
    
 
 </x-layouts.main>
 