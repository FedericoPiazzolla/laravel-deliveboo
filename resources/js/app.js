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
 
  function validateForm(){
    let name = document.getElementById("name").value;
    let price = document.getElementById("price").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let restaurant_email = document.getElementById("restaurant_email").value;
    let restaurant_password = document.getElementById("restaurant_password").value;

    if (name === "" || price === "") {
        alert("Name and price must be filled out");
        return false;
    } else if (email === "" || password === "" || restaurant_email === "" || restaurant_password === "") {
        alert("email and password must be filled out");
        return false;
    }
      return true; 
    }
  