/** POST METHOD */

// on récupère l'évènement du bouton submit
const submit = document.querySelector("input#btnSubmit");

// on récupère les infos du formulaire
const inputs = document.querySelectorAll("input.data");

function getValueByKey(key) {
    let returnValue = null;
    for (let i = 0; i < inputs.length; i++) {
        let input = inputs[i];
        if (input.name === key) {
            if (input.value !== null) {
                returnValue = input.value
            } else {
                returnValue = input.defaultValue;
            }
            break;
        }
    }
    return returnValue;
}

// lors du click sur le bouton Submit 
submit.addEventListener('click', event => {
    form = {
        'username' : getValueByKey('username'),
        'email' : getValueByKey('email'),
        'password' : getValueByKey('password'),
    };

    HTTP.post('/register', form, true, () => refresh());
})

