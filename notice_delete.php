<?php
    session_start();
    include("Includes\dbConnection.php");

    if(isset($_POST['id']) && is_numeric($_POST['id'])) {
        $notice_id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM notice WHERE id = ?");
        $stmt->bind_param("i", $notice_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // header("Location: teacherDashboard.php");
            header("Location: $current_url");
            exit();
        } else {
            echo "Error: Unable to delete notice.";
        }
        $stmt->close();
    } else {
        echo "Error: Notice ID is missing or invalid.";
    }
    $conn->close();
?>
