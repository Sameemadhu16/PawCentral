<?php if (isset($_SESSION['user'])): ?>
    <script>
        // Only load notifications after the page is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            function loadNotifications() {
                fetch("<?=ROOT?>/notifications/fetch")
                    .then(response => response.json())
                    .then(data => {
                        const badge = document.getElementById('notif-count');
                        if (data.length > 0) {
                            badge.textContent = data.length;
                        } else {
                            badge.textContent = '0';
                        }
                    });
            }

            // Poll every 5 seconds
            setInterval(loadNotifications, 5000);
            loadNotifications();
        });
    </script>
<?php endif; ?> 