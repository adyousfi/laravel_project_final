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

  <!-- contact section -->
  @include('Home.contact')
  <!-- end contact section -->

  <!-- info section -->
  @include('Home.footer')
</body>

</html>
