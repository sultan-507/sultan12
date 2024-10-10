<?php
// التسجيل في قاعدة البيانات
error_reporting(0);
$firstname =  $_POST['firstname'];
$lastname =   $_POST['lastname'];
$email =      $_POST['email'];

$errors = [
    'firstnameError' => '',
    'lastnameError' => '',
    'emailError' => '',
];

if (isset($_POST['submit'])) {



    // خطأ الإسم الأول
    if(empty($firstname)){
        $errors['firstnameError'] = 'يرجى إدخال الإسم الأول';
    }

    // خطأ الإسم الأخير
    if(empty($lastname)){
        $errors['lastnameError'] = 'يرجى إدخال الإسم الأخير';
    }

    // خطأ الإيميل
    if(empty($email)){
        $errors['emailError'] = 'يرجى إدخال البريد الإلكتروني';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['emailError'] = 'يرجى إدخال بريد صحيح'; 
    }
    
    // تحقق من الأخطاء
    if(!array_filter($errors)){
        $firstname =  mysqli_real_escape_string($conn , $_POST['firstname']);
        $lastname =   mysqli_real_escape_string($conn , $_POST['lastname']);
        $email =      mysqli_real_escape_string($conn , $_POST['email']);

        $sql = "INSERT INTO users(firstname, lastname, email)
            VALUES ('$firstname', '$lastname', '$email')";

    if(mysqli_query($conn, $sql)){
             header('Location: ' . $_SERVER['PHP_SELF']);
        }else{
             echo 'Error' . mysqli_error($conn);
        }
    }
}