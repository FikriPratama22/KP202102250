<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $nisn = $_POST['nisn'];
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tgllahir'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $telepon = $_POST['telepon'];
    $ayahnik = $_POST['ayahnik'];
    $ayahnama = $_POST['ayahnama'];
    $ayahpendidikan = $_POST['ayahpendidikan'];
    $ayahpekerjaan = $_POST['ayahpekerjaan'];
    $ayahpenghasilan = $_POST['ayahpenghasilan'];
    $ayahtelepon = $_POST['ayahtelepon'];
    $ibunik = $_POST['ibunik'];
    $ibunama = $_POST['ibunama'];
    $ibupendidikan = $_POST['ibupendidikan'];
    $ibupekerjaan = $_POST['ibupekerjaan'];
    $ibupenghasilan = $_POST['ibupenghasilan'];
    $ibutelepon = $_POST['ibutelepon'];
    $walinik = $_POST['walinik'];
    $walinama = $_POST['walinama'];
    $walipekerjaan = $_POST['walipekerjaan'];
    $walitelepon = $_POST['walitelepon'];
    $sekolahnpsn = $_POST['sekolahnpsn'];
    $sekolahnama = $_POST['sekolahnama'];
    $statussiswa = "Diproses";
    $foto = $_FILES['foto']['name'];
    $scanijazahdepan = $_FILES['scanijazahdepan']['name'];
    $scanijazahbelakang = $_FILES['scanijazahbelakang']['name'];
    


    // Upload gambar
    $target_dir = "fotosiswa/";
    $foto_target = $target_dir . basename($foto);
    $ijazah_depan_target = $target_dir . basename($scanijazahdepan);
    $ijazah_belakang_target = $target_dir . basename($scanijazahbelakang);
    
    move_uploaded_file($_FILES["foto"]["tmp_name"], $foto_target);
    move_uploaded_file($_FILES["scanijazahdepan"]["tmp_name"], $ijazah_depan_target);
    move_uploaded_file($_FILES["scanijazahbelakang"]["tmp_name"], $ijazah_belakang_target);
    

    // Masukkan data ke database
    $query = "INSERT INTO tabel_siswa (nisn, nik, namalengkap,email, jeniskelamin, tempatlahir, tanggallahir, alamat, agama, telepon, ayahnik, ayahnama, ayahpendidikan, ayahpekerjaan, ayahpenghasilan, ayahtelepon, ibunik, ibunama, ibupendidikan, ibupekerjaan, ibupenghasilan,ibutelepon, walinik, walinama, walipekerjaan, walitelepon, sekolahnpsn, sekolahnama, foto, scanijazahdepan, scanijazahbelakang, status)
    VALUES ('$nisn', '$nik', '$namalengkap','$email', '$jeniskelamin', '$tempatlahir', '$tanggallahir', '$alamat', '$agama', '$telepon', '$ayahnik', '$ayahnama', '$ayahpendidikan', '$ayahpekerjaan', '$ayahpenghasilan', '$ayahtelepon', '$ibunik', '$ibunama', '$ibupendidikan', '$ibupekerjaan', '$ibupenghasilan','$ibutelepon', '$walinik', '$walinama', '$walipekerjaan', '$walitelepon', '$sekolahnpsn', '$sekolahnama', '$foto', '$scanijazahdepan', '$scanijazahbelakang', '$statussiswa')";
    
    if(mysqli_query($conn, $query)){
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<html>
  <head>
    <meta charset="utf-8" />
    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.bundle.min.js"></script>

    <title>MTsN Mempawah Hilir</title>
  </head>
  <body>
    <nav class="navbar bg-success mb-4">
      <div class="container-fluid">
        <a class="navbar-brand text-light " href="#">
          <img src="img/iklas.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top" />
          Program Pendaftaran Online Peserta Didik Baru
        </a>
      </div>
    </nav>
    <div class="container">
    <a href="halamansiswa.php" type="button" class="btn btn-success">Kembali</a>
    <form method="post" enctype="multipart/form-data">
                <!-- formulir -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Data Pribadi</h2>
                                    <p>*Harap isi dengan teliti dan benar</p>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NISN*</label>
                                                <input name="nisn" type="text" class="form-control" placeholder="NISN" maxlength="12" required>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK*</label>
                                                <input name="nik" type="text" class="form-control" placeholder="NIK" maxlength="16" required>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Lengkap*</label>
                                                <input name="namalengkap" type="text" class="form-control" placeholder="Nama Lengkap" maxlength="50" required>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input name="email" type="text" class="form-control" placeholder="Email" maxlength="50" required>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Jenis Kelamin*</label>
                                                <select class="form-control" name="jeniskelamin">
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Tempat Lahir*</label>
                                                <input name="tempatlahir" type="text" class="form-control" placeholder="Tempat Lahir" maxlength="20">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Tanggal Lahir*</label>
                                                <input name="tgllahir" type="date" class="form-control">
                                            </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label>Alamat Lengkap</label>
                                                <input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                                            </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Agama*</label>
                                                <select class="form-control" name="agama">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input name="telepon" type="text" class="form-control" maxlength="15" required>
                                            </div>
                                            </div>
                                        </div>
                                            
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									  <h2>Data Orang Tua</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK Ayah*</label>
                                                <input name="ayahnik" type="text" class="form-control" placeholder="NIK Ayah" maxlength="16">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Ayah*</label>
                                                <input name="ayahnama" type="text" class="form-control" placeholder="Nama Ayah" maxlength="40">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Ayah</label>
                                                <select class="form-control" name="ayahpendidikan">
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA/SMK/Sederajat</option>
                                                    <option value="S1">S1/Sederajat</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Ayah</label>
                                                <select class="form-control" name="ayahpekerjaan">
                                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Ayah per bulan</label>
                                                <select class="form-control" name="ayahpenghasilan">
                                                    <option value="<500.000">< Rp500.000</option>
                                                    <option value="500.000-1.000.000">Rp500.000-Rp1.500.000</option>
                                                    <option value="1.500.000-3.500.000">Rp1.500.000-Rp3.500.000</option>
                                                    <option value="3.000.000-5.000.000">Rp3.500.000-Rp5.000.000</option>
                                                    <option value="5.000.000-10.000.000">Rp5.000.000-Rp10.000.000</option>
                                                    <option value="10.000.000-20.000.000">Rp10.000.000-20.000.000</option>
                                                    <option value=">20.000.000">> Rp20.000.000</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Ayah</label>
                                                <input name="ayahtelepon" type="text" class="form-control" maxlength="15">
                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>


                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK Ibu*</label>
                                                <input name="ibunik" type="text" class="form-control" placeholder="NIK Ibu" maxlength="16">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Ibu*</label>
                                                <input name="ibunama" type="text" class="form-control" placeholder="Nama Ibu" maxlength="40">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Ibu</label>
                                                <select class="form-control" name="ibupendidikan">
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA/SMK/Sederajat</option>
                                                    <option value="S1">S1/Sederajat</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Ibu</label>
                                                <select class="form-control" name="ibupekerjaan">
                                                    <option value="Tidak Bekerja">Ibu Rumah Tangga</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Ibu per bulan</label>
                                                <select class="form-control" name="ibupenghasilan">
                                                    <option value="<500.000">< Rp500.000</option>
                                                    <option value="500.000-1.000.000">Rp500.000-Rp1.500.000</option>
                                                    <option value="1.500.000-3.500.000">Rp1.500.000-Rp3.500.000</option>
                                                    <option value="3.000.000-5.000.000">Rp3.500.000-Rp5.000.000</option>
                                                    <option value="5.000.000-10.000.000">Rp5.000.000-Rp10.000.000</option>
                                                    <option value="10.000.000-20.000.000">Rp10.000.000-20.000.000</option>
                                                    <option value=">20.000.000">> Rp20.000.000</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Ibu</label>
                                                <input name="ibutelepon" type="text" class="form-control" maxlength="15">
                                            </div>
                                            </div>
                                        </div>

                                        <br>
                                        <hr>
                                        <br>


                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK Wali</label>
                                                <input name="walinik" type="text" class="form-control" placeholder="NIK Wali" maxlength="16">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Wali</label>
                                                <input name="walinama" type="text" class="form-control" placeholder="Nama Wali" maxlength="40">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Wali</label>
                                                <select class="form-control" name="walipekerjaan">
                                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Wali</label>
                                                <input name="walitelepon" type="text" class="form-control" maxlength="15">
                                                <input type="hidden" value="<?=$userid;?>" name="id">
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Data Sekolah Asal & Berkas</h2>
                                    <p>Data yang telah diinput tidak dapat diubah kemabli</p>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NPSN Sekolah Asal</label>
                                                <input name="sekolahnpsn" type="text" class="form-control" placeholder="NPSN Sekolah Asal" maxlength="12">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Sekolah Asal</label>
                                                <input name="sekolahnama" type="text" class="form-control" placeholder="Nama Sekolah Asal" maxlength="40">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                        <label for="foto" class=" form-control-label">Pas Foto 4x6 (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="foto" name="foto" class="form-control-file">
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                        <label for="scanijazahdepan" class=" form-control-label">Scan Ijazah Bagian Depan (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="scanijazahdepan" name="scanijazahdepan" class="form-control-file">
                                                    </div>
                                                </div>
                                            <div class="col">
                                                <div class="form-group">
                                                        <label for="scanijazahbelakang" class=" form-control-label">Scan Ijazah Bagian Belakang (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="scanijazahbelakang" name="scanijazahbelakang" class="form-control-file">
                                                </div>
                                            </div>
                                        </div>

                                            

                                        <div class="modal-footer">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</form>
      </div>
    </div>
  </body>
</html>
