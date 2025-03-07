function toggleMenu(event) {
    const allMenus = document.querySelectorAll('.actionMenu');
    allMenus.forEach(menu => {
        menu.style.display = 'none';
    });
    const menu = event.target.nextElementSibling;
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
    document.addEventListener('click', function closeMenu(event) {
        if (!menu.contains(event.target) && !event.target.classList.contains('fa-ellipsis')) {
            menu.style.display = 'none';
            document.removeEventListener('click', closeMenu);
        }
    });
}
