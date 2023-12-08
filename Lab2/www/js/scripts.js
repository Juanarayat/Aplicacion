document.addEventListener("DOMContentLoaded", function() {
    // Función para agregar personas a la tabla
    window.agregarPersona = function() {
        
        // Obtener los valores del formulario
        var nombre = document.getElementsByName("nombre")[0].value;
        var apellido = document.getElementsByName("apellido")[0].value;

        // Validar que se ingresen ambos valores
        if (nombre && apellido) {
            // Crear una nueva fila en la tabla
            var table = document.querySelector("table tbody");//seleccionamos primeeera tabla
            var newRow = table.insertRow(table.rows.length);//retorna el numero de filas
            var cell1 = newRow.insertCell(0);//creamos 3 celdas en esta fila
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);

            // Asignar valores a las celdas
            cell1.innerHTML = table.rows.length;
            cell2.innerHTML = nombre;
            cell3.innerHTML = apellido;

            // Limpiar los campos del formulario
            document.getElementsByName("nombre")[0].value = "";
            document.getElementsByName("apellido")[0].value = "";
        } else {
            // Mostrar un mensaje de error si no se ingresan ambos valores
            alert("Por favor, ingrese nombre y apellido.");
        }
    };

    window.guardarPersona = function() 
    {
        alert("Actividad opcional");
    }

});