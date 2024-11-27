<style>
    :root {
    --primary-color: #6A0DAD;
    --secondary-color: #882FC8;
    --accent-color: #FFFFFF;
    --text-color: #000000;
    --light-gray: #F0F0F0;
    --dark-gray: #333333;
    }
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal-content {
        background-color: var(--secondary-color);
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        color: var(--accent-color);
    }

    .modal-content button {
        margin: 10px;
        padding: 8px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .confirm-button {
        background-color: var(--primary-color);
        color: var(--accent-color);

    }

    .cancel-button {
        background-color: var(--light-gray);
        color: var(--text-color);
    }
</style>

<div id="deleteModal" class="modal">
    <div class="modal-content">
        <p>Are you sure you want to delete this?</p>
        <button type="button" id="confirmDelete" class="confirm-button">Yes</button>
        <button type="button" id="cancelDelete" class="cancel-button">No</button>
    </div>
</div>