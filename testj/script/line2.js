document.getElementById('password').addEventListener('input', function () {
    const password = this.value;

    const lowercaseRegex = /[a-z]/;
    const uppercaseRegex = /[A-Z]/;
    const numberRegex = /[0-9]/;
    const specialCharRegex = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;

    const isLowercase = lowercaseRegex.test(password);
    const isUppercase = uppercaseRegex.test(password);
    const isNumber = numberRegex.test(password);
    const isSpecialChar = specialCharRegex.test(password);
    const isLengthValid = password.length >= 8;

    document.querySelector('.requirements .lowercase').classList.toggle('valid', isLowercase);
    document.querySelector('.requirements .uppercase').classList.toggle('valid', isUppercase);
    document.querySelector('.requirements .number').classList.toggle('valid', isNumber);
    document.querySelector('.requirements .special-char').classList.toggle('valid', isSpecialChar);
    document.querySelector('.requirements .length').classList.toggle('valid', isLengthValid);
});

