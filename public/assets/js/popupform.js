function showPopup(eventId, closeUrl, warnMessage, reasons = ['Change of Mind', 'No Longer Needed', 'Completed Successfully', 'Mistaken Entry', 'Duplicate Request', 'Other']) {
    // Create a unique ID for this popup, 
    let popupId = `popup-${eventId}`;
    
    // Check if a popup with the same ID already exists and remove it
    let existingPopup = document.getElementById(popupId);
    if (existingPopup) {
        existingPopup.remove();
    }
    
    // Create dropdown options HTML
    let reasonOptions = reasons.map(reason => 
        `<option value="${reason.toLowerCase().replace(/ /g, '-')}">${reason}</option>`
    ).join('');
    
    // Create a popup container with a unique ID
    let popup = document.createElement("div");
    popup.classList.add("popup-container");
    popup.style.display = "flex";
    popup.id = popupId; // Assign the unique ID
    
    // Popup content with dropdown
    popup.innerHTML = `
        <div class="popup-box" >
            <p>${warnMessage}</p>
            <div class="form-container" style="box-shadow:none ; padding-top:10px;padding-bottom:0px;margin-bottom:0px;font-size:.8rem">
                <label for="reason-select-${eventId}">Select a reason:</label>
                <select id="reason-select-${eventId}" class="reason-dropdown" style="font-size:.7rem">
                    ${reasonOptions}
                </select>
            </div>
            <div class="popup-actions">
                <button class="confirm-btn" onclick="confirmClose('${closeUrl}', '${popupId}')">Yes</button>
                <button class="cancel-btn" onclick="closeAlertPopup('${popupId}')">Cancel</button>
            </div>
        </div>
    `;
    
    // Append to body
    document.body.appendChild(popup);
}

// Function to handle confirmation and redirect with reason
function confirmClose(closeUrl, popupId) {
    let selectElement = document.getElementById(popupId).querySelector('.reason-dropdown');
    let selectedReason = selectElement.value;
    
    // Redirect with the reason as a parameter
    window.location.href = `${closeUrl}?reason=${selectedReason}`;
}

// Function to close the popup
function closeAlertPopup(popupId) {
    let popup = document.getElementById(popupId);
    if (popup) {
        popup.remove();
    }
}