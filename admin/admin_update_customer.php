<?php include "admin_base.php"; 

if(isset($_GET['modified_id'])) {
    global $con;
    $id = $_GET['modified_id'];

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

    if(isset($_POST['update_customer'])) {
        $email = mysqli_real_escape_string($con, $_POST['emailaddress']);
        $complete_name = mysqli_real_escape_string($con, $_POST['complete_name']);
        $sexe = $_POST['sexe'];
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $city = mysqli_real_escape_string($con, $_POST['city']);
        $department = mysqli_real_escape_string($con, $_POST['department']);
        $country = mysqli_real_escape_string($con, $_POST['country']);
        $zip_code = mysqli_real_escape_string($con, $_POST['zipcode']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);

       
        
        $update_query = "update `customers` set email='$email', complete_name='$complete_name', sexe='$sexe', address='$address', city='$city', department='$department', country='$country', zip_code='$zip_code', phone='$phone' where id=$id";
        $result_update = mysqli_query($con, $update_query);
        if($result_update) {
            echo "<script>alert('Informations modifiées avec succès !')</script>";
        }
        
    
    }

}

?>






<div style="display: block;" class="product">
<div class="add-product">
        <div class="cardHeader">
            <h2>Modifier les informations des Abonnés</h2>
        </div>

        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validate(this);">
        <img src="../<?= $profile_image ?>" alt="" width="200" height="200" style="border-radius: 50%; margin-bottom: 10px;">
            <div class="forme" >
            <div>
                <label for="emailaddress">Adresse Email*:</label>
                <input  type="email" name="emailaddress" value="<?= $email ?>" > 
                <span id="emailaddress"></span> <br><br>


                <label for="complete_name">Nom complet*: </label>
                <input  type="text"  name="complete_name" value="<?= $complete_name ?>" >
                <span id="usrmsg"></span><br><br>


                <label for="sexe">Sexe*: </label>
                <select  name="sexe" id="sexe" >
                    <option value="<?= $sexe ?>"><?= $sexe ?></option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
                <span id="sexemsg"></span><br><br>
            

                <label for="adresse">Adresse*:</label>
                <input  type="text" name="address" value="<?= $address ?>" >
                <span id="addressmsg"></span><br>
                
                <label for="city">Ville*: </label>
                <input  type="text" name="city" value="<?= $city ?>" >
                <span id="citymsg"></span><br>
                </div>

                <div>
                <label for="department">Département*: </label>
                <input  type="text"  name="department" value="<?= $department ?>">
                <span id="departmsg"></span><br>
               

                <label for="country">Pays*: </label>
                <input  type="text" name="country" value="<?= $country ?>">
                <span id="countrymsg"></span><br>

                <label for="zipcode">Code Postale*: </label>
                <input  type="text" name="zipcode" value="<?= $zipcode ?>" >
                <span id="codezipmsg"></span><br>

                <label for="phone">Téléphone*: </label>
                <input type="text"  name="phone" value="<?= $phone ?>" >
                <span id="phonemsg"></span><br>
            </div>
            </div>

                <div class="button-container">
                <input class="button-signup" type="submit" name="update_customer" value="Modifier"><br>
                <a class="button-cancel" href="admin_manage_customer.php">Annuler</a><br>
                </div>
            
            </form>
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


<?php include "admin_base_footer.php"; ?>