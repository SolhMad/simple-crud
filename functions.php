<?php  

    $gambar = "assets/img/lopan.png";
    $alamat = "<b>Jl.Kirapandak Desa Karyamukti Kec.Panyingkiran Kab.Majalengka 45459</b>";
    $website = "<a href='smkn1panyingkiran.sch.id'>www.rpl.smkn1panyingkiran.sch.id</a>";
    $email = "<i>rpl@smkn1panyingkiran.sch.id</i>";
    $telp = "(0233)281221";
    $eskul = "Ekskul PPLG";

$namaHari = array(
    'Sunday'    => 'Minggu',
    'Monday'    => 'Senin',
    'Tuesday'   => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday'  => 'Kamis',
    'Friday'    => 'Jumat',
    'Saturday'  => 'Sabtu'
);

$hariIni = date('l');
$hIndonesia = $namaHari[$hariIni];
$tanggal = date(', d-m-Y');

$waktu = $hIndonesia . $tanggal;


    date_default_timezone_set('Asia/Jakarta');
    $jam_sekarang = date('H');
    $pesan="";

    if ($jam_sekarang >= 4 && $jam_sekarang < 10) {
        $pesan= "Selamat Pagi ";
    } elseif ($jam_sekarang >= 10 && $jam_sekarang < 17) {
        $pesan= "Selamat Siang ";
    } elseif ($jam_sekarang >= 17 && $jam_sekarang < 20) {
        $pesan= "Selamat Sore ";
    } else{
        $pesan= "Selamat Malam ";
    }

?>

<?php  

    $conn = mysqli_connect('localhost','root','','kuliah');

    function tampil($query){

        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
        
    }

    function tambah($data){

        global $conn;
        $nis = htmlspecialchars($data["nis"]);
        $nama = htmlspecialchars($data["nama"]);
        $kelas = htmlspecialchars($data["kelas"]);
        $jk = htmlspecialchars($data["jk"]);
        $tanggal_daftar = htmlspecialchars($data["tanggal_daftar"]);

        $insert = "INSERT INTO eskul VALUES ( '','$nis','$nama','$kelas','$jk','$tanggal_daftar' )";

        mysqli_query($conn,$insert);
        
        $pesan = mysqli_affected_rows($conn);
        return $pesan;
        
        
    }

    function edit($data){

        global $conn;
        $id = htmlspecialchars($data["id"]) ;
        $nis = htmlspecialchars($data["nis"]);
        $nama = htmlspecialchars($data["nama"]);
        $kelas = htmlspecialchars($data["kelas"]);
        $jk = htmlspecialchars($data["jk"]);
        $tanggal_daftar = htmlspecialchars($data["tanggal_daftar"]);

        $update = "UPDATE `eskul` SET `nis`='$nis',`nama`='$nama',`kelas`='$kelas',`jk`='$jk',`tanggal_daftar`='$tanggal_daftar' WHERE `eskul`.`id` = '$id'";
        
        mysqli_query($conn,$update);
        
        $pesan = mysqli_affected_rows($conn);
        return $pesan;
        
        
    }

    function hapus($id){

        global $conn;

        mysqli_query($conn,"DELETE FROM eskul WHERE `id` = '$id'");
        
        $pesan = mysqli_affected_rows($conn);
        return $pesan;
        
    }

function cari($keyword)
{
    $query = "SELECT * FROM eskul
                            WHERE
                        nis LIKE '%$keyword%' OR 
                        nama LIKE '%$keyword%' OR
                        kelas LIKE '%$keyword%' OR
                        jk LIKE '%$keyword%'
                ";

    return tampil($query);
}
    
    
    



 ?> 