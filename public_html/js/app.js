'use strict'
// Get the container element
let btnContainer = document.getElementsByClassName("wrapper");
// Get all buttons with class="btn" inside the container
let btns = btnContainer.getElementsByClassName("btn");

// Loop through the buttons and add the active class to the current/clicked button
for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
        let current = document.getElementsByClassName("active");
            // If there's no active class
                if (current.length > 0) {
            current[0].className = current[0].className.replace("active", "");
        }
        // Add the active class to the current/clicked button
        this.className += " active";
    });
}
