<?php 

require_once 'model/employees.php';

class employeesController {
    public $page_title;
    public $view;
    public $employeeObj;

    public function __construct() {
        $this->view = 'list_employees';
        $this->page_title = '';
        $this->employeeObj = new Employees();
    }

    /* Listar todos los empleados */
    public function list() {
        $this->page_title = 'Listado de empleados';
        return $this->employeeObj->getEmployees();
    }

    /* Obtener detalles de un empleado */
    public function get() {
        $data = $this->employeeObj->getEmployeeById($_POST);

        // Devuelve los datos como JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /* Guardar datos de un empleado */
    public function save() {
        $data = $this->employeeObj->save($_POST);

        // Devuelve los datos como JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
