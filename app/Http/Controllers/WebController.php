<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Company;
use App\Models\Notifikasi;
use App\Models\Activity;
use Auth;
use Session;
use Route;
use Cache;
use Location;

class WebController extends Controller
{
    public function check_this_user_role()
    {
        if (Auth::user()->role == 'user') {
            return redirect('/');
        }elseif (Auth::user()->role == 'admin') {
            return redirect('/admin');
        }
    }

    public function logout()
    {
        Cache::forget('user-is-online-'.Auth::user()->id);
        Auth::logout();
        return redirect('/');
    }

    // Home
    public function index()
    {
        if (!Auth::guest()) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            }

            if (Auth::user()->profile == 'uncomplete') {
                return redirect('/advanced-profile');
            }else {
                return view('user.index');
            }
        }
        return view('user.index');
    }

    public function aktifitas()
    {
        $data = Activity::where('user_id', Auth::user()->id)->orderByRaw('created_at DESC')->paginate(5);
        return view('user.aktifitas', ['data' => $data]);
    }

    public function get_notif()
    {
        $notif = Notifikasi::where('kepada', Auth::user()->id)->orderByRaw('created_at DESC')->paginate(5);
        return view('user.notifikasi', ['notif' => $notif]);
    }

    public function get_notif_count()
    {
        $data = Notifikasi::where('kepada', Auth::user()->id)->where('is_read', '0')->get();
        return response()->json($data);
    }

    public function notif_read()
    {
        Notifikasi::where('kepada', Auth::user()->id)->update([
            'is_read' => '1'
        ]);
    }

    // user profile
    public function user_profile()
    {
        $data = DB::table('users')->where('id', Auth::user()->id)->get();
        return view('auth.edit_profile', ['data' => $data]);
    }

    // user edit profile
    public function user_profile_update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required'
        ]);
        // change password
        if ($request->oldPassword != '' || $request->newPassword != '' || $request->confirmPassword != '') {
            $this->validate($request, [
                'newPassword' => 'min:6|same:confirmPassword',
            ]);
            
            if(Hash::check($request->oldPassword, Auth::user()->password)){
                DB::table('users')->where('id', $id)->update([
                    'password' => bcrypt($request->newPassword)
                ]);
                Session::flash('ubah_password_berhasil');
            }else {
                Session::flash('password_salah');
                return redirect('/profile/edit');
            }
        }

        // profile update
        if($request->hasFile('profilePicture')){
            $time = time();
            $filenameWithExt = $request->file('profilePicture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profilePicture')->getClientOriginalExtension();
            $request->file('profilePicture')->move('user/profile_picture/',$filename.'_'.$time.'.'.$extension);
            $profilePicture = $filename.'_'.$time.'.'.$extension;
            DB::table('users')->where('id', $id)->update([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'phone' => $request->phoneNumber,
                'address' => $request->address,
                'picture' => $profilePicture
            ]);
        }else {
            DB::table('users')->where('id', $id)->update([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'phone' => $request->phoneNumber,
                'address' => $request->address,
            ]);
        }

        Activity::create([
            'user_id' => Auth::user()->id,
            'jenis' => 'update',
            'aktifitas' => 'Melakukan perubahan pada akun',
            'url' => '/profile/edit'
        ]);

        Session::flash('profile_updated');
        return redirect('/profile/edit');
    }

    public function company_update(Request $request)
    {
        Company::where('id', Auth::user()->company->id)->update([
            'leader_name' => $request->nama_pimpinan,
            'company_name' => $request->nama_perusahaan,
            'npwp' => $request->npwp,
            'address' => $request->alamat
        ]);

        Activity::create([
            'user_id' => Auth::user()->id,
            'jenis' => 'update',
            'aktifitas' => 'Merubah data perusahaan',
            'url' => '/'
        ]);

        Session::flash('company_updated');
        return redirect('/');
    }

    // Download
    // public function download($id)
    // {
    //     $nama_file = User::find($id);
    //     $path = public_path('user/profile_picture/'.$nama_file->picture);
    //     return response()->download($path, $nama_file->picture);
    // }

    public function enkrip()
    {
        function randomKey($length){
            $str        = "";
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
            $max        = strlen($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $str .= $characters[$rand];
            }
            return $str;
        }

        $data = 1;
        $cipher = 'AES-256-CBC';
        $key = randomKey(8);
        $option = 0;
        $iv = randomKey(16);
        $encrypted = openssl_encrypt($data, $cipher, $key, $option, $iv);
        $encrypted = base64_encode($encrypted);

        echo 'Raw Data = '.$data.'<br>';
        echo 'Encryption Method = OpenSSL Encryption <br>';
        echo 'OpenSSL Cipher = '.$cipher.'<br>';
        echo 'Key = '.$key.'<br>';
        echo 'Option = '.$option.'<br>';
        echo 'Initialization Vector = '.$iv.'<br>';
        echo '<br>';
        echo 'Encryption Result : <br>';
        echo $encrypted;
    }

    public function dekrip()
    {
        $encryptedData = "bXYrN0lMcDYvQ3prL3QwVVMzTHVFUT09";
        $cipher = 'AES-256-CBC';
        $key = '2U8D54O4';
        $option = 0;
        $iv = 'CEVSC8U2ENM2X3C5';
        $decrypt = openssl_decrypt(base64_decode($encryptedData), $cipher, $key, $option, $iv);

        echo $decrypt;
    }

    public function fileEncrypt()
    {
        $file = public_path('kapal/1_1603206569.jpg');
        
        $cipher = 'AES-256-CBC';
        $key = '224ECO6X';
        $option = 0;
        $iv = '2TKJSZZUR28DTIYE';
        $encrypt = openssl_encrypt($file, $cipher, $key, $option, $iv);
        echo openssl_decrypt($encrypt, $cipher, $key, $option, $iv);
    }

}
