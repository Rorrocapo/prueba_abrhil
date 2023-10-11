<div class="d-flex justify-content-center">
	<h1>Agregar nuevo empleado</h1>
</div>

<form method="POST" id="employeeForm" class="d-flex justify-content-center flex-column pb-5">
	<div class="d-flex justify-content-center">
		<div class="form-group">
			<input id="name" name="fullname" tabindex="1" />
			<textarea id="address" name="address" required tabindex="5"></textarea>
			<input id="zipCode" name="zipCode" required tabindex="9" />
			<input id="hireDate" name="hireDate" required tabindex="13" />
		</div>

		<div class="form-group">
			<input id="lastname" name="lastname" tabindex="2" />
			<input id="country" name="country" required tabindex="6" />
			<input id="birthDay" name="birthday" tabindex="10" />
			<input id="position" name="position" required tabindex="14" />
		</div>

		<div class="form-group">
			<select id="gender" name="gender[]" required tabindex="3"></select>
			<input id="city" name="city" required tabindex="7" />
			<input id="phone" name="phone" required tabindex="11" />
			<input id="email" name="email" required tabindex="15" />
		</div>

		<div class="form-group">
			<input id="civilStatus" name="civilStatus" required tabindex="4" />
			<input id="state" name="state" required tabindex="8" />
			<input id="salary" name="salary" required tabindex="12" />
			<input id="supervisor" name="supervisor" required tabindex="16" />
		</div>
	</div>

	<div class="w-100 pt-3 d-flex justify-content-center flex-column">
		<div id="daterangepicker" title="daterangepicker"></div>
		<input type="date" id="startDate" name="startDate" hidden tabindex="17" />
		<input type="date" id="endDate" name="endDate" hidden tabindex="18" />
	</div>

	<button id="saveForm" class="w-25 k-button k-button-solid-primary k-button-solid k-button-md k-rounded-md align-self-center pt-2" type="submit" tabindex="19">Guardar</button>
</form>



<script>
	$("#name").kendoTextBox({
		fillMode: "flat",
		label: {
			content: "Nombre",
			floating: true
		}
	});

	$("#lastname").kendoTextBox({
		fillMode: "flat",
		label: {
			content: "Apellidos",
			floating: true
		}
	});

	$("#birthDay").kendoDatePicker({
		min: new Date(1950, 0, 1),
		weekNumber: true,
		format: "yyyy-MM-dd",
		parseFormats: ["MMMM yyyy"],
		label: {
			content: "Fecha de nacimiento",
			floating: true
		},
		dateInput: true
	});

	$("#gender").kendoMultiSelect({
		dataTextField: "text",
		dataValueField: "value",
		dataSource: [{
				text: "Masculino",
				value: "Masculino"
			},
			{
				text: "Femenino",
				value: "Femenino"
			},
			{
				text: "No binario",
				value: "No binario"
			}
		],

		label: {
			content: "Género",
			floating: true
		},
	});

	$("#civilStatus").kendoComboBox({
		dataSource: [{
				id: "Soltero/a",
				name: "Soltero/a"
			},
			{
				id: "Casado/a",
				name: "Casado/a"
			},
			{
				id: "Divorciado/a",
				name: "Divorciado/a"
			},
			{
				id: "Viudo/a",
				name: "Viudo/a"
			}
		],
		dataTextField: "name",
		label: {
			content: "Estado Civil",
			floating: true
		},
		clearButton: false
	});

	$("#address").kendoTextArea({
		fillMode: "flat",
		label: {
			content: "Dirección",
			floating: true
		}
	});

	$("#city").kendoTextArea({
		fillMode: "flat",
		label: {
			content: "Ciudad",
			floating: true
		}
	});

	$("#state").kendoTextArea({
		fillMode: "flat",
		label: {
			content: "Estado",
			floating: true
		}
	});

	$("#country").kendoTextArea({
		fillMode: "flat",
		label: {
			content: "País",
			floating: true
		}
	});

	$("#phone").kendoTextBox({
		fillMode: "flat",
		label: {
			content: "Teléfono",
			floating: true
		}
	}).on("input", function() {
		var $this = $(this);
		var value = $this.val();

		// Elimina caracteres no numéricos
		value = value.replace(/[^0-9]/g, "");

		$this.val(value);
	});

	$("#email").kendoTextArea({
		fillMode: "flat",
		label: {
			content: "Correo",
			floating: true
		}
	});

	$("#hireDate").kendoDatePicker({
		min: new Date(1950, 0, 1),
		weekNumber: true,
		format: "yyyy-MM-dd",
		parseFormats: ["MMMM yyyy"],
		label: {
			content: "Fecha de contratación",
			floating: true
		},
		dateInput: true
	});


	$("#position").kendoTextArea({
		fillMode: "flat",
		label: {
			content: "Puesto",
			floating: true
		}
	});

	$("#salary").kendoNumericTextBox({
		fillMode: "flat",
		label: {
			content: "Salario",
			floating: true
		},
		format: "c2",
	});

	$("#zipCode").kendoTextArea({
		fillMode: "flat",
		label: {
			content: "Código postal",
			floating: true
		},
	}).on("input", function() {
		var $this = $(this);
		var value = $this.val();

		// Elimina caracteres no numéricos
		value = value.replace(/[^0-9]/g, "");

		$this.val(value);
	});

	$("#supervisor").kendoTextArea({
		fillMode: "flat",
		label: {
			content: "Nombre del supervisor",
			floating: true
		}
	});


	$("#daterangepicker").kendoDateRangePicker({
		"messages": {
			"startLabel": "Fecha de inicio",
			"endLabel": "Fecha de finalización"
		},
		format: "yyyy-MM-dd"
	});

	$("#employeeForm").kendoValidator({
		validationSummary: true,
		messages: {
			// Defines a message for the custom validation rule.
			fullname: "El nombre debe ser mayor a 3 caracteres.",
			lastname: "Los apellidos deben ser mayor a 3 caracteres.",
			birthday: "Se debe selecionar al menos una fecha de cumpleaños."
		},
		rules: {
			fullname: function(input) {
				// The FullName must be at least three characters long.
				if (input.is("[name=fullname]")) {
					return input.val().length > 3;
				}
				return true;
			},
			lastname: function(input) {
				// The lastname must be at least three characters long.
				if (input.is("[name=lastname]")) {
					return input.val().length > 3;
				}
				return true;
			},
			birthday: function(input) {
				// The lastname must be at least three characters long.
				if (input.is("[name=birthday]")) {
					return input.val().length > 1;
				}
				return true;
			},
		}
	}).data("kendoValidator");

	$("#employeeForm").on("submit", function(event) {
		// alert("Handler for `submit` called.");
		event.preventDefault();

		var daterangepicker = $("#daterangepicker").data("kendoDateRangePicker");

		var selectedRange = daterangepicker.range();

		var startDate = selectedRange.start;
		var endDate = selectedRange.end;

		// Convierte las fechas al formato 'YYYY-MM-DD' para establecerlas en los elementos input
		var startDateFormatted = startDate.toISOString().split('T')[0];
		var endDateFormatted = endDate.toISOString().split('T')[0];

		// Establece las fechas en los elementos input
		$("#startDate").val(startDateFormatted);
		$("#endDate").val(endDateFormatted);


		$.post("index.php?controller=employees&action=save", $("#employeeForm").serialize(), function(data) {
			var newData = {
				EmpleadoID: data[0].EmpleadoID,
				Nombre: data[0].Nombre,
				Apellidos: data[0].Apellidos,
				Genero: data[0].Genero,
				Correo: data[0].Correo,
				Puesto: data[0].Puesto,
				FechaContratacion: data[0].FechaContratacion,
			};

			var grid = $("#ordersGrid").data("kendoGrid");
			var dataSource = grid.dataSource;

			dataSource.insert(0, newData);
		})

	});
</script>

<div id="ordersGrid"></div>

<script>
	$(function() {
		var orderData = [
			<?php foreach ($dataToView["data"] as $employee) { ?> {
					EmpleadoID: <?= $employee["EmpleadoID"] ?>,
					Nombre: "<?= $employee["Nombre"] ?>",
					Apellidos: "<?= $employee["Apellidos"] ?>",
					Genero: "<?= $employee["Genero"] ?>",
					Correo: "<?= $employee["Correo"] ?>",
					Puesto: "<?= $employee["Puesto"] ?>",
					FechaContratacion: "<?= $employee["FechaContratacion"] ?>",
				},
			<?php } ?>
		];

		var gridDataSource = new kendo.data.DataSource({
			data: orderData,
			schema: {
				model: {
					fields: {
						EmpleadoID: {
							type: "number"
						},
						Nombre: {
							type: "string"
						},
						Apellidos: {
							type: "string"
						},
						Genero: {
							type: "string"
						},
						Correo: {
							type: "string"
						},
						Puesto: {
							type: "string"
						},
						FechaContratacion: {
							type: "string"
						}
					}
				}
			},
			pageSize: 10,
			sort: {
				field: "OrderDate",
				dir: "desc"
			},
			autoSync: true
		});


		$("#ordersGrid").kendoGrid({
			dataSource: gridDataSource,
			height: 400,
			pageable: true,
			sortable: true,
			filterable: true,
			columns: [{
					field: "EmpleadoID",
					title: "Empleado ID",
					width: 160
				}, {
					field: "Nombre",
					title: "Nombre",
					width: 200,
					format: "{0:dd MMMM yyyy}"
				}, {
					field: "Apellidos",
					title: "Apellidos"
				}, {
					field: "Genero",
					title: "Genero"
				},
				{
					field: "Correo",
					title: "Correo"
				},
				{
					field: "Puesto",
					title: "Puesto"
				},
				{
					field: "FechaContratacion",
					title: "Fecha de contratación"
				}
			]
		});

	});
</script>

<!-- Ventana modal para mostrar los detalles del empleado -->
<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg"> <!-- Utiliza modal-lg para hacerlo más ancho -->
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="employeeModalLabel">Detalles del Empleado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="employeeDetailsForm">
					<div class="form-group">
						<label for="employeeId">ID de Empleado</label>
						<input type="text" class="form-control" id="employeeId" name="employeeId" readonly>
					</div>
					<div class="form-group">
						<label for="employeeName">Nombre</label>
						<input type="text" class="form-control" id="employeeName" name="employeeName" readonly>
					</div>
					<div class="form-group">
						<label for="employeeLastName">Apellidos</label>
						<input type="text" class="form-control" id="employeeLastName" name="employeeLastName" readonly>
					</div>
					<div class="form-group">
						<label for="employeeBirthday">Fecha de Nacimiento</label>
						<input type="text" class="form-control" id="employeeBirthday" name="employeeBirthday" readonly>
					</div>
					<div class="form-group">
						<label for="employeeGender">Género</label>
						<input type="text" class="form-control" id="employeeGender" name="employeeGender" readonly>
					</div>
					<div class="form-group">
						<label for="employeeCivilStatus">Estado Civil</label>
						<input type="text" class="form-control" id="employeeCivilStatus" name="employeeCivilStatus" readonly>
					</div>
					<div class="form-group">
						<label for="employeeAddress">Dirección</label>
						<input type="text" class="form-control" id="employeeAddress" name="employeeAddress" readonly>
					</div>
					<div class="form-group">
						<label for="employeeCity">Ciudad</label>
						<input type="text" class="form-control" id="employeeCity" name="employeeCity" readonly>
					</div>
					<div class="form-group">
						<label for="employeeState">Estado</label>
						<input type="text" class="form-control" id="employeeState" name="employeeState" readonly>
					</div>
					<div class="form-group">
						<label for="employeeZipCode">Código Postal</label>
						<input type="text" class="form-control" id="employeeZipCode" name="employeeZipCode" readonly>
					</div>
					<div class="form-group">
						<label for="employeeCountry">País</label>
						<input type="text" class="form-control" id="employeeCountry" name="employeeCountry" readonly>
					</div>
					<div class="form-group">
						<label for="employeePhone">Teléfono</label>
						<input type="text" class="form-control" id="employeePhone" name="employeePhone" readonly>
					</div>
					<div class="form-group">
						<label for="employeeEmail">Correo</label>
						<input type="text" class="form-control" id="employeeEmail" name="employeeEmail" readonly>
					</div>
					<div class="form-group">
						<label for="employeeHireDate">Fecha de Contratación</label>
						<input type="text" class="form-control" id="employeeHireDate" name="employeeHireDate" readonly>
					</div>
					<div class="form-group">
						<label for="employeePosition">Puesto</label>
						<input type="text" class="form-control" id="employeePosition" name="employeePosition" readonly>
					</div>
					<div class="form-group">
						<label for="employeeSalary">Salario</label>
						<input type="text" class="form-control" id="employeeSalary" name="employeeSalary" readonly>
					</div>
					<div class="form-group">
						<label for="employeeSupervisor">Nombre del Supervisor</label>
						<input type="text" class="form-control" id="employeeSupervisor" name="employeeSupervisor" readonly>
					</div>
					<div class="form-group">
						<label for="employeeStartDate">Fecha de Inicio</label>
						<input type="text" class="form-control" id="employeeStartDate" name="employeeStartDate" readonly>
					</div>
					<div class="form-group">
						<label for="employeeEndDate">Fecha de Finalización</label>
						<input type="text" class="form-control" id="employeeEndDate" name="employeeEndDate" readonly>
					</div>
					<div class="form-group">
						<label for="employeeStatus">Estado de Empleado</label>
						<input type="text" class="form-control" id="employeeStatus" name="employeeStatus" readonly>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script>
	// Agrega un evento clic a los botones o enlaces del grid
	$("#ordersGrid").on("click", "tr", function() {
		// Obtiene el ID del registro desde el origen de datos del grid
		var grid = $("#ordersGrid").data("kendoGrid");
		var dataItem = grid.dataItem(this);

		if (dataItem) {
			$.post("index.php?controller=employees&action=get", {
				EmpleadoID: dataItem.EmpleadoID
			}, function(data) {
				$("#employeeId").val(data.EmpleadoID);
				$("#employeeName").val(data.Nombre);
				$("#employeeLastName").val(data.Apellidos);
				$("#employeeBirthday").val(data.FechaNacimiento);
				$("#employeeGender").val(data.Genero);
				$("#employeeCivilStatus").val(data.EstadoCivil);
				$("#employeeAddress").val(data.Direccion);
				$("#employeeCity").val(data.Ciudad);
				$("#employeeState").val(data.Estado);
				$("#employeeZipCode").val(data.CodigoPostal);
				$("#employeeCountry").val(data.Pais);
				$("#employeePhone").val(data.Telefono);
				$("#employeeEmail").val(data.Correo);
				$("#employeeHireDate").val(data.FechaContratacion);
				$("#employeePosition").val(data.Puesto);
				$("#employeeSalary").val(data.Salario);
				$("#employeeSupervisor").val(data.Supervisor);
				$("#employeeStartDate").val(data.FechaInicio);
				$("#employeeEndDate").val(data.FechaFinalizacion);

				if(data.EstadoEEmpleado == 1){
					$("#employeeStatus").val("Activo");
				}else {
					$("#employeeStatus").val("Desactivado");
				}
			})



			// Abre la ventana modal
			$("#employeeModal").modal("show");
		}
	});
</script>