const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

document.getElementById('submitCad').addEventListener('click', function () {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    if (password.length < 6) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "A senha deve ter pelo menos 6 caracteres!",
        });
    } else if (!/[A-Z]/.test(password)) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "A senha deve conter pelo menos uma letra maiúscula!",
        });
    } else if (password !== confirmPassword) {
        message.innerHTML = '';
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "As senhas não coincidem!",
        });
    } else {
        Swal.fire({
            icon: "success",
            title: "Cadastro realizado",
            text: "Cadastro feito com sucesso",
        });
    }
});
