<?php
include 'db_connect.php';

$csvFile = 'students.csv';
$file = fopen($csvFile, 'r');

if (!$file) {
    die("Could not open the file.");
}

// Skip header
fgetcsv($file);

$inserted = 0;
$skipped = 0;

while (($data = fgetcsv($file)) !== FALSE) {
    $student_id = trim($data[0]);
    $last_name = trim($data[1]);
    $first_name = trim($data[2]);
    $middle_name = trim($data[3]);
    $full_name = "$first_name $middle_name $last_name";

    // Default password format: LASTNAME_studentID
    $default_password = strtoupper($last_name) . "_{$student_id}";
    $hashed_password = password_hash($default_password, PASSWORD_DEFAULT);

    // Check if student already exists
    $check = mysqli_query($conn, "SELECT student_id FROM students WHERE student_id='$student_id'");
    if (mysqli_num_rows($check) == 0) {
        $query = "INSERT INTO students (student_id, last_name, first_name, middle_name, full_name, password, role)
                  VALUES (?, ?, ?, ?, ?, ?, 'student')";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssss", $student_id, $last_name, $first_name, $middle_name, $full_name, $hashed_password);
        mysqli_stmt_execute($stmt);
        $inserted++;
    } else {
        $skipped++;
    }
}

fclose($file);

echo "✅ Import complete!<br>";
echo "Inserted: $inserted students<br>";
echo "Skipped (already exists): $skipped students<br>";
?>
