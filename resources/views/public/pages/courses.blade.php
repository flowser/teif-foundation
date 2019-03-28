
@extends('layouts.mainmaster')

@section('content')

<!-- Header -->
        <header class="header-main container-fluid no-padding">
            <!-- Top Header -->
            <div class="top-header container-fluid no-padding">
                <top-header></top-header>
            </div>
                <!-- Top Header /- -->
                <!-- Menu Block -->
            <div class="menu-block container-fluid no-padding">
                <!-- Container -->
                <menu-block></menu-block>
                <!-- Container /- -->
            </div>
        </header><!-- Header /- -->
        <main>
            <router-view></router-view>
        </main>
        <!-- our services -->
        <div class="container-fluid no-padding parallax-section">
            <div class="parallax-carousel">
                <div class="parallax-block">
                    <div class="parallax-box">
                        <img src="main_theme/images/parallax-bg.jpg" alt="parallax" width="1920" height="600"/>
                    </div>
                    <div class="parallax-content">
                        <h3>Learn Online Courses</h3>
                        <h3>Only patience & persistence give <span>Good Result</span></h3>
                        <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                        <a href="#" title="Find More About Us">Find More About Us</a>
                        <ul>
                            <li><img src="main_theme/images/parallax-thumb1.jpg" alt="parallax-thumb1" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb2.jpg" alt="parallax-thumb2" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb3.jpg" alt="parallax-thumb3" width="100" height="80"/></li>
                        </ul>
                    </div>
                </div>
                <div class="parallax-block">
                    <div class="parallax-box">
                        <img src="main_theme/images/parallax-bg.jpg" alt="parallax" width="1920" height="600"/>
                    </div>
                    <div class="parallax-content">
                        <h3>Learn Online</h3>
                        <h3>Only patience & persistence give <span>Good Result 2</span></h3>
                        <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                        <a href="#" title="Find More About Us">Find More About Us</a>
                        <ul>
                            <li><img src="main_theme/images/parallax-thumb1.jpg" alt="parallax-thumb1" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb2.jpg" alt="parallax-thumb2" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb3.jpg" alt="parallax-thumb3" width="100" height="80"/></li>
                        </ul>
                    </div>
                </div>
                <div class="parallax-block">
                    <div class="parallax-box">
                        <img src="main_theme/images/parallax-bg.jpg" alt="parallax" width="1920" height="600"/>
                    </div>
                    <div class="parallax-content">
                        <h3>Learn Courses</h3>
                        <h3>Only patience & persistence give <span>Good Result 3</span></h3>
                        <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                        <a href="#" title="Find More About Us">Find More About Us</a>
                        <ul>
                            <li><img src="main_theme/images/parallax-thumb1.jpg" alt="parallax-thumb1" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb2.jpg" alt="parallax-thumb2" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb3.jpg" alt="parallax-thumb3" width="100" height="80"/></li>
                        </ul>
                    </div>
                </div>
                <div class="parallax-block">
                    <div class="parallax-box">
                        <img src="main_theme/images/parallax-bg.jpg" alt="parallax" width="1920" height="600"/>
                    </div>
                    <div class="parallax-content">
                        <h3>Learn Online Courses</h3>
                        <h3>Only patience & persistence give <span>Good Result 4</span></h3>
                        <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                        <a href="#" title="Find More About Us">Find More About Us</a>
                        <ul>
                            <li><img src="main_theme/images/parallax-thumb1.jpg" alt="parallax-thumb1" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb2.jpg" alt="parallax-thumb2" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb3.jpg" alt="parallax-thumb3" width="100" height="80"/></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Parallax Section /- -->
        <!-- our services -->

        <!-- Team Section -->
        <div class="container-fluid no-padding team-section">
            <div class="section-padding"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12 team-content-block">
                        <div class="section-header">
                            <h3>Meet <span> Our Staffs</span></h3>
                            <p>Our creative and professional staffs</p>
                        </div>
                        <div class="team-intro">
                            <p>World Largest books and library center is here where you can study the latest trends of the education.If you want to build a successful business online, watch the promo video to see why 13,000+ students are using this online entrepreneurship course to learn.</p>
                        </div>
                        <a class="left carousel-control" href="#team-carousel" role="button" data-slide="prev">Prev</a>
                        <a class="right carousel-control" href="#team-carousel" role="button" data-slide="next">Next</a>
                    </div>
                    <div class="col-md-6 col-sm-12 team-gallary">
                        <div id="team-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="team-box">
                                                <ul>
                                                    <li><a title="Facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a title="Twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a title="Google-Pluse" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    <li><a title="Behance" href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                                    <li><a title="Dribbble" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <img alt="team1" src="main_theme/images/team1.jpg" width="290" height="370"/>
                                                <div class="team-content">
                                                    <h3>Martin Phillips</h3>
                                                    <span>Executive Director</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="team-box">
                                                <ul>
                                                    <li><a title="Facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a title="Twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a title="Google-Pluse" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    <li><a title="Behance" href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                                    <li><a title="Dribbble" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <img alt="team2" src="main_theme/images/team2.jpg" width="290" height="370"/>
                                                <div class="team-content">
                                                    <h3>Thomas Wright</h3>
                                                    <span>Web Developer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="team-box">
                                                <ul>
                                                    <li><a title="Facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a title="Twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a title="Google-Pluse" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    <li><a title="Behance" href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                                    <li><a title="Dribbble" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <img alt="team1" src="main_theme/images/team1.jpg" width="290" height="370"/>
                                                <div class="team-content">
                                                    <h3>Martin Phillips</h3>
                                                    <span>Executive Director</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="team-box">
                                                <ul>
                                                    <li><a title="Facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a title="Twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a title="Google-Pluse" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    <li><a title="Behance" href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                                    <li><a title="Dribbble" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <img alt="team2" src="main_theme/images/team2.jpg" width="290" height="370"/>
                                                <div class="team-content">
                                                    <h3>Thomas Wright</h3>
                                                    <span>Web Developer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-padding"></div>
        </div>
        <!-- Team Section /- -->

        <!-- LatestBlog Section -->
        <div class="container-fulid no-padding latestblog-section">
            <div class="section-padding"></div>
                    <latest-blog></latest-blog>
            <div class="section-padding"></div>
        </div>
        <!-- LatestBlog Section -->

        <!-- Footer Main -->
        <footer class="footer-main container-fluid no-padding">
            <!-- Container -->
            <footer-content></footer-content>
            <!-- Container /- -->
        </footer>
        <!-- Footer /- -->

@endsection
