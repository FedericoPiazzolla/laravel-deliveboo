// ************ VALIDAZIONE FORM CREAZIONE PIATTO ***************** ///
const onlyLettersPattern = /^[a-zA-Z ]+$/;
const numbersLettersPattern = /^[A-Za-z0-9 ]+$/;
const onlyNumbersPattern = /^[0-9]+$/;

// Errore nome

document.querySelector(".dish_name").addEventListener("input", function () {
    let name = this.value;
    let errorSpan = document.getElementById("dishNameError");

    if (!numbersLettersPattern.test(name)) {
        errorSpan.textContent = "Il campo può contenere solo lettere e numeri";
    } else {
        errorSpan.textContent = "";
    }
    if (name === "") {
        errorSpan.textContent = "Il campo deve essere compilato";
    }
});

// Errore image

let dish_image = document.getElementById("image");

dish_image.addEventListener("change", function () {
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

// Price error
document.getElementById("price").addEventListener("input", function () {
    let price = this.value;
    let errorSpan = document.getElementById("priceError");

    if (price !== number) {
        errorSpan.textContent = "Il campo può contenere solo numeri";
    } else {
        errorSpan.textContent = "";
    }
    if (email === "") {
        errorSpan.textContent = "Il campo deve essere compilato";
    }
});

// Description error
document.getElementById("description").addEventListener("input", function () {
    let text = this.value;
    let errorSpan = document.getElementById("descriptionError");

    if (text.length > 300) {
        errorSpan.textContent = "Massimo 300 caratteri consentiti";
    } else {
        errorSpan.textContent = "";
    }
});

// General error
document
    .getElementById("dishCreateBtn")
    .addEventListener("click", function (event) {
        let nameError = document.getElementById("dishNameError").textContent;
        let imageError = document.getElementById("imageError").textContent;
        let priceError = document.getElementById("priceError").textContent;
        let descriptionError =
            document.getElementById("descriptionError").textContent;

        let errorsList = [nameError, imageError, priceError, descriptionError];

        for (let x = 0; x < errorsList.length; x++) {
            console.log(errorsList[x]);
            if (errorsList[x] !== "") {
                console.log(errorsList);
                event.preventDefault();
                window.scrollTo(0, 150);
            }
        }
    });
