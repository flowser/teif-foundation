<template>
  <div id="course-detail">
      <div class="container-fluid no-padding " :style="{ background: `url(${imageUrl}) no-repeat center` }" style="height: 220px" >
		<!-- background_image -->
        <div class="container">
			<div class="pagebanner-content" style="margin-top: 80px;">
                <div class="">
                    <div class="pull-left">
                        <h3 style="margin-top: 0px;margin-bottom: 0px;color: #ffff;">Course Details</h3>
                    </div>
                    <div class="pull-right">
                        <ol class="breadcrumb" start="background-color: transparent;">
                            <li><router-link title="Home" :to="`/`" style="color: #ffc722;">Home</router-link></li>
                            <li style="color: #ffff;">Course Details</li>
                        </ol>
                    </div>
                </div>
			</div>
		</div>
	</div><!-- PageBanner /- -->

    <!-- Courses Section -->
    <div class="container-fluid welcome-section">
      <div class="row">
          <!-- </div> -->
          <div class="col-md-12" style="padding-left: 1px; padding-right: 1px;">
	            <div class="container-fluid coursesdetail-section">
	            	<div class="section-padding"></div>
	            		<div class="row">
	            			<div class="col-md-8 col-sm-8 event-contentarea">
	            				<div class="coursesdetail-block">
	            					<!-- <img src="asset/main_theme/images/event-coursesdetail.jpg" alt="event-coursesdetail" width="860" height="500"/> -->
                                    <img :src="courseLoadImage(Course.image)" alt="event-coursesdetail" width="860" height="500" />
	            					<div class="course-description">
                                        <p>{{Course.brief}} </p>
	            						<h3 class="course-title">What To Learn</h3>
                                        <p v-if="Course.coursesyllabus">{{Course.coursesyllabus.what_to_learn}} </p>
	            						<h3 class="course-title">What To Achieve</h3>
                                        <p v-if="Course.coursesyllabus">{{Course.coursesyllabus.what_to_achieve}} </p>
	            					</div>
	            					<div class="courses-summary">
	            						<h3 class="course-title">Courses summary</h3>
	            						<ul>
	            							<li style="width: 45.5%; margin-bottom: 0px;">
                                                Start: <span style="color:#ffc722"> {{Course.start_date | dateformat}}</span>  |
                                                <span >
                                                    Regular: <span style="color:#ffc722">{{Course.regular_duration}} Days</span>
                                                    |
                                                    Part time: <span style="color:#ffc722">{{Course.parttime_duration}} Days</span>
                                                </span>
                                            </li>
	            							<!-- <li>Lessons :     <span style="color:#ffc722" v-if="Course.coursesyllabus">{{Course.coursesyllabus.lessons}}
                                              </span> Hours : <span style="color:#ffc722" v-if="Course.coursesyllabus"> {{Course.coursesyllabus.hours}} </span></li> -->
	            							<li>Duration:     <span style="color:#ffc722" v-if="Course.duration">{{Course.duration.name}}          </span></li>
	            							<li>Skill:        <span style="color:#ffc722" v-if="Course.skill">{{Course.skill.name}}             </span></li>
	            							<li>School:       <span style="color:#ffc722" v-if="Course.school">{{Course.school.name}}            </span></li>
	            							<li>Type:         <span style="color:#ffc722" v-if="Course.type">{{Course.type.name}}              </span></li>
	            							<li>Subject:      <span style="color:#ffc722" v-if="Course.subject">{{Course.subject.name}}           </span></li>
	            							<li>Sourses:      <span style="color:#ffc722" v-if="Course.feature">{{Course.feature.name}}           </span></li>
	            							<li>Availability: <span style="color:#ffc722" v-if="Course.availability">{{Course.availability.name}}      </span></li>
	            							<li>Accessibility:<span style="color:#ffc722" v-if="Course.accessibility">{{Course.accessibility.name}}     </span></li>
	            							<li>Language:     <span style="color:#ffc722" v-if="Course.language">{{Course.language.name}}          </span></li>
	            						</ul>
	            					</div>
	            					<div class="courses-review">
	            						<h3 class="course-title">Courses Review</h3>
	            						<div class="reviewbox">
	            							<h3>Average Rating</h3>
	            							<div class="average-review">
	            								<h2>4.8</h2>
	            								<ul>
	            									<li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	            									<li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	            									<li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	            									<li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	            									<li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	            								</ul>
	            								<span>5 Rating</span>
	            							</div>
	            						</div>
	            						<div class="reviewbox">
	            							<h3>Detailed Rating</h3>
	            							<div class="detail-review">
	            								<ul>
	            									<li><a href="#" title="5 stars">5 stars</a><span>5</span></li>
	            									<li><a href="#" title="4 stars">4 stars</a><span>0</span></li>
	            									<li><a href="#" title="3 stars">3 stars</a><span>0</span></li>
	            									<li><a href="#" title="2 stars">2 stars</a><span>0</span></li>
	            									<li><a href="#" title="1 stars">1 stars</a><span>0</span></li>
	            								</ul>
	            							</div>
	            						</div>
	            					</div>
	            				</div>
	            				<!-- <nav class="ow-pagination">
	            					<ul class="pagination">
	            						<li><span class="arrow_left" aria-hidden="true"></span><a href="#" title="Political Science">Political Science</a></li>
	            						<li><a href="#" title="Micro Biology">Micro Biology</a><span class="arrow_right" aria-hidden="true"></span></li>
	            					</ul>
	            				</nav> -->
	            			</div>
	            			<div class="col-md-4 col-sm-4 event-sidebar">
	            				<div class="courses-features">
	            					<h3>{{Course.brief}}</h3>
	            					<ul>
	            						<li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	            						<li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	            						<li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	            						<li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	            						<li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	            					</ul>
	            					<span>( 20  Reviews )</span>
	            					<div class="featuresbox"><img :src="courseCodeImage('codepen-ic.png')" alt="codepen-ic" width="22" height="22"/>
                                         <h3>Course Code : </h3><span style="color:#ffc722"> TE{{Course.id}}</span>
                                    </div>
	            					<div class="featuresbox"><img :src="coursePriceImage('dolar-ic.png')" alt="dolar-ic" width="27" height="27"/>
                                         <h3 style="padding-right: 15px;">Fee: </h3>
                                             Fulltime: <span style="color:#ffc722; padding-right: 15px;" > Kshs. {{Course.regular_fee}}</span> |
                                         <span  style="padding-left: 15px;">
                                             Parttime: <span style="color:#ffc722"> Kshs. {{Course.parttime_fee}}</span>
                                        </span>
                                    </div>
	            					<div class="featuresbox"><img :src="courseDurationImage('clock-ic.png')" alt="dolar-ic" width="27" height="27"/>
                                         <h3 style="padding-right: 15px;">Duration : </h3>
                                             Fulltime: <span style="color:#ffc722; padding-right: 15px;"> {{Course.regular_duration}} days</span> |
                                         <span style="padding-left: 15px;">
                                             Parttime: <span style="color:#ffc722"> {{Course.parttime_duration}} days </span>
                                        </span>
                                    </div>

	            					<div class="featuresbox"><img :src="courseLessonsImage('cup-ic.png')" alt="cup-ic" width="24" height="23"/>
                                         <h3>Lectures : </h3><span style="color:#ffc722" v-if="Course.coursesyllabus"> {{Course.coursesyllabus.lessons}}</span>
                                    </div>
	            					<div class="featuresbox"><img :src="courseCourseStudentsImage('user-ic.png')" alt="user-ic" width="22" height="22"/>
                                         <h3>Hours : </h3><span style="color:#ffc722" v-if="Course.coursesyllabus">{{Course.coursesyllabus.hours}}</span>
                                    </div>
	            					<div class="featuresbox"><img :src="courseCertImage('cap-ic.png')" alt="cap-ic" width="24" height="20"/>
                                         <h3 style="color:#ffc722" v-if="Course.coursesyllabus">Certificate : {{Course.coursesyllabus.what_to_achieve}}</h3>
                                    </div>
                                    <div class="featuresbox">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <el-button type="warning" plain @click.prevent="RegularEnroll(Course)" class="col" title="Apply now">Enroll Fulltime</el-button>
                                                </div>
                                                <div style="font-size: 15px;margin-bottom: 0px;line-height: 43px;color: #ffc722;font-weight: 400;">
                                                    FullTime: Kshs. {{Course.regular_fee}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                 <el-button type="warning" plain @click.prevent="ParttimeEnroll(Course)" class="col btn btn-sm" title="Apply now">Enroll Parttime</el-button>
                                                </div>
                                                <div style="font-size: 15px;margin-bottom: 0px;line-height: 43px;color: #ffc722;font-weight: 400;">
                                                    PartTime: Kshs. {{Course.parttime_fee}}
                                                </div>
                                            </div>
                                        </div>
                                     </div>
	            				</div>
	            				<!-- <div class="courses-staff">
	            					<img src="main_theme/images/staff.jpg" alt="staff" width="275" height="288"/>
	            					<h3>Charlie Brown</h3>
	            					<span>Web Designer</span>
	            					<p>My name is Ruth. I grew up and studied in…</p>
	            				</div> -->
	            			</div>
	            		</div>
	            	<div class="section-padding"></div>
	            </div>

          </div>
       </div>

    </div>
  </div>
</template>


<script>
import LeftSideBar from "../includes/frontend/LeftSidebar.vue";
    export default {
        name:"Course-Detail",
        components:{
            LeftSideBar,
        },
        data(){
            return{
                imageUrl:'',
                enrollform: new Form({
                        id:'',
                        name:'',
                        regular_fee:'',
                        parttime_fee:'',
                        courseType:'',
                }),
           }
        },
       mounted(){
            this.loadClient();
            this.singlecourse()
            this.loadCartItems();
            this.imageUrl = "/assets/organisation/img/background/background-1.jpg"
        },
        computed:{
            Client(){
                return this.$store.getters.Client
            },
            Course(){
                return this.$store.getters.Course
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
        },
        methods:{
            loadClient(){

                return this.$store.dispatch("client")
            },
            loadCourses(){
                return this.$store.dispatch("courses")
            },
            loadCartItems(){
                return this.$store.dispatch("cartItems")
            },
            singlecourse(){
                this.$store.dispatch('CourseById', this.$route.params.id);
            },
            courseLoadImage(course_image){
                if(course_image){
                    return "/assets/organisation/img/courses/"+course_image;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            courseCodeImage(codepen_ic_png){
                if(codepen_ic_png){
                    return "/main_theme/images/"+codepen_ic_png;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            coursePriceImage(dolar_ic_png){
                 if(dolar_ic_png){
                    return "/main_theme/images/"+dolar_ic_png;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            courseLessonsImage(cup_ic_png){
               if(cup_ic_png){
                    return "/main_theme/images/"+cup_ic_png;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            courseDurationImage(clock_ic_png){
                if(clock_ic_png){
                    return "/main_theme/images/"+clock_ic_png;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            courseCertImage(cap_ic_png){
                if(cap_ic_png){
                    return "/main_theme/images/"+cap_ic_png;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            courseCourseStudentsImage(user_ic_png){
                if(user_ic_png){
                    return "/main_theme/images/"+user_ic_png;
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

                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        type: 'error',
                        title: 'Course Alreaday exist in your cart'
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
                // console.log(CartItems)
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
        watch:{
            $route(to, from){
                  this.singlecourse();//method
            }
        }
    }
</script>
