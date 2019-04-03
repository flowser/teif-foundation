<template>
  <div id=menu-block>
      <!-- PageBanner -->
    <div class="container-fluid no-padding " :style="{ background: `url(${imageUrl}) no-repeat center` }" style="height: 220px" >
		<!-- background_image -->
        <div class="container">
			<div class="pagebanner-content" style="margin-top: 80px;">
                <div class="">
                    <div class="pull-left">
                        <h3 style="margin-top: 0px;margin-bottom: 0px;color: #ffff;">Events</h3>
                    </div>
                    <div class="pull-right">
                        <ol class="breadcrumb" start="background-color: transparent;">
                            <li><router-link title="Home" :to="`/`" style="color: #ffc722;">Home</router-link></li>
                            <li style="color: #ffff;">Events</li>
                        </ol>
                    </div>
                </div>
			</div>
		</div>
	</div><!-- PageBanner /- -->
	<!-- Event Section -->
	<div class="container event-section">
		<div class="section-padding"></div>
		<div class="event-block">
			<div class="event-box">
				<div class="row" v-for="course in Courses" :key="course.id">
					<div class="col-md-3 col-sm-4 col-xs-5">
						<img :src="courseLoadImage(course.image)" alt="event1" width="260" height="160"/>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-7">
						<h3><router-link :to="`/coursedetails/${course.id}`" :title="course.name">Experience {{course.name}}></router-link></h3>
						<div class="event-meta">
							<span><i aria-hidden="true" class="fa fa-calendar"></i>{{course.start_date | dateformat}}</span>
							<span><i aria-hidden="true" class="fa fa-clock-o"></i>8:00 Am - 5:00 Pm</span>
							<span><i aria-hidden="true" class="fa fa-map-marker"></i>The Technical University of Kenya</span>
						</div>
						<p>{{course.brief}}</p>
					</div>
					<div class="col-md-3 col-sm-2 col-xs-12">
						<div class="row">
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
		</div>
		<nav class="ow-pagination">
			<ul class="pagination">
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">Next</a></li>
			</ul>
		</nav>
		<div class="section-padding"></div>
	</div><!-- Event Section /- -->
  </div>
</template>

<script>
    export default {
        name:"Full-Event",
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
                transactionform: new Form({
                        image:'',
                        transaction_code:'',
                         cartItems:'',
                }),
           }
        },
        mounted(){
            this.loadClient();
            this.loadCourses();
            this.loadCartItems();
            this.imageUrl = "/assets/organisation/img/background/background-1.jpg"
        },
        computed:{
             Client(){
                return this.$store.getters.Client
            },
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
