<?php
error_reporting(0);
include '../Includes/dbconn.php';
include '../Includes/session.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the attendance date from the form
    $attendance_date = $_POST['attendance_date'];

    // Sanitize the input to prevent SQL injection
    $attendance_date = $conn->real_escape_string($attendance_date);

    // Query to fetch unique student names and their attendance status for the specific date
    $sql = "SELECT DISTINCT * FROM attendance6 WHERE DATE(attendance_date) = '$attendance_date' ORDER BY student_name";

    $result = $conn->query($sql);
    $sn=0;
    if ($result->num_rows > 0) {
        $sn = $sn + 1;
        // Set headers for CSV file download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="attendance_' . $attendance_date . '.csv"');

        // Open the output stream
        $output = fopen('php://output', 'w');

        // Output column headings
        fputcsv($output, ['Sr.No.','Student Name', 'Status']);

        // Output data rows
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, [".$sn.",$row['student_name'], $row['status']]);
        }

        // Close the output stream
        fclose($output);
    } else {
        echo "No attendance records found for $attendance_date.";
    }
}


?>
