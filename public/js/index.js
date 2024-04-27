function loadContent(content) {
    const url = `/dashboard/${content}`;
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.getElementById('dashboardContent').innerHTML = html;
            updateActiveLink(content);
        })
        .catch(error => console.error('Error loading the content:', error));
}

function updateActiveLink(content) {
    const links = document.querySelectorAll('.dash-nav-item a');
    links.forEach(link => {
        if (link.getAttribute('onclick').includes(content)) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    // Set default content load for Profile if none is active
    if (!document.querySelector('.dash-nav-item a.active')) {
        loadContent('profile'); // Load profile by default
    }
});

function loadContent(content) {
    const url = `/dashboard/${content}`;
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.getElementById('dashboardContent').innerHTML = html;
        })
        .catch(error => console.error('Error loading the content:', error));
}