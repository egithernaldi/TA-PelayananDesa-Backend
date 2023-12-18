<?php

namespace App\Http\Controllers;

use App\Models\Detailsurat;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class apiController extends Controller

{
     //api login 
     public function login(Request $request)
     {
         $nik = strip_tags($request->input('nik'));
         $password = strip_tags($request->input('password'));
         $user = User::where('nik', $nik)->first();
 
         if (!$user) {
             return response()->json([
                 'status' => 400,
                 'message' => 'Login gagal, silahkan periksa kembali username dan password anda',
             ]);
         }
         if ($user && Hash::check($request->password, $user->password)) {
             Auth::login($user);
             $user = Auth::user();
             if ($user) {
                 return response()->json([
                     'status' => 200,
                     'message' => 'Login Berhasil',
                     'data' => $user,
                 ]);
                 // return redirect()->intended('/');
             } else {
                 return response()->json([
                     'status' => 400,
                     'message' => 'Login Gagal, Silahkan Perikasa kembali username dan password anda',
                 ]);
             }
         } else {
             return response()->json([
                 'status' => 400,
                 'message' => 'Sepertinya terjadi Kesalahan',
             ]);
         }
     }

    // api register
    public function register(Request $request)
    {
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $email = $request->input('email');
        $password = $request->input('password');
        $tanggallahir = $request->input('tanggal_lahir');
        $tempatlahir = $request->input('tempat_lahir');
        $no_hp = $request->input('no_hp');
        $role = $request->input('role') ?? 2;

        $cekEmail = User::where('email', $email)->first();
        if ($cekEmail) {
            return response()->json([
                'status' => 400,
                'message' => 'Email Sudah digunakan'
            ]);
        }

        $cekUsername = User::where('nik', $nik)->first();
        if ($cekUsername) {
            return response()->json([
                'status' => 400,
                'message' => 'Username Sudah digunakan'
            ]);
        }

        $cekNoHp = User::where('no_hp', $no_hp)->first();
        if ($cekNoHp) {
            return response()->json([
                'status' => 400,
                'message' => 'Nomor Sudah digunakan'
            ]);
        }

        $user = User::create([
            'nik' => $nik,
            'nama' => $nama,
            'email' => $email,
            'password' => Hash::make($password),
            'tanggal_lahir' => $tanggallahir,
            'tempat_lahir' => $tempatlahir,
            'no_hp' => $no_hp,
            'role' => $role,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Registrasi Berhasil'
        ]);
    }

    //api cekLogin
    public function cekLogin()
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            return response()->json([
                'status' => 200,
                'message' => 'User Login',
                'data' => Auth::user()
            ],);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }
    }

    //Api Logout
    public function logout(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f'; // Replace with your actual secret token
        $headerValue = $request->header('token');
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ]);
        }
        if ($headerValue == $token) {
            Auth::logout();
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Logout',
            ]);
        } else {
            $data = [
                'status' => 400,
                'message' => 'Token Salah',
            ];
            return response()->json(['data' => $data]);
        }
    }
    // API Update Profile
    public function updateProfil(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f';
        $headerValue = $request->header('token');
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $password = $request->input('password');
        $no_hp = $request->input('no_hp');
        $tanggallahir = $request->input('tanggal_lahir');
        $tempatlahir = $request->input('tempat_lahir');
        $agama = $request->input('agama');
        $jekel = $request->input('jenis_kelamin');
        $alamat = $request->input('alamat');
        if ($headerValue == $token) {
            // mengambil data user
            $userAktif = User::find(Auth::id());
            $userAktif->nik = $nik;
            if ($agama != null) {
                $userAktif->agama = $agama;
            }
            if ($no_hp != null) {
                $userAktif->no_hp = $no_hp;
            }
            if ($nama != null) {
                $userAktif->nama = $nama;
            }
            if ($nik != null) {
                $userAktif->nik = $nik;
            }
            if ($tempatlahir != null) {
                $userAktif->tempatlahir = $tempatlahir;
            }
            if ($tanggallahir != null) {
                $userAktif->tanggallahir = $tanggallahir;
            }
            if ($jekel != null) {
                $userAktif->jenis_kelamin = $jekel;
            }
            if ($alamat != null) {
                $userAktif->alamat = $alamat;
            }
            $userAktif->update([
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $no_hp,
                'tanggal_lahir' => $tanggallahir,
                'tempat_lahir' => $tempatlahir,
                'agama' => $agama,
                'jekel' => $jekel,
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Update Data'
            ],);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Token Salah'
            ],);
        }
    }

    //User Aktif
    public function userAktif(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f';
        $headerValue = $request->header('token');

        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }

        if ($headerValue == $token) {
            $user = User::find(Auth::id());
            $result[] = [
                'id' => $user->id,
                'nik' => $user->nik,
                'nama' => $user->nama,
                'email' => $user->email,
                'tanggal_lahir' => $user->tanggal_lahir,
                'tempat_lahir' => $user->tempat_lahir,
                'agama' => $user->agama,
                'alamat' => $user->alamat,
                'jenis_kelamin' => $user->jenis_kelamin,
                'no_hp' => $user->no_hp,
            ];

            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $result
            ]);
        } else {
            $data = [
                'status' => 400,
                'message' => 'Token Salah',
            ];
            return response()->json(['data' => $data]);
        }
    }

    //Buat Domisili
    public function createdomisili(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f';
        $headerValue = $request->header('token');

        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }

        if ($headerValue == $token) {
            $data = [
                'id_user'     => Auth::id(),
                'status_perkawinan' => $request->status_perkawinan,
                'kewarganegaraan'     => $request->kewarganegaraan,
                'id_surat' => $request->id_surat ?? 1,
            ];

            $surat = Detailsurat::create($data);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Membuat Surat',

            ]);
        } else {
            $data = [
                'status' => 400,
                'message' => 'Token Salah',
            ];
            return response()->json(['data' => $data]);
        }
    }
    //Buat keramaian
    public function createkeramaian(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f';
        $headerValue = $request->header('token');

        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }

        if ($headerValue == $token) {
            $data = [
                'id_user'     => Auth::id(),
                'umur'     => $request->umur,
                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                'tempat_kegiatan' => $request->tempat_kegiatan,
                'nama_kegiatan' => $request->nama_kegiatan,
                'id_surat' => $request->id_surat ?? 4,
            ];

            $surat = Detailsurat::create($data);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Membuat Surat',

            ]);
        } else {
            $data = [
                'status' => 400,
                'message' => 'Token Salah',
            ];
            return response()->json(['data' => $data]);
        }
    }
    //Buat nikah
    public function createnikah(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f';
        $headerValue = $request->header('token');

        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }

        if ($headerValue == $token) {
            $data = [
                'id_user'     => Auth::id(),
                'id_surat' => $request->id_surat ?? 3,
            ];

            $surat = Detailsurat::create($data);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Membuat Surat',

            ]);
        } else {
            $data = [
                'status' => 400,
                'message' => 'Token Salah',
            ];
            return response()->json(['data' => $data]);
        }
    }
    //Buat keramaian
    public function createusaha(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f';
        $headerValue = $request->header('token');

        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }

        if ($headerValue == $token) {
            $data = [
                'id_user'     => Auth::id(),
                'umur'     => $request->umur,
                'nama_usaha' => $request->nama_usaha,
                'tempat_usaha' => $request->tempat_usaha,
                'id_surat' => $request->id_surat ?? 2,
            ];

            $surat = Detailsurat::create($data);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Membuat Surat',

            ]);
        } else {
            $data = [
                'status' => 400,
                'message' => 'Token Salah',
            ];
            return response()->json(['data' => $data]);
        }
    }

    public function riwayatdomisili(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f';
        $headerValue = $request->header('token');
        $id_surat = $request->input('id_surat');
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }

        if ($headerValue == $token) {
            $data = Detailsurat::where('id_user', $user->id)->where('id_surat', '1')->get();

            //  dd($data);
            $result = [];
            foreach ($data as $surat) {
                $user = User::find(Auth::id());
                $namaSurat = Surat::find($surat->id_surat);
                $result[] = [
                    'id' => $surat->id,
                    'id_user' => $surat->id_user,
                    'id_surat' => $surat->id_surat,
                    'jenis_surat' => $namaSurat->jenis_surat,
                    'kewarganegaraan' => $surat->kewarganegaraan,
                ];
            }
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $result
            ]);
        } else {
            $data = [
                'status' => 400,
                'message' => 'Token Salah',
            ];
            return response()->json(['data' => $data]);
        }
    }
    public function riwayatusaha(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f';
        $headerValue = $request->header('token');
        $id_surat = $request->input('id_surat');
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }

        if ($headerValue == $token) {
            $data = Detailsurat::where('id_user', $user->id)->where('id_surat', '2')->get();

            //  dd($data);
            $result = [];
            foreach ($data as $surat) {
                $user = User::find(Auth::id());
                $namaSurat = Surat::find($surat->id_surat);
                $result[] = [
                    'id' => $surat->id,
                    'id_user' => $surat->id_user,
                    'id_surat' => $surat->id_surat,
                    'nama_usaha' => $surat->nama_usaha,
                    'tempat_usaha' => $surat->tempat_usaha,
                ];
            }
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $result
            ]);
        } else {
            $data = [
                'status' => 400,
                'message' => 'Token Salah',
            ];
            return response()->json(['data' => $data]);
        }
    }
    public function riwayatnikah(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f';
        $headerValue = $request->header('token');
        $id_surat = $request->input('id_surat');
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }

        if ($headerValue == $token) {
            $data = Detailsurat::where('id_user', $user->id)->where('id_surat', '3')->get();

            //  dd($data);
            $result = [];
            foreach ($data as $surat) {
                $user = User::find(Auth::id());
                $namaSurat = Surat::find($surat->id_surat);
                $result[] = [
                    'id' => $surat->id,
                    'id_user' => $surat->id_user,
                    'id_surat' => $surat->id_surat,
                ];
            }
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $result
            ]);
        } else {
            $data = [
                'status' => 400,
                'message' => 'Token Salah',
            ];
            return response()->json(['data' => $data]);
        }
    }
    public function riwayatkeramaian(Request $request)
    {
        $token = '0317a86234d1298ffd94e3ee91cdc55f';
        $headerValue = $request->header('token');
        $id_surat = $request->input('id_surat');
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => 'User is not logged in'
            ],);
        }

        if ($headerValue == $token) {
            $data = Detailsurat::where('id_user', $user->id)->where('id_surat', '4')->get();

            //  dd($data);
            $result = [];
            foreach ($data as $surat) {
                $user = User::find(Auth::id());
                $namaSurat = Surat::find($surat->id_surat);
                $result[] = [
                    'id' => $surat->id,
                    'id_user' => $surat->id_user,
                    'id_surat' => $surat->id_surat,
                    'umur' => $surat->umur,
                    'nama_kegiatan' => $surat->nama_kegiatan,
                    'tempat_kegiatan' => $surat->tempat_kegiatan,
                    'tanggal_kegiatan' => $surat->tanggal_kegiatan,
                ];
            }
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $result
            ]);
        } else {
            $data = [
                'status' => 400,
                'message' => 'Token Salah',
            ];
            return response()->json(['data' => $data]);
        }
    }
}
