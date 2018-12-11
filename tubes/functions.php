<?php
    //membuat koneksi
$conn=mysqli_connect("localhost", "root", "", "pendidikan");
if (!$conn) {
    die('Koneksi Error : '.mysql_connect_errno()
    .' - '.mysqli_connect_error());
}
//ambil data dari tabel siswa/query data siswa
$result=mysqli_query($conn, "SELECT*FROM siswa");

// function query akan menerima isi parameter dari string query yg ada pada index2.php (line 3)
function query($query_kedua){
    //dikarenakan $conn diiluar function query maka dibutuhkan scope global $conn
    global $conn;
    $result = mysqli_query($conn, $query_kedua);
    //wadah kosong untuk menampung isi array pada saat looping line 16
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
return $rows;
}

function tambah ($data)
{
    global $conn;
$nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $ttl = $_POST["ttl"];
        $email = $_POST["email"];


   
        $query = "INSERT INTO siswa VALUES
                    ('','$nim','$nama','$alamat','$ttl','$email')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    // stripcslashes digunakan untuk menghilangkan blackslashes
    $username = strtolower(stripcslashes($data['username']));

    // mysqli_real_escape_string untuk memberikan perlindungan terhadap karakter-karakter unik (sql_injection)
    // pada mysqli_real_escape_string terdapat 2 parameter
    $password=mysqli_real_escape_string($conn,$data['password']);
   

    // cek username sudah ada apa belum
    $result=mysqli_query($conn,"SELECT username FROM user WHERE username=$username");

    // cek kondisi jika line 174 bernilai true maka cetak echo
    if(mysqli_fetch_assoc($result))
    {
        echo "
        <script>
            alert('username sudah ada');
        </script>
        ";

        // agar proses insertnya gagal
        return false;
    }

    // cek konfirmasi password
    // if($password!==$password2)
    // {
    //     echo "
    //     <script>
    //         alert('password tidak sama');
    //     </script>
    //     ";

    //     return false;
    // }

    // enkripsi password
        $password=password_hash($password, PASSWORD_DEFAULT);
        // $password=md5($password);
        var_dump($password);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

?>