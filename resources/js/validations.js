// ************ VALIDAZIONE FORM REGISTRAZIONE ***************** ///

const onlyLettersPattern = /^[a-zA-Z ]+$/;
const onlyNumbersPattern = /^[0-9]+$/;
const numbersLettersPattern = /^[A-Za-z0-9 ]+$/;
// const addressNumberPattern = /^[0-9]+[A-Za-z]/;
const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

//   Errore nome
document.getElementById("name").addEventListener("input", function () {
    let name = this.value;
    let errorSpan = document.getElementById("nameError");

    if (!onlyLettersPattern.test(name)) {
        errorSpan.textContent = "Il campo può contenere solo lettere";
    } else {
        errorSpan.textContent = "";
    }
    if (name === "") {
        errorSpan.textContent = "Il campo deve essere compilato";
    }
});

//   Errore cognome
document.getElementById("surname").addEventListener("input", function () {
    let surname = this.value;
    let errorSpan = document.getElementById("surnameError");

    if (!onlyLettersPattern.test(surname)) {
        errorSpan.textContent = "Il campo può contenere solo lettere";
    } else {
        errorSpan.textContent = "";
    }

    if (surname === "") {
        errorSpan.textContent = "Il campo deve essere compilato";
    }
});

//   Errore partita iva

document.getElementById("vat_number").addEventListener("input", function () {
    let vat_number = this.value;
    let errorSpan = document.getElementById("vatNumberError");

    if (!numbersLettersPattern.test(vat_number)) {
        errorSpan.textContent = "Il campo può contenere solo lettere e numeri";
    } else {
        errorSpan.textContent = "";
    }

    if (vat_number.length !== 13) {
        if (errorSpan.textContent != "") {
            errorSpan.textContent += ", e deve contenere 13 caratteri.";
        } else {
            errorSpan.textContent = "Il campo deve contenere 13 caratteri";
        }
    }

    if (vat_number === "") {
        errorSpan.textContent = "Il campo deve essere compilato";
    }
});

//    Errore email

document.getElementById("email").addEventListener("blur", function () {
    let email = this.value;
    let errorSpan = document.getElementById("emailError");

    if (!emailPattern.test(email)) {
        errorSpan.textContent = "Il campo deve essere una mail";
    } else {
        errorSpan.textContent = "";
    }
    if (email === "") {
        errorSpan.textContent = "Il campo deve essere compilato";
    }
});

//   Errore password
document.getElementById("password").addEventListener("blur", function () {
    let password = this.value;
    let spanError = document.getElementById("passwordError");

    if (password.length < 6 && password !== "") {
        spanError.textContent = "Il campo deve contenere almeno 6 caratteri";
    } else {
        spanError.textContent = "";
    }

    if (password === "") {
        spanError.textContent = "Il campo deve essere compilato";
    }
});

//   Errore nome ristorante
document
    .getElementById("restaurant_name")
    .addEventListener("input", function () {
        let restaurant_name = this.value;
        let errorSpan = document.getElementById("restaurantNameError");

        if (!onlyLettersPattern.test(restaurant_name)) {
            errorSpan.textContent = "Il campo può contenere solo lettere.";
        } else {
            errorSpan.textContent = "";
        }
        if (restaurant_name === "") {
            errorSpan.textContent = "Il campo deve essere compilato";
        }
    });

//   Errore email ristorante
document
    .getElementById("restaurant_email")
    .addEventListener("blur", function () {
        let restaurant_email = this.value;
        let errorSpan = document.getElementById("restaurantEmailError");

        if (!emailPattern.test(restaurant_email)) {
            errorSpan.textContent = "Il campo deve essere una mail.";
        } else {
            errorSpan.textContent = "";
        }
        if (email === "") {
            errorSpan.textContent = "Il campo deve essere compilato";
        }
    });

//   Errore image

let restaurant_image = document.getElementById("restaurant_image");

restaurant_image.addEventListener("change", function () {
    let imageError = document.getElementById("imageError");
    let uploadedFile = this.files[0];
    if (uploadedFile) {
        console.log(uploadedFile.type);
        const extensionsSupported = [
            "image/png",
            "image/jpeg",
            "image/jpg",
            "image/svg",
            "image/bpm",
            "image/gif",
            "image/webp",
        ];

        if (extensionsSupported.includes(uploadedFile.type)) {
            imageError.textContent = "";
        } else {
            imageError.textContent =
                "Il formato del file non è supportato. Inserire un file: png, jpeg, jpg, svg, bpm, gif, webp";
        }
    }
});

// Errore logo

let restaurant_logo = document.getElementById("restaurant_logo");

restaurant_logo.addEventListener("change", function () {
    let logoError = document.getElementById("logoError");
    let uploadedFile = this.files[0];
    if (uploadedFile) {
        console.log(uploadedFile.type);
        const extensionsSupported = [
            "image/png",
            "image/jpeg",
            "image/jpg",
            "image/svg",
            "image/bpm",
            "image/gif",
            "image/webp",
        ];

        if (extensionsSupported.includes(uploadedFile.type)) {
            logoError.textContent = "";
        } else {
            logoError.textContent =
                "Il formato del file non è supportato. Inserire un file: png, jpeg, jpg, svg, bpm, gif, webp";
        }
    }
});

//   Errore indirizzo
document.getElementById("address").addEventListener("input", function () {
    let address = this.value;
    let errorSpan = document.getElementById("addressError");

    if (!numbersLettersPattern.test(address)) {
        errorSpan.textContent = "Il campo può contenere solo lettere o numeri.";
        document.getElementById("address").focus();
    } else {
        errorSpan.textContent = "";
    }
    if (address === "") {
        errorSpan.textContent = "Il campo deve essere compilato";
    }
});

//   N. Civico
document.getElementById("addressNumber").addEventListener("input", function () {
    let addressNumber = this.value;
    let errorSpan = document.getElementById("addressNumberError");

    if (!numbersLettersPattern.test(addressNumber)) {
        errorSpan.textContent = "Il campo può contenere solo lettere o numeri.";
    } else {
        errorSpan.textContent = "";
    }
    if (addressNumber === "") {
        errorSpan.textContent = "Il campo deve essere compilato";
    }
});

// CAP
document.getElementById("cap").addEventListener("input", function () {
    let cap = this.value;
    let errorSpan = document.getElementById("capError");

    if (!onlyNumbersPattern.test(cap)) {
        errorSpan.textContent = "Il campo può contenere solo numeri";
    } else {
        errorSpan.textContent = "";
    }

    if (cap.length !== 5) {
        if (errorSpan.textContent != "") {
            errorSpan.textContent += ", e deve contenere 5 caratteri.";
        } else {
            errorSpan.textContent = "Il campo deve contenere 5 caratteri";
        }
    }
    if (cap === "") {
        errorSpan.textContent = "Il campo deve essere compilato";
    }
});

//   Città
document.getElementById("city").addEventListener("input", function () {
    let city = this.value;
    let errorSpan = document.getElementById("cityError");

    if (!onlyLettersPattern.test(city)) {
        errorSpan.textContent = "Il campo può contenere solo lettere";
        this.classList.remove("is-valid");
        this.classList.add("is-invalid");
    } else {
        errorSpan.textContent = "";
        this.classList.remove("is-invalid");
        this.classList.add("is-valid");
    }
    if (city === "") {
        errorSpan.textContent = "Il campo deve essere compilato";
    }
});

//   Errore types

let checkboxes = document.querySelectorAll('div[id="typeForm"]');

for (let x = 0; x < checkboxes.length; x++) {
    checkboxes[x].addEventListener("click", function () {
        let typeError = document.getElementById("typeError");

        let boxesChecked = document.querySelectorAll(
            'input[class="ms_check"]:checked'
        );
        console.log(boxesChecked.length);
        if (boxesChecked.length > 0) {
            typeError.textContent = "";
        } else {
            typeError.textContent =
                "Selezionare almeno una tipologia per il tuo ristorante";
        }
    });
}
