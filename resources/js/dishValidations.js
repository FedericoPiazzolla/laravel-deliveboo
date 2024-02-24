// ************ VALIDAZIONE FORM CREAZIONE PIATTO ***************** ///
const onlyLettersPattern = /^[a-zA-Z ]+$/;
const numbersLettersPattern = /^[A-Za-z0-9 ]+$/;
// Errore nome

document.querySelector(".dish_name").addEventListener("input", function () {
    let name = this.value;
    let errorSpan = document.getElementById("dishNameError");

    if (!numbersLettersPattern.test(name)) {
        errorSpan.textContent = "Il campo può contenere solo lettere";
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

// General error
document
    .getElementById("dishCreateBtn")
    .addEventListener("click", function (event) {
        let nameError = document.getElementById("dishNameError").textContent;
        let imageError = document.getElementById("imageError").textContent;

        let errorsList = [nameError, imageError];

        for (let x = 0; x < errorsList.length; x++) {
            console.log(errorsList[x]);
            if (errorsList[x] !== "") {
                console.log(errorsList);
                event.preventDefault();
                window.scrollTo(0, 0);
            }
        }
    });
