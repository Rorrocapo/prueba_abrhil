<?php

class Employees
{

	private $conection;

	public function __construct()
	{
	}

	/* Establecer la conexión a la base de datos */
	public function getConection()
	{
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Obtener todos los empleados */
	public function getEmployees()
	{
		$this->getConection(); // Establecer la conexión a la base de datos

		$sql = "EXEC obtenerEmpleados;"; // Ejecutar un procedimiento almacenado llamado obtenerEmpleados
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll(); // Devolver los resultados de la consulta como un arreglo
	}

	/* Buscar empleado por su id */
	public function getEmployeeById($id)
	{
		if (is_null($id)) return false;

		$this->getConection();
		$sql = "EXEC sp_GetEmpleadoByID @empleadoID = :EmpleadoID";
		$stmt = $this->conection->prepare($sql);

		// Asignar el valor al parametro
		foreach ($id as $key => $value) {
			$stmt->bindParam($key, $value, PDO::PARAM_INT);  // Ajusta el tipo de dato según corresponda
		}

		$stmt->execute();

		// Recuperar los datos del registro
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		// Devuelve los resultados de la consulta como un arreglo asociativo
		return $result;
	}



	/* Crear un nuevo empleado */
	public function save($param)
	{
		$this->getConection(); // Establecer la conexión a la base de datos

		$sql = "EXEC sp_InsertarEmpleado
				@Nombre = :Nombre,
				@Apellidos = :Apellidos,
				@FechaNacimiento = :FechaNacimiento,
				@Genero = :Genero,
				@EstadoCivil = :EstadoCivil,
				@Direccion = :Direccion,
				@Ciudad = :Ciudad,
				@Estado = :Estado,
				@CodigoPostal = :CodigoPostal,
				@Pais = :Pais,
				@Telefono = :Telefono,
				@Correo = :Correo,
				@FechaContratacion = :FechaContratacion,
				@Puesto = :Puesto,
				@Salario = :Salario,
				@Supervisor = :Supervisor,
				@FechaInicio = :FechaInicio,
				@FechaFinalizacion = :FechaFinalizacion,
				@EstadoEmpleado = :EstadoEmpleado";

		$stmt = $this->conection->prepare($sql);

		// Asignar valores a los parámetros
		$stmt->bindValue(':Nombre', $param['fullname']);
		$stmt->bindValue(':Apellidos', $param['lastname']);
		$stmt->bindValue(':FechaNacimiento', $param['birthday']);
		$stmt->bindValue(':Genero', implode(",", $param['gender']));
		$stmt->bindValue(':EstadoCivil', $param['civilStatus_input']);
		$stmt->bindValue(':Direccion', $param['address']);
		$stmt->bindValue(':Ciudad', $param['city']);
		$stmt->bindValue(':Estado', $param['state']);
		$stmt->bindValue(':CodigoPostal', $param['zipCode']);
		$stmt->bindValue(':Pais', $param['country']);
		$stmt->bindValue(':Telefono', $param['phone']);
		$stmt->bindValue(':Correo', $param['email']);
		$stmt->bindValue(':FechaContratacion', $param['hireDate']);
		$stmt->bindValue(':Puesto', $param['position']);
		$stmt->bindValue(':Salario', $param['salary']);
		$stmt->bindValue(':Supervisor', $param['supervisor']);
		$stmt->bindValue(':FechaInicio', $param['startDate']);
		$stmt->bindValue(':FechaFinalizacion', $param['endDate']);
		$stmt->bindValue(':EstadoEmpleado', 1);

		$stmt->execute();

		// Avanzar al siguiente conjunto de resultados
		$stmt->nextRowset();

		// Recuperar los datos del nuevo registro
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Devuelve los resultados de la consulta como un arreglo
		return $result;
	}
}
