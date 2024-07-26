<?php
include "db_conn.php";
if(isset($_POST['submit'])) {
    $applicant_name = $_POST['applicant_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $position_applied = $_POST['position_applied'];
    $status = $_POST['status'];

    $sql = "INSERT INTO job_applications (applicant_name, email, phone_number, position_applied, status) 
            VALUES ('$applicant_name', '$email', '$phone_number', '$position_applied', '$status')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php?msg=New application submitted successfully&alert=success");
    } else {
        header("Location: index.php?msg=Failed to submit application&alert=error");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-green-500 p-5 text-white text-center text-3xl">Job Application Tracker</nav>
    <div class="container mx-auto mt-10">
        <div class="text-center mb-4">
            <h3 class="text-2xl">Add New Application</h3>
            <p class="text-gray-600">Complete the form below to add a new application</p>
        </div>
        <div class="bg-white p-8 rounded shadow-md max-w-md mx-auto">
            <form action="" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700">Applicant Name:</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" name="applicant_name" placeholder="John Doe" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email:</label>
                    <input type="email" class="w-full p-2 border border-gray-300 rounded mt-1" name="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Phone Number:</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" name="phone_number" placeholder="123-456-7890" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Position Applied For:</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" name="position_applied" placeholder="Software Engineer" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Status:</label>
                    <select name="status" class="w-full p-2 border border-gray-300 rounded mt-1">
                        <option value="Applied">Applied</option>
                        <option value="Interviewing">Interviewing</option>
                        <option value="Offered">Offered</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded" name="submit">Save</button>
                    <a href="index.php" class="bg-red-500 text-white py-2 px-4 rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>
</html>
