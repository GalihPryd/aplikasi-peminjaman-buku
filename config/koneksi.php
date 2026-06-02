<?php

$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
if(!$conn){
    die('konek gagal');
}