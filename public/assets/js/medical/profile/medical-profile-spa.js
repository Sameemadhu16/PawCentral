document.addEventListener('DOMContentLoaded', function() {
    loadPage('profile');

    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const page = this.dataset.page;
            document.querySelectorAll('.nav-link').forEach(a => a.classList.remove('active'));
            this.classList.add('active');
            loadPage(page);
        });
    });
});

function loadPage(page) {
    const pageWindow = document.querySelector('.page-window');
    if (!pageWindow) {
        console.error('Page window element not found');
        return;
    }

    // Remove any existing page-specific classes
    const existingClasses = Array.from(pageWindow.classList);
    existingClasses.forEach(className => {
        if (className.startsWith('page-style-')) {
            pageWindow.classList.remove(className);
        }
    });

    // Add the new page-specific class
    pageWindow.classList.add(`page-style-${page}`);

    fetch(`http://localhost/PawCentral/public/medical-center/dashboard/${page}`)
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            
            // Get the container content
            const containerContent = doc.querySelector('.container');
            if (containerContent) {
                // Remove the sidebar if it exists in the loaded content
                const sidebar = containerContent.querySelector('.sidebar');
                if (sidebar) {
                    sidebar.remove();
                }
                pageWindow.innerHTML = containerContent.innerHTML;
            } else {
                pageWindow.innerHTML = '<p>Content not found</p>';
            }
        })
        .catch(error => {
            console.error("Error loading page:", error);
            pageWindow.innerHTML = 'Error loading content';
        });
}

// function loadPanel(panleName, callback) {
//     // load panel html
//     fetch(URL).then(res => res.text()).then(() => {
//           // set inner html
//           callback();
//     })
//   }
  
  
//   // usage example 
  
//   function userPanelActions() {
//     // what ever you wanna do after loading panel html
//   }
  
  
//   function productPanelActions() {
//     // what ever you wanna do after loading panel html
//   }
  
  
//   // switch to panel user 
//   loadPanel('user', userPanelActions);
  
//   // switch to panel product
//   loadPanel('product', productPanelActions);