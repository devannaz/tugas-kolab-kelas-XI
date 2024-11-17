<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {

    $Name = mysqli_real_escape_string($conn, $_POST['name']);
    $Email = mysqli_real_escape_string($conn, $_POST['email']);
    $Message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO form (Name, Email, Message, SubmittedAt) VALUES ('$Name', '$Email', '$Message', CURRENT_TIMESTAMP)";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php?status=success');
        exit();
    } else {
        echo "Error " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>