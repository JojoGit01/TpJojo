
const inactif = "inactif"
const actif = "actif"

const helpPassword = () => {

    let divHelpPassword = document.getElementById('helpPassword')
    let caractereMin = document.getElementById('caractereMin')
    let majuscule = document.getElementById('majuscule')
    let nombre = document.getElementById('nombre')
    let caractereSpeciaux = document.getElementById('caractereSpeciaux')
    let passwordC = document.getElementById('password')

    let regexMajuscule = /[A-Z]/
    let regexNombre = /[0-9]/
    let regexCaractereSpeciaux = /[!@#$%^&*()_+\-=\[\]{};':"\|,.<>\/? ]/

    divHelpPassword.style.display = 'none'
    passwordC.addEventListener('click', () => {
        divHelpPassword.style.display = 'block'
    })
    passwordC.addEventListener('input', function () {
        this.value.length >= 4 ? caractereMin.classList.replace(inactif, actif) : caractereMin.classList.replace(actif, inactif)
        this.value.match(regexMajuscule) ? majuscule.classList.replace(inactif, actif) : majuscule.classList.replace(actif, inactif)
        this.value.match(regexNombre) ? nombre.classList.replace(inactif, actif) : nombre.classList.replace(actif, inactif)
        this.value.match(regexCaractereSpeciaux) ? caractereSpeciaux.classList.replace(inactif, actif) : caractereSpeciaux.classList.replace(actif, inactif)
    })
}

//Because doesn't work with two file !
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
    helpPassword()
    navbarColorPos()
}