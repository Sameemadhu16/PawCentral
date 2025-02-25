function showPopup(eventId, closeUrl,warnMessage) {
    // Create a popup container
    let popup = document.createElement("div");
    popup.classList.add("popup-container");

    // Popup content
    popup.innerHTML = `
        <div class="popup-box">
            <p>${warnMessage}</p>
            <div class="popup-actions">
                <button class="confirm-btn" onclick="window.location.href='${closeUrl}'">Yes</button>
                <button class="cancel-btn" onclick="closePopup()">Cancel</button>
            </div>
        </div>
    `;

    // Append to body
    document.body.appendChild(popup);
}

// Function to close the popup
function closePopup() {
    let popup = document.querySelector(".popup-container");
    if (popup) {
        popup.remove();
    }
}
