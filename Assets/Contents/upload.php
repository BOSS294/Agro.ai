<?php
$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file-upload']) && $_FILES['file-upload']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/'; // Ensure this is correct path where you want to save files
        $uploadFile = $uploadDir . basename($_FILES['file-upload']['name']);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['file-upload']['tmp_name'], $uploadFile)) {
            $response['success'] = true;
            $response['fileName'] = basename($_FILES['file-upload']['name']);
        } else {
            $response['message'] = 'File move failed.';
        }
    } else {
        $response['message'] = 'No file uploaded or upload error.';
    }
} else {
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>
