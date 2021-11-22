<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Activity;
use Pusher\Pusher;
use Auth;
use Session;

use Illuminate\Http\Request;

class CSController extends Controller
{
    public function cs()
    {
        $data = Pengaduan::where('user_id', Auth::user()->id)->orderByRaw('created_at DESC')->paginate(5);
        return view('user.cs', ['data' => $data]);
    }

    public function cs_page()
    {
        $data = Pengaduan::where('user_id', Auth::user()->id)->orderByRaw('created_at DESC')->paginate(5);
        return view('user.cs_data', ['data' => $data]);
    }

    public function pengaduan()
    {
        $cek_pengaduan = Pengaduan::where('user_id', Auth::user()->id)->where('status', '!=', '4')->paginate();
        return view('user.buat_pengaduan', ['cek_pengaduan' => $cek_pengaduan]);
    }

    public function submit_pengaduan(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_sekarang = date("Y/m/d h:i:s");
        $tgl = date("ymd");
        $random = '';
        for ($i=0; $i < 5; $i++) { 
            $angka = random_int(0,9);
            $random .= $angka;
        }
        $id = $tgl.$random;
        $tanggal_permasalahan = date("Y-m-d", strtotime($request->tanggal));
        Pengaduan::create([
            'id' => $id,
            'user_id' => Auth::user()->id,
            'perihal' => $request->perihal,
            'nama' => $request->nama,
            'perusahaan' => $request->perusahaan,
            'email' => $request->email,
            'tanggal' => $tanggal_permasalahan,
            'aplikasi' => $request->aplikasi,
            'kegiatan' => $request->kegiatan,
            'permasalahan' => $request->permasalahan,
            'status' => '0',
            'updated_at' => $tanggal_sekarang
        ]);

        Activity::create([
            'user_id' => Auth::user()->id,
            'jenis' => 'cs',
            'aktifitas' => 'Membuat pengaduan baru, Perihal : '.$request->perihal,
            'url' => '/customer-service/'.$id
        ]);

        $name = Auth::user()->first_name.' '.Auth::user()->last_name;
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $admin_role = 'admin';
        $data = ['name' => $name, 'to' => $admin_role];
        $pusher->trigger('complaint', 'new-complaint-event', $data);

        return redirect('/customer-service/'.$id);
    }

    public function view($id)
    {
        $data = Pengaduan::find($id);
        $balasan = Tanggapan::where('pengaduan_id', $id)->get();
        return view('user.cs_view', ['data' => $data, 'balasan' => $balasan]);
    }

    public function balas_tanggapan(Request $request, $id)
    {
        $data_cs = Pengaduan::find($id);
        $to = $data_cs->admin_id;
        Pengaduan::where('id', $id)->update([
            'status' => '3'
        ]);

        Tanggapan::create([
            'pengaduan_id' => $id,
            'user_id' => Auth::user()->id,
            'balasan' => $request->balasan
        ]);

        $name = Auth::user()->first_name.' '.Auth::user()->last_name;
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['name' => $name, 'to' => $to];
        $pusher->trigger('complaint', 'balas-tanggapan-event', $data);

        return redirect()->back();
    }

    public function tutup_pengaduan($id)
    {
        $data_pengaduan = Pengaduan::find($id);
        $to = $data_pengaduan->admin_id;
        $name = Auth::user()->first_name.' '.Auth::user()->last_name;
        Pengaduan::where('id', $id)->update([
            'status' => '4'
        ]);

        Activity::create([
            'user_id' => Auth::user()->id,
            'jenis' => 'cs',
            'aktifitas' => 'Menutup pengaduan, Perihal : '.$data_pengaduan->perihal,
            'url' => '/customer-service/'.$id
        ]);

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['no' => $id, 'name'=> $name,'to' => $to];
        $pusher->trigger('complaint', 'tutup-pengaduan-event', $data);

        return redirect('/customer-service');
    }
}
