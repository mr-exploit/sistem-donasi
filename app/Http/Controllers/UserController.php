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
        $berita = Berita::all();
        return view('users.index', compact('berita'));
    }

    public function programView()
    {
        $kategory = KategoriProgram::where('group', 'programs')->get();
        return view('users.program');
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

    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('users.beritaDetail', compact('berita'));
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
