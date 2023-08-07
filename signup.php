<?php
    include "./navbar.php";

    add_customer();
?>

<!--================= HEADER SECTION =================== !-->

<section id="page-header" style="background-image: url('img/banner/b16.jpg');">
  
    <h2>#Abonnement</h2>
    
    <p>Créer votre compte abonné et profiter des avantage d'être notre client fidèle</p>
    
</section>


<section id="signup" class="signup">
    <div class="signup_container">

        <div class="signup_right">
            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validate(this);">
            
                <label for="emailaddress">Adresse Email*:</label>
                <input class="form-groupe" type="email" name="emailaddress" placeholder="exemple@gmail.com"> 
                <span id="emailaddress"></span> <br><br>


                <label for="complete_name">Nom complet*: </label>
                <input class="form-groupe" type="text"  name="complete_name" placeholder="Votre nom et prénom">
                <span id="usrmsg"></span><br><br>

                <label for="profile_image">Image de Profile: </label>
                <input class="form-groupe" type="file" name="profile_image" id="profile_image">
                <span id="imagemsg"></span><br><br>

                <label for="sexe">Sexe*: </label>
                <select class="form-groupe" name="sexe" id="sexe" >
                    <option value="">selectionner</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
                <span id="sexemsg"></span><br><br>
            

                <label for="adresse">Adresse*:</label>
                <input class="form-groupe" type="text" name="address" placeholder="Ex: Rue 543, avenu parrana" >
                <span id="addressmsg"></span><br>

                <label for="city">Ville*: </label>
                <input class="form-groupe" type="text" name="city" placeholder="ville de résidence" >
                <span id="citymsg"></span><br>

                <label for="department">Département*: </label>
                <input class="form-groupe" type="text"  name="department" placeholder="Ex: collines" >
                <span id="departmsg"></span><br>
               

                <label for="country">Pays*: </label>
                <input class="form-groupe" type="text" name="country" placeholder="Pays de résidence" >
                <span id="countrymsg"></span><br>

                <label for="zipcode">Code Postale*: </label>
                <input class="form-groupe" type="text" name="zipcode" placeholder="Ex: BP 105" >
                <span id="codezipmsg"></span><br>

                <label for="phone">Téléphone*: </label>
                <input class="form-groupe" type="text"  name="phone" placeholder="Ex: +22951954404" >
                <span id="phonemsg"></span><br>

                <label for="password">Mot de Passe*: </label>
                <input class="form-groupe" type="password" name="password" > 
                <span id="passwdmsg"></span><br><br>

                <label for="repassword">Confirmez mot de passe: </label>
                <input class="form-groupe" type="password" name="repassword" >
                <span id="repasswdmsg"></span> <br><br>
            

                <div class="button_container">
                <input class="button-signup" type="submit" name="insert_customer" value="S'abonner"><br>
                <input class="button-cancel" type="reset" value="Annuler"><br>
                </div>
            
            </form>
        </div>
    </div>
</section>



<!--================== newsletter section ================ !-->

<section id="newsletter" class="section-p1 section-m1" style="background-image: url('img/banner/b14.png');">
    <div class="newstext">
        <h4>S'inscrire aux Newsletters</h4>
        <p>Recevez des mises à jour par e-mail sur notre dernière boutique et nos <span> offres spéciales </span> </p>
    </div>
    <div class="form">
        <input type="text" placeholder="Votre adresse email">
        <button class="normal">S'inscrire</button>
    </div>
</section>





<script>
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
            div.appendChild(document.createTextNode("email non invalide"));
            userForm.emailaddress.focus();
        // #7
        return false;
        // #8
        }

        var div=document.getElementById("usrmsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.complete_name.value.length ==0) // #11
        {
        div.appendChild(document.createTextNode("Veuillez renseigner vos noms et prénoms"));
        userForm.complete_name.focus();
        return false;
        }


        var div=document.getElementById("imagemsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.profile_image.value.length ==0) // #11
        {
        div.appendChild(document.createTextNode("Veuillez selectionner une image de profile"));
        userForm.profile_image.focus();
        return false;
        }


        var div=document.getElementById("sexemsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.sexe.value.length ==0) // #11
        {
        div.appendChild(document.createTextNode("Selectionner un sexe"));
        userForm.sexe.focus();
        return false;
        }

        var div=document.getElementById("addressmsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.address.value.length ==0) // #11
        {
        div.appendChild(document.createTextNode("Veuillez renseigner votre addresse"));
        userForm.address.focus();
        return false;
        }


        var div=document.getElementById("citymsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.city.value.length ==0) // #11
        {
        div.appendChild(document.createTextNode("Veuillez renseigner votre ville"));
        userForm.city.focus();
        return false;
        }

        var div=document.getElementById("departmsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.department.value.length ==0) // #11
        {
        div.appendChild(document.createTextNode("Ce champs est obligatoire"));
        userForm.department.focus();
        return false;
        }


        var div=document.getElementById("countrymsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.country.value.length ==0) // #11
        {
        div.appendChild(document.createTextNode("Ce champs est obligatoire"));
        userForm.country.focus();
        return false;
        }


        var div=document.getElementById("codezipmsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.zipcode.value.length ==0) // #11
        {
        div.appendChild(document.createTextNode("Veuillez renseigner votre code postale"));
        userForm.zipcode.focus();
        return false;
        }


        var div=document.getElementById("phonemsg");
        div.style.color="red";
        if(div.hasChildNodes())
        {
        div.removeChild(div.firstChild);
        }
        if(userForm.phone.value.length ==0) // #11
        {
        div.appendChild(document.createTextNode("Veuillez renseigner votre numéro de téléphone"));
        userForm.phone.focus();
        return false;
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

    return true;
    }
</script>

<?php
    include "./footer.php";
?>

        