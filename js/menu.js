let menu = document.getElementById('menu_button');
let listMenu = document.getElementById('list-menu')
let closeButton = document.getElementById('close_button');
let footer = document.getElementById('footer');
let asideBar = document.getElementById('aside-bar');
let menuUserDiv = document.querySelector('.menu-user');
menu.addEventListener('click', () => {
    listMenu.classList.toggle('show');
    closeButton.classList.toggle('show');
    footer.classList.toggle('hidden');
})
closeButton.addEventListener('click', () => {
    closeButton.classList.remove('show')
    listMenu.classList.remove('show');
    footer.classList.remove('hidden');
    asideBar.classList.remove('show')
})
menuUserDiv.addEventListener('click', () => {
    asideBar.classList.toggle('show');
    footer.classList.toggle('hidden');
    closeButton.classList.toggle('show');
})

