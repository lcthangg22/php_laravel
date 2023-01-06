<?php
class Employee {
    private $table = "employees";
    private $Connection;
    private $id;
    private $Name;
    private $Surname;
    private $email;
    private $phone;
    public function __construct($Connection) {
        $this->Connection = $Connection;
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getName() {
        return $this->Name;
    }
    public function setName($Name) {
        $this->Name = $Name;
    }
    public function getSurname() {
        return $this->Surname;
    }
    public function setSurname($Surname) {
        $this->Surname = $Surname;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getphone() {
        return $this->phone;
    }
    public function setphone($phone) {
        $this->phone = $phone;
    }

    public function save(){
        $query = $this->Connection->prepare("INSERT INTO " . $this->table . " (Name,Surname,email,phone)
                                        VALUES (:Name,:Surname,:email,:phone)");
        $result = $query->execute(array(
            "Name" => $this->Name,
            "Surname" => $this->Surname,
            "email" => $this->email,
            "phone" => $this->phone
        ));
        $this->Connection = null;
        return $result;
    }

    public function update(){
        $query = $this->Connection->prepare("
            UPDATE " . $this->table . "
            SET
                Name = :Name,
                Surname = :Surname,
                email = :email,
                phone = :phone
            WHERE id = :id
        ");
        $result = $query->execute(array(
            "id" => $this->id,
            "Name" => $this->Name,
            "Surname" => $this->Surname,
            "email" => $this->email,
            "phone" => $this->phone
        ));
        $this->Connection = null;
        return $result;
    }

    public function getAll(){
        $query = $this->Connection->prepare("SELECT id,Name,Surname,email,phone FROM " . $this->table);
        $query->execute();

        $result = $query->fetchAll();
        $this->Connection = null;
        return $result;
    }

    public function getById($id){
        $query = $this->Connection->prepare("SELECT id,Name,Surname,email,phone
                                                FROM " . $this->table . "  WHERE id = :id");
        $query->execute(array(
            "id" => $id
        ));

        $result = $query->fetchObject();
        $this->Connection = null;
        return $result;
    }

//    public function getBy($column,$value){
//        $query = $this->Connection->prepare("SELECT id,Name,Surname,email,phone
//                                                FROM " . $this->table . " WHERE :column = :value");
//        $query->execute(array(
//            "column" => $column,
//            "value" => $value
//        ));
//        $results = $query->fetchAll();
//        $this->Connection = null;
//        return $results;
//    }
//
//    public function deleteById($id){
//        try {
//            $query = $this->Connection->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
//            $query->execute(array(
//                "id" => $id
//            ));
//            $Connection = null;
//        } catch (Exception $e) {
//            echo 'Failed DELETE (deleteById): ' . $e->getMessage();
//            return -1;
//        }
//    }
//
//    public function deleteBy($column,$value){
//        try {
//            $query = $this->Connection->prepare("DELETE FROM " . $this->table . " WHERE :column = :value");
//            $query->execute(array(
//                "column" => $value,
//                "value" => $value,
//            ));
//            $Connection = null;
//        } catch (Exception $e) {
//            echo 'Failed DELETE (deleteBy): ' . $e->getMessage();
//            return -1;
//        }
//    }
}
?>