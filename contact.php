<?php
    include "./navbar.php";
?>


<!--================= HEADER SECTION =================== !-->

<section id="page-header" class="blog-header" style="background-image: url('img/about/banner.png');">
  
    <h2>#Discutons</h2>
    
    <p>LAISER UN MESSAGE, nous aimons entendre nos clients!</p>
    
</section>




<section id="contact-details" class="section-p1">
    <div class="details">
        <span>NOUS CONTACTEZ</span>
        <h2>Visitez l'un de notre agence ou contactez nous aujourd'hui</h2>
        <h3>Siège</h3>
        <div>
            <li>
                <i class="fal fa-map"></i>
                <p>Rue Bidossèssi à 50 mètre de la Pharmacie Bidossèssi</p>
            </li>
            <li>
                <i class="far fa-envelope"></i>
                <p>pascaladechinan05@gmail.com</p>
            </li>
            <li>
                <i class="fas fa-phone-alt"></i>
                <p>+229 51 95 44 04</p>
            </li>
            <li>
                <i class="far fa-clock"></i>
                <p>Lundi au Dimanche: 24h/24</p>
            </li>
        </div>
    </div>


    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.353869005208!2d2.343807781938603!3d6.431577407818656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1024a9f4d7f80ba1%3A0xad24fbed89dba26b!2sPharmacie%20Fleuve%20de%20vie!5e0!3m2!1sfr!2sbj!4v1682005154019!5m2!1sfr!2sbj" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
    </div>
</section>





<section id="form-details">
    <form action="" method="post">
        <span>LAISSER UN MESSAGE</span>
        <h2>Nous aimons vous entendre</h2>
        <input type="text" name="name_complete" placeholder="Votre nom complet">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="subjet" placeholder="Objet">
        <textarea name="content" id="" cols="30" rows="10" placeholder="Votre message ici..."></textarea>

        <button type="submit" class="normal" name="insert_message">Envoyer</button>
    </form>

    <div class="people">
        <div>
            <img src="img/people/1.png" alt="">
            <p><span>Pacca Leonaldo</span>Directeur Générale <br> Tél: +229 51 95 44 04 <br> Email: pascaladechinan05@gmail.com</p>
        </div>

        <div>
            <img src="img/people/3.png" alt="">
            <p><span>Chantalle Dupont</span>Sécrétaire Générale <br> Tél: +229 55 67 89 70 <br> Email: samueladovi53@gmail.com</p>
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






<?php
    include "./footer.php";
?>