<!DOCTYPE html>
<html>

<head>
  @include('Home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    @include('Home.header')
    <!-- end header section -->
     
    <!-- slider section -->
    @include('Home.slider')
    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
  @include('Home.shop')
  <!-- end shop section -->

  <!-- FAQ section -->
 @include('Home.faq')
  <!-- end FAQ section -->
<br>
  <div class="container">
        <div class="row justify-content-center">
            <!-- Google Map -->
            <div class="col-lg-6 col-md-6 px-0 mb-5">
                <div class="map_container" style="border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5038.803709955476!2d4.320233076506427!3d50.84224235907701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c40f19faf0f9%3A0x4ef5b683135ecb1e!2sErasmushogeschool%20Brussel!5e0!3m2!1sfr!2sbe!4v1734346705981!5m2!1sfr!2sbe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

  <br>

  <!-- info section -->
  @include('Home.footer')
</body>

</html>
