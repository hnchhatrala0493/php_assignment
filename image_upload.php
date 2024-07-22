<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assignment/css/bootstrap.min.css">
    <script src="../assignment/js/jquery.min.js"></script>
</head>

<body class="text-center">
    <div class="col-md-5">
        <h1>File upload</h1>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                            Image:<input type="file" class="form-control" name="file_upload" />
                            <div class="text-left" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-success mt-5">File Upload</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['file_upload']['name']);
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['file_upload']['tmp_name']);
        if ($check !== false) {
            if ($_FILES['file_upload']['size'] <= 5000000) {
                $allowedFormats = array('jpg', 'jpeg', 'png', 'gif');
                if (in_array($imageFileType, $allowedFormats)) {
                    if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $uploadFile)) {
                        echo 'File uploaded successfully.';
                    } else {
                        echo 'Sorry, there was an error uploading your file.';
                    }
                } else {
                    echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                }
            } else {
                echo 'Sorry, your file is too large.';
            }
        } else {
            echo 'File is not an image.';
        }
    } else {
        echo 'No file was uploaded or there was an upload error.';
    }
}
?>
