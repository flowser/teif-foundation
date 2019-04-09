<template>
  <div id="home">
      <!-- PhotoSlider Section -->
    <div class="photoslider-section container-fluid no-padding">
      <PhotoSlider/>
    </div>
      <!-- PhotoSlider Section /- -->
      <!-- Filter Courses -->
    <div class="container-fluid no-padding searchcourses" style="padding-top: 0px;padding-bottom: 0px;">
        <div class="container-fluid">
            <div class="search-content">
                <div class="searchcourses-block">
                    <h3 style="margin: 0px;">No Need to wait, be among the top with Our Short Courses</h3>
                </div>
                <div class="search-categories">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <p><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Over 500 students Enrolled Learn Skills</span></p>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <p><i class="fa fa-paper-plane-o" aria-hidden="true"></i><span>More than 300+ Online Courses Available</span></p>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <p><i class="fa fa-tencent-weibo" aria-hidden="true"></i><span>Learn Skills on any Devices anytime</span></p>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <p><i class="fa fa-user-md" aria-hidden="true"></i><span>More than 320 Instructors Available</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter Courses /- -->

    <!-- Courses Section -->
    <div class="container-fluid welcome-section">
      <div class="row" style="padding-top: 10px;">
           <!--sidebar filter  -->
          <!-- <div class="col-md-3" style="padding-left: 23px; "> -->
            <div class="col-md-2 " >
				<LeftSideBar/>
			</div>

          <!-- </div> -->
          <div class="col-md-10" >

              <!-- <div class="row" style="height: 63px; padding-top: 6px;"> -->
                  <!-- <el-tag
                    :key="tag"
                    v-for="tag in enrollform.duration_id"
                    closable
                    :disable-transitions="false"

                    >
                    {{tag}}
                    </el-tag> -->
                    <!-- <el-input
                    class="input-new-tag"
                    v-if="inputVisible"
                    v-model="inputValue"
                    ref="saveTagInput"
                    size="mini"
                    @keyup.enter.native="handleInputConfirm"
                    @blur="handleInputConfirm"
                    >
                </el-input> -->
                <!-- <el-button v-else class="button-new-tag" size="small" @click="showInput">+ New Tag</el-button> -->
              <!-- </div> -->
              <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4" style="padding-left: 5px;padding-right: 5px;" v-for="course in Courses" :key="course.id">
                    <div class="welcome-box">
                      <img :src="courseLoadImage(course.image)" alt="welcome1" style="width:100%; height:360px"/>
                      <div class="welcome-title" style="width: 100%;bottom: 0px;">
                          <h3>{{course.name}}</h3>
                      </div>
                      <div class="welcome-content" style="padding-left: 10px;padding-right: 0px;width: 101%;top: 80px;">
                          <span style="margin-bottom: 0px;" v-if="course.type">({{course.type.name}})</span>
                          <p style="margin-bottom: 0px;font-size: 12px;line-height: 13px;color:#ffffff" >
                              {{course.brief  | sortlength(80, "...")}}</p>
                          <ul class="course-detail">
                              <li style="font-size: 11px;margin-bottom: 0px;line-height: 19px;" ><i class="fa fa-calendar" aria-hidden="true"></i>
                                 Start: {{course.start_date | dateformat}} <span> | </span>
                              <span style="color:#ffffff">Regular: {{course.regular_duration}} Days</span>
                                <span> | </span>
                                 <span>Part time: {{course.parttime_duration}} Days</span>
                              </li>
                              <li style="font-size: 11px;margin-bottom: 0px;line-height: 19px;" ><i class="fa fa-calendar" aria-hidden="true"></i>
                                 Lessons: <span style="color: #ffc722;" v-if="course.coursesyllabus"> {{course.coursesyllabus.lessons }} </span> <span> | </span>
                                 <span style="color:#ffffff">Hours: </span> <span style="color: #ffc722;" v-if="course.coursesyllabus">
                                     {{course.coursesyllabus.hours}} </span>
                              </li>
                              <li style="font-size: 11px;margin-bottom: 0px;line-height: 19px;">Requirement: <span style="color: #ffc722;" v-if="course.coursesyllabus">
                                  {{course.coursesyllabus.requirement}}</span></li>
                              <li style="font-size: 11px;margin-bottom: 0px;line-height: 19px;">
                                  What to Learn: <span style="margin-bottom: 0px;font-size: 12px;line-height: 13px;color:#ffffff;color: #ffc722;" v-if="course.coursesyllabus">
                                    {{course.coursesyllabus.what_to_learn | sortlength(80, "...")}}
                                     <!-- <a href="" @click.prevent="ParttimeEnroll(course)" class="col" title="Read More" style="color:white">Read More</a> -->
                                     <router-link :to="`/coursedetails/${course.id}`" class="read-more" title="Read More" style="color:white">Read More</router-link>
                                     <!-- <router-link  :to="`/course/${course.id}`">       <i class="fa fa-eye "></i> -->
                                <!-- </router-link> -->
                                  </span>
                              </li>
                          </ul>

                          <ul class="course-rating" style="margin-bottom: 5px;">
                              <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                              <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                              <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                              <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                              <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                          </ul>
                           <a href="" @click.prevent="RegularEnroll(course)" class="col" title="Apply now">Enroll Fulltime</a>
                           <a href="" @click.prevent="ParttimeEnroll(course)" class="col" title="Apply now">Enroll Parttime</a>

                            <ul class="course-detail">
                              <li style="font-size: 15px;margin-bottom: 0px;line-height: 43px;color: #ffc722;font-weight: 400;" >
                                FullTime: Kshs. {{course.regular_fee}} <span style="color:#ffffff"> | </span>
                                 <span > PartTime: Kshs. {{course.parttime_fee}}</span>
                              </li>
                          </ul>
                      </div>
                  </div>
                 </div>

                <pagination :data="courses" @pagination-change-page="getResults"></pagination>
              </div>


          </div>
       </div>
       <div class="section-padding"></div>
    </div>

    <EventSection/>

    <!-- <Service/> -->

  </div>
</template>

<script>
import PhotoSlider from "./Photo-Slider.vue";
import LeftSideBar from "./LeftSidebar.vue";
import EventSection from "./Event-Section.vue";
// import Service from "./Services.vue";
    export default {
        name:"Home",
        components:{
            PhotoSlider,
            LeftSideBar,
            EventSection,
            // Service,
        },
        data(){
            return{
                courses:{},
                enrollform: new Form({
                        id:'',
                        name:'',
                        regular_fee:'',
                        parttime_fee:'',
                        courseType:'',
                }),
                transactionform: new Form({
                        image:'',
                        transaction_code:'',
                        cartItems:'',
                }),
           }
        },
       mounted(){
            this.loadCourses();
            this.loadCartItems();
        },
        computed:{
            Courses(){
                return this.$store.getters.Courses
            },
            CartItems(){
                return this.$store.getters.CartItems
            },
            subTotal(){
                return this.$store.getters.subTotal
            },
            Total(){
                return this.$store.getters.Total
            },
            Count(){
                return this.$store.getters.Count
            },
        },
        methods:{
            getResults(page = 1) {
                this.$store.commit('CoursesByPage', page);
                // axios.get('courses/?page=' + page)
                //     .then(response => {
                //         this.laravelData = response.data;
				// });
		   },
            loadCourses(){
                return this.$store.dispatch("courses")
            },
            loadCartItems(){
                return this.$store.dispatch("cartItems")
            },
            courseLoadImage(course_image){
                if(course_image){
                    return "/assets/organisation/img/courses/"+course_image;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            RegularEnroll(course){
                 this.enrollform.fill(course);
                 this.enrollform.courseType = "Regular";
                 if(this.enrollform.courseType == "Regular"){
                    this.enrollform.parttime_fee = null;
                }
                this.enrollform.patch('/cart/')
                .then((response)=>{
                     toast({
                        type: 'success',
                        title: response.data.code,
                        title: response.data.message,
                        })

                        this.loadCourses()
                        this.loadCartItems()
                          this.$Progress.finish()
                })
                .catch((response)=>{
                    // console.log(response.data)
                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        type: 'error',
                        title: 'Course Alreday exist in your cart'
                    })
                })
            },
            ParttimeEnroll(course){
                this.enrollform.fill(course);
                this.enrollform.courseType = "Parttime";
                if(this.enrollform.courseType == "Parttime"){
                    this.enrollform.regular_fee = null;
                }
                this.enrollform.patch('/cart/')
                .then((response)=>{
                    // console.log(response)
                     toast({
                        type: 'success',
                        title: response.data.code,
                        title: response.data.message,
                        })

                        this.loadCourses()
                        this.loadCartItems()
                          this.$Progress.finish()
                })
                .catch((response)=>{
                    // console.log(response)
                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        title: 'Course Alreday exist in your cart'
                    })
                })
            },
            Remove(cartItem_id){
                // console.log(cartItem_id)
                axios.get('/cart/remove/'+cartItem_id)
                .then((response)=>{
                     toast({
                        type: 'success',
                        title: 'Course Removed successful'
                        })
                        this.loadCourses()
                        this.loadCartItems()
                          this.$Progress.finish()
                })
                .catch((response)=>{
                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        title: 'Course Removal not successful.'
                    })
                })
            },
            Clear(CartItems){
                // console.log(CartItems)
                axios.get('/cart/clear/'+CartItems)
                 .then((response)=>{
                     toast({
                        type: 'success',
                        title: 'Course Cart was Cleared successful'
                        })
                        this.loadCourses()
                        this.loadCartItems()
                          this.$Progress.finish()
                })
                .catch((response)=>{
                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        title: 'Course Cart was not Cleared successful.'
                    })
                })
            },
            openCheckoutModal(CartItems){
                this.loadCourses()
                this.loadCartItems()
                this.transactionform.reset()
                 $('#CheckoutModal').modal('show')
            },
            transactionChangeImage($event){
                 let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.transactionform.image =event.target.result
                            };
                        reader.readAsDataURL(file);
                }
            },
            Checkout(CartItems){
                this.transactionform.cartItems= CartItems
                // console.log(this.transactionform)
                this.transactionform.patch('/order/checkout/'+CartItems)
                .then((response)=>{
                     toast({
                        type: 'success',
                        title: 'Payment was successful, wait, for verification'
                        })
                        this.loadCourses()
                        this.loadCartItems()
                        $('#CheckoutModal').modal('hide')
                        this.transactionform.reset()
                          this.$Progress.finish()
                })
                .catch((response)=>{
                     $('#CheckoutModal').modal('show')
                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        title: 'Payment was not successful.'
                    })
                })

            },
        },
    }
</script>
