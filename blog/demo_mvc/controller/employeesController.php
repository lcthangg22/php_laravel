<?php
class EmployeesController{
    private $connect;
    private $Connection;
    public function __construct() {
        require_once  __DIR__ . "/../core/Connect.php";
        require_once  __DIR__ . "/../model/employee.php";
        $this->connect=new Connect();
        $this->Connection=$this->connect->Connection();
    }

    public function run($action){
        switch($action)
        {
            case "index" :
                $this->index();
                break;
            case "create" :
                $this->create();
                break;
            case "detail" :
                $this->detail();
                break;
            case "update" :
                $this->update();
                break;
            default:
                $this->index();
                break;
        }
    }

    public function index(){
        //We create the employee object
        $employee=new Employee($this->Connection);
        //We get all the employees
        $employees=$employee->getAll();
        //We load the index view and pass values to it
        $this->view("index",array(
            "employees"=>$employees,
            "title" => "PHP MVC"
        ));
    }

    public function detail(){
        //We load the model
        $modelo = new Employee($this->Connection);
        //We recover the employee from the BBDD
        $employee = $modelo->getById($_GET["id"]);
        //We load the detail view and pass values to it
        $this->view("detail",array(
            "employee"=>$employee,
            "title" => "Detail Employee"
        ));
    }

    public function create(){
        if(isset($_POST["Name"])){

            $employee=new Employee($this->Connection);
            $employee->setName($_POST["Name"]);
            $employee->setSurname($_POST["Surname"]);
            $employee->setEmail($_POST["email"]);
            $employee->setphone($_POST["phone"]);
            $save=$employee->save();
        }
        header('Location: index.php');
    }

    public function update(){
        if(isset($_POST["id"])){

            $employee=new Employee($this->Connection);
            $employee->setId($_POST["id"]);
            $employee->setName($_POST["Name"]);
            $employee->setSurname($_POST["Surname"]);
            $employee->setEmail($_POST["email"]);
            $employee->setphone($_POST["phone"]);
            $save=$employee->update();
        }
        header('Location: index.php');
    }

    public function view($vista,$datas){
        $data = $datas;
        require_once  __DIR__ . "/../view/" . $vista . "View.php";
    }
}
?>