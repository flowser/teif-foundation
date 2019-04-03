<template>
  <div id=photo-slider>
      <div id="home-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox" >
            <div class="item active" >
                <!-- <img :src="courseLoadImage(course.image)" alt="photoslider1" width="1920" height="801"/> -->
                <img src="assets/organisation/img/website/frontimage/1553533025.png" alt="photoslider1" style="width:100%;height:450px"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="col-md-12 col-sm-12 col-xs-12 ow-pull-right no-padding">
                            <h4 data-animation="animated bounceInLeft">Welcome</h4>
                            <h3 data-animation="animated fadeInDown">To <span>{{Organisation.name}}</span></h3>
                            <router-link title="Learn More" :to="`/about`" data-animation="animated zoomInUp">Learn More</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" >
                <!-- <img :src="courseLoadImage(course.image)" alt="photoslider1" width="1920" height="801"/> -->
                <img src="assets/organisation/img/website/frontimage/1554053528.jpeg" alt="photoslider1" style="width:100%;height:450px"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="col-md-12 col-sm-12 col-xs-12 ow-pull-right no-padding">
                            <h4 data-animation="animated bounceInLeft">Welcome</h4>
                            <h3 data-animation="animated fadeInDown">To Our<span>{{Organisation.name}}</span></h3>
                             <router-link title="Learn More" :to="`/about`" data-animation="animated zoomInUp">Learn More</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <!-- <img :src="courseLoadImage(course.image)" alt="photoslider1" width="1920" height="801"/> -->
                <img src="assets/organisation/img/website/frontimage/1553094514.jpeg" alt="photoslider1" style="width:100%;height:450px"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="col-md-12 col-sm-12 col-xs-12 ow-pull-right no-padding">
                            <h4 data-animation="animated bounceInLeft">Welcome</h4>
                            <h3 data-animation="animated fadeInDown">To Our<span>{{Organisation.name}}</span></h3>
                            <router-link title="Learn More" :to="`/about`" data-animation="animated zoomInUp">Learn More</router-link>
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
        mounted(){
            this.loadOrganisation();
            this.loadCourses();
            this.loadCartItems();
        },
        computed:{
            Courses(){
                return this.$store.getters.Courses
            },
            Organisation(){
               return this.$store.getters.Organisation
            },
        },
        methods:{
            loadOrganisation(){
               return this.$store.dispatch( "organisation")
            },
            loadCourses(){
                return this.$store.dispatch("courses")
            },
            courseLoadImage(course_image){
                if(course_image){
                    return "/assets/organisation/img/courses/"+course_image;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
        }
    }
</script>
