let validation = document.getElementById('button');

let nom = document.getElementById('nom');
let nom_m = document.getElementById('nom_manquant');
let nom_v = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?/;

let prenom = document.getElementById('prenom');
let prenom_m = document.getElementById('prenom_manquant');
let prenom_v = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?/;

let adresse = document.getElementById('adresse');
let adresse_m = document.getElementById('adresse_manquant');

let code = document.getElementById('codepostal');
let code_m = document.getElementById('code_manquant');

let email = document.getElementById('email');
let email_m = document.getElementById('email_manquant');
let email_regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

let password = document.getElementById('password');
let password_m = document.getElementById('password_manquant');

let telephone = document.getElementById('telephone');
let telephone_m = document.getElementById('telephone_manquant');

let ville = document.getElementById('ville');
let ville_m = document.getElementById('ville_manquant');
let ville_v = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?/;

let date = document.getElementById('date');
let date_m = document.getElementById('date_manquant');


validation.addEventListener('click',f_valid);

function f_valid(e) {

    if (nom.validity.valueMissing) {
        e.preventDefault();
        nom_m.textContent = 'nom manquant';
        nom_m.style.color = 'red';
    } else if (nom_v.test(nom.value) == false) {
        event.preventDefault();
        nom_m.textContent = 'Format incorect';
        nom_m.style.color = 'orange';
    } else {
    }

    if (prenom.validity.valueMissing) {
        e.preventDefault();
        prenom_m.textContent = 'Prénom manquant';
        prenom_m.style.color = 'red';
    } else if (prenom_v.test(prenom.value) == false) {
        event.preventDefault();
        prenom_m.textContent = 'Format incorect';
        prenom_m.style.color = 'orange';
    } else {
    }

    if (adresse.validity.valueMissing) {
        e.preventDefault();
        adresse_m.textContent = 'Adresse manquant';
        adresse_m.style.color = 'red';
    }

    if (email.validity.valueMissing) {
        e.preventDefault();
        email_m.textContent = 'email manquant';
        email_m.style.color = 'red';
    }else if (email_regex.test(email.value) == false) {
        event.preventDefault();
        email_m.textContent = 'Format incorect';
        email_m.style.color = 'orange';
    } else {
    }

    if (password.validity.valueMissing) {
        e.preventDefault();
        password.textContent = 'mot de passe manquant';
        password_m.style.color = 'red';
    }

    if (code.validity.valueMissing) {
        e.preventDefault();
        code_m.textContent = 'code manquant';
        code_m.style.color = 'red';
    }

    if (ville.validity.valueMissing) {
        e.preventDefault();
        ville_m.textContent = 'ville manquant';
        ville_m.style.color = 'red';
    } else if (ville_v.test(ville.value) == false) {
        event.preventDefault();
        ville_m.textContent = 'Format incorect';
        ville_m.style.color = 'orange';
    } else {
    }

    if (telephone.validity.valueMissing) {
        e.preventDefault();
        telephone_m.textContent = 'telephone manquant';
        telephone_m.style.color = 'red';
    }

    if (date.validity.valueMissing) {
        e.preventDefault();
        date_m.textContent = 'date manquant';
        date_m.style.color = 'red';
    }

    


}

