


const form = document.querySelector('.get-connected-form');
const nameInput = document.querySelector('.input-name input');
const emailInput = document.querySelector('.input-email input');
const emailError = document.querySelector('.input-email .email-error');
const messageInput = document.querySelector('.input-message textarea');

emailInput.addEventListener('input', () => {
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(emailInput.value)) {
        emailError.style.display = 'block';
        emailError.textContent = 'Please enter a valid email address';
    } else {
        emailError.style.display = 'none';
        emailError.textContent = '';

    }
});

form.addEventListener('submit', (e) => {
    e.preventDefault();

    // Name validation
    if (nameInput.value.trim() === '') {
        ToastFunc('Please enter your name', false);
        return;
    }

    // Email validation
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(emailInput.value.trim())) {
        ToastFunc('Please enter a valid email address', false);
        return;
    }

    // Message validation
    if (messageInput.value.trim() === '') {
        ToastFunc('Please enter a message', false);
        return;
    }

    // If all inputs are valid, alert the user
    ToastFunc('Thank you for reaching out! Your form has been submitted.', true);
});



function ToastFunc(message, success) {
    let color = "#1A3636"
    if (!success) {
        color = "#E54B4B"
    }
    Toastify({
        text: message,
        duration: 4000,
        // newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: color,
        }
    }).showToast();
}