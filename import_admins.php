<?php
include 'db_connect.php';

$csvFile = 'admins.csv';
$file = fopen($csvFile, 'r');

if (!$file) {
    die("Could not open the file.");
}

// Skip header
fgetcsv($file);

$inserted = 0;
$skipped = 0;

while (($data = fgetcsv($file)) !== FALSE) {
    $admin_id = trim($data[0]);
    $name = trim($data[1]);
    $plain_password = trim($data[2]);

    // Hash the password securely
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

    // Check if admin already exists
    $check = mysqli_query($conn, "SELECT admin_id FROM admins WHERE admin_id='$admin_id'");
    if (mysqli_num_rows($check) == 0) {
        $query = "INSERT INTO admins (admin_id, name, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sss", $admin_id, $name, $hashed_password);
        mysqli_stmt_execute($stmt);
        $inserted++;
    } else {
        $skipped++;
    }
}

fclose($file);

echo "✅ Admin import complete!<br>";
echo "Inserted: $inserted admin(s)<br>";
echo "Skipped (already exists): $skipped admin(s)<br>";
?>
