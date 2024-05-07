<?php
if(isset($_POST['submit'])){
    $productname = $_POST['productname'];
    $cvUpload = $_FILES['cvUpload'];

    // Kiểm tra xem file có được upload thành công không
    if($cvUpload['error'] > 0){
        echo "File Upload Failed";
    } else {
        // Di chuyển file đã upload vào một thư mục
        $filePath = 'uploads/'.$cvUpload['name'];
        move_uploaded_file($cvUpload['tmp_name'], $filePath);
        echo "File Uploaded Successfully";

        // Kết nối đến cơ sở dữ liệu
        $conn = new mysqli('localhost', 'username', 'password', 'database');

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Tạo câu lệnh SQL
        $sql = "INSERT INTO CVs (seeker_id, cv_file_path, cv_description, updated_date)
                VALUES ('1', '$filePath', '$productname', CURDATE())";

        // Thực thi câu lệnh SQL
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Đóng kết nối
        $conn->close();
    }
}
?>
