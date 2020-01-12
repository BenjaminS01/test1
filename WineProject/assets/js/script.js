function removeError(input) {
    let nextElement = input.parentNode.nextSibling;
    if (nextElement.tagName === "P" && nextElement.className === "error-text") {
        nextElement.remove();
    }
}

function insertError(input, message) {
    let nextElement = input.parentNode.nextSibling;
    if (!(nextElement.tagName === "P" && nextElement.className === "error-text")) {
        input.parentNode.insertAdjacentHTML("afterend", `<p class="error-text">` + message + `</p>`);
    }
}

function validateLength(input, minLength = 2) {
    if (input.value.trim().length < minLength) {
        insertError(input, `Minimal field length should be ${minLength} characters`);
    } else {
        removeError(input);
    }
}

function dobValidation(input, id) {
    if (document.getElementById(id).selectedIndex === 0) {
        if (!(input.parentNode.firstChild.tagName === 'P' && input.parentNode.firstChild.className === 'error-text')) {
            input.parentNode.insertAdjacentHTML('afterbegin', '<p class="error-text">Enter valid date of birth</p>')
        }
    } else {
        if ((document.getElementById('year').selectedIndex !== 0) &&
            (document.getElementById('day').selectedIndex !== 0) &&
            (document.getElementById('month').selectedIndex !== 0)) {
            if (input.parentNode.firstChild.tagName === 'P' && input.parentNode.firstChild.className === 'error-text') {
                input.parentNode.firstChild.remove();
            }
        }

    }
}

function countryValidation(input) {
    if (document.getElementById('country').selectedIndex === 0) {
        insertError(input, 'Enter valid country');
    } else {
        removeError(input);
    }

}

