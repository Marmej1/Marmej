const sandwich = document.querySelector('.sandwich');
const menu = document.querySelector('.navegacion');

//console.log(menu)
//console.log(hamburguer)

sandwich.addEventListener('click', ()=>{
    menu.classList.toggle("spread")
})

window.addEventListener('click', e=>{
    if(menu.classList.contains('spread') && e.target != menu && e.target != sandwich){
        
        menu.classList.toggle("spread")
    }
})