<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GuruController extends Controller
{
    public function index(Request $request) 
    {
        $keyword = $request->keyword;
        if(strlen($keyword)){
            $gurus = Guru::where('nm_guru', 'like', "%$keyword%")
            ->paginate(1);
        } else{
            $gurus = Guru::orderBy('nm_guru', 'desc')->paginate(5);
        }
            return view('guru.index')
                ->with('gurus', $gurus);
    }

    public function create(): View
    {
        $matpels = DB::table('matpel')->pluck('kd_matpel', 'nm_matpel');
        return view('guru.create', compact('matpels'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => ['required', 'numeric', 'unique:guru'],
            'nm_guru' => ['required', 'string', 'min:1', 'max:30'],
            'tmp_lahir_guru' => ['required', 'string'],
            'tgl_lahir_guru' => ['required', 'date'],
            'jkel_guru' => ['required', 'string', 'max:1', 'in:L,P'], 
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'numeric', 'digits_between:9,14'],
            'kd_matpel' => ['required', 'string'],
            'nm_matpel' => ['required', 'string'],
        ]);

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $fmt_tgl_lahir_guru = Carbon::parse($request->input('tgl_lahir_guru'));

        $guru_object = [
            'nip' => $request->nip,
            'nm_guru' => $request->nm_guru,
            'tmp_lahir_guru' => $request->tmp_lahir_guru,
            'tgl_lahir_guru' => $fmt_tgl_lahir_guru,
            'jkel_guru' => $request->jkel_guru,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'kd_matpel' => $request->kd_matpel,
            'nm_matpel' => $request->nm_matpel
        ];

        try {
            $guru = Guru::create($guru_object);
            
            return redirect()
                ->route('guru.index')
                ->with('success', 'Data guru "'. $request->nm_guru .'" berhasil ditambahkan.');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->__toString())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $matpels = DB::table('matpel')->pluck('kd_matpel', 'nm_matpel');
        $guru = Guru::where('nip', $id)->first();

        return view('guru.edit' , compact('matpels'))
            ->with('guru', $guru);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nm_guru' => ['required', 'string', 'min:1', 'max:30'],
            'tmp_lahir_guru' => ['required', 'string'],
            'tgl_lahir_guru' => ['required', 'date'],
            'jkel_guru' => ['required', 'string', 'max:1', 'in:L,P'], 
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'numeric', 'digits_between:9,14'],
            'kd_matpel' => ['required', 'string'],
            'nm_matpel' => ['required', 'string'],
        ]);

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $fmt_tgl_lahir_guru = Carbon::parse($request->input('tgl_lahir_guru'));

        $guru_object = [
            'nm_guru' => $request->nm_guru,
            'tmp_lahir_guru' => $request->tmp_lahir_guru,
            'tgl_lahir_guru' => $fmt_tgl_lahir_guru,
            'jkel_guru' => $request->jkel_guru,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'kd_matpel' => $request->kd_matpel,
            'nm_matpel' => $request->nm_matpel
        ];

        try {
            $guru = Guru::where('nip', '=', $id)->first();
            $guru->update($guru_object);
            
            return redirect()
                ->route('guru.index')
                ->with('success', 'Data guru "'. $request->nm_guru .'" berhasil diupdate.');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->__toString())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $guru = Guru::where('nip', $id)->first();

        if($guru) {
            $namaGuru = $guru->nm_guru;
            $namaGuru = $guru->nm_guru;
            $guru->delete();

            return redirect()
                ->route('guru.index')
                ->with('success', 'Data guru "'. $namaGuru.'" berhasil dihapus.');
        } else {
            $namaGuru = $guru->nm_guru;
            $namaGuru = $guru->nm_guru;

            return redirect()
                ->route('guru.index')
                ->with('failed', 'Data guru "'. $namaGuru .'" gagal dihapus.');
        }
    }
}
