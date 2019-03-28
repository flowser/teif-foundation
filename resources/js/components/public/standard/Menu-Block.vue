<template>
  <div id=menu-block>
      <div class="container-fluid">
        <div class="row">
            <!-- Navigation -->
            <nav class="navbar ow-navigation">
                <div class="col-md-3">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                         <router-link :to="`/`" title="Logo" class="navbar-brand"> <img src="main_theme/images/logo.png" alt="logo"/>TEIF<span>Education of Best</span></router-link>
                         <router-link :to="`/`" title="Logo" class="mobile-logo" ><h3>TEIF</h3> </router-link>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav menubar">
                            <li class="dropdown active">
                                 <router-link :to="`/`" aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Home">Home</router-link>
                                <i class="ddl-switch fa fa-angle-down"></i>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Courses" >Courses</a>
                                <i class="ddl-switch fa fa-angle-down"></i>
                                <ul class="dropdown-menu" style="min-width: 375px;">
                                     <li class="dropdown">
                                         <router-link aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Courses"
                                                   v-for="course in Courses" :key="course.id" :to="`/coursedetails/${course.id}`">{{course.name}}
                                                        <br v-if="course.coursesyllabus"> ({{course.coursesyllabus.lessons}} lessons)
                                         </router-link>
                                      </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Courses" >Courses</a>
                                <i class="ddl-switch fa fa-angle-down"></i>
                                <ul class="dropdown-menu" style="min-width: 375px; padding-right: 0px; padding-left: 0px;">
                                     <li class="dropdown">
                                         <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Courses"
                                                   v-for="cartItem in CartItems" :key="cartItem.id" href=""
                                                    style="padding-top: 0px;padding-bottom: 0px;padding-left: 0px;padding-right: 0px;">
                                            <div class="row" style="margin-right: 0px;margin-left: 0px;margin-top: 4px;">
                                                <div class="col-md-2" style="padding-left: 1px;padding-right: 1px;">
                                                    <img :src="courseLoadImage(cartItem.attributes.image)" alt="welcome1" style="width:100%; height:100%"/>
                                                </div>
                                                <div class="col-md-7" style="bottom:0px;padding-left: 1px;padding-right: 0px;font-size: 10px;line-height: 10px;">
                                                    <router-link title="Courses" :to="`/coursedetails/${cartItem.id}`"
                                                     style="font-size: 9px;line-height: 13px;color:#f7c51d;">
                                                        {{cartItem.name}}<br>
                                                        {{cartItem.attributes.courseType}}<br>
                                                        {{cartItem.attributes.skill}}<br>
                                                    </router-link>
                                                </div>
                                                <div class="col-md-3" style="padding-left: 1px;padding-right: 0px;font-size: 10px;line-height: 10px;">
                                                    <span> Kshs.</span> <span title="Fee">{{cartItem.price}}</span>
                                                    <span><i class="el-icon-close" title="remove" @click.prevent="Remove(cartItem.id)"></i></span>
                                                </div>
                                            </div>
                                         </a>
                                         <hr style="margin-top: 3px;margin-bottom: 3px;">
                                         <div class="row" style="margin-right: 0px;margin-left: 0px;margin-bottom:5px;">
                                                <div class="col-md-5" style="padding-left: 5px;padding-right: 0px;">
                                                    <el-button type="success" plain size="small"
                                                     class="col" title="Apply now" @click.prevent="openCheckoutModal(CartItems)">Checkout</el-button>
                                                </div>
                                                <div class="col-md-2" style="padding-left: 5px;padding-right: 0px;">
                                                    <el-button type="danger" plain size="small"
                                                      title="Apply now" @click.prevent="Clear(CartItems)">Clear</el-button>
                                                </div>
                                                <div class="col-md-5" style="padding-left: 5px;padding-right: 0px;">
                                                    <div style="color: #fff; margin-top: 7px;">
                                                        Total: Kshs. {{subTotal}}
                                                    </div>
                                                     <hr style="margin-top: 3px;margin-bottom: 3px;">
                                                    <div style="color: #fff; margin-top: 7px;">
                                                        Total: Kshs. {{Total}}
                                                    </div>
                                                </div>
                                            </div>
                                      </li>
                                </ul>
                            </li>
                            <li><router-link title="Event" :to="`/events`">Events</router-link></li>
                            <li><router-link title="Services" :to="`/services`">Services</router-link></li>
                            <!-- <li><router-link title="Team" :to="`/Team`">Team</router-link></li> -->
                            <li><router-link title="About" :to="`/about`">About</router-link></li>
                            <!-- <li><router-link title="Contact Us" :to="`/contact`">Contact</router-link></li> -->

                            <li class="menu-search">
                               <div id="sb-search" class="sb-search">
                                   <form>
                                       <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search" />
                                       <button class="sb-search-submit"><i class="fa fa-search"></i></button>
                                       <span class="sb-icon-search"></span>
                                   </form>
                               </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav><!-- Navigation /- -->
        </div>
    </div>


  </div>
</template>

<script>
    export default {
        name:"Menu-Block",
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
        mounted(){
            this.loadCourses(); //from methods
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
        },
        methods:{
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
                    console.log(response.code)
                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        title: 'Course Alreday exist in your cart'
                    })
                })
            },
            Remove(cartItem_id){
                console.log(cartItem_id)
                axios.get('/cart/remove/'+cartItem_id)
                .then((response)=>{
                     toast({
                        type: 'success',
                        // title: response.data.code,
                        // title: response.data.message,
                        })

                        this.loadCourses()
                        this.loadCartItems()
                          this.$Progress.finish()
                })
                .catch((response)=>{
                    console.log(response.data)
                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        // title: response.data.code,
                        // title: response.data.message,
                    })
                })
            },
            Clear(CartItems){
                console.log(CartItems)
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
                console.log(CartItems)
                this.loadCourses()
                this.loadCartItems()
                this.transactionform.reset()
                 $('#CheckoutModal').modal('show')
            },
            Checkout(CartItems){
                this.transactionform.cartItems= CartItems
                console.log(CartItems, 'checkeke')
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
