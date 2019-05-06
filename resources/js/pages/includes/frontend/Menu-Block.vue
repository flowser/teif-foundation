<template>
  <div id=menu-block>
      <div class="container-fluid">
        <div class="row">
            <!-- Navigation -->
            <nav class="navbar ow-navigation">
                <div class="col-md-4">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                         <router-link :to="`/`"  class="navbar-brand">
                            <img :src="organisationLoadImage(Organisation.logo)" alt="logo" style="width: 17%;top: -12px;"/>
                            <!-- <img src="main_theme/images/logo.png" alt="logo"/> -->
                            <h3  style="padding-left: 21px;font-weight: 600;margin-top: 0px;margin-bottom: 0px;">
                              {{Organisation.name}}
                            </h3>
                            <h5 v-if="Organisation.about" style="padding-left: 21px;font-weight: 600;margin-top: 0px;margin-bottom: 0px;">
                              {{Organisation.about.subtitle}}
                            </h5>
                          </router-link>
                         <router-link :to="`/`" class="mobile-logo" ><h3>{{Organisation.name}}</h3> </router-link>
                         <!-- <router-link :to="`/myaccount`" title="My account" v-show ="User != null" class="mobile-logo" ><h3> My Account</h3> </router-link> -->
                         <!-- <ul class="nav navbar-nav menubar mobile-logo">
                            <li class="dropdown mobile-logo">
                                <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Cart" >
                                    <button type="button" class="btn btn-default btn-sm">
                                         <span style="color:red">({{Count}})</span><span class="glyphicon glyphicon-shopping-cart" style="color:purple"></span>Cart
                                    </button>
                                </a>
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
                                                        subTotal: Kshs. {{subTotal}}
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
                        </ul> -->

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav menubar">
                            <li><router-link :to="`/`" title="Home">Home</router-link></li>
                            <li class="dropdown">
                                <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Cart" >
                                    <button type="button" class="btn btn-default btn-sm">
                                         <span style="color:red">({{Count}})</span><span class="glyphicon glyphicon-shopping-cart" style="color:purple"></span>Cart
                                    </button>
                                </a>
                                <i class="ddl-switch fa fa-angle-down"></i>
                                <ul class="dropdown-menu" style="min-width:320px;padding-left: 1px;padding-right: 0;display: block;">
                                     <li class="dropdown">
                                         <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Courses"
                                                   v-for="cartItem in CartItems" :key="cartItem.id" href=""
                                                    style="padding-top: 0px;padding-bottom: 0px;padding-left: 0px;padding-right: 0px;">
                                            <div class="row" style="margin-right: 0px;margin-left: 0px;margin-top: 4px;">
                                                <div class="col-md-2 col-sm-4 col-xs-4" style="padding-left: 1px;padding-right: 1px;">
                                                    <img :src="courseLoadImage(cartItem.attributes.image)" alt="welcome1" style="width:100%; height:100%"/>
                                                </div>
                                                <div class="col-md-7 col-sm-6 col-xs-6" style="bottom:0px;padding-left: 1px;padding-right: 0px;font-size: 10px;line-height: 10px;">
                                                    <router-link title="Courses" :to="`/coursedetails/${cartItem.id}`"
                                                     style="font-size: 9px;line-height: 9px;;color:#f7c51d;">
                                                        <p style="margin-top: 0;margin-bottom: 0px;">{{cartItem.name}}</p>
                                                        <p style="margin-top: 0px;margin-bottom: 0px;">{{cartItem.attributes.courseType}}</p>
                                                        <p style="margin-top: 0px;margin-bottom: 0px;">{{cartItem.attributes.skill}}</p>
                                                    </router-link>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3" style="padding-left: 1px;padding-right: 0px;font-size: 10px;line-height: 10px;">
                                                    <span> Kshs.</span> <span title="Fee">{{cartItem.price}}</span>
                                                    <span><i class="el-icon-close" title="remove" @click.prevent="Remove(cartItem.id)"></i></span>
                                                </div>
                                            </div>
                                         </a>
                                         <hr style="margin-top: 3px;margin-bottom: 3px;">
                                         <div class="row" style="margin-right: 0px;margin-left: 0px;margin-bottom:5px;">
                                                <div class="col-md-3 col-sm-3 col-xs-3" style="padding-left: 7px;padding-right: 0px;">
                                                    <el-button type="success" plain size="small"
                                                     class="col" title="Apply now" @click.prevent="openCheckoutModal(CartItems)">Checkout</el-button>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3" style="padding-left: 20px;padding-right: 0px;">
                                                    <el-button type="danger" plain size="small"
                                                      title="Apply now" @click.prevent="Clear(CartItems)">Clear</el-button>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6" style="padding-left: 5px;padding-right: 0px;">
                                                    <div style="color: #fff; margin-top: 7px;">
                                                        subTotal: Kshs. {{subTotal}}
                                                    </div>
                                                     <hr style="margin-top: 3px;margin-bottom: 3px;">
                                                    <div style="color: #fff; margin-top: 7px;">
                                                        Total: Kshs. {{Total}}
                                                    </div>
                                                </div>
                                        </div>
                                        <hr style="margin-top: 3px;margin-bottom: 3px;">
                                      </li>
                                </ul>
                            </li>
                            <li><router-link :to="`/client`" v-if="$hasrole('Client')" v-show ="User != null" title="MyAccount">My Account</router-link></li>
                            <li><router-link :to="`/affiliate`" v-if="$hasrole('Affiliate')" v-show ="User != null"
                                              title="MyAffiliatAccount"> My Affiliate Account
                                </router-link>
                            </li>
                            <li><router-link :to="`/tutor`" v-if="$hasrole('Tutor')" v-show ="User != null"
                                              title="MyTutorAccount"> My Tutor Account
                                </router-link>
                            </li>
                            <li class="dropdown">
                                <a  aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Courses" >Courses</a>
                                <i class="ddl-switch fa fa-angle-down"></i>
                                <ul class="dropdown-menu" style="min-width: 375px;">
                                     <li class="dropdown">
                                         <router-link aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Courses"
                                                   v-for="course in Courses" :key="course.id" :to="`/coursedetails/${course.id}`">{{course.name}}<br>
                                                        <small v-if="course.coursesyllabus"> ({{course.coursesyllabus.lessons}} lessons) </small>
                                         </router-link>
                                      </li>
                                </ul>
                            </li>
                            <li><router-link title="Event" :to="`/events`">Events</router-link></li>
                            <!-- <li><router-link title="Services" :to="`/services`">Services</router-link></li> -->
                            <!-- <li><router-link title="Team" :to="`/Team`">Team</router-link></li> -->
                            <li><router-link title="About" :to="`/about`">About</router-link></li>
                            <!-- <li><router-link title="Contact Us" :to="`/contact`">Contact</router-link></li> -->

                            <!-- <li class="menu-search">
                               <div id="sb-search" class="sb-search">
                                   <form>
                                       <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search" />
                                       <button class="sb-search-submit"><i class="fa fa-search"></i></button>
                                       <span class="sb-icon-search"></span>
                                   </form>
                               </div>
                            </li> -->
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
           routes:{
               //UNLOGGED USER PUBLIC HOME
               unlogged:[
                   {
                       name: 'Home',
                       path: 'home'
                   },
                //    {
                //        name: 'Login',
                //        path: 'Login'
                //    }
               ],
               //LOGGED USERS
                //1. superadmin
                superadmin:[
                    {
                       name: 'Superadmin.Dashboard',
                       path: 'superadmin.dashboard',
                   },
               ],
                //2. director
                director:[
                    {
                       name: 'Director.Dashboard',
                       path: 'director.dashboard',
                   },
               ],
                //3. administrator
                administrator:[
                    {
                       name: 'Administrator.Dashboard',
                       path: 'administrator.dashboard',
                   },
               ],
                //4. accountant
                accountant:[
                    {
                       name: 'Accountant.Dashboard',
                       path: 'accountant.dashboard',
                   },
               ],
                //5. tutor
                tutor:[
                    {
                       name: 'Tutor.Dashboard',
                       path: 'tutor.dashboard',
                   },
               ],
                //6. affiliate
                affiliate:[
                    {
                       name: 'Affiliate.Dashboard',
                       path: 'affiliate.dashboard',
                   },
               ],
                //7. client
                client:[
                    {
                       name: 'Client.Dashboard',
                       path: 'client.dashboard',
                   },
               ],
           },
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
            this.loadOrganisation();
            this.loadUser();
            this.loadCourses(); //from methods
            this.loadCartItems();
            this.loadOrders();
        },
        computed:{
            Organisation(){
               return this.$store.getters.Organisation
            },
            User(){
                return this.$store.getters.User
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
            Count(){
                return this.$store.getters.Count
            },
        },
        methods:{
            loadOrganisation(){
               return this.$store.dispatch( "organisation")
            },
            organisationLoadImage(organisation_logo){
                if(organisation_logo){
                    return "/assets/organisation/img/logo/"+organisation_logo;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            //logged
            loadUser(){
                this.$store.commit('setAuthUser', window.logged_user);
            },
            //
            loadCourses(){
                return this.$store.dispatch("courses")
            },
            loadCartItems(){
                return this.$store.dispatch("cartItems")
            },
            loadOrders(){
                return this.$store.dispatch("orders")
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
                 this.$Progress.start()
                this.enrollform.patch('/cart/')
                .then((response)=>{
                     let User = window.logged_user
                    if(User == undefined){
                        $('#LoginModal').modal('show')
                    };
                     toast({
                        type: 'success',
                        title: response.data.code,
                        title: response.data.message,
                        })
                        this.loadCartItems();
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
                this.$Progress.start()
                this.enrollform.patch('/cart/')
                .then((response)=>{
                     toast({
                        type: 'success',
                        title: response.data.code,
                        title: response.data.message,
                        })
                        this.loadCartItems();
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
            Remove(cartItem_id){
                console.log(cartItem_id)
                this.$Progress.start()
                axios.get('/cart/remove/'+cartItem_id)
                .then((response)=>{
                     toast({
                        type: 'success',
                        title: 'Course Removed successful'
                        })
                        this.loadCartItems();
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
                console.log(CartItems)
                 this.$Progress.start()
                axios.get('/cart/clear/'+CartItems)
                 .then((response)=>{
                     toast({
                        type: 'success',
                        title: 'Course Cart was Cleared successful'
                        })
                        this.loadCartItems();
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
                console.log(this.transactionform)
                 this.$Progress.start()
                this.transactionform.patch('/order/checkout/'+CartItems)
                .then((response)=>{
                     toast({
                        type: 'success',
                        title: 'Payment was successful, wait, for verification'
                        })
                        this.loadCartItems();
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

