// Carrito de compras
let cart = [];

// Función para agregar un plan al carrito
function addToCart(plan) {
    cart.push(plan);
    renderCart();
}

// Función para renderizar los elementos del carrito
function renderCart() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    
    // Asegurarse de que el contenedor existe
    if (!cartItems || !cartTotal) return;

    cartItems.innerHTML = '';
    let total = 0;

    cart.forEach((item, index) => {
        const li = document.createElement('li');
        li.textContent = `${item} - $${item === 'Plan Básico' ? 100000 : 250000}`;
        total += item === 'Plan Básico' ? 100000 : 250000;

        // Botón para eliminar elementos del carrito
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Eliminar';
        removeButton.style.marginLeft = '1rem';
        removeButton.onclick = () => {
            cart.splice(index, 1);
            renderCart();
        };

        li.appendChild(removeButton);
        cartItems.appendChild(li);
    });

    cartTotal.textContent = `$${total}`;
}

// Función para finalizar compra
function checkout() {
    if (cart.length === 0) {
        alert('El carrito está vacío.');
    } else {
        const total = cart.reduce((sum, item) => sum + (item === 'Plan Básico' ? 100000 : 250000), 0);
        alert(`Compra finalizada. Total: $${total}`);
        cart = []; // Vaciar el carrito
        renderCart();
    }
}

// Desplazamiento automático del carrusel
const carousel = document.querySelector('.carousel');
if (carousel) {
    let scrollAmount = 0;

    function autoScroll() {
        scrollAmount += 1;

        if (scrollAmount > carousel.scrollWidth - carousel.clientWidth) {
            scrollAmount = 0;
        }

        carousel.scrollTo({
            left: scrollAmount,
            behavior: 'smooth',
        });
    }

    setInterval(autoScroll, 50);
}

document.querySelectorAll(".btn-agregar").forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault(); // Previene el comportamiento por defecto del botón
        const isAuthenticated = false; // Simula el estado de autenticación (cambiar según la lógica real)

        if (!isAuthenticated) {
            alert("Debes iniciar sesión o registrarte para agregar productos al carrito.");
            window.location.href = "login.html"; // Redirige al login
        } else {
            alert("Producto agregado correctamente.");
            // Aquí puedes añadir la lógica para agregar el producto al carrito
        }
    });
});
