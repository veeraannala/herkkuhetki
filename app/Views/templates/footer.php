</div>
    <div class="container footer">
      <div class="row footer col-12">
        <div class="col-md-4 text-center mt-3 pb-4">
          <h4>Infoa</h4>
          <p class="mb-1"><a href="<?= site_url('/Customer/customerAccount') ?>">Oma tili</a></p>
          <!-- By pressing the link you can browse payment and delivery terms -->
          <p class="mb-1"><a href="<?= site_url('/Shop/show_methods') ?>">Maksu- ja toimitusehdot</a></p>
          <p class="mb-1"><a href="<?= site_url('/Shop/aboutUs') ?>">Tietoa meistä</a></p>
          <p class="mb-1"><a href="<?= site_url('/Shop/contactInfo') ?>">Yhteystiedot</a></p>
          <p class="mb-1"><a href="<?= site_url('/Shop/gdprregister') ?>">Rekisteriseloste</a></p>
        </div>

        <div class="col-md-4 text-center mt-3 pb-4">
          <a href="<?php echo base_url()?>"><img src="/../images/logo.png" alt="logo"></a>
        </div>

        <div class="col-md-4 text-center mt-3 pb-4">
          <h4>Tilaa uutiskirje!</h4>
          <p>Tilaa uutiskirjeemme, niin saat tietää uusista 
          tuotteistamme heti ensimmäisten joukossa!</p>
                    
          <form method="post" action="<?= site_url('shop/addToNewsletter/')?>">
            <div class="form-group">
              <label for="email">Sähköpostiosoite:</label>
              <input type="email" class="form-control text-center" name="email" placeholder="Syötä sähköpostiosoitteesi">
            </div>
            <button type="submit" class="btn">Tilaa</button>
          </form>
        </div>
      </div>

</div>
    
  </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/herkkuhetki.js')?>"></script>
  </body>
</html>