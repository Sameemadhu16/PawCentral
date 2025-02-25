function showPopup(eventId, closeUrl, warnMessage) {
    // Create a unique ID for this popup
    let popupId = `popup-${eventId}`;

    // Check if a popup with the same ID already exists and remove it
    let existingPopup = document.getElementById(popupId);
    if (existingPopup) {
        existingPopup.remove();
    }

    // Create a popup container with a unique ID
    let popup = document.createElement("div");
    popup.classList.add("popup-container");
    popup.id = popupId; // Assign the unique ID

    // Popup content
    popup.innerHTML = `
        <div class="popup-box">
            <p>${warnMessage}</p>
            <div class="popup-actions">
                <button class="confirm-btn" onclick="window.location.href='${closeUrl}'">Yes</button>
                <button class="cancel-btn" onclick="closeAlertPopup('${popupId}')">Cancel</button>
            </div>
        </div>
    `;

    // Append to body
    document.body.appendChild(popup);
}

// Function to close the popup
function closeAlertPopup(popupId) {
    let popup = document.getElementById(popupId);
    if (popup) {
        popup.remove();
    }
}
