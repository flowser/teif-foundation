<template>
  <div id="footer">
     <div class="container-fluid">
			<!-- <div class="row"> -->
				<!-- <div class="col-md-6 col-sm-6">
					<aside class="ftr-widget about_widget">
						<a class="footer-logo" href="#" title="Logo"><img alt="logo" src="main_theme/images/logo.png">EduMax<span>Education of Best</span></a>
						<ul>
							<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" title="Instagram"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" title="Rss"><i class="fa fa-rss"></i></a></li>
						</ul>
						<p>Trem ipsum dolor sit ameThese men promptly escaped from maximum security astockade to the Los Angeles underground.
                            These Happy Days are yours and mine Happy Days elites consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            utiles labore et dolor hates magna ali qua.</p>
					</aside>
				</div>
				<div class="col-md-6 col-sm-6">
					<aside class="ftr-widget newsletter_widget">
						<h3 class="widget-title">News Letters</h3>
						 <div class="input-group">
							<input type="text" class="form-control" placeholder="Enter your email">
							<span class="input-group-btn"><button class="btn" type="button" title="Sign In">Sign In</button></span>
						</div>
					</aside>
				</div>
				<div class="col-md-6 col-sm-6">
					<aside class="ftr-widget upcomingevent_widget">
						<h3 class="widget-title">Up Comming Events</h3>
						<div id="upcomingevent_carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<div class="upcoming-eventbox">
										<p>These men promptly escaped from maximum security stockade to the Los Angeles underground.</p>
										<ul>
											<li><a href="#" title="Time"><i class="fa fa-clock-o" aria-hidden="true"></i>8:00 Am - 5:00 Pm</a></li>
											<li><a href="#" title="Date"><i class="fa fa-calendar" aria-hidden="true"></i>01 May 2016</a></li>
											<li><a href="#" title="Location"><i class="fa fa-map-marker" aria-hidden="true"></i>London, UK</a></li>
										</ul>
										<a href="#" title="Read More">Read More</a>
									</div>
								</div>
								<div class="item">
									<div class="upcoming-eventbox">
										<p>These men promptly escaped from maximum security stockade to the Los Angeles underground.</p>
										<ul>
											<li><a href="#" title="Time"><i class="fa fa-clock-o" aria-hidden="true"></i>9:00 Am - 10:00 Pm</a></li>
											<li><a href="#" title="Date"><i class="fa fa-calendar" aria-hidden="true"></i>05 May 2016</a></li>
											<li><a href="#" title="Location"><i class="fa fa-map-marker" aria-hidden="true"></i>London, UK</a></li>
										</ul>
										<a href="#" title="Read More">Read More</a>
									</div>
								</div>
							</div>
							<a class="left carousel-control" href="#upcomingevent_carousel" role="button" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right carousel-control" href="#upcomingevent_carousel" role="button" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>

					</aside>
				</div>
				<div class="col-md-6 col-sm-6">
					<aside class="ftr-widget flickr_widget">
						<h3 class="widget-title">Our Flicker</h3>
						<ul>
							<li><a href="#" title="Flickr"><img src="main_theme/images/flickr1.jpg" alt="flickr1" width="85" height="83"/></a></li>
							<li><a href="#" title="Flickr"><img src="main_theme/images/flickr2.jpg" alt="flickr2" width="85" height="83"/></a></li>
							<li><a href="#" title="Flickr"><img src="main_theme/images/flickr3.jpg" alt="flickr3" width="85" height="83"/></a></li>
							<li><a href="#" title="Flickr"><img src="main_theme/images/flickr4.jpg" alt="flickr4" width="85" height="83"/></a></li>
							<li><a href="#" title="Flickr"><img src="main_theme/images/flickr5.jpg" alt="flickr5" width="85" height="83"/></a></li>
							<li><a href="#" title="Flickr"><img src="main_theme/images/flickr6.jpg" alt="flickr6" width="85" height="83"/></a></li>
						</ul>
					</aside>
				</div>
			</div> -->
			<!-- Footer Bottom -->
               <Footerbottom/>
            <!-- Footer Bottom /- -->
        </div>
  </div>
</template>

<script>
import Footerbottom from "./Footerbottom.vue";
    export default {
        name:"FooterMain",
        components:{
            Footerbottom,
        },
        mounted() {
            console.log('footer')
        }
    }
</script>
