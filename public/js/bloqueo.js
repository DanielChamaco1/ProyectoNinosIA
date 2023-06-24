// Verificar si el usuario ha iniciado sesión
function checkLoggedIn() {
    if (!localStorage.getItem('isLoggedIn')) {
      // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
      window.location.href = './index.html';
    }
  }
  
  // Función para cerrar sesión
  function logout() {
    // Eliminar el indicador de inicio de sesión del almacenamiento local
    localStorage.removeItem('isLoggedIn');
    // Redirigir al usuario a la página de inicio de sesión
    window.location.href = './index.html';
  }
  
  // Evento de envío del formulario de inicio de sesión
  document.getElementById('miFormu').addEventListener('submit', function(event) {
    event.preventDefault();
    // Realizar la autenticación del usuario aquí
  
    // Después de autenticar al usuario correctamente
    localStorage.setItem('isLoggedIn', 'true');
    // Redirigir al usuario a la página protegida
    window.location.href = './index2.html';
  });
  
  // Evento del botón de cerrar sesión
  document.getElementById('logoutButton').addEventListener('click', logout);
  
  // Verificar el estado de inicio de sesión al cargar la página
  checkLoggedIn();
  