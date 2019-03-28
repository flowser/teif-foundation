<template>
  <div id="team">
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
  </div>
</template>

<script>
    export default {
        name:"Team",
        mounted() {
            this.loadOrganisation();
        },
        computed:{
            Organisation(){
               return this.$store.getters.Organisation
            },
        },
        methods:{
            loadOrganisation(){
                return this.$store.dispatch( "organisation")
            },
            aboutLoadFrontImage(front_image_id){
                if(front_image_id){
                    return "/assets/organisation/img/website/frontimage/"+front_image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
        }

    }
</script>
