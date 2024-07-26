<?php
include "db_conn.php";
$id = $_GET["id"];

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $applicant_name = $_POST['applicant_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $position_applied = $_POST['position_applied'];
    $status = $_POST['status'];

    // Update query
    $sql = "UPDATE job_applications SET applicant_name='$applicant_name', email='$email', phone_number='$phone_number', position_applied='$position_applied', status='$status' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Application updated successfully&alert=success");
    } else {
        header("Location: index.php?msg=Failed to update application&alert=error");
    }
}

// Fetch user data
$sql = "SELECT * FROM job_applications WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php?msg=Failed to fetch application data&alert=error");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Application</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-green-500 p-5 text-white text-center text-3xl">Edit Job Application</nav>
    <div class="container mx-auto mt-10">
        <div class="bg-white p-8 rounded shadow-md max-w-md mx-auto">
            <form action="" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700">Applicant Name:</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" name="applicant_name" value="<?php echo $row['applicant_name']; ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email:</label>
                    <input type="email" class="w-full p-2 border border-gray-300 rounded mt-1" name="email" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Phone Number:</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" name="phone_number" value="<?php echo $row['phone_number']; ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Position Applied For:</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" name="position_applied" value="<?php echo $row['position_applied']; ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Status:</label>
                    <select name="status" class="w-full p-2 border border-gray-300 rounded mt-1">
                        <option value="Applied" <?php echo ($row['status'] == 'Applied') ? "selected" : ""; ?>>Applied</option>
                        <option value="Interviewing" <?php echo ($row['status'] == 'Interviewing') ? "selected" : ""; ?>>Interviewing</option>
                        <option value="Offered" <?php echo ($row['status'] == 'Offered') ? "selected" : ""; ?>>Offered</option>
                        <option value="Rejected" <?php echo ($row['status'] == 'Rejected') ? "selected" : ""; ?>>Rejected</option>
                    </select>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded" name="submit">Update</button>
                    <a href="index.php" class="bg-red-500 text-white py-2 px-4 rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>
</html>
