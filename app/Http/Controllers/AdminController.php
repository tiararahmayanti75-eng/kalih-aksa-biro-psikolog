<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran; 
use App\Exports\PendaftaranExport;
use App\Imports\PendaftaranImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusPendaftaran;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Support\Facades\Hash; 

class AdminController extends Controller
{
    // 1. Dashboard
    public function index(Request $request)
    {
        $query = Pendaftaran::query();
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_lengkap', 'like', "%{$request->search}%");
        }
        if ($request->has('status') && in_array($request->status, ['Menunggu', 'Selesai'])) {
            $query->where('status', $request->status);
        }
        $semua_pendaftaran = $query->paginate(10);
        
        return view('admin.dashboard', [
            'total_pasien' => Pendaftaran::count(),
            'total_menunggu' => Pendaftaran::where('status', 'Menunggu')->count(),
            'total_selesai' => Pendaftaran::where('status', 'Selesai')->count(),
            'semua_pendaftaran' => $semua_pendaftaran
        ]); 
    }

    // 2. Detail Pasien
    public function show($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin.detail', compact('pendaftaran'));
    }

    // 3. Password
    public function editPassword() { return view('admin.password'); }
    
    public function updatePassword(Request $request) 
    {
        $request->validate(['password' => 'required|confirmed|min:8']);
        auth()->user()->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Password berhasil diubah!');
    }

    // 4. Edit & Update
    public function edit($id) {
        $pasien = Pendaftaran::findOrFail($id);
        return view('admin.edit', compact('pasien'));
    }

    public function update(Request $request, $id) {
        $pasien = Pendaftaran::findOrFail($id);
        $pasien->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Data berhasil diperbarui!');
    }

    // 5. Update Status
    public function updateStatus(Request $request, $id) {
        $pasien = Pendaftaran::findOrFail($id);
        $pasien->status = $request->status;
        $pasien->save();
        return back()->with('success', 'Status berhasil diubah ke: ' . $request->status);
    }

    // 6. Selesai & PDF
    public function tandaiSelesai($id)
    {
        $pasien = Pendaftaran::findOrFail($id);
        $pasien->status = 'Selesai';
        $pasien->save();
        Mail::to($pasien->email)->send(new StatusPendaftaran($pasien));
        return redirect()->route('admin.dashboard')->with('success', 'Status Selesai!');
    }

    public function cetakPdf($id) 
    {
        $pasien = Pendaftaran::findOrFail($id);
        $pdf = Pdf::loadView('admin.pdf', compact('pasien'));
        return $pdf->download('Data_Pasien_'.$pasien->nama_lengkap.'.pdf');
    }

    // 7. Hapus (DIPERBAIKI)
    public function destroy($id)
    {
        $pasien = Pendaftaran::findOrFail($id);
        $pasien->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data pasien berhasil dihapus!');
    }

    // 8. Export & Import
    public function export() 
    { 
        return Excel::download(new PendaftaranExport, 'data_pendaftaran.xlsx'); 
    }
    
    public function import(Request $request) 
    {
        Excel::import(new PendaftaranImport, $request->file('file'));
        return back()->with('success', 'Data diimpor!');
    }
}