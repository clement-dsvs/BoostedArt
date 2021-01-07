<?php
    require_once 'dbh.inc.php';
    if(isset($_POST["submit"])){
        $user_id = $_POST['user_id'];

        $sql = "UPDATE user SET id_rank = 2 WHERE id = {$user_id}";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../profile.php?error=stmtArtistFailed");
            exit();
        }

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../profile.php?succes");
        exit();

    }
    else{
        header("location: ../index.php");
        exit();
    }