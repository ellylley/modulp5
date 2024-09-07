<?php

namespace App\Controllers;

use Codeigniter\Controllers;
use App\models\M_projek1;
use CodeIgniter\Session\Session;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\LevelPermissionModel;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('level')>0){
            $model= new M_projek1();
            $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman dashboard'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
       
            $where=array(
                'id_setting'=> 1
              );
              $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view('menu', $data);
        echo view('dashboard', $data);
        echo view('footer');
    }else{
        return redirect()->to('home/login');
 
    } 
    }
    public function error()
    {
            $model = new M_projek1();
            
            $where=array(
              'id_toko'=> 1
            );
            $data['setting'] = $model->getWhere('toko',$where);
            echo view('header', $data);
            echo view ('menu', $data);
            echo view('error', $data);
            echo view ('footer');
           
            
    }
    public function login()
    {
        $model= new M_projek1();
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header');
        echo view('login', $data);
    // $where=array(
    //   'id_toko'=> 1
    // );
    // $data['setting'] = $model->getWhere('toko',$where);

    //    echo view('header',$data);
    //     echo view('login', $data);


} 

public function aksilogin()
{
    $name = $this->request->getPost('nama');
    $pw = $this->request->getPost('password');
    $captchaResponse = $this->request->getPost('g-recaptcha-response');
    $backupCaptcha = $this->request->getPost('backup_captcha');
    
    $secretKey = '6LdLhiAqAAAAAPxNXDyusM1UOxZZkC_BLCgfyoQf'; // Ganti dengan secret key Anda yang sebenarnya
    $recaptchaSuccess = false;

    $captchaModel = new M_projek1();

    // Cek koneksi internet
    if ($this->isInternetAvailable()) {
        // Verifikasi reCAPTCHA
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captchaResponse");
        $responseKeys = json_decode($response, true);
        $recaptchaSuccess = $responseKeys["success"];
    }
    
    if ($recaptchaSuccess) {
        // reCAPTCHA berhasil
        $where = [
            'nama_user' => $name,
            'password' => md5($pw),
        ];

        $model = new M_projek1();
        $check = $model->getWhere('user', $where);

        if ($check) {
            session()->set('id', $check->id_user);
            session()->set('nama', $check->nama_user);
            session()->set('level', $check->level);
            session()->set('foto', $check->foto);
            session()->set('id_kelas', $check->id_kelas);
            session()->set('editmodul', $check->editmodul);
            return redirect()->to('home');
        } else {
            return redirect()->to('home/login')->with('error', 'Invalid username or password.');
        }
    } else {
        // Validasi CAPTCHA offline
        $storedCaptcha = session()->get('captcha_code'); // Retrieve stored CAPTCHA from session
        
        if ($storedCaptcha !== null) {
            if ($storedCaptcha === $backupCaptcha) {
                // CAPTCHA valid
                $where = [
                    'nama_user' => $name,
                    'password' => md5($pw),
                ];

                $model = new M_projek1();
                $check = $model->getWhere('user', $where);

                if ($check) {
                    session()->set('id', $check->id_user);
                    session()->set('nama', $check->nama_user);
                    session()->set('level', $check->level);
                    session()->set('foto', $check->foto);
                    session()->set('id_kelas', $check->id_kelas);
                    session()->set('editmodul', $check->editmodul);

                    return redirect()->to('home');
                } else {
                    return redirect()->to('home/login')->with('error', 'Invalid username or password.');
                }
            } else {
                // CAPTCHA tidak valid
                return redirect()->to('home/login')->with('error', 'Invalid CAPTCHA.');
            }
        } else {
            return redirect()->to('home/login')->with('error', 'CAPTCHA session is not set.');
        }
    }
}


    public function generateCaptcha()
{
    $code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

    // Store the CAPTCHA code in the session
    session()->set('captcha_code', $code);

    // Generate the image
    $image = imagecreatetruecolor(120, 40);
    $bgColor = imagecolorallocate($image, 255, 255, 255);
    $textColor = imagecolorallocate($image, 0, 0, 0);

    imagefilledrectangle($image, 0, 0, 120, 40, $bgColor);
    imagestring($image, 5, 10, 10, $code, $textColor);

    // Set the content type header - in this case image/png
    header('Content-Type: image/png');

    // Output the image
    imagepng($image);

    // Free up memory
    imagedestroy($image);
}

private function isInternetAvailable()
{
    $connected = @fsockopen("www.google.com", 80);
    if ($connected) {
        fclose($connected);
        return true;
    }
    return false;
}

public function logout()
        {
           session()->destroy();
            return redirect()->to('Home/login');
    

}




    

    public function user()
    {   
        if (session()->get('level') == 0 || session()->get('level') == 1) {

    	$model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman manajemen user'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
       
        $data['elly'] = $model->tampil('user','id_user');
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu',$data);
        echo view('user',$data);
        echo view ('footer');
         }else{
        return redirect()->to('home/error');
 
    } 
    }
    public function restore_user()
    {   
        if (session()->get('level') == 0 || session()->get('level') == 1) {
    	$model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman restore user'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        $where = [
            'user.isdelete' => 1,
            
        ];
        $data['elly'] = $model->joinsiswa('user', 'kelas', 'user.id_kelas=kelas.id_kelas', 'user.id_user', $where);
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu',$data);
        echo view('restore_user',$data);
        echo view ('footer');
         }else{
        return redirect()->to('home/error');
 
    } 
    }
    public function reedit_user()
    {   
        if (session()->get('level') == 0 || session()->get('level') == 1) {
    	$model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman restore edit user'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        $where = [
            'backup_user.isdelete' => 0,
            
        ];
        $data['elly'] = $model->joinsiswa('backup_user', 'kelas', 'backup_user.id_kelas=kelas.id_kelas', 'backup_user.id_user', $where);
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu',$data);
        echo view('reedit_user',$data);
        echo view ('footer');
         }else{
        return redirect()->to('home/error');
 
    } 
    }

    public function aksireuser($id) {
        $model = new M_projek1();
         $id_user = session()->get('id'); // Ambil ID user dari session
            $activity = 'Merestore user'; // Deskripsi aktivitas
            $this->addLog($id_user, $activity);
        
        // Data yang akan diupdate untuk mengembalikan produk
        $data = [
            'isdelete' => 0,
            'deleted_by' => null,
            'deleted_at' => null
        ];
    
        // Update data produk dengan kondisi id_produk sesuai
        $model->edit('user', $data, ['id_user' => $id]);
    
        return redirect()->to('home/restore_user');
    }
    public function guru()
    {   
        if (session()->get('level') == 0 || session()->get('level') == 1|| session()->get('level') == 2|| session()->get('level') == 3) {
    	$model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman daftar guru'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
      
        $data['elly'] = $model->tampil('user','id_user');
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu',$data);
        echo view('guru',$data);
        echo view ('footer');
         }else{
        return redirect()->to('home/error');
 
    } 
    }
    public function edituser($id)
{
    if (session()->get('level') == 0 || session()->get('level') == 1) {
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman edit user'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
       

        // Mengambil data user berdasarkan id_user
        $where = array('id_user' => $id);
        $data['satu'] = $model->getWhere('user', $where);

        // Mengambil data setting
        $where = array('id_setting' => 1);
        $data['setting'] = $model->getWhere('setting', $where);

        // Mengambil data kelas
        $data['elly'] = $model->tampil('kelas', 'id_kelas');

        echo view('header', $data);
        echo view('menu', $data);
        echo view('edituser', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/error');
    }
}

    public function hapususer($id){
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Menghapus data user'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        $data = [
            'isdelete' => 1,
            'deleted_by' => $id_user,
            'deleted_at' => date('Y-m-d H:i:s') // Format datetime untuk deleted_at
        ];
          
        $model->edit('user', $data, ['id_user' => $id]);

        // Hapus data dari tabel backup_kelas
    $where = array('id_user' => $id);
    $model->hapus('backup_user', $where);
        return redirect()->to('home/user');
   }

   

    public function tambahuser()
    {
        if (session()->get('level') == 0 || session()->get('level') == 1) {
        $model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman tambah user'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
      
       
        $data['elly'] = $model->tampil('kelas','id_kelas');
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu',$data);
        echo view('tambahuser', $data);
        echo view ('footer');
      }else{
            return redirect()->to('Home/error');
        }    
    }
    public function aksituser()
    {
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Menambah user'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        // Mengambil data log aktivitas dari model
      
        $a = $this->request->getPost('nama');
        $b = $this->request->getPost('level');
        $c = md5($this->request->getPost('password'));
        $d = $this->request->getPost('nis');
        $e = $this->request->getPost('nisn');
        $f = $this->request->getPost('kelas');
        $g = $this->request->getPost('editmodul');
        $uploadedFile = $this->request->getFile('foto');

        // Cek apakah file foto di-upload atau tidak
        if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
            $foto = $uploadedFile->getName();
            $model->upload($uploadedFile);
        } else {
            // Set foto default jika tidak ada file yang di-upload
            $foto = 'default.jpg';
        }
        if ($b == 1) {
            $g = 1; // Atau bisa di-set ke string kosong ''
           
        }
    
        
        $isi = array(
            'nama_user' => $a,
            'level' => $b,
            'password' => $c,
           'nis' => $d,
            'nisn' => $e,
            'id_kelas' => $f,
            'editmodul' => 0,
            'foto' => $foto,
            'created_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
            'created_by' => $id_user // ID user yang login
            

        );
        $model ->tambah('user', $isi);
        
        return redirect()->to('home/user');
    }
    public function aksieuser()
{
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengubah data user'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        // Mengambil data log aktivitas dari model
       
    $a = $this->request->getPost('nama');
    $b = $this->request->getPost('level');
    $c = ($this->request->getPost('password'));
    $d = $this->request->getPost('nis');
    $e = $this->request->getPost('nisn');
    $f = $this->request->getPost('kelas');
    $g = $this->request->getPost('editmodul');
    $id = $this->request->getPost('id');
    $fotoName = $this->request->getPost('old_foto'); // Mengambil nama foto lama
    $foto = $this->request->getFile('foto');


    $backupWhere = ['id_user' => $id];
    $existingBackup = $model->getWhere('backup_user', $backupWhere);

    if ($existingBackup) {
        // Hapus data lama di user_backup jika ada
        $model->hapus('backup_user', $backupWhere);
    }

    // Ambil data user lama berdasarkan id_user
    $userLama = $model->getUserById($id);

    // Simpan data user lama ke tabel user_backup
    $backupData = (array) $userLama;  // Ubah objek menjadi array
    $model->tambah('Backup_user', $backupData);


    if ($foto && $foto->isValid()) {
        // Generate a new name for the uploaded file
        $newName = $foto->getRandomName();
        // Move the file to the target directory
        $foto->move(ROOTPATH . 'public/images', $newName);
        // Set the new file name to be saved in the database
        $fotoName = $newName;
    }

    // Mengatur nilai untuk nis dan nisn berdasarkan level
    if ($b == 1) {
        $d = null; // Atau bisa di-set ke string kosong ''
        $e = null; // Atau bisa di-set ke string kosong ''
    }

    // Mengatur id_kelas jadi null jika level adalah 2, 3, atau 4
    if (in_array($b, [2, 3, 4])) {
        $f = null;
    }

    $isi = array(
        'nama_user' => $a,
        'level' => $b,
        'password' => $c,
        'nis' => $d,
        'nisn' => $e,
        'id_kelas' => $f,
        'editmodul' => $g,
        'foto' => $fotoName,
        'updated_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
        'updated_by' => $id_user // ID user yang login
    );

    $where = array('id_user' => $id);
    $model->edit('user', $isi, $where);

    return redirect()->to('home/user');
}

public function aksi_reedit_user($id)
{
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Merestore user yang diedit'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
    // Ambil data dari tabel user_backup berdasarkan id_user
    $backupData = $model->getWhere('backup_user', ['id_user' => $id]);

    if ($backupData) {
        // Konversi data backup menjadi array
        $restoreData = (array) $backupData;

        // Hapus id_user dari array karena id_user tidak perlu di-update
        unset($restoreData['id_user']);

        // Update data di tabel user dengan data dari user_backup
        $model->edit('user', $restoreData, ['id_user' => $id]);

        // Hapus data dari tabel user_backup setelah di-restore
        $model->hapus('backup_user', ['id_user' => $id]);
    }

    return redirect()->to('home/reedit_user');
}

public function aksi_reedit_kelas($id)
{
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Merestore kelas yang diedit'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
    // Ambil data dari tabel user_backup berdasarkan id_user
    $backupData = $model->getWhere('backup_kelas', ['id_kelas' => $id]);

    if ($backupData) {
        // Konversi data backup menjadi array
        $restoreData = (array) $backupData;

        // Hapus id_user dari array karena id_user tidak perlu di-update
        unset($restoreData['id_kelas']);

        // Update data di tabel user dengan data dari user_backup
        $model->edit('kelas', $restoreData, ['id_kelas' => $id]);

        // Hapus data dari tabel user_backup setelah di-restore
        $model->hapus('backup_kelas', ['id_kelas' => $id]);
    }

    return redirect()->to('home/reedit_kelas');
}

    public function aksi_reset($id)
{
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mereset password user'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        // Mengambil data log aktivitas dari model
      
    $where = array('id_user' => $id);
    
    $isi = array(
        'password' => md5('12345'),
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $id_user
    );
    $model->edit('user', $isi, $where);

    return redirect()->to('home/user');
}

public function hapusmodul($id) {
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
    $activity = 'Mengedit Modul'; // Deskripsi aktivitas
    $this->addLog($id_user, $activity);
    
    $dataModul = [
        'isdelete' => 1, // Update field sesuai kebutuhan
        'deleted_by' => $id_user,
        'deleted_at' => date('Y-m-d H:i:s') // Format datetime untuk updated_at
    ];
    
    // Update data di tabel modul
    $whereModul = ['id_modul' => $id];
    $model->edit('modul', $dataModul, $whereModul);
    
    // Update data terkait di tabel fase yang punya id_modul sama
    $dataFase = [
        'isdelete' => 1, // Update field sesuai kebutuhan
        'deleted_by' => $id_user,
        'deleted_at' => date('Y-m-d H:i:s') // Format datetime untuk updated_at
    ];
    
    $whereFase = ['id_modul' => $id];
    $model->edit('fase', $dataFase, $whereFase);
    // Hapus data dari tabel backup_kelas
    $where = array('id_modul' => $id);

// Delete from backup_modul
$model->hapus('backup_modul', $where);

// Delete from backup_fase
$model->hapus('backup_fase', $where);
    return redirect()->to('home/kelolamodul');
}

public function aksiremodul($id) {
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
    $activity = 'Merestore Modul'; // Deskripsi aktivitas
    $this->addLog($id_user, $activity);
    
    $dataModul = [
        'isdelete' => 0, // Update field sesuai kebutuhan
        'deleted_by' => null,
        'deleted_at' => null // Format datetime untuk updated_at
    ];
    
    // Update data di tabel modul
    $whereModul = ['id_modul' => $id];
    $model->edit('modul', $dataModul, $whereModul);
    
    // Update data terkait di tabel fase yang punya id_modul sama
    $dataFase = [
        'isdelete' => 0, // Update field sesuai kebutuhan
        'deleted_by' => null,
        'deleted_at' => null // Format datetime untuk updated_at
    ];
    
    $whereFase = ['id_modul' => $id];
    $model->edit('fase', $dataFase, $whereFase);
    
    return redirect()->to('home/restore_modul');
}




    

public function siswa()
{   
    if (session()->get('level') == 0 || session()->get('level') == 1|| session()->get('level') == 2|| session()->get('level') == 3) {
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman daftar siswa'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);

        // Menambahkan kondisi where untuk isdelete=0 dan level=5
        $where = [
            'user.isdelete' => 0,
            'user.level' => 5
        ];
        $data['elly'] = $model->joinsiswa('user', 'kelas', 'user.id_kelas=kelas.id_kelas', 'user.id_user', $where);
        
        $settingWhere = array(
            'id_setting' => 1
        );
        $data['setting'] = $model->getWhere('setting', $settingWhere);

        echo view('header', $data);
        echo view('menu', $data);
        echo view('murid', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/error');
    } 
}


//modul

public function tambahmodul()
    {
        if (session()->get('level') == 0  || session()->get('editmodul') == 1) {
        $model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman tambah modul'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        
        $data['elly'] = $model->tampil('kelas','id_kelas');
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu', $data);
        echo view('tambahmodul',$data);
        echo view ('footer');
      }else{
            return redirect()->to('Home/error');
        }    
    }

    public function aksitambahmodul()
{
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
    $activity = 'Menambah modul'; // Deskripsi aktivitas
    $this->addLog($id_user, $activity);
    
    // Mengambil data log aktivitas dari model
   
    // Ambil data dari request
    $kelas = $this->request->getPost('nama_kelas'); // Array kelas
    $tema_modul = $this->request->getPost('tema_modul');
    $dimensi_modul = $this->request->getPost('dimensi_modul');
    $elemen_modul = $this->request->getPost('elemen_modul');
    $subelemen_modul = $this->request->getPost('subelemen_modul');
    $capakhir_modul = $this->request->getPost('capakhir_modul');
    $tujuan = $this->request->getPost('tujuan');
    $asesmen_slrh = $this->request->getPost('asesmen_slrh');
    $tips_pelaksana = $this->request->getPost('tips_pelaksana');
    $nama_fase = $this->request->getPost('nama_fase'); // Array fase
    $kegiatan = $this->request->getPost('kegiatan'); // Array kegiatan
    $asesmen = $this->request->getPost('asesmen'); // Array asesmen
    $uploadedFile = $this->request->getFile('foto');
    $foto = '';

    if ($uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
        $foto = $uploadedFile->getName();
        $model->upload($uploadedFile);
    }

    // Menyiapkan data modul
    $dataModul = [
        'tema_modul' => $tema_modul,
        'dimensi_modul' => $dimensi_modul,
        'elemen_modul' => $elemen_modul,
        'subelemen_modul' => $subelemen_modul,
        'capakhir_modul' => $capakhir_modul,
        'tujuan' => $tujuan,
        'asesmen_slrh' => $asesmen_slrh,
        'tips_pelaksana' => $tips_pelaksana,
        'bg_tema' => $foto,
        'created_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
        'created_by' => $id_user // ID user yang login
    ];

    // Loop untuk setiap kelas
    foreach ($kelas as $index => $id_kelas) {
        // Menyiapkan data fase untuk setiap kelas
        $dataFase = [];
        foreach ($nama_fase as $key => $fase) {
            $dataFase[] = [
                'id_kelas' => $id_kelas,
                'nama_fase' => $fase,
                'kegiatan' => $kegiatan[$key],
                'asesmen' => $asesmen[$key],
                'created_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
                'created_by' => $id_user // ID user yang login
            ];
        }

        // Menambahkan modul dengan id_kelas
        $dataModul['id_kelas'] = $id_kelas;
        $id_modul = $model->tambahmodul($dataModul, $dataFase);
    }

    return redirect()->to('home/kelolamodul');
}

public function aksieditmodul()
{
    $model = new M_projek1();

    $id_user = session()->get('id'); // Ambil ID user dari session
    $activity = 'mengubah data modul'; // Deskripsi aktivitas
    $this->addLog($id_user, $activity);
    
    // Ambil data dari request
    $kelas = $this->request->getPost('nama_kelas'); // Array kelas
    $tema_modul = $this->request->getPost('tema_modul');
    $dimensi_modul = $this->request->getPost('dimensi_modul');
    $elemen_modul = $this->request->getPost('elemen_modul');
    $subelemen_modul = $this->request->getPost('subelemen_modul');
    $capakhir_modul = $this->request->getPost('capakhir_modul');
    $tujuan = $this->request->getPost('tujuan');
    $asesmen_slrh = $this->request->getPost('asesmen_slrh');
    $tips_pelaksana = $this->request->getPost('tips_pelaksana');
    $nama_fase = $this->request->getPost('nama_fase'); // Array fase
    $kegiatan = $this->request->getPost('kegiatan'); // Array kegiatan
    $asesmen = $this->request->getPost('asesmen'); // Array asesmen
    $idfase = $this->request->getPost('id_fase'); // Array asesmen
    $idmodul = $this->request->getPost('id_modul');
    
    $fotoName = $this->request->getPost('old_foto'); // Mengambil nama foto lama
    $foto = $this->request->getFile('foto');

    // Proses upload foto baru jika ada
    if ($foto && $foto->isValid()) {
        $newName = $foto->getRandomName();
        $foto->move(ROOTPATH . 'public/images', $newName);
        $fotoName = $newName;
    }

    // Backup data modul lama
    $backupWhereModul = ['id_modul' => $idmodul];
    $existingBackupModul = $model->getWhere('backup_modul', $backupWhereModul);

    if ($existingBackupModul) {
        // Hapus backup modul lama jika ada
        $model->hapus('backup_modul', $backupWhereModul);
    }

    // Ambil data modul lama
    $modulLama = $model->getModuleById($idmodul);

    // Simpan data modul lama ke tabel backup_modul
    $backupModulData = (array) $modulLama;
    $model->tambah('backup_modul', $backupModulData);

    // Backup data fase lama
    $backupWhereFase = ['id_modul' => $idmodul];
    $existingBackupFase = $model->getWhere('backup_fase', $backupWhereFase);

    if ($existingBackupFase) {
        // Hapus backup fase lama jika ada
        $model->hapus('backup_fase', $backupWhereFase);
    }

    // Ambil semua fase lama berdasarkan id_modul
    $faseLama = $model->getFaseByModulId($idmodul);

    // Simpan data fase lama ke tabel backup_fase
    foreach ($faseLama as $fase) {
        $backupFaseData = (array) $fase;
        $model->tambah('backup_fase', $backupFaseData);
    }

    // Update data modul
    $dataModul = [
        'tema_modul' => $tema_modul,
        'dimensi_modul' => $dimensi_modul,
        'elemen_modul' => $elemen_modul,
        'subelemen_modul' => $subelemen_modul,
        'capakhir_modul' => $capakhir_modul,
        'tujuan' => $tujuan,
        'id_kelas' => $kelas,
        'asesmen_slrh' => $asesmen_slrh,
        'tips_pelaksana' => $tips_pelaksana,
        'bg_tema' => $fotoName,
        'updated_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
        'updated_by' => $id_user // ID user yang login
    ];
    
    $where = [
        'id_modul' => $idmodul
    ];
    $model->edit('modul', $dataModul, $where);

    // Loop untuk setiap kelas
    foreach ($kelas as $index => $id_kelas) {
        foreach ($nama_fase as $key => $fase) {
            if (isset($idfase[$key]) && !empty($idfase[$key])) {
                // Jika id_fase ada, maka update fase yang sudah ada
                $dataFase = [
                    'id_kelas' => $id_kelas,
                    'nama_fase' => $fase,
                    'kegiatan' => $kegiatan[$key],
                    'asesmen' => $asesmen[$key],
                    'updated_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
                    'updated_by' => $id_user // ID user yang login
                ];
                $where = [
                    'id_fase' => $idfase[$key]
                ];
                
                $model->edit('fase', $dataFase, $where);
            } else {
                // Jika id_fase tidak ada, maka tambahkan fase baru
                $dataFaseBaru = [
                    'id_kelas' => $id_kelas,
                    'id_modul' => $idmodul,
                    'nama_fase' => $fase,
                    'kegiatan' => $kegiatan[$key],
                    'asesmen' => $asesmen[$key],
                    'created_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
                    'created_by' => $id_user // ID user yang login
                ];
                $model->tambah('fase', $dataFaseBaru);
            }
        }
    }

    return redirect()->to('home/kelolamodul');
}






public function kelolamodul()
    {   
        if (session()->get('level') == 0  || session()->get('editmodul') == 1) {
    	$model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman kelola modul'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        $where = [
            'modul.isdelete' => 0
           
        ];
        $data['elly'] = $model->joinsiswa('modul','kelas','modul.id_kelas=kelas.id_kelas','modul.id_modul', $where);
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu', $data);
        echo view('kelolamodul', $data);
        echo view ('footer', $data);
         }else{
        return redirect()->to('home/error');
 
    } 
    }

    public function restore_modul()
    {   
        if (session()->get('level') == 0 || session()->get('level') == 1) {
    	$model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman restore modul'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        $where = [
            'modul.isdelete' => 1
           
        ];
        $data['elly'] = $model->jointigawhere('modul','kelas','fase','modul.id_kelas=kelas.id_kelas','fase.id_modul=modul.id_modul','modul.id_modul', $where);
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu', $data);
        echo view('restore_modul', $data);
        echo view ('footer', $data);
         }else{
        return redirect()->to('home/error');
 
    } 
    }
    
    public function reedit_modul()
    {   
        if (session()->get('level') == 0  || session()->get('editmodul') == 1) {
    	$model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman restore edit modul'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        $where = [
            'backup_modul.isdelete' => 0
           
        ];
        $data['elly'] = $model->jointigawhere('backup_modul','kelas','backup_fase','backup_modul.id_kelas=kelas.id_kelas','backup_fase.id_modul=backup_modul.id_modul','backup_modul.id_modul', $where);
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu', $data);
        echo view('reedit_modul', $data);
        echo view ('footer', $data);
         }else{
        return redirect()->to('home/error');
 
    } 
    }

    public function aksi_reedit_modul($id_modul)
{
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
    $activity = 'Merestore modul yang diedit'; // Deskripsi aktivitas
    $this->addLog($id_user, $activity);

    // Ambil data backup dari tabel backup_modul berdasarkan id_modul
    $backupModulData = $model->getWhere('backup_modul', ['id_modul' => $id_modul]);

    if ($backupModulData) {
        // Konversi data backup menjadi array
        $restoreModulData = (array) $backupModulData;

        // Hapus id_modul dari array karena id_modul tidak perlu di-update
        unset($restoreModulData['id_modul']);

        // Update data di tabel modul dengan data dari backup_modul
        $model->edit('modul', $restoreModulData, ['id_modul' => $id_modul]);

        // Hapus data dari tabel backup_modul setelah di-restore
        $model->hapus('backup_modul', ['id_modul' => $id_modul]);
    }

    // Ambil data backup dari tabel backup_fase berdasarkan id_modul
    $backupFaseData = $model->getWherecon('backup_fase', ['id_modul' => $id_modul]);
    // print_r($backupFaseData);
    if ($backupFaseData) {
        // Loop melalui setiap fase yang ada di backup
        foreach ($backupFaseData as $fase) {
            $restoreFaseData = (array) $fase;

            // Hapus id_fase dari array karena id_fase tidak perlu di-update
            unset($restoreFaseData['id_fase']);

            // Update data di tabel fase dengan data dari backup_fase
            $model->edit('fase', $restoreFaseData, ['id_fase' => $fase->id_fase]);
        }

        // Hapus data dari tabel backup_fase setelah di-restore
        $model->hapus('backup_fase', ['id_modul' => $id_modul]);
    }

    return redirect()->to('home/reedit_modul');
}


    public function detailmodul($id_modul)
{   
    if (session()->get('level') == 0  || session()->get('editmodul') == 1) {
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman detail modul'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
      
        // Sesuaikan argumen sesuai dengan definisi method join
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        $data['elly'] = $model->getModulById($id_modul);

        echo view('header', $data);
        echo view('menu', $data);
        echo view('detailmodul', $data);
        echo view('footer', $data);
    } else {
        return redirect()->to('home/error');
    } 
}
public function modul()
{   
    if (session()->get('level') > 0) {
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman modul'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);

        $level = session()->get('level'); // Ambil level dari session
        $id_kelas = session()->get('id_kelas'); // Ambil id_kelas dari session jika level = 5
        
        // Kondisi untuk menampilkan data berdasarkan level
        if ($level == 5) {
            $where = [
                'modul.isdelete' => 0,
                'modul.id_kelas' => $id_kelas // Tampilkan hanya data untuk id_kelas tertentu
            ];
        } else {
            $where = [
                'modul.isdelete' => 0
            ]; // Tampilkan semua data jika level selain 5
        }

        $data['elly'] = $model->joinsiswa('modul', 'kelas', 'modul.id_kelas=kelas.id_kelas', 'modul.id_modul', $where);

        $where = [
            'id_setting' => 1
        ];
        $data['setting'] = $model->getWhere('setting', $where);

        echo view('header', $data);
        echo view('menu', $data);
        echo view('modul', $data);
        echo view('footer', $data);
    } else {
        return redirect()->to('home/error');
    }
}




    public function modulmodul($id_modul)
{   
    if (session()->get('level') > 0) {
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman detail modul'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
      
       
        $data['elly'] = $model->getModulById($id_modul);
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);

        echo view('header', $data);
        echo view('menu', $data);
        echo view('modulmodul', $data);
        echo view('footer', $data);
    } else {
        return redirect()->to('home/login');
    } 
}



    public function editmodul($id_modul)
    {   
        if (session()->get('level') == 0  || session()->get('editmodul') == 1) {
            $model = new M_projek1();
            $id_user = session()->get('id'); // Ambil ID user dari session
            $activity = 'Mengakses halaman edit modul'; // Deskripsi aktivitas
            $this->addLog($id_user, $activity);
            
           
           
            $data['elly'] = $model->getModulById($id_modul);
            $data['modul'] = $model->getModulByIdrow($id_modul);
            $data['kelas'] = $model->tampil('kelas', 'id_kelas');
            $where=array(
                'id_setting'=> 1
              );
              $data['setting'] = $model->getWhere('setting',$where);
    
            echo view('header', $data);
            echo view('menu', $data);
            echo view('editmodul', $data);
            echo view('footer', $data);
        } else {
            return redirect()->to('home/error');
        } 
    }

    public function setting()
{
    // Memeriksa level akses user
    if (session()->get('level') == 0 || session()->get('level') == 1) {
      
        $model = new M_projek1();
        
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman setting'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
       

    
        $id = 1; // id_toko yang diinginkan

        // Menyusun kondisi untuk query
        $where = array('id_setting' => $id);

        // Mengambil data dari tabel 'toko' berdasarkan kondisi
        $data['user'] = $model->getWhere('setting', $where);
 
        // Memuat view
        $where=array(
          'id_setting'=> 1
        );
        $data['setting'] = $model->getWhere('setting',$where);
     
        echo view('header', $data);
        echo view('menu', $data);
        echo view('setting', $data);
        echo view('footer', $data);
    } else {
        return redirect()->to('home/error');
    } 
}

public function aksisetting()
{
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengubah data setting'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
      
    
       
    $nama = $this->request->getPost('nama');
    $alamat = $this->request->getPost('alamat');
    $nohp = $this->request->getPost('nohp');
    $id = $this->request->getPost('id');
    $uploadedFile = $this->request->getFile('foto');

    $where = array('id_setting' => $id);

    $isi = array(
        'nama_setting' => $nama,
        'alamat' => $alamat,
        'nohp' => $nohp,
        'updated_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
        'updated_by' => $id_user // ID user yang login
    );

    // Cek apakah ada file yang diupload
    if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
        $foto = $uploadedFile->getName();
        $model->upload($uploadedFile); // Mengupload file baru
        $isi['logo'] = $foto; // Menambahkan nama file baru ke array data
    }

    $model->edit('setting', $isi, $where);

    return redirect()->to('home/setting/'.$id);
}


//kelas

public function kelas()
    {   
        if (session()->get('level') == 0 || session()->get('level') == 1) {
    	$model= new M_projek1();
        
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman manajemen kelas'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
      
        $data['elly'] = $model->tampil('kelas','id_kelas');
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu',$data);
        echo view('kelas',$data);
        echo view ('footer');
         }else{
        return redirect()->to('home/error');
 
    } 
    }

    public function restore_kelas()
    {   
        if (session()->get('level') == 0 || session()->get('level') == 1) {

    	$model= new M_projek1();
        
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman restore kelas'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
      
        $data['elly'] = $model->tampil('kelas','id_kelas');
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu',$data);
        echo view('restore_kelas',$data);
        echo view ('footer');
         }else{
        return redirect()->to('home/error');
 
    } 
    }
    public function reedit_kelas()
    {   
        if (session()->get('level') == 0 || session()->get('level') == 1) {

    	$model= new M_projek1();
        
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman restore edit kelas'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
      
        $data['elly'] = $model->tampil('backup_kelas','id_kelas');
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu',$data);
        echo view('reedit_kelas',$data);
        echo view ('footer');
         }else{
        return redirect()->to('home/error');
 
    } 
    }
    public function aksirekelas($id) {
        $model = new M_projek1();
         $id_user = session()->get('id'); // Ambil ID user dari session
            $activity = 'Merestore kelas'; // Deskripsi aktivitas
            $this->addLog($id_user, $activity);
        
        // Data yang akan diupdate untuk mengembalikan produk
        $data = [
            'isdelete' => 0,
            'deleted_by' => null,
            'deleted_at' => null
        ];
    
        // Update data produk dengan kondisi id_produk sesuai
        $model->edit('kelas', $data, ['id_kelas' => $id]);
    
        return redirect()->to('home/restore_kelas');
    }

    public function tambahkelas()
    {
        if (session()->get('level') == 0 || session()->get('level') == 1) {

        $model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman tambah kelas'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        
       
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu',$data);
        echo view('tambahkelas', $data);
        echo view ('footer');
      }else{
            return redirect()->to('Home/error');
        }    
    }

    public function editkelas($id)
    {
        if (session()->get('level') == 0 || session()->get('level') == 1) {

        $model= new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman edit kelas'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
       
        $where= array('id_kelas'=>$id);
        $data['satu']=$model->getwhere('kelas',$where);
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);
        echo view('header', $data);
        echo view ('menu',$data);
        echo view('editkelas', $data);
        echo view ('footer');
      }else{
            return redirect()->to('Home/error');
        }    
    }

    public function hapuskelas($id){
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Menghapus data kelas'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        $data = [
            'isdelete' => 1,
            'deleted_by' => $id_user,
            'deleted_at' => date('Y-m-d H:i:s') // Format datetime untuk deleted_at
        ];
       
        
          
        $model->edit('kelas', $data, ['id_kelas' => $id]);

        // Hapus data dari tabel backup_kelas
    $where = array('id_kelas' => $id);
    $model->hapus('backup_kelas', $where);

        return redirect()->to('home/kelas');
   }

    public function aksitkelas()
    {
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Menambah data kelas'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
       
        $a = $this->request->getPost('kelas');
       
       
        
        $isi = array(
            'nama_kelas' => $a,
            'created_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
            'created_by' => $id_user // ID user yang login
            
            

        );
        $model ->tambah('kelas', $isi);
        
        return redirect()->to('home/kelas');
    }
    public function aksiekelas()
    {
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengubah data kelas'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        
        $a = $this->request->getPost('kelas');
        $id = $this->request->getPost('id');
       
        $backupWhere = ['id_kelas' => $id];
        $existingBackup = $model->getWhere('backup_kelas', $backupWhere);
    
        if ($existingBackup) {
            // Hapus data lama di user_backup jika ada
            $model->hapus('backup_kelas', $backupWhere);
        }
    
        // Ambil data user lama berdasarkan id_user
        $userLama = $model->getKelasById($id);
    
        // Simpan data user lama ke tabel user_backup
        $backupData = (array) $userLama;  // Ubah objek menjadi array
        $model->tambah('backup_kelas', $backupData);
        
        $isi = array(
            'nama_kelas' => $a,
            'updated_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
        'updated_by' => $id_user // ID user yang login


        );
        $where = array('id_kelas' => $id);
        $model ->edit('kelas', $isi, $where);
        
        return redirect()->to('home/kelas');
    }

    

    public function profile($id)
{
        if (session()->get('level')>0){
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman profile'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        
        $where= array('user.id_user'=>$id);
        $where=array('id_user'=>session()->get('id'));
        
        $data['user']=$model->getWhere('user',$where);
        $where=array(
            'id_setting'=> 1
          );
          $data['setting'] = $model->getWhere('setting',$where);

        echo view('header',$data);
        echo view ('menu',$data);
        echo view('profile',$data);
        echo view ('footer');
        }else{
        return redirect()->to('home/error');
        }
        
}
public function aksieprofile() 
{
    $model = new M_projek1();

    $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengubah data profile'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
       

    $a = $this->request->getPost('nama');
    $id = $this->request->getPost('id');
    $fotoName = $this->request->getPost('old_foto'); // Mengambil nama foto lama
    $foto = $this->request->getFile('foto');

    if ($foto && $foto->isValid()) {
        // Generate a new name for the uploaded file
        $newName = $foto->getRandomName();
        // Move the file to the target directory
        $foto->move(ROOTPATH . 'public/images', $newName);
        // Set the new file name to be saved in the database
        $fotoName = $newName;
    }

    

    $isi = array(
        'nama_user' => $a,
        'foto' => $fotoName,
        'updated_at' => date('Y-m-d H:i:s'), // Waktu saat produk dibuat
        'updated_by' => $id_user // ID user yang login
    );

    $where = array('id_user' => $id);
    $model->edit('user', $isi, $where);

    return redirect()->to('home/profile/'.$id);
}

public function changepassword()
{
    if (session()->get('id') > 0) {
      
        $model = new M_projek1();
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman ubah password'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
       
        
        
        $where = array(
            'id_setting' => 1
        );
        $data['setting'] = $model->getWhere('setting', $where);
        
        $where = array('id_user' => session()->get('id'));
        $data['elly'] = $model->getwhere('user', $where);
        
        echo view('header', $data);
        echo view('menu', $data);
        echo view('changepassword', $data);
        echo view('footer');
    }else{
        return redirect()->to('home/error');
        }
        
}




public function aksi_changepass() {
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'mengubah password profile'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
       
    $oldPassword = $this->request->getPost('old');
    $newPassword = $this->request->getPost('new');
   

    // Dapatkan password lama dari database
    $currentPassword = $model->getPassword($id_user);

    // Verifikasi apakah password lama cocok
    if (md5($oldPassword) !== $currentPassword) {
        // Set pesan error jika password lama salah
        session()->setFlashdata('error', 'Password lama tidak valid.');
        return redirect()->back()->withInput();
    }
 
    // Update password baru
    $data = [
        'password' => md5($newPassword),
        'updated_by' => $id_user,
        'updated_at' => date('Y-m-d H:i:s')
    ];
    $where = ['id_user' => $id_user];
    
    $model->edit('user', $data, $where);
    
    // Set pesan sukses
    session()->setFlashdata('success', 'Password berhasil diperbarui.');
    return redirect()->to('home/changepassword');
}

public function word($id_modul = null)
{
    $model = new M_projek1();
    $id_user = session()->get('id'); // Ambil ID user dari session
    $activity = 'Mencetak modul'; // Deskripsi aktivitas
    $this->addLog($id_user, $activity);
    
  
    // Ambil data filter dari session
    $data['elly'] = $model->getModulById($id_modul);

    // Jika $id_modul ada, filter data hanya untuk modul yang dipilih
    if ($id_modul) {
        $data['elly'] = array_filter($data['elly'], function ($modul) use ($id_modul) {
            return $modul->id_modul == $id_modul;
        });
    }

    echo view('word', $data);
}


//activitylog

public function log() 
{
    if (session()->get('level') == 0 || session()->get('level') == 1) {

      
        $model = new M_projek1();


        // Menambahkan log aktivitas ketika user mengakses halaman log
        $id_user = session()->get('id'); // Ambil ID user dari session
        $activity = 'Mengakses halaman log aktivitas'; // Deskripsi aktivitas
        $this->addLog($id_user, $activity);
        
        // Mengambil data log aktivitas dari model
        $data['logs'] = $model->getActivityLogs();
        $where=array(
          'id_setting'=> 1
        );
        $data['setting'] = $model->getWhere('setting',$where);
        // $data['currentMenu'] = 'log'; // Sesuaikan dengan menu yang aktif
        
        echo view('header', $data);
        echo view('menu', $data);
        echo view('log', $data);
        echo view('footer');
    }else{
        return redirect()->to('home/error');
        }
        
}

    public function addLog($id_user, $activity)
{
    $model = new M_projek1(); // Gunakan model M_kedaikopi
    $id_user = session()->get('id');
    $data = [
        'id_user' => $id_user,
        'activity' => $activity,
        'timestamp' => date('Y-m-d H:i:s'),
    ];
    $model->tambah('activity_log', $data); // Pastikan 'activity_log' adalah nama tabel yang benar
}
}


