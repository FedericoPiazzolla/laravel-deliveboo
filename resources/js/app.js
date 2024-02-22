import "./bootstrap";

import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
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

// function setFormValidation() {
//     let name = document.getElementById("name").value;
//     let price = document.getElementById("price").value;
//     let email = document.getElementById("email").value;
//     let password = document.getElementById("password").value;
//     let restaurant_email = document.getElementById("restaurant_email").value;
//     let restaurant_password = document.getElementById(
//         "restaurant_password"
//     ).value;

//     const namePattern = /^[a-zA-Z]+$/;

//     if (!namePattern.test(name)) {
//         document.getElementById("nameError").textContent =
//             "Il nome deve essere composto solo da lettere";
//     } else {
//         document.getElementById("nameError").textContent = "";
//     }
// }

document
    .getElementById("registrationForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        let name = document.getElementById("name").value;
        let surname = document.getElementById("surname").value;
        let vat_number = document.getElementById("vat_number").value;

        const onlyLettersPattern = /^[a-zA-Z]+$/;
        const vatPattern = /^[A-Za-z0-9]+$/;
        // Errore nome
        if (!onlyLettersPattern.test(name)) {
            document.getElementById("nameError").textContent =
                "Il campo può contenere solo lettere";
        } else {
            document.getElementById("nameError").textContent = "";
        }

        // Errore cognome
        if (!onlyLettersPattern.test(surname)) {
            document.getElementById("surnameError").textContent =
                "Il campo può contenere solo lettere";
        } else {
            document.getElementById("surnameError").textContent = "";
        }

        // Errore partita iva
        if (!vatPattern.test(vat_number)) {
            document.getElementById("vatError").textContent =
                "Il campo può contenere solo lettere e numeri";
        }
    });
