<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Mail\EmailVerification;
use App\Models\Regis;
use App\Models\User;
use App\Models\Company;
use App\Models\CompanyRegis;
use App\Models\Activity;
use Pusher\Pusher;
use Auth;
use Session;

class RegisController extends Controller
{
    public function verification(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirmPassword' => 'same:password'
        ]);

        // ID
        $maks = DB::table('confirm_regis')->max('id');
        $id = $maks + 1;
        $url_id = Crypt::encrypt($id);

        // Email
        $email = $request->email;

        // Password
        $password = $request->password;

        // Code
        $random = '';
        for ($i=0; $i < 6; $i++) { 
            $angka = random_int(0,9);
            $random .= $angka;
        }
        Regis::create([
            'id' => $id,
            'email' => $email,
            'password' => $password,
            'code' => $random
        ]);

        $mail_data = [
            'code' => $random
        ];

        \Mail::to($email)->send(new EmailVerification($mail_data));

        Session::flash('verification_code', $email);
        return view('auth.verification', compact('url_id', 'email'));
    }

    public function verification_attempt($code,$id)
    {
        $verification_id = Crypt::decrypt($id);
        $data = Regis::find($verification_id);
        if ($code == $data->code) {
            $result = [
                'result' => 'success'
            ];
        }else {
            $result = [
                'result' => 'failed'
            ];
        }

        return response()->json($result);
    }

    public function resend_code($id)
    {
        // Email
        $dec = Crypt::decrypt($id);
        $data_regis = Regis::find($dec);
        $email = $data_regis->email;
        // Code
        $random = '';
        for ($i=0; $i < 6; $i++) { 
            $angka = random_int(0,9);
            $random .= $angka;
        }
        DB::table('confirm_regis')->where('id', $dec)->update([
            'code' => $random
        ]);

        $mail_data = [
            'code' => $random
        ];

        \Mail::to($email)->send(new EmailVerification($mail_data));

        $data = [
            'email' => $email
        ];
        
        return response()->json($data);
    }

    public function register_add(Request $request)
    {
        $verification_id = Crypt::decrypt($request->id);
        $data = Regis::find($verification_id);
        $maks = DB::table('users')->max('id');
        $id = $maks + 1;
        
        User::create([
            'id' => $id,
            'email' => $data->email,
            'password' => bcrypt($data->password),
            'profile' => 'uncomplete',
            'company_status' => 'unregistered',
            'role' => 'user'
        ]);
        Auth::attempt(['email' => $data->email, 'password' => $data->password]);
        DB::table('confirm_regis')->where('email', $data->email)->delete();
        Session::flash('berhasil_daftar');
        return redirect('/advanced-profile');
    }

    public function advanced_profile()
    {
        if (Auth::user()->profile == 'completed') {
            return redirect('/');
        }elseif (Auth::user()->profile == 'uncomplete') {
            return view('auth.complete');
        }
    }

    public function advanced_profile_update(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'profession' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required'
        ]);
        
        if($request->hasFile('profilePicture')){
            $time = time();
            $filenameWithExt = $request->file('profilePicture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profilePicture')->getClientOriginalExtension();
            $request->file('profilePicture')->move('user/profile_picture/',$filename.'_'.$time.'.'.$extension);
            $profilePicture = $filename.'_'.$time.'.'.$extension;
            DB::table('users')->where('id', Auth::user()->id)->update([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'profession' => $request->profession,
                'phone' => $request->phoneNumber,
                'address' => $request->address,
                'picture' => $profilePicture,
                'profile' => 'completed'
            ]);
        }else {
            DB::table('users')->where('id', Auth::user()->id)->update([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'profession' => $request->profession,
                'phone' => $request->phoneNumber,
                'address' => $request->address,
                'profile' => 'completed'
            ]);
        }
        return redirect('/company-registration');
    }

    public function company_registration()
    {
        if (Auth::user()->company_status == 'registered') {
            return redirect('/');
        }elseif (Auth::user()->company_status == 'waiting') {
            return redirect('/');
        }elseif (Auth::user()->company_status == 'unregistered') {
            return view('auth.company_registration');
        }
    }

    public function company_registration_add(Request $request)
    {
        $this->validate($request, [
            'namaPimpinan' => 'required',
            'namaPerusahaan' => 'required',
            'npwp' => 'required',
            'alamat' => 'required',
            'suratPermohonan' => 'required',
            'fotoNpwp' => 'required'
        ]);

        $time = time();
        if ($request->hasFile('suratPermohonan')) {
            // File Surat Permohonan
            $suratPermohonanWithExt = $request->file('suratPermohonan')->getClientOriginalName();
            $suratPermohonanFilename = pathinfo($suratPermohonanWithExt, PATHINFO_FILENAME);
            $suratPermohonanExtension = $request->file('suratPermohonan')->getClientOriginalExtension();
            $request->file('suratPermohonan')->move('registration/requirement/surat_permohonan',$suratPermohonanFilename.'_'.$time.'.'.$suratPermohonanExtension);
            $suratPermohonan = $suratPermohonanFilename.'_'.$time.'.'.$suratPermohonanExtension; 
        }else {
            //
        }
        
        if ($request->hasFile('fotoNpwp')) {
            // Foto Npwp
            $fotoNpwpWithExt = $request->file('fotoNpwp')->getClientOriginalName();
            $fotoNpwpFilename = pathinfo($fotoNpwpWithExt, PATHINFO_FILENAME);
            $fotoNpwpExtension = $request->file('fotoNpwp')->getClientOriginalExtension();
            $request->file('fotoNpwp')->move('registration/requirement/npwp',$fotoNpwpFilename.'_'.$time.'.'.$fotoNpwpExtension);
            $fotoNpwp = $fotoNpwpFilename.'_'.$time.'.'.$fotoNpwpExtension;
        }else {
            // 
        }

        CompanyRegis::create([
            'leader_name' => $request->namaPimpinan,
            'company_name' => $request->namaPerusahaan,
            'npwp' => $request->npwp,
            'address' => $request->alamat,
            'user_id' => Auth::user()->id,
            'surat_permohonan' => $suratPermohonan,
            'foto_npwp' => $fotoNpwp,
            'status' => 'waiting'
        ]);

        Activity::create([
            'user_id' => Auth::user()->id,
            'jenis' => 'registrasi',
            'aktifitas' => 'Mendaftarkan perusahaan '.$request->namaPerusahaan,
            'url' => '/'
        ]);

        User::where('id', Auth::user()->id)->update([
            'company_status' => 'waiting'
        ]);

        // Send notif to admin
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
        $data = ['to' => 'admin'];
        $pusher->trigger('new-regis', 'new-regis-event', $data);

        Session::flash('berhasil_registrasi_perusahaan');
        return redirect('/');
    }

    public function company_registration_reupload()
    {
        if (Auth::user()->company_status == 'pending') {
            return view('auth.company_registration_reupload');
        }else{
            return redirect('/');
        }
    }

    public function company_registration_reupload_post(Request $request, $id)
    {
        $time = time();
        if ($request->hasFile('suratPermohonan')) {
            // File Surat Permohonan
            $suratPermohonanWithExt = $request->file('suratPermohonan')->getClientOriginalName();
            $suratPermohonanFilename = pathinfo($suratPermohonanWithExt, PATHINFO_FILENAME);
            $suratPermohonanExtension = $request->file('suratPermohonan')->getClientOriginalExtension();
            $request->file('suratPermohonan')->move('registration/requirement/surat_permohonan',$suratPermohonanFilename.'_'.$time.'.'.$suratPermohonanExtension);
            $suratPermohonan = $suratPermohonanFilename.'_'.$time.'.'.$suratPermohonanExtension; 
        }else {
            $suratPermohonan = null; 
        }
        
        if ($request->hasFile('fotoNpwp')) {
            // Foto Npwp
            $fotoNpwpWithExt = $request->file('fotoNpwp')->getClientOriginalName();
            $fotoNpwpFilename = pathinfo($fotoNpwpWithExt, PATHINFO_FILENAME);
            $fotoNpwpExtension = $request->file('fotoNpwp')->getClientOriginalExtension();
            $request->file('fotoNpwp')->move('registration/requirement/npwp',$fotoNpwpFilename.'_'.$time.'.'.$fotoNpwpExtension);
            $fotoNpwp = $fotoNpwpFilename.'_'.$time.'.'.$fotoNpwpExtension;
        }else {
            $fotoNpwp = null; 
        }

        if ($suratPermohonan != null) {
            CompanyRegis::where('id', $id)->update([
                'surat_permohonan' => $suratPermohonan,
            ]);
        }elseif ($fotoNpwp != null) {
            CompanyRegis::where('id', $id)->update([
                'foto_npwp' => $fotoNpwp,
            ]);
        }

        CompanyRegis::where('id', $id)->update([
            'npwp' => $request->npwp,
            'status' => 'waiting'
        ]);

        User::where('id', Auth::user()->id)->update([
            'company_status' => 'waiting'
        ]);

        Activity::create([
            'user_id' => Auth::user()->id,
            'jenis' => 'registrasi',
            'aktifitas' => 'Mengirim ulang persyaratan pendaftaran perusahaan',
            'url' => '/'
        ]);

        // Send notif to admin
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
        $data = ['to' => 'admin'];
        $pusher->trigger('new-regis', 'new-regis-event', $data);

        Session::flash('reupload');
        return redirect('/');
    }

}
