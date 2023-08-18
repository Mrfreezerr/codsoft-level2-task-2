<?php
if (isset($_POST['button'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $departure = $_POST['departure'];
    $returnDate = $_POST['return'];
    $travellers = $_POST['travellers'];
    $phone = $_POST['phone'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = 'trips';

    $conn = mysqli_connect($host, $user, $pass, $dbName);
    
    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO datas (`from`, `to`, departure, `return`, travellers, phone) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $from, $to, $departure, $returnDate, $travellers, $phone);
    mysqli_stmt_execute($stmt);
    
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>