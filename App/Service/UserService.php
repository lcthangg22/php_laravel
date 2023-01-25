<?php

class UserService
{
    private $conn;

    public function __construct()
    {
//        require_once('../Action/Database.php');
//        $database = new Database('localhost', 'root', 'root', 'demo_mvc');
//        //Kết nối databse
//        $this->conn = $database->connect();
    }

    public function getUsers()
    {
        //Viết câu SQL lấy tất cả dữ liệu trong bảng users
//        $sql = "SELECT * FROM `users` ORDER BY `id`";

        //Chạy câu SQL
//        $result = mysqli_query($this->conn, $sql);
//        if (mysqli_query($this->conn, $sql)) {
//            echo "Kết nối thành công";
//        } else {
//            echo "Kết nối thất bại";
//        }
        //Gắn dữ liệu lấy được vào mảng $data
//        while ($row = mysqli_fetch_assoc($result)) {
//            $data[] = $row;
//        }
//        $data = (new Database('localhost', 'root', 'root', 'demo_mvc'))->ex($sql);
//
//        foreach ($data as $value) {
//            print_r($value);
//        }
        require_once('../Action/Database.php');

        $this->conn = (new Database('root', 'root', 'demo_mvc'))
            ->exec("select * from users");
    }

    public function creatUser()
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];

        //Thêm dữ liệu trong bảng users
        $sql = "INSERT INTO users (name, age, email) VALUES ('$name','$age','$email')";
        //Chạy câu SQL
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            echo "Thêm user thành công";
        } else {
            echo "Thêm user thất bại";
        }
    }


    public function deleteUser()
    {
        $id = 2;

        //Viết câu SQL lấy tất cả dữ liệu trong bảng users
        $sql = "DELETE FROM `users` WHERE `id`='$id'";

        //Chạy câu SQL
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            echo "Xóa user thành công";
        } else {
            echo "Xóa user thất bại";
        }
    }

    public function updateUser()
    {

    }
}