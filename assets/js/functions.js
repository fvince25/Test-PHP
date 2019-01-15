// Editer le contact. La clé esst passée dans un attribut du form.
//----------------------------------------------------------------

function editContact() {
    let index = parseInt($(this).attr('data-line'));
    indexHtml = index + 2;
    index++;

    $('tr:nth-child(' + indexHtml + ')').children('td').children('span').each(function (ind) {
        ind++;
        $('form').children('.input_container:nth-child(' + ind + ')').children('input').val($(this).html());
    })

    $('form').attr("data-id",index);
    $('#save').html("Sauvegarder les modifications");
    $('#title').html("Edition d'un contact");
}

// Suppression d'un contact. La clé est passée dans l' attribut du form data-id.
//-----------------------------------------------------------------------------

function removeContact() {

    $.confirm(
        {
            title: 'Avertissement',
            content: 'Confirmez vous la suppression de ce contact ?',
            buttons:
                {
                    Supprimer: function () {
                        confirmation = true;
                        $.post('assets/back/removeContact.php',

                            {
                                id:index
                            }).done(
                            function (resp, statusTxt, xhr) {

                                displayContacts(resp);
                                reinitForm();

                            });
                    }
                    ,
                    Annuler: function () {
                        confirmation = false;
                    }
                }
        });

    let index = parseInt($(this).attr('data-line'));
    index++;



}

// A l'initialisation, récupération de la liste de tous les contacts
//------------------------------------------------------------------

function getContacts() {

    $.post('assets/back/getContacts.php').done(
        function (resp, statusTxt, xhr) {
            console.log("resp", resp);
            displayContacts(resp);
            reinitForm();

        });

}


// Afficher la liste des contacts, cette fonction est appelée pour toute mise à jour du fichier data.txt
//------------------------------------------------------------------------------------------------------

function displayContacts(resp) {
    resp = JSON.parse(resp);

    let HTML_list;
    HTML_list = "<table>" +
        "           <tr>" +
        "               <th>Nom</th>" +
        "               <th>Prénom</th>" +
        "               <th>Adresse</th>" +
        "               <th>Cp</th>" +
        "               <th>Ville</th>" +
        "               <th>Téléphone</th>" +
        "               <th>Mobile</th>" +
        "               <th>Boutons</th>" +
        "           </tr>";


    if (!resp.error) {
        resp["return_Array"].forEach(function (line, i) {

            HTML_list += '<tr>';

            line.forEach(function (item) {
                HTML_list += "<td><span>" + item + "</span></td>";
            });

            HTML_list += '<td><i data-line = "' + i + '" class="fas fa-edit"></i>' +
                '<i data-line = "' + i + '" class="fas fa-eraser"></i></td></tr>';

        });

        HTML_list += "</table>";
    }

    $('#contenu_fichier').html(HTML_list);
}


// Réinitialisation du formulaire --> On repart sur une création
//--------------------------------------------------------------

function reinitForm() {

    $("input").val("");
    $('form').attr('data-id',"");
    $('#save').html("Sauvegarder le nouveau contact");
    $('#title').html("Ajout d'un nouveau contact");
}


// sauvegarde du contact : Fonctionne aussi bien en création qu'en Edition.
// Cas création : pas d'attribut data-id sur le form
// Cas édition : présence d'un data-id (= clé de la ligne) sur le form
//------------------------------------------------------------------------
function saveContact() {

    let chaine = '';

    let id = 0;

    $("input").each(function (index) {

        if (index === 0)
            chaine = $(this).val();
        else
            chaine += "|" + $(this).val();

    });

    // Si ID est alimenté --> on est en Edition.

    if ($("form").attr('data-id'))
        id = $("form").attr('data-id');


    $.post('assets/back/addContact.php',

        {
            chaine: chaine,
            id:id
        }).done(
        function (resp, statusTxt, xhr) {

            displayContacts(resp);
            reinitForm();

        });


    return false;

}