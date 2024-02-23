import "./bootstrap";

import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";

const buttons = document.querySelectorAll(".btn-delete");

buttons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();

        const deleteModalElem = document.getElementById("delete_modal");
        const deleteModal = new bootstrap.Modal(deleteModalElem);

        const title = button.getAttribute("data-title");
        document.getElementById("title-to-delete").innerHTML = title;

        document.getElementById("delete-btn").addEventListener("click", () => {
            button.parentElement.submit();
        });

        deleteModal.show();
    });
});
