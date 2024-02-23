import "./bootstrap";

import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import { lastIndexOf } from "lodash";
import.meta.glob(["../img/**"]);

// Funzione per preview image nel form
const previewImgElem = document.getElementById("preview_image");

document
    .getElementById("restaurant_image")
    .addEventListener("change", function () {
        const selectedFile = this.files[0];
        if (selectedFile) {
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                previewImgElem.src = reader.result;
            });
            reader.readAsDataURL(selectedFile);
        }
    });

// Funzione per preview logo nel form

const previewLogoElem = document.getElementById("preview_logo");

document
    .getElementById("restaurant_logo")
    .addEventListener("change", function () {
        const selectedFile = this.files[0];
        if (selectedFile) {
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                previewLogoElem.src = reader.result;
            });
            reader.readAsDataURL(selectedFile);
        }
    });

// Funzione per la validazione dei dati client-side

function validateForm() {
    let name = document.getElementById("name").value;
    let price = document.getElementById("price").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let restaurant_email = document.getElementById("restaurant_email").value;
    let restaurant_password = document.getElementById(
        "restaurant_password"
    ).value;

    if (name === "" || price === "") {
        alert("Name and price must be filled out");
        return false;
    } else if (
        email === "" ||
        password === "" ||
        restaurant_email === "" ||
        restaurant_password === ""
    ) {
        alert("email and password must be filled out");
        return false;
    }
    return true;
}

// ************ VALIDAZIONE FORM REGISTRAZIONE ***************** ///

let restaurant_image = document.getElementById("restaurant_image").value;
let restaurant_logo = document.getElementById("restaurant_logo").value;

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
// const extensionsSupported = [
//     ".png",
//     ".jpeg",
//     ".jpg",
//     ".svg",
//     ".bpm",
//     ".gif",
//     ".webp",
// ];

// for (const extension of extensionsSupported) {
//     if (!restaurant_image.endsWith(extension)) {
//         document.getElementById("imageError").textContent =
//             "Il formato del file non è supportato. Inserire un file: png, jpeg, jpg, svg, bpm, gif, webp.";
//     }
//     document.getElementById("restaurant_image").focus();
// }

// for (const extension of extensionsSupported) {
//     if (!restaurant_logo.endsWith(extension)) {
//         document.getElementById("logoError").textContent =
//             "Il formato del file non è supportato. Inserire un file: png, jpeg, jpg, svg, bpm, gif, webp.";
//     }
//     document.getElementById("restaurant_logo").focus();
// }

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
