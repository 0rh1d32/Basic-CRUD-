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
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            $alertType = (isset($_GET['alert']) && $_GET['alert'] == 'success') ? 'bg-green-200 border-green-600 text-green-800' : 'bg-red-200 border-red-600 text-red-800';
            echo '<div class="p-4 mb-5 border-l-4 '.$alertType.'" role="alert">
                    <p>' . $msg . '</p>
                  </div>';
        }
        ?>
        <a href="add_new.php" class="bg-blue-500 text-white py-2 px-4 rounded mb-5 inline-block">Add New Application</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded">
                <thead>
                    <tr>
                        <th class="py-3 px-6 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="py-3 px-6 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Applicant Name</th>
                        <th class="py-3 px-6 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Email</th>
                        <th class="py-3 px-6 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Phone Number</th>
                        <th class="py-3 px-6 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Position Applied For</th>
                        <th class="py-3 px-6 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="py-3 px-6 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_conn.php";
                    $sql = "SELECT * FROM job_applications";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td class="py-4 px-6 border-b border-gray-300"><?php echo $row['id']; ?></td>
                            <td class="py-4 px-6 border-b border-gray-300"><?php echo $row['applicant_name']; ?></td>
                            <td class="py-4 px-6 border-b border-gray-300"><?php echo $row['email']; ?></td>
                            <td class="py-4 px-6 border-b border-gray-300"><?php echo $row['phone_number']; ?></td>
                            <td class="py-4 px-6 border-b border-gray-300"><?php echo $row['position_applied']; ?></td>
                            <td class="py-4 px-6 border-b border-gray-300"><?php echo $row['status']; ?></td>
                            <td class="py-4 px-6 border-b border-gray-300">
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="hover:text-blue-700 mr-3">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="hover:text-red-700">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
