<template>
  <div id="course">
      <section>
         <FilterTopBar/>
      </section>
      <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-md-2 col-lg-2 " style="padding-right: 0px; padding-left: 20px;width:13.66%" >
                    <!-- leftsidebar -->
                        <LeftSidebar/>
                    <!-- leftsidebar -->
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-md-10 col-lg-10 " style="padding-left: 0px; padding-right: 0px;">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Featured Courses</h2>
                        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2" v-for="course in Courses" :key="course.id"
                        style="padding-left: 6px; padding-right: 0px;">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img class="card-img-top" :src="courseLoadPassPhoto(course.photo)"
                                               style="width:100%; height:130px" alt="Card image cap">
                                            <a href="" style="color:#9a009a;">
                                                <i class="fa fa-info-circle"></i>View Course Details
                                            </a>
                                            <p>Work Experience: {{course.experience.name}}</p>
                                            <p>Kids: {{course.kid.name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Search Cart</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div><!--features_items-->

                     <RecommendedCourses/>
                </div>
            </div>
        </div>
    </section>

  </div>
</template>

<script>
import FilterTopBar from "./FilterTopBar.vue";
import LeftSidebar from "./LeftSidebar.vue";
import RecommendedCourses from "./RecommendedCourses.vue";

    export default {
       name:"Course",
        components:{
            FilterTopBar,
            LeftSidebar,
            RecommendedCourses,
        },
        mounted() {
            this.loadCourses();
        },
        computed:{
            Courses(){
                return this.$store.getters.Courses
            },
        },
        methods:{
            loadCourses(){
                return this.$store.dispatch("courses")
            },
            courseLoadPassPhoto(course_photo){
                if(course_photo){
                    return "/assets/course/img/images/"+course_photo;
                }else{
                    return "/assets/website/empty.png";
                }
            },
        },
    }
</script>


