
const getNav = 'nav'
const getNavAll = 'a'
const colorCourante = "gray"

const navbarColorPos = () => {
    let urlCourante = document.location.href
    let headerNav = document.querySelector(getNav).querySelectorAll(getNavAll)
    headerNav.forEach( (elm) => {
        if(elm.href === urlCourante){
            elm.style.color = colorCourante
        }
    })
}

globalThis.onload = () => {
    navbarColorPos()
}
