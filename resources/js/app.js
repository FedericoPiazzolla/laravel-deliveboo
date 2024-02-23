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
