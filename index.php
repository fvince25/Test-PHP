<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Test de connaissances PHP</title>

    <!--META-->

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--A mettre avant le css-->

    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.0.3/jquery-confirm.min.css">


    <!--DECLARE CSS-->

    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/styles.css">


    <!--DECLARE JS-->

    <script src="assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.0.3/jquery-confirm.min.js"></script>


    <script src="assets/js/functions.js"></script>
    <script src="assets/js/scripts.js"></script>

</head>
<body>

    <main>
        <section id="contact">
            <div class="center_1050px">
                <h1 id="title">Création d'un contact</h1>

                <article>
                    <form data-id action="">

                        <div class="input_container">
                            <input id="name" type="text">
                            <label for="name">Nom</label>
                        </div>

                        <div class="input_container">
                            <input id="mail" type="text">
                            <label for="mail">Prénom</label>
                        </div>

                        <div class="input_container">
                            <input id="address" type="text">
                            <label for="address">Adresse Complète</label>
                        </div>

                        <div class="input_container">
                            <input id="function" type="text">
                            <label for="function">Code Postal</label>
                        </div>

                        <div class="input_container">
                            <input id="city" type="text">
                            <label for="city">Ville</label>
                        </div>

                        <div class="input_container">
                            <input id="phone" type="text">
                            <label for="phone">Téléphone</label>
                        </div>

                        <div class="input_container">
                            <input id="mobile" type="text">
                            <label for="mobile">Mobile</label>
                        </div>

                        <button id="save" type="submit">Sauvegarder le nouveau contact</button>

                        <!--<div class="resp_align">-->
                            <!--<a href="#">envoyer</a>-->
                        <!--</div>-->
                    </form>
                </article>
                <hr>
                <h1>Liste des contacts</h1>
                <div id="contenu_fichier"></div>
            </div>

        </section>

    </main>
    <footer>
    </footer>
</body>