document.getElementById('appointment-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevenir envío del formulario

    // Obtener datos del formulario
    const nombre = document.getElementById('nombre').value;
    const fecha = document.getElementById('fecha').value;
    const hora = document.getElementById('hora').value;

    // Mostrar mensaje de confirmación
    document.getElementById('user-name').textContent = nombre;
    document.getElementById('user-date').textContent = fecha;
    document.getElementById('user-time').textContent = hora;

    document.getElementById('appointment-form').style.display = 'none';
    document.getElementById('confirmation').style.display = 'block';
});