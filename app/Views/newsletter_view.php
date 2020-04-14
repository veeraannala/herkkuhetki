<div class="row">
<div class="col-6 cartminheight">
<h2 class="mt-3">Uutiskirjeen tilaus</h2>

<?php if (isset($success)){ ?>
<p><?=$success?></p>
<?php } else { ?>
<p>Valitettavasti uutiskirjeen tilaus epäonnistui. 
Olet mahdollisesti jo tilannut uutiskirjeen tähän sähköpostiosoitteeseen.</p>
<?php }?>

<a href="/shop">Palaa ostoksille</a>
</div>
</div>