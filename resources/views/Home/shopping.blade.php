<!DOCTYPE html>
<html>

<head>
  @include('Home.css')
</head>

<body>
  <div class="hero_area">
  @include('Home.header')
  </div>
  
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
           All Products
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="{{ asset('images/REF101-BLK-CTLG.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h6>Black Shirt</h6>
                <h6>Price <span>45€</span></h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="{{ asset('images/REF101-NYL-CTLG.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h6>Yellow Shirt</h6>
                <h6>Price <span>45€</span></h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="{{ asset('images/téléchargement (1).jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h6>Pink Shirt</h6>
                <h6>Price <span>49€</span></h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="{{ asset('images/téléchargement.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h6>Orange Shirt</h6>
                <h6>Price <span>45€</span></h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="{{ asset('images/0005219_sifflet-darbitre-fox-40_328.jpeg') }}" alt="">
              </div>
              <div class="detail-box">
                <h6>Fox-40 whistles</h6>
                <h6>Price <span>15€</span></h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="{{ asset('images/kaart_1024x1024.webp') }}" alt="">
              </div>
              <div class="detail-box">
                <h6>Cards</h6>
                <h6>Price <span>10€</span></h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="{{ asset('images/United_Attire_Quadro_Flags_with_Case__48219.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h6>Flags</h6>
                <h6>Price <span>19€</span></h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="{{ asset('images/0132cf693bcda035c37c4710bdb52f25.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h6>Spray</h6>
                <h6>Price <span>39€</span></h6>
              </div>
            </a>
          </div>
        </div>
      </div>
      
    </div>
  </section>
  
  @include('Home.footer')
</body>

</html>
