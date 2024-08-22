<?php
$target_dir = "Assets/Images/";
$target_file = $target_dir . basename($_FILES["file-upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is an actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file-upload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo json_encode(["success" => false]);
        exit;
    }
}

// Check file size
if ($_FILES["file-upload"]["size"] > 5000000) { // 5MB limit
    echo json_encode(["success" => false]);
    exit;
}

// Allow certain file formats
$allowedFormats = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowedFormats)) {
    echo json_encode(["success" => false]);
    exit;
}

// Try to upload file
if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
    echo json_encode(["success" => true, "fileName" => basename($_FILES["file-upload"]["name"])]);
} else {
    echo json_encode(["success" => false]);
}
?>
