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

document
    .getElementById("registrationForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        let name = document.getElementById("name").value;
        let surname = document.getElementById("surname").value;
        let vat_number = document.getElementById("vat_number").value;
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        let restaurant_name = document.getElementById("restaurant_name").value;
        let restaurant_email =
            document.getElementById("restaurant_email").value;
        let restaurant_image =
            document.getElementById("restaurant_image").value;
        let restaurant_logo = document.getElementById("restaurant_logo").value;
        let address = document.getElementById("address").value;
        let addressNumber = document.getElementById("addressNumber").value;
        let cap = document.getElementById("cap").value;
        let city = document.getElementById("city").value;

        const onlyLettersPattern = /^[a-zA-Z ]+$/;
        const numbersLettersPattern = /^[A-Za-z0-9 ]+$/;
        const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

        // Errore nome
        if (!onlyLettersPattern.test(name)) {
            document.getElementById("nameError").textContent =
                "Il campo può contenere solo lettere.";
            document.getElementById("name").focus();
        }

        //         // Errore cognome
        if (!onlyLettersPattern.test(surname)) {
            document.getElementById("surnameError").textContent =
                "Il campo può contenere solo lettere.";
            document.getElementById("surname").focus();
        }

        //         // Errore partita iva
        let vatNumberErrors = [];

        if (!numbersLettersPattern.test(vat_number)) {
            vatNumberErrors.push(
                "Il campo può contenere solo lettere e numeri."
            );
            document.getElementById("vat_number").focus();
        }

        if (vat_number.length !== 13) {
            vatNumberErrors.push(
                "Il campo deve avere esattamente 13 caratteri."
            );
            document.getElementById("vat_number").focus();
        }

        if (vatNumberErrors.length > 0) {
            for (let x = 0; x < vatNumberErrors.length; x++) {
                let error = vatNumberErrors[x];
                let errorTag = document.getElementById("vatError");
                let errorMessage = document.createElement("li");
                errorMessage.textContent = error;
                errorTag.appendChild(errorMessage);
            }
        }

        //      Errore email
        if (!emailPattern.test(email)) {
            document.getElementById("emailError").textContent =
                "Il campo deve essere una mail.";
            document.getElementById("email").focus();
        }

        //         // Errore password
        if (password.length < 6) {
            document.getElementById("passwordError").textContent =
                "Il campo deve contenere almeno 6 caratteri.";
            document.getElementById("password").focus();
        }

        // Errore nome ristorante
        if (!onlyLettersPattern.test(restaurant_name)) {
            document.getElementById("restaurantNameError").textContent =
                "Il campo può contenere solo lettere.";
            document.getElementById("restaurant_name").focus();
        }

        // Errore email ristorante
        if (!emailPattern.test(restaurant_email)) {
            document.getElementById("restaurantEmailError").textContent =
                "Il campo deve essere una mail.";
            document.getElementById("restaurant_email").focus();
        }

        //         // Errore image
        const extensionsSupported = [
            ".png",
            ".jpeg",
            ".jpg",
            ".svg",
            ".bpm",
            ".gif",
            ".webp",
        ];

        for (const extension of extensionsSupported) {
            if (!restaurant_image.endsWith(extension)) {
                document.getElementById("imageError").textContent =
                    "Il formato del file non è supportato. Inserire un file: png, jpeg, jpg, svg, bpm, gif, webp.";
            }
            document.getElementById("restaurant_image").focus();
        }

        for (const extension of extensionsSupported) {
            if (!restaurant_logo.endsWith(extension)) {
                document.getElementById("logoError").textContent =
                    "Il formato del file non è supportato. Inserire un file: png, jpeg, jpg, svg, bpm, gif, webp.";
            }
            document.getElementById("restaurant_logo").focus();
        }

        // Errore indirizzo
        if (!numbersLettersPattern.test(address)) {
            document.getElementById("addressError").textContent =
                "Il campo può contenere solo lettere o numeri.";
            document.getElementById("address").focus();
        }

        // N. Civico
        if (!numbersLettersPattern.test(addressNumber)) {
            document.getElementById("addressNumberError").textContent =
                "Il campo può contenere solo lettere o numeri.";
            document.getElementById("addressNumber").focus();
        }

        // Città
        if (!onlyLettersPattern.test(city)) {
            document.getElementById("cityError").textContent =
                "Il campo può contenere solo lettere.";
            document.getElementById("city").focus();
        }

        // Errore types
        let checkboxes = document.querySelectorAll("type-{{ $type->id }}");
        if (checkboxes.length < 1) {
            document.getElementById("typeError").textContent =
                "Scegliere almeno una tipologia per il proprio ristorante.";
        }
    });

// ************ FUNZIONE PROVA ***************** ///

// function validateRegistrationForm() {
//     let name = document.getElementById("name").value;
//     let surname = document.getElementById("surname").value;
//     let vat_number = document.getElementById("vat_number").value;
//     let email = document.getElementById("email").value;
//     let password = document.getElementById("password").value;
//     let restaurant_name = document.getElementById("restaurant_name").value;
//     let restaurant_email = document.getElementById("restaurant_email").value;
//     let restaurant_image = document.getElementById("restaurant_image").value;
//     let restaurant_logo = document.getElementById("restaurant_logo").value;
//     let address = document.getElementById("address").value;
//     let addressNumber = document.getElementById("addressNumber").value;
//     let cap = document.getElementById("cap").value;
//     let city = document.getElementById("city").value;

//     const onlyLettersPattern = /^[a-zA-Z ]+$/;
//     const numbersLettersPattern = /^[A-Za-z0-9 ]+$/;
//     const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

//     // Errore nome
//     if (!onlyLettersPattern.test(name)) {
//         document.getElementById("nameError").textContent =
//             "Il campo può contenere solo lettere.";
//         document.getElementById("name").focus();
//     }

//     // Errore cognome
//     if (!onlyLettersPattern.test(surname)) {
//         document.getElementById("surnameError").textContent =
//             "Il campo può contenere solo lettere.";
//         document.getElementById("surname").focus();
//     }

//     // Errore partita iva
//     let vatNumberErrors = [];

//     if (!numbersLettersPattern.test(vat_number)) {
//         vatNumberErrors.push("Il campo può contenere solo lettere e numeri.");
//         document.getElementById("vat_number").focus();
//     }

//     if (vat_number.length !== 13) {
//         vatNumberErrors.push("Il campo deve avere esattamente 13 caratteri.");
//         document.getElementById("vat_number").focus();
//     }

//     if (vatNumberErrors.length > 0) {
//         for (let x = 0; x < vatNumberErrors.length; x++) {
//             let error = vatNumberErrors[x];
//             let errorTag = document.getElementById("vatError");
//             let errorMessage = document.createElement("li");
//             errorMessage.textContent = error;
//             errorTag.appendChild(errorMessage);
//         }
//     }

//     //      Errore email
//     if (!emailPattern.test(email)) {
//         document.getElementById("emailError").textContent =
//             "Il campo deve essere una mail.";
//         document.getElementById("email").focus();
//     }

//     // Errore password
//     if (password.length < 6) {
//         document.getElementById("passwordError").textContent =
//             "Il campo deve contenere almeno 6 caratteri.";
//         document.getElementById("password").focus();
//     }

//     // Errore nome ristorante
//     if (!onlyLettersPattern.test(restaurant_name)) {
//         document.getElementById("restaurantNameError").textContent =
//             "Il campo può contenere solo lettere.";
//         document.getElementById("restaurant_name").focus();
//     }

//     // Errore email ristorante
//     if (!emailPattern.test(restaurant_email)) {
//         document.getElementById("restaurantEmailError").textContent =
//             "Il campo deve essere una mail.";
//         document.getElementById("restaurant_email").focus();
//     }

//     // Errore image
//     const extensionsSupported = [
//         ".png",
//         ".jpeg",
//         ".jpg",
//         ".svg",
//         ".bpm",
//         ".gif",
//         ".webp",
//     ];

//     for (const extension of extensionsSupported) {
//         if (!restaurant_image.endsWith(extension)) {
//             document.getElementById("imageError").textContent =
//                 "Il formato del file non è supportato. Inserire un file: png, jpeg, jpg, svg, bpm, gif, webp.";
//         }
//         document.getElementById("restaurant_image").focus();
//     }

//     for (const extension of extensionsSupported) {
//         if (!restaurant_logo.endsWith(extension)) {
//             document.getElementById("logoError").textContent =
//                 "Il formato del file non è supportato. Inserire un file: png, jpeg, jpg, svg, bpm, gif, webp.";
//         }
//         document.getElementById("restaurant_logo").focus();
//     }

//     // Errore indirizzo
//     if (!numbersLettersPattern.test(address)) {
//         document.getElementById("addressError").textContent =
//             "Il campo può contenere solo lettere o numeri.";
//         document.getElementById("address").focus();
//     }

//     // N. Civico
//     if (!numbersLettersPattern.test(addressNumber)) {
//         document.getElementById("addressNumberError").textContent =
//             "Il campo può contenere solo lettere o numeri.";
//         document.getElementById("addressNumber").focus();
//     }

//     // Città
//     if (!onlyLettersPattern.test(city)) {
//         document.getElementById("cityError").textContent =
//             "Il campo può contenere solo lettere.";
//         document.getElementById("city").focus();
//     }

//     // Errore types
//     let checkboxes = document.querySelectorAll("type-{{ $type->id }}");
//     if (checkboxes.length < 1) {
//         document.getElementById("typeError").textContent =
//             "Scegliere almeno una tipologia per il proprio ristorante.";
//     }
// }
