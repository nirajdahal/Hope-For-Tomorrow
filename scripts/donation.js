new Accordion('.accordion-container');


const button = document.getElementById("donate")

button.addEventListener("click", () => {
    ToastFunc("Thank You For Donating!", true)
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


document.getElementById('scroll-donation').addEventListener('click', function () {
    const bottomContent = document.getElementById('main-donation');
    bottomContent.scrollIntoView({ behavior: 'smooth' });
});