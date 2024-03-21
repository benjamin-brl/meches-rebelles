/*
 * Gestion des formulaires
 */
const critere = document.querySelector("body").id;
const forms = document.querySelectorAll("form");

for (var i = 0; i < forms.length; i++) {
    let form = forms[i];
    const modifier = form.querySelector('#Modifier');
    const valider = form.querySelector('#Valider');
    const ajouter = form.querySelector('#Ajouter');

    const mail = form.querySelector('[name="mail"]');
    const pass = form.querySelector('[name="pass"]');

    const nom = form.querySelector('[name="nom"]');
    const prenom = form.querySelector('[name="prenom"]');
    const tel = form.querySelector('[name="tel"]');
    const fonction = form.querySelector('[name="fonction"]');

    const forme_jur = form.querySelector('[name="forme_jur"]');
    const capital = form.querySelector('[name="capital"]');
    const adresse = form.querySelector('[name="adresse"]');
    const siret = form.querySelector('[name="siret"]');

    let CheckForm = verifierFormulaire(form);

    modifier ? SetRemDisabled(CheckForm, modifier) : ajouter ? SetRemDisabled(CheckForm, ajouter) : null;
    if (pass !== null) {
        pass.addEventListener('input', () => {
            CheckForm = verifierFormulaire(form);
            if (valider) {
                SetRemDisabled(CheckForm, valider);
            }
        });
    }
    
    if (mail !== null) {
        mail.addEventListener('input', () => {
            CheckForm = verifierFormulaire(form);
            const modifier = form.querySelector('input#Modifier');
            if (valider) {
                SetRemDisabled(CheckForm, valider);
            } else if (ajouter) {
                SetRemDisabled(CheckForm, ajouter);
            } else if (modifier) {
                SetRemDisabled(CheckForm, modifier);
            }
        });
    }
    
    if (nom !== null) {
        nom.addEventListener('input', () => {
            CheckForm = verifierFormulaire(form);
            if (modifier) {
                SetRemDisabled(CheckForm, modifier);
            } else if (ajouter) {
                SetRemDisabled(CheckForm, ajouter);
            }
        });
    }
    
    if (prenom !== null) {
        prenom.addEventListener('input', () => {
            CheckForm = verifierFormulaire(form);
            const modifier = form.querySelector('input#Modifier');
            if (modifier) {
                SetRemDisabled(CheckForm, modifier);
            } else if (ajouter) {
                SetRemDisabled(CheckForm, ajouter);
            }
        });
    }
    
    if (tel !== null) {
        tel.addEventListener('input', () => {
            CheckForm = verifierFormulaire(form);
            if (modifier) {
                SetRemDisabled(CheckForm, modifier);
            } else if (ajouter) {
                SetRemDisabled(CheckForm, ajouter);
            }
        });
    }
    
    if (fonction !== null) {
        fonction.addEventListener('input', () => {
            CheckForm = verifierFormulaire(form);
            if (modifier) {
                SetRemDisabled(CheckForm, modifier);
            } else if (ajouter) {
                SetRemDisabled(CheckForm, ajouter);
            }
        });
    }
    
    if (forme_jur !== null) {
        forme_jur.addEventListener('input', () => {
            CheckForm = verifierFormulaire(form);
            if (modifier) {
                SetRemDisabled(CheckForm, modifier);
            }
        });
    }
    
    if (capital !== null) {
        capital.addEventListener('input', () => {
            CheckForm = verifierFormulaire(form);
            if (modifier) {
                SetRemDisabled(CheckForm, modifier);
            }
        });
    }
    
    if (adresse !== null) {
        adresse.addEventListener('input', () => {
            CheckForm = verifierFormulaire(form);
            if (modifier) {
                SetRemDisabled(CheckForm, modifier);
            }
        });
    }
    
    if (siret !== null) {
        siret.addEventListener('input', () => {
            CheckForm = verifierFormulaire(form);
            if (modifier) {
                SetRemDisabled(CheckForm, modifier);
            }
        });
    }
    form.addEventListener("submit", e => {
        e.preventDefault();
        const supprimer = form.querySelector('#Supprimer');
    
        if (modifier && CheckForm) {
            modifier.addEventListener("click", () => {
                const data = new FormData(form);
                fetchForm(data, `?a=meches&c=${critere}`);
                });
        }
    
        if (supprimer && CheckForm) {
            supprimer.addEventListener("click", () => {
                const data = new FormData(form);
                fetchForm(data, `?a=meches&c=${critere}&del=1`);
                });
        }
    
        if (ajouter && CheckForm) {
            ajouter.addEventListener("click", () => {
                const data = new FormData(form);
                fetchForm(data, `?a=meches&c=${critere}&add=1`);
            });
        }
    
        if (valider && CheckForm) {
            valider.addEventListener("click", () => {
                const data = new FormData(form);
                fetchForm(data, `?a=meches`);
            })
        }
    });
}
function verifierFormulaire(form) {
    var bool = [];
    var inputs = form.getElementsByTagName("input");

    for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        var interdictions = ["Modifier", "Valider", "Supprimer", "suppr", "Ajouter"];
        if (!interdictions.includes(input.id)) {
            var regex;
            var name = input.name;
            switch (name) {
                case "mail":
                    regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    break;
                case "pass":
                    regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/;
                    break;
                case "nom":
                    regex = /^[a-zA-ZÀ-ÿ]+([-'\s][a-zA-ZÀ-ÿ]+)?(,\s*[a-zA-ZÀ-ÿ]+([-'\s][a-zA-ZÀ-ÿ]+)?)*$/;
                    break;
                case "prenom":
                    regex = /^[a-zA-Z]+([-'][a-zA-Z]+)?(,\s*[a-zA-Z]+([-'][a-zA-Z]+)?)*$/;
                    break;
                case "tel":
                    regex = /^\d{10,12}$/;
                    break;
                case "fonction":
                    regex = /^[a-zA-Z]+?$/;
                    break;
                case "forme_jur":
                    regex = /^[a-zA-Z]+([ \'][a-zA-Z]+)?$/;
                    break;
                case "capital":
                    regex = /^-?\d+(\.\d+)?$/;
                    break;
                case "adresse":
                    regex = /^[\w\s'-,]+\s*[\w\s'-]+$/;
                    break;
                case "siret":
                    regex = /^\d{14}$/;
                    break;
            }
            bool.push(regex.test(input.value));
        }
    }

    return bool.every(element => element);
}
function SetRemDisabled(Check, input) {
    if (Check) {
        input.removeAttribute("disabled");
    } else if (!input.hasAttribute("disabled")) {
        input.setAttribute("disabled", "");
    }
}
function fetchForm(data, url) {
    fetch(url, {
        method: "POST",
        body: data,
    }).then(location.reload());
}
/*
 * Déconnection
 */
const disconnect = document.getElementById('disconnect');
if (disconnect) {
    disconnect.addEventListener('click', () => {
        fetch(`?a=meches&logout=1`).then(location.href = window.location.origin);
    })
}
/*
 * Gestion sécurité suppression
 */
forms.forEach(form => {
    const Suppr = form.querySelector('input#Supprimer');
    const checkbox = form.querySelector('input#suppr');
    if (checkbox) {
        checkbox.addEventListener('change', () => {
            const check = checkbox.checked;
            SetRemDisabled(check, Suppr);
        });
    }
});