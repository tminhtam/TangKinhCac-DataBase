<?php require_once "../lib/functions.php"; $myApp = new data();
    ob_start();
    session_start();

    if(isset($_POST['username']) && isset($_POST['password'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if(mysqli_num_rows($myApp->UserLogin($user, $pass)) == 1){
            $get_log = $myApp->UserLogin($user, $pass)->fetch_array(MYSQLI_ASSOC);
            $_SESSION['t_user'] = $user;
            $_SESSION['t_group'] = $get_log['loai_tai_khoan'];
            header('location:../admin');
        }
    }
?>