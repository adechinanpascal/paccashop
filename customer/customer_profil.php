<?php 

include "customer_base.php";


if(isset($_SESSION['customer'])) {
    global $con;
    $id = $_SESSION['customer']['id'];

    $select_query = "Select * from `customers` where id=$id";
    $result_query = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result_query);
    $email = $row['email'];
    $complete_name = $row['complete_name'];
    $sexe = $row['sexe'];
    $profile_image = $row['profile_image'];
    $address = $row['address'];
    $city = $row['city'];
    $department = $row['department'];
    $country = $row['country'];
    $zipcode = $row['zip_code'];
    $phone = $row['phone'];


}

?>






<div style="display: block;" class="product">
<div class="add-product">
        <div class="cardHeader">
            <h2>Profile de <?= $_SESSION['customer']['complete_name'] ?> </h2><br>
        </div>

        <div>
         <img src="../<?= $profile_image ?>" alt="" width="200" height="200" style="border-radius: 50%; margin-bottom: 10px; margin-top: 20px;">
         </div>
            <div class="forme" >
            <div>
                <span>Email :</span>
                <p><?= $email ?></p> 

                
                <span>Prénom & Nom :</span>
                <p><?= $complete_name ?></p> 


                <span>Sexe :</span>
                <p><?= $sexe ?></p> 


                <span>Adresse :</span>
                <p><?= $address ?></p> 

 

                <span>Ville :</span>
                <p><?= $city ?></p> 

                </div>

                <div>

                <span>Département :</span>
                <p><?= $department ?></p> 
                
               
                <span>Pays :</span>
                <p><?= $country ?></p> 
               

                <span>Code Postale :</span>
                <p><?= $zipcode ?></p> 
                

                <span>Téléphone :</span>
                <p><?= $phone ?></p> 
                
            </div>
            </div>

                <div class="button-container">
                <a style="text-decoration: none;" class="button-signup" href="customer_update_profil.php" >Modifier Profile</a><br>
                </div>
            
    </div>


</div>








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

include "customer_base_footer.php";

?>