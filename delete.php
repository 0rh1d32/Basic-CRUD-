<?php
include "db_conn.php";

$id = $_GET['id'];
$sql = "DELETE FROM job_applications WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: index.php?msg=Application deleted successfully&alert=success");
} else {
    header("Location: index.php?msg=Failed to delete application&alert=error");
}
?>
