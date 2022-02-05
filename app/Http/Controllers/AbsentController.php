<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absent;
use App\Models\Presence;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AbsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absen.index', [
            'title' => 'AbsenSee | Dashboard',
            'absent' => (Auth::user()->roles == 'admin')
            ? Absent::orderBy('nama_absen')->paginate(5)
            : Absent::where('rayon_id', Auth::user()->rayon_id)->orWhere('rombel_id', Auth::user()->rombel_id)->paginate(5),
        ])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('absen.create', [
            // 'absent' => Absent::all(),
            'rombels' => Rombel::all(),
            'rayons' => Rayon::all(),
            // 'users' => User::all(),
            // 'no' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_absen' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
            'tgl_dibuat' => 'required'
        ]);

        $validatedData['user_id'] = Auth::id();

        Absent::create($validatedData);
        return redirect('/absent')->with('success', 'Absent Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Absent $absent)
    {
        return view('absen.edit', [
            'absent' => $absent,
            'rombels' => Rombel::orderBy('nama_rombel')->get(),
            'rayons' => Rayon::orderBy('nama_rayon')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absent $absent)
    {
        $validatedData = $request->validate([
            'nama_absen' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
            'tgl_dibuat' => 'required'
        ]);

        $validatedData['user_id'] = Auth::id();

        $absent->update($validatedData);

        return redirect('/absent')->with('success', 'Update Has Been Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absent $absent)
    {
        $absent->delete();
        return redirect()->route('absent.index')->with('success', 'Absen Has Been Deleted');
    }
    public function present(Absent $absent)
    {
        //? Update nilai di database menjadi hadir
        Presence::create([
            'jam_kedatangan' => date('H:i'),
            'is_present' => true,
            'keterangan' => 'Hadir',
            'user_id' => Auth::id(),
            'absent_id' => $absent->id
        ]);

        //? Kembalikan ke halaman dashboard absensi dengan session success
        return redirect()->route('absent.index')->with('success', 'Berhasil Absen Hadir!');
    }

    public function goHome(Absent $absent)
    {
        //? Update nilai kepulangan siswa di database
        Presence::where('user_id', Auth::id())->where('absent_id', $absent->id)->update([
            'jam_kepulangan' => date('H:i')
        ]);

        //? Kembalikan ke halaman dashboard absensi dengan session success
        return redirect('/presence')->with('success', 'Berhasil Absen Pulang!');
    }


    public function permission(Absent $absent)
    {
        //? Menampilkan form untuk memberi keterangan izin tidak masuk
        return view('dashboard.absensi.permission', [
            'data' => $absent
        ]);
    }

    // public function attendance()
    // {
    //     Presence::create([
    //         'jam_kedatangan' => date('H:i'),
    //         'is_present' => false,
    //         'keterangan' => 'Tidak Hadir',
    //         'user_id' => Auth::id(),
    //         'absent_id' => $absent->id
    //     ]);
    // }
}
