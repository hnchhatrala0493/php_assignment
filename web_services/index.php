<?php
include 'db.php';
?>
<?php
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    if ( isset( $_REQUEST[ 'type' ] ) && $_REQUEST[ 'type' ] == 'registration' ) {
        $username = $_REQUEST[ 'username' ];
        $name = $_REQUEST[ 'name' ];
        $email = $_REQUEST[ 'email' ];
        $phone = $_REQUEST[ 'phone' ];
        $password = $_REQUEST[ 'password' ];

        $sql = "INSERT INTO `registration`(`id`, `username`, `name`, `email`, `phone`, `password`) VALUES ('','".$username."','".$name."','".$email."','".$phone."','".md5( $password )."')";
        $result = $conn->query( $sql );
        if ( $result ) {
            echo json_encode( [ 'status'=>200, 'messages'=>'Record Added Successfully' ] );
        } else {
            echo json_encode( [ 'status'=>500, 'messages'=>'Fail' ] );
        }
    } elseif ( $_REQUEST[ 'type' ] == 'login' ) {
        $email = $_REQUEST[ 'email' ];
        $password = md5( $_REQUEST[ 'password' ] );
        $sql = "SELECT `username`,`name`,`email`,`phone` FROM `registration` WHERE email = '$email' AND password = '".$password."' LIMIT 1,1";
        $result = $conn->query( $sql );
        if ( $result->num_rows == 1 ) {
            $userDetails = $result->fetch_assoc();
            echo json_encode( [ 'status'=>200, 'userDetails'=>$userDetails, 'messages'=>'Login Successfully' ] );
        } else {
            echo json_encode( [ 'status'=>500, 'messages'=>'Entered wrong email or password.' ] );
        }

    } elseif ( $_REQUEST[ 'type' ] == 'image' ) {
        //header( 'Content-Type: application/json' );
        $target_dir = 'uploads/';
        if ( !file_exists( $target_dir ) ) {
            mkdir( $target_dir, 0777, true );
        }
        $response = array();
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
            if ( isset( $_FILES[ 'image' ] ) && $_FILES[ 'image' ][ 'error' ] == UPLOAD_ERR_OK ) {
                $target_file = $target_dir . basename( $_FILES[ 'image' ][ 'name' ] );
                $imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
                $check = getimagesize( $_FILES[ 'image' ][ 'tmp_name' ] );
                if ( $check !== false ) {
                    if ( $_FILES[ 'image' ][ 'size' ] <= 5000000 ) {
                        $allowed_formats = array( 'jpg', 'jpeg', 'png', 'gif' );
                        if ( in_array( $imageFileType, $allowed_formats ) ) {
                            if ( move_uploaded_file( $_FILES[ 'image' ][ 'tmp_name' ], $target_file ) ) {
                                $response[ 'status' ] = 'success';
                                $response[ 'message' ] = 'The file '. basename( $_FILES[ 'image' ][ 'name' ] ). ' has been uploaded.';
                            } else {
                                $response[ 'status' ] = 'error';
                                $response[ 'message' ] = 'Sorry, there was an error uploading your file.';
                            }
                        } else {
                            $response[ 'status' ] = 'error';
                            $response[ 'message' ] = 'Only JPG, JPEG, PNG & GIF files are allowed.';
                        }
                    } else {
                        $response[ 'status' ] = 'error';
                        $response[ 'message' ] = 'Sorry, your file is too large.';
                    }
                } else {
                    $response[ 'status' ] = 'error';
                    $response[ 'message' ] = 'File is not an image.';
                }
            } else {
                $response[ 'status' ] = 'error';
                $response[ 'message' ] = 'No file was uploaded.';
            }
        } else {
            $response[ 'status' ] = 'error';
            $response[ 'message' ] = 'Invalid request method.';
        }

        echo json_encode( $response );
    }
}
?>