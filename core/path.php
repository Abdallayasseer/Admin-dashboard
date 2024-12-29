<?php
session_start();
define("Base_URL", "http://localhost/project_auth/");
function URL($var = null)
{
    return Base_URL . "$var";
}
function redirect($url = null)
{
    echo "<script>
    window.location.replace('http://localhost/project_auth/$url'); 
    </script>";
}
function auth($rule = null)
{
    if (isset($_SESSION['admin'])) {
        $rule_id = $_SESSION['admin']['rule_id'];

        if ($rule_id == 1 || $rule_id == $rule) {
            return true;
        } else {
            redirect('pages/error-404.php');
        }
    } else {
        redirect('pages/error-404.php');
    }
}


function admin_only()
{
    if (isset($_SESSION['admin'])) {
        redirect('');
    }
}
// validate 

function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    return $data;
}

// email validation

function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
// files validation

function validate_file($file)
{
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $max_size = 2097152;
    $file_info = getimagesize($file['tmp_name']);
    if ($file_info && in_array($file_info['mime'], $allowed_types) && $file['size'] <= $max_size) {
        return true;
    } else {
        return false;
    }
}
