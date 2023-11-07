<?php
/**
 * PHP Login
 */
require_once '../connect.php';
$username = $_POST['username'] ?? null;
$password = '123456';
/**
 |--------------------------------------------------------------------------
 | ตรวจสอบ Username ในฐานข้อมูล
 | 'SELECT * FROM users where username = :username'
 |--------------------------------------------------------------------------

 |--------------------------------------------------------------------------
 | ตรวจสอบ Password ว่าตรงกันหรือไม่ 
 | password_verify($password, $passFromDatabaseHash)
 |--------------------------------------------------------------------------
*/
$passFromDatabaseHash = '$2y$10$yLlXB7eGw39tFsPTkt8H9O7hTgoYU7YJjvyyDl2sZ8z7G7vop.Q5q';

if(password_verify( $password , $passFromDatabaseHash )){
    /** 
     * ตั้งค่า Session ไว้ใช้งาน 
     */
    $_SESSION['AD_ID'] = '1';
    $_SESSION['AD_FIRSTNAME'] = 'Peenchayakorn';
    $_SESSION['AD_LASTNAME'] = 'Tanakornpornsawas';
    $_SESSION['AD_USERNAME'] = 'peenchayadev';
    $_SESSION['AD_IMAGE'] = 'profile.jpg';
    $_SESSION['AD_STATUS'] = 'admin';
    $_SESSION['AD_LOGIN'] = date('Y-m-d H:i:s');

    /** หลังจากนั้น redirect ไปยังหน้า dashboard */
    header('location:../../pages/dashboard/');
} else {
    echo '<script> alert("รหัสผ่านไม่ถูกต้อง") </script>';
    header('Refresh:0; url=../../index.php'); 
}

