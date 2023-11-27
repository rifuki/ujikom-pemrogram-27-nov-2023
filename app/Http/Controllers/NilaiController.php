<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = DB::table('nilai')->select()->get();

        return view('nilai.index')
            ->with('nilais', $nilais);

    }

    public function create()
    {
        $matpels = DB::table('matpel')->pluck('kd_matpel');
        $siswas = DB::table('siswa')->pluck('nis', 'nm_siswa');
        
        return view('nilai.create', compact('matpels', 'siswas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kd_nilai' => ['required', 'string', 'unique:nilai'],
            'nis' => ['required', 'numeric',],
            'nm_siswa' => ['required', 'string'],
            'kd_matpel' => ['required', 'string'],
            'nm_matpel' => ['required', 'string',], 
            'uts_sem_ganjil' => ['required', 'numeric', 'min:1', 'max:100'],
            'uas_sem_ganjil' => ['required', 'numeric', 'min:1', 'max:100'], 
            'uts_sem_genap' => ['required', 'numeric', 'min:1', 'max:100'],
            'uas_sem_genap' => ['required', 'numeric', 'min:1', 'max:100'],
        ]);

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $nilai = Nilai::create($request->all());
            
            return redirect()
                ->route('nilai.index')
                ->with('success', 'Data nilai dari siswa "'. $request->nm_siswa .'" berhasil ditambahkan.');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->__toString())
                ->withInput();
        }
    }

    public function edit(string $id)
    {
        $matpels = DB::table('matpel')->pluck('kd_matpel');
        $siswas = DB::table('siswa')->pluck('nis', 'nm_siswa');
        $nilai = DB::table('nilai')->where('kd_nilai', $id)->first();
        
        return view('nilai.edit', compact('matpels', 'siswas'))
            ->with('nilai', $nilai);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nis' => ['required', 'numeric',],
            'nm_siswa' => ['required', 'string'],
            'kd_matpel' => ['required', 'string'],
            'nm_matpel' => ['required', 'string',], 
            'uts_sem_ganjil' => ['required', 'numeric', 'min:1', 'max:100'],
            'uas_sem_ganjil' => ['required', 'numeric', 'min:1', 'max:100'], 
            'uts_sem_genap' => ['required', 'numeric', 'min:1', 'max:100'],
            'uas_sem_genap' => ['required', 'numeric', 'min:1', 'max:100'],
        ]);

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $nilai_object = [
            'nis' => $request->nis,
            'nm_siswa' => $request->nm_siswa,
            'kd_matpel' => $request->kd_matpel,
            'uts_sem_ganjil'=> $request->uts_sem_ganjil,
            'uas_sem_ganjil'=> $request->uas_sem_ganjil,
            'uts_sem_genap'=> $request->uts_sem_genap,
            'uas_sem_genap'=> $request->uas_sem_genap,
        ];

        try {
            $nilai = Nilai::where('kd_nilai', $id);
            $nilai->update($nilai_object);
            
            return redirect()
                ->route('nilai.index')
                ->with('success', 'Data nilai dari siswa "'. $request->nm_siswa .'" berhasil diupdate.');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->__toString())
                ->withInput();
        }
    }

    public function destroy(string $id)
    {
        $nilai = Nilai::where('kd_nilai', $id)->first();
        var_dump($nilai);

        if($nilai) {
            $namaSiswa = $nilai->nm_siswa;
            $nilai->delete();

            return redirect()
                ->route('nilai.index')
                ->with('success', 'Data nilai dari siswa "'. $namaSiswa.'" berhasil dihapus.');
        } else {
            $namaSiswa = $nilai->nm_siswa;

            return redirect()
                ->route('nilai.index')
                ->with('failed', 'Data nilai dari siswa "'. $namaSiswa .'" gagal dihapus.');
        }
    }
}
