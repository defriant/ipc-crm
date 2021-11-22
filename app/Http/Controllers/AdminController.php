<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Company;
use App\Models\CompanyRegis;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Notifikasi;
use Pusher\Pusher;
use Session;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $date_diff = "TIMEDIFF(NOW(), created_at) <= '24:00:00'";

        $company = Company::paginate(10);
        $new_company = Company::whereRaw($date_diff)->get();

        $complaint = Pengaduan::all();
        $new_complaint = Pengaduan::whereRaw($date_diff)->get();

        $user_data = User::where('role', 'user')->paginate(12);
        return view('admin.index',
            compact(
                'user_data',
                'company',
                'new_company',
                'complaint',
                'new_complaint'
            )
        );
    }

    public function user_activity()
    {
        $user_data = User::where('role', 'user')->paginate(12);
        return view('admin.user_activity_data', compact('user_data'));
    }

    public function all_company()
    {
        $company = Company::paginate(10);
        return view('admin.all-company', compact('company'));
    }

    public function company_view($id)
    {
        $data = Company::find($id);
        return view('admin.company-view', compact('data'));
    }

    // Customer
    public function registration()
    {
        $companyRegis = CompanyRegis::where('status', 'waiting')->paginate();
        return view('admin.company-regis.registration', ['companyRegis' => $companyRegis]);
    }

    public function registration_show($id)
    {
        $data = CompanyRegis::find($id);
        return view('admin.company-regis.registration_show', ['data' => $data]);
    }

    public function company_regis()
    {
        $data = [];
        function waktu_lalu($timestamp){ // membuat fungsi menghitung waktu
            $selisih = time() - strtotime($timestamp) ;
            $detik = $selisih ;
            $menit = round($selisih / 60 );
            $jam = round($selisih / 3600 );
            $hari = round($selisih / 86400 );
            $minggu = round($selisih / 604800 );
            $bulan = round($selisih / 2419200 );
            $tahun = round($selisih / 29030400 );
            if ($detik <= 60) {
                $waktu = $detik.' Detik yang lalu';
            } else if ($menit <= 60) {
                $waktu = $menit.' Menit yang lalu';
            } else if ($jam <= 24) {
                $waktu = $jam.' Jam yang lalu';
            } else if ($hari <= 7) {
                $waktu = $hari.' Hari yang lalu';
            } else if ($minggu <= 4) {
                $waktu = $minggu.' Minggu yang lalu';
            } else if ($bulan <= 12) {
                $waktu = $bulan.' Bulan yang lalu';
            } else {
                $waktu = $tahun.' Tahun yang lalu';
            }
            return $waktu;
        }
        $companyRegis = CompanyRegis::where('status', 'waiting')->get();
        foreach ($companyRegis as $cr) {
            $data[] = [
                'id' => $cr->id,
                'company_name' => $cr->company_name,
                'user' => $cr->user->first_name.' '.$cr->user->last_name,
                'time' => waktu_lalu($cr->updated_at)
            ];
        }
        return response()->json($data);
    }

    public function company_regis_count()
    {
        $companyRegis = CompanyRegis::where('status', 'waiting')->paginate();
        $data = $companyRegis->total();
        return response()->json($data);
    }

    // Download Surat Permohonan
    public function surat_permohonan($id)
    {
        $nama_file = CompanyRegis::find($id);
        $path = public_path('registration/requirement/surat_permohonan/'.$nama_file->surat_permohonan);
        return response()->download($path, $nama_file->surat_permohonan);
    }

    // Terima Permintaan
    public function terima_permintaan($id)
    {
        $data = CompanyRegis::find($id);
        Company::create([
            'leader_name' => $data->leader_name,
            'company_name' => $data->company_name,
            'npwp' => $data->npwp,
            'address' => $data->address,
            'user_id' => $data->user_id
        ]);

        User::where('id', $data->user_id)->update([
            'company_status' => 'registered'
        ]);

        $to = $data->user_id;

        // Input notifikasi ke database
        Notifikasi::create([
            'user_id' => Auth::user()->id,
            'kepada' => $to,
            'notif' => 'Perusahaan anda berhasil didaftarkan',
            'url' => '/',
            'is_read' => '0'
        ]);

        // Push Notifikasi
        $my_id = Auth::user()->id;
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
        $data = ['to' => $to];
        $pusher->trigger('cs-reply', 'cs-reply-event', $data);

        CompanyRegis::where('id', $id)->delete();

        return redirect('/company/registration');
    }

    // Tolak Permintaan
    public function tolak_permintaan(Request $request, $id)
    {
        if ($request->cek_npwp != null) {
            CompanyRegis::where('id', $id)->update([
                'cek_npwp' => $request->cek_npwp
            ]);
        }else{
            CompanyRegis::where('id', $id)->update([
                'cek_npwp' => null
            ]);
        }

        if ($request->cek_surat != null) {
            CompanyRegis::where('id', $id)->update([
                'cek_surat' => $request->cek_surat
            ]);
        }else{
            CompanyRegis::where('id', $id)->update([
                'cek_surat' => null
            ]);
        }

        CompanyRegis::where('id', $id)->update([
            'status' => 'pending'
        ]);

        $data = CompanyRegis::find($id);
        User::where('id', $data->user_id)->update([
            'company_status' => 'pending'
        ]);

        $to = $data->user_id;

        // Input notifikasi ke database
        Notifikasi::create([
            'user_id' => Auth::user()->id,
            'kepada' => $to,
            'notif' => 'Pendaftaran perusahaan ditunda',
            'url' => '/company-registration/reupload',
            'is_read' => '0'
        ]);

        // Push Notifikasi
        $my_id = Auth::user()->id;
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
        $data = ['to' => $to];
        $pusher->trigger('cs-reply', 'cs-reply-event', $data);

        return redirect('/company/registration');
    }

    public function complaint()
    {
        $newComplaint = Pengaduan::where('status', '0')->paginate();
        $ongoing = Pengaduan::where('admin_id', Auth::user()->id)->where('status', '!=', '4')->where('status', '!=', '0')->paginate();
        $ongoing_balas = Pengaduan::where('admin_id', Auth::user()->id)->where('status', '3')->orWhere('status', '1')->paginate();
        return view('admin.complaint', [
            'newComplaint' => $newComplaint,
            'ongoing' => $ongoing,
            'ongoing_balas' => $ongoing_balas
        ]);
    }

    public function complaint_side_menu_notif()
    {
        $newComplaint = Pengaduan::where('status', '0')->paginate();
        $ongoing_balas = Pengaduan::where('admin_id', Auth::user()->id)->where('status', '3')->paginate();
        $total = $newComplaint->total() + $ongoing_balas->total();
        return response()->json($total);
    }

    public function complaint_all()
    {
        $data = Pengaduan::orderByRaw('created_at DESC')->paginate();
        return view('admin.all-complaint.table', ['allComplaints' => $data]);
    }

    public function complaint_all_data()
    {
        $data = Pengaduan::orderByRaw('created_at DESC')->paginate();
        return view('admin.all-complaint.data', ['allComplaints' => $data]);
    }

    public function complaint_new()
    {
        $data = Pengaduan::where('status', '0')->paginate();
        return view('admin.new-complaint.table', ['Complaints' => $data]);
    }

    public function complaint_new_data()
    {
        $data = Pengaduan::where('status', '0')->paginate();
        return view('admin.new-complaint.data', ['Complaints' => $data]);
    }

    public function complaint_new_data_count()
    {
        $data = Pengaduan::where('status', '0')->get();
        return response()->json($data);
    }

    public function complaint_ongoing()
    {
        $data = Pengaduan::where('admin_id', Auth::user()->id)->where('status', '!=', '4')->where('status', '!=', '0')->orderByRaw('updated_at ASC')->paginate();
        return view('admin.ongoing-complaint.table', ['Complaints' => $data]);
    }

    public function complaint_ongoing_data()
    {
        $data = Pengaduan::where('admin_id', Auth::user()->id)->where('status', '!=', '4')->where('status', '!=', '0')->paginate();
        return view('admin.ongoing-complaint.data', ['Complaints' => $data]);
    }

    public function complaint_ongoing_data_count()
    {
        $data = Pengaduan::where('admin_id', Auth::user()->id)->where('status', '!=', '4')->where('status', '!=', '0')->get();
        return response()->json($data);
    }

    public function complaint_view($id)
    {
        $complaint = Pengaduan::find($id);
        $balasan = Tanggapan::where('pengaduan_id', $id)->paginate();
        return view('admin.complaintview', ['complaint' => $complaint, 'balasan' => $balasan]);
    }

    public function foll_up($id)
    {
        // Mengambil data pengaduan untuk mengambil id pengadu
        $complaint = Pengaduan::find($id);
        $to = $complaint->user_id;

        Pengaduan::where('id', $id)->update([
            'status' => '1',
            'admin_id' => Auth::user()->id,
            'admin_nama' => 'CS '.Auth::user()->first_name
        ]);

        // Input notifikasi ke database
        Notifikasi::create([
            'user_id' => Auth::user()->id,
            'kepada' => $to,
            'notif' => 'Pengaduan anda sedang ditangani',
            'url' => '/customer-service',
            'is_read' => '0'
        ]);

        // Push Notifikasi
        $my_id = Auth::user()->id;
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
        $data = ['to' => $to];
        $pusher->trigger('cs-reply', 'cs-reply-event', $data);

        $data = Pengaduan::where('admin_id', Auth::user()->id)->get();
        return response()->json($data);
    }

    public function balas(Request $request, $id)
    {
        // Mengambil data pengaduan untuk mengambil id pengadu
        $complaint = Pengaduan::find($id);
        $to = $complaint->user_id;

        // Update status pengaduan
        Pengaduan::where('id', $id)->update([
            'status' => '2'
        ]);

        // Input balasan ke table tanggapan
        Tanggapan::create([
            'pengaduan_id' => $id,
            'user_id' => Auth::user()->id,
            'balasan' => $request->balasan
        ]);

        // Input notifikasi ke database
        Notifikasi::create([
            'user_id' => Auth::user()->id,
            'kepada' => $to,
            'notif' => 'CS '.Auth::user()->first_name.' Membalas pengaduan anda',
            'url' => '/customer-service/'.$complaint->id,
            'is_read' => '0'
        ]);

        // Push Notifikasi
        $my_id = Auth::user()->id;
        $options = [
            'cluster' => 'ap1',
            'useTLS' => true
        ];
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['to' => $to];
        $pusher->trigger('cs-reply-'.$to, 'cs-reply-event', $data);

        $balasan = Tanggapan::where('pengaduan_id', $id)->paginate();
        return view('admin.complaintview', ['complaint' => $complaint, 'balasan' => $balasan]);
    }

    public function customer_reply()
    {
        $data = Pengaduan::where('admin_id', Auth::user()->id)->where('status', '3')->orWhere('status', '1')->get();
        return response()->json($data);
    }

}
