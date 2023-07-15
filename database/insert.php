<?php
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $response = array();
        //mendapatkan data
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $alamat = $_POST['alamat'];
        $detail = $_POST['detail'];
        $catatan = $_POST['catatan'];
        require_once('koneksi.php');
        
        $sql = "SELECT * FROM pelanggan WHERE telepon ='$telepon'";
        $check = mysqli_fetch_array(mysqli_query($con,$sql));

        if(isset($check)){
        $response["value"] = 0;
        $response["message"] = "oops! Pelanggan sudah terdaftar!";
        echo json_encode($response);
        } else {
            $sql = "INSERT INTO pelanggan (nama,telepon,alamat,detail,catatan)VALUES('$nama','$telepon','$alamat','$detail','$catatan')";
            if(mysqli_query($con,$sql)) {
            $response["value"] = 1;
            $response["message"] = "Pelanggan telah terdaftar";
            echo json_encode($response);
            } else {
            $response["value"] = 0;
            $response["message"] = "oops! Coba lagi!";
            echo json_encode($response);
            }
        }

        // tutup database
        mysqli_close($con);
    } else {
        $response["value"] = 0;
        $response["message"] = "oops! Coba lagi!";
        echo json_encode($response);
    }

    /*
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $response = array();
        //mendapatkan data
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];

        require_once('koneksi.php');
        
        $sql = "SELECT * FROM pelanggan WHERE telepon ='$telepon'";
        $check = mysqli_fetch_array(mysqli_query($con,$sql));

        if(isset($check)){
        $response["value"] = 0;
        $response["message"] = "oops! Pelanggan sudah terdaftar!";
        echo json_encode($response);
        } else {
            $sql = "INSERT INTO pelanggan (nama,telepon)VALUES('$nama','$telepon')";
            if(mysqli_query($con,$sql)) {
            $response["value"] = 1;
            $response["message"] = "Pelanggan telah terdaftar";
            echo json_encode($response);
            } else {
            $response["value"] = 0;
            $response["message"] = "oops! Coba lagi!";
            echo json_encode($response);
            }
        }

        // tutup database
        mysqli_close($con);
    } else {
        $response["value"] = 0;
        $response["message"] = "oops! Coba lagi!";
        echo json_encode($response);
    }
    */
?>