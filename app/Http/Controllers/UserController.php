<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriProgram;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $berita = Berita::latest()->take(3)->get();
        $donasi = Program::select('program.*') // Ambil semua kolom dari tabel program
            ->leftJoin('transaction', 'program.id', '=', 'transaction.program_id')
            ->selectRaw('COALESCE(COUNT(transaction.program_id), 0) AS jumlah_donatur')
            ->groupBy('program.id', 'program.nama')
            ->with('kategori') // Include kategori untuk program
            ->limit(3)
            ->get();
        return view('users.index', compact('berita', 'donasi'));
    }
    public function TermsAndCondition()
    {
        return view('users.terms');
    }

    public function PrivacyPolicy()
    {
        return view('users.privacy');
    }

    public function programView()
    {
        $donasi = Program::select('program.*') // Ambil semua kolom dari tabel program
            ->leftJoin('transaction', 'program.id', '=', 'transaction.program_id')
            ->selectRaw('COALESCE(COUNT(transaction.program_id), 0) AS jumlah_donatur')
            ->groupBy('program.id', 'program.nama')
            ->with('kategori') // Include kategori untuk program
            ->get();
        return view('users.program', compact('donasi'));
    }

    public function beritaView(Request $request)
    {
        $query = $request->input('query'); // Ambil input dari search bar

        if ($query) {
            // Cari berita berdasarkan judul atau konten
            $berita = Berita::where('judul', 'LIKE', "%{$query}%")
                ->orWhere('content', 'LIKE', "%{$query}%")
                ->get();
        } else {
            // Jika tidak ada input, tampilkan semua berita
            $berita = Berita::all();
        }

        return view('users.berita', compact('berita', 'query'));
    }

    public function detailBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('users.beritaDetail', compact('berita'));
    }

    public function detailProgram($slug)
    {
        $program = Program::select('program.*')
            ->where('slug', $slug)
            ->leftJoin('transaction', 'program.id', '=', 'transaction.program_id')
            ->selectRaw('COALESCE(COUNT(transaction.program_id), 0) AS jumlah_donatur')
            ->groupBy('program.id', 'program.nama')
            ->with('kategori') // Include kategori untuk program
            ->get()
            ->firstOrFail();
        $donasi = Program::select('program.*') // Ambil semua kolom dari tabel program
            ->leftJoin('transaction', 'program.id', '=', 'transaction.program_id')
            ->selectRaw('COALESCE(COUNT(transaction.program_id), 0) AS jumlah_donatur')
            ->groupBy('program.id', 'program.nama')
            ->with('kategori') // Include kategori untuk program
            ->get();
        // dd($program);
        return view('users.programDetail', compact('program', 'donasi'));
    }


    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function donasiPage()
    {
        return view('users.donasi');
    }
}
