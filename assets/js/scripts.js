

$(document).ready(function () {

    // Initialisation Tableau liste des contacts.
    //------------------------------------------------

    getContacts();

    // Evènements click
    //------------------------------------------------


    // Edition d'un contact
    $(document).on("click", "i.fa-edit", editContact);

    // Suppression d'un contact
    $(document).on("click", "i.fa-eraser", removeContact);

    // Sauvegarde d'un contact (Création ou modification)
    $('#save').on('click', saveContact);

});