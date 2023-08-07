
<!--================== footer principale optionssection ================ !-->

<footer class="section-p1">
    <div class="col">
        <img class="logo" src="img/logo11.png" alt="">
        <h4>Contacte</h4>
        <p><strong>Adresse: </strong> Rue Bidossèssi, Abomey-Calavi</p>
        <p><strong>Téléphone: </strong> +229 51 95 44 04</p>
        <p><strong>Heure: </strong> <span id="heure"></span></p>
        <p><strong>Ouverture: </strong> 24H/24 - 7j/7</p>
        <div class="follow">
            <h4>Suivez nous</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>

    <div class="col">
        <h4>A propos</h4>
        <a href="">A propos de nous</a>
        <a href="">Information sur la livraison</a>
        <a href="">Politique de confidentilitée</a>
        <a href="">Termes et Conditions</a>
        <a href="">Contactez nous</a>
    </div>

    <div class="col">
        <h4>Mon Compte</h4>
        <a href="">S'abonner</a>
        <a href="">Afficher Panier</a>
        <a href="">Ma Liste de Commande</a>
        <a href="">Suivre Mes Commandes</a>
        <a href="">Aide</a>
    </div>

    <div class="col install">
        <h4>Installer l'App</h4>
        <p>Dans App Store ou Google Play</p>
        <div class="row">
            <img src="img/pay/app.jpg" alt="">
            <img src="img/pay/play.jpg" alt="">
        </div>
        <p>Portail de Paiement Sécurisé</p>
        <img src="img/pay/pay.png" alt="">
    </div>

    <div class="copyright">
        <p>&copy; 2023 Pacca Shop - Tous droits réservés</p>
    </div>
</footer>




<script src="js/script.js"></script>
<script>
    function afficherHeure() {
      var date = new Date();
      var heure = date.getHours();
      var minute = date.getMinutes();
      var seconde = date.getSeconds();
      var jour = date.toLocaleString().split(' ')[0][2];
      //var jour = date.getDay();
      var mois = date.getMonth(); // renvoie un nombre entre 0 et 11
      var nomsMois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
      var nomMois = nomsMois[mois];
      var annee = date.getFullYear();
      heure = heure < 10 ? "0" + heure : heure;
      minute = minute < 10 ? "0" + minute : minute;
      seconde = seconde < 10 ? "0" + seconde : seconde;
      var heureActuelle = heure + ":" + minute + ":" + seconde + " - " + jour + " " + nomMois + " " + annee;
      document.getElementById("heure").innerHTML = heureActuelle;
      setTimeout(afficherHeure, 1000);
    }

    // Pour navbar mobile

    const bar = document.getElementById('bar');
    const close = document.getElementById('close');
    const nav = document.getElementById('navbar');

    if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
        })
    }

    if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
        })
    }



    // Script pour vérification du formaulaire signup
        function validate(userForm) {
        div=document.getElementById("emailaddress"); // #1
        div.style.color="red";
        // #2
        if(div.hasChildNodes())
        // #3
        {
            div.removeChild(div.firstChild);
        // #4
        }
        regex=/(^\w+\@\w+\.\w+)/;
        // #5
        match=regex.exec(userForm.emailaddress.value);
        if(!match)
        {
            div.appendChild(document.createTextNode("Email Invalide"));
            userForm.emailaddress.focus();
        // #7
        return false;
        // #8
        }



        div=document.getElementById("passwdmsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
            div.removeChild(div.firstChild);
        }
        if(userForm.password.value.length <=5) // #9
        {
        div.appendChild(document.createTextNode("Le mot de passe doit contenir au moins 6 caractère"));
        userForm.password.focus();
        return false;
        }


        div=document.getElementById("repasswdmsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.password.value != userForm.repassword.value) // #10
        {
        div.appendChild(document.createTextNode("Les mots de passe ne sont pas identiques"));
        userForm.password.focus();
        return false;
        }


        var div=document.getElementById("usrmsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.complete_name.value.length ==0) // #11
        {
        div.appendChild(document.createTextNode("Le contenu de Nom ne peut pas êtres vide"));
        userForm.complete_name.focus();
        return false;
        }
    return true;
    }


    // Menu toggle

    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");


    toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active")
    }

 
    // Pour les bouton j'aime
    const likeButton = document.querySelector('.like');

    likeButton.addEventListener('click', function() {
    likeButton.classList.toggle('clicked');
    });

  </script>
</body>
</html>