<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if(strlen($keyword)){
            $siswas = Siswa::where('nm_siswa', 'like', "%$keyword%")
            ->paginate(1);
        } else{
            $siswas = Siswa::orderBy('nm_siswa', 'desc')->paginate(5);
        }
            return view('siswa.index')
                ->with('siswas', $siswas);
        
    }

    public function create()
    {
        $kelass = DB::table('kelas')->pluck('kd_kelas');
        return view('siswa.create', compact('kelass'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => ['required', 'numeric', 'unique:siswa'],
            'nm_siswa' => ['required', 'string', 'min:1', 'max:30'],
            'tmp_lahir' => ['required', 'string'],
            'tgl_lahir' => ['required', 'date'],
            'jkel' => ['required', 'string', 'max:1', 'in:L,P'], 
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'numeric', 'digits_between:9,14'],
            'nm_wali' => ['required', 'string'],
            'kd_kelas' => ['required', 'string'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $fmt_tgl_lahir= Carbon::parse($request->input('tgl_lahir'));

        $siswa_object = [
            'nis' => $request->nis,
            'nm_siswa' => $request->nm_siswa,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $fmt_tgl_lahir,
            'jkel' => $request->jkel,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'nm_wali' => $request->nm_wali,
            'kd_kelas' => $request->kd_kelas,
            'username' => $request->username,
            'password' => $request->password
        ];

        try {
            $Siswa = Siswa::create($siswa_object);
            
            return redirect()
                ->route('siswa.index')
                ->with('success', 'Data siswa "'. $request->nm_siswa .'" berhasil ditambahkan.');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->__toString())
                ->withInput();
        }
    }

    public function edit(string $id)
    {
        $kelass = DB::table('kelas')->pluck('kd_kelas');
        $siswa = Siswa::where('nis', $id)->first();
        return view('siswa.edit', compact('kelass'))
            ->with('siswa', $siswa);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nm_siswa' => ['required', 'string', 'min:1', 'max:30'],
            'tmp_lahir' => ['required', 'string'],
            'tgl_lahir' => ['required', 'date'],
            'jkel' => ['required', 'string', 'max:1', 'in:L,P'], 
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'numeric', 'digits_between:9,14'],
            'nm_wali' => ['required', 'string'],
            'kd_kelas' => ['required', 'string'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $fmt_tgl_lahir= Carbon::parse($request->input('tgl_lahir'));

        $siswa_object= [
            'nm_siswa' => $request->nm_siswa,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $fmt_tgl_lahir,
            'jkel' => $request->jkel,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'nm_wali' => $request->nm_wali,
            'kd_kelas' => $request->kd_kelas,
            'username' => $request->username,
            'password' => $request->password
        ];

        try {
            $siswa = Siswa::where('nis', $id)->first();
            $siswa->update($siswa_object);
            
            return redirect()
                ->route('siswa.index')
                ->with('success', 'Data siswa "'. $request->nm_siswa.'" berhasil diupdate.');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->__toString())
                ->withInput();
        }
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::where('nis', $id)->first();

        if($siswa) {
            $namaSiswa = $siswa->nm_siswa;
            $siswa->delete();

            return redirect()
                ->route('siswa.index')
                ->with('success', 'Data siswa "'. $namaSiswa.'" berhasil dihapus.');
        } else {
            $namaSiswa = $siswa->nm_siswa;

            return redirect()
                ->route('siswa.index')
                ->with('failed', 'Data siswa "'. $namaSiswa .'" gagal dihapus.');
        }
    }
}
