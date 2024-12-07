<?php

try {
    $connect = mysqli_connect('localhost', 'root', '', 'admin_dash');
    // echo "Connect to project successfully";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
