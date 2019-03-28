<template>
  <div id=photo-slider>
      <div id="home-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="main_theme/images/photoslider1.jpg" alt="photoslider1" width="1920" height="801"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-right no-padding">
                            <h4 data-animation="animated bounceInLeft">Welcome</h4>
                            <h3 data-animation="animated fadeInDown">To Our<span>University</span></h3>
                            <p data-animation="animated bounceInRight">We belive nothing is more important than education. The best learning institution</p>
                            <a href="#" title="Learn More" data-animation="animated zoomInUp">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="main_theme/images/photoslider2.jpg" alt="photoslider2" width="1920" height="801"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-left no-padding">
                            <h4 data-animation="animated bounceInLeft">Welcome</h4>
                            <h3 data-animation="animated fadeInDown">To Our<span>University</span></h3>
                            <p data-animation="animated bounceInRight">We belive nothing is more important than education. The best learning institution</p>
                            <a href="#" title="Learn More" data-animation="animated zoomInUp">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#home-slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right carousel-control" href="#home-slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
  </div>
</template>

<script>
    export default {
        name:"Photo-Slider",
        mounted() {
            console.log('Photo-Slider')
        }
    }
</script>
 