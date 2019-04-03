<template>
  <div id=menu-block>
        <!-- courses Section /- -->

          <!-- {{--  our course begining event advert  --}} -->
          <!-- EventBlock -->
    <div class="container-fluid eventblock">
        <div class="section-padding"></div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="eventcourse-categories">
                    <div class="section-header">
                        <h3>{{Organisation.name}} <br>
                            <span v-if="Organisation.about"> {{Organisation.about.title}}</span>
                        </h3>
                    </div>
                    <p v-if="Organisation.about"> {{Organisation.about.who_we_are  | sortlength(150, "...")}}</p>
                    <router-link :to="`/about`" class="read-more" title="Learn More">Learn More</router-link>
                </div>
                <div class="video-block video-small">
                    <div class="" v-if="Organisation.about">
                      <img  :src="aboutLoadFrontImage(Organisation.about.front_image)" width="570" height="400" alt="Video Poster"/>
                   </div>
                    <div class="video-content">
                        <h3 v-if="Organisation.about"> {{Organisation.about.subtitle}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="event-section event2-section" style="margin-left: 0px;">
                    <div class="event-block">
                        <div class="event-box">
				            <div class="row" v-for="(course, index) in Courses" :key="course.id" v-show="index <= 2" style="margin-right: 0px;margin-left: 0px;">
				            	<div class="col-md-3 col-sm-4 col-xs-5" style="padding-left: 0px;padding-right: 0px;">
				            		<img :src="courseLoadImage(course.image)" alt="event1" width="260" height="160"/>
				            	</div>
				            	<div class="col-md-5 col-sm-6 col-xs-7">
				            		<h4 style="font-size: 16px;">
                                        <router-link :to="`/coursedetails/${course.id}`" :title="course.name">Experience {{course.name}}</router-link>
                                    </h4>
				            		<div class="event-meta">
				            			<span><i aria-hidden="true" class="fa fa-calendar"></i>{{course.start_date | dateformat}}</span>
				            			<span><i aria-hidden="true" class="fa fa-clock-o"></i>8:00 Am - 5:00 Pm</span><br>
				            			<span><i aria-hidden="true" class="fa fa-map-marker"></i>The Technical University of Kenya</span>
				            		</div>
				            		<p>{{course.brief}}</p>
				            	</div>
				            	<div class="col-md-4 col-sm-2 col-xs-12">
				            		<div class="row" style="margin-right: 0px;margin-left: 0px;">
                                        <div class="col-md-6">
                                            <div>
                                                <el-button type="warning" plain @click.prevent="RegularEnroll(course)" class="col" title="Apply now">Enroll Fulltime</el-button>
                                            </div>
                                            <div style="font-size: 15px;margin-bottom: 0px;line-height: 43px;color: #ffc722;font-weight: 400;">
                                                FullTime: Kshs. {{course.regular_fee}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                             <el-button type="warning" plain @click.prevent="ParttimeEnroll(course)" class="col btn btn-sm" title="Apply now">Enroll Parttime</el-button>
                                            </div>
                                            <div style="font-size: 15px;margin-bottom: 0px;line-height: 43px;color: #ffc722;font-weight: 400;">
                                                PartTime: Kshs. {{course.parttime_fee}}
                                            </div>
                                        </div>
                                    </div>
				            	</div>
				            </div>
			             </div>
                         <li><router-link :to="`/events`" title="View All Events">View All Events</router-link></li>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-padding"></div>
    </div>
        <!-- EventBlock /- -->
        <!-- {{--  our course begining event advert  --}} -->
  </div>
</template>

<script>
    export default {
        name:"Event-Section",
        data(){
            return{
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
        mounted() {
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
            loadCartItems(){
                return this.$store.dispatch("cartItems")
            },
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
