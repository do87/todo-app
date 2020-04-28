<?php

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'tasks'"))) {
    $sql = "CREATE TABLE tasks (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                task VARCHAR(50) NOT NULL,
                done BOOLEAN default false
            )";
    if (!mysqli_query($conn, $sql)) {
        echo "Error creating table: " . mysqli_error($conn);
    }

    // add initial random values:
    for ($i=1; $i<6; $i++) {
        $sql = "INSERT INTO tasks (task, done) VALUES (\"TASK $i\" , " . rand(0,1) . ");";
        if (!mysqli_query($conn, $sql)) {
            echo "Error adding value: " . mysqli_error($conn);
        }
    }
}