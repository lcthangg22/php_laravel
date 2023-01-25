<?php

class Database
{
//    protected string $host;
    protected string $username;
    protected string $password;
    protected string $db;

//    public function __construct(string $host, string $username, string $password, string $db)
//    {
//        $this->host = $host;
//        $this->username = $username;
//        $this->password = $password;
//        $this->db = $db;
//    }

    public function __construct(string $username, string $password, string $db)
    {
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
    }

//    public function connect()
//    {
//        return mysqli_connect($this->host, $this->username, $this->password, $this->db);
        //if ($conn) {
        //    echo "Kết nối thành công";
        //} else {
        //    echo "Kết nối thất bại";
        //}
//    }

    public function exec(string $query)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=demo_mvc', $this->username, $this->password);
        } catch (PDOException $e) {
            die("Error : " . $e->getMessage());
        }

        $datas = $conn->query($query);
        $data = $datas->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $value) {
            print_r($value);
        }
    }
}

