let menu_icon = document.getElementById('menu-icon');
let menu = document.getElementById('menu');
menu_icon.addEventListener('click',showmenu);
function showmenu()
{
    menu.classList.toggle('hide');
}