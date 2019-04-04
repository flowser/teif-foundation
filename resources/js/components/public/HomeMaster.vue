<template>
    <div id="publicmain">
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
        <div class="modal fade " id="CheckoutModal" tabindex="-1" role="dialog" aria-labelledby="CheckoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                        <div class="modal-header" style="padding: 2px;">
                            <h4 style="margin-top: 2px; margin-bottom: 0px;" class="text-center"> My Invoice</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="padding-right: 18px;margin-top: -16px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form role="form" @submit.prevent="Checkout(CartItems, Total)" >
                            <div class="modal-body" style="padding: 5px;">
                                 <h5 class="modal-title text-center" id="CheckoutModalLabel"> My Invoice</h5>
                                 <hr style="margin-top: 3px;margin-bottom: 3px;">
                                 <div class="row" style="margin-right: 0px;margin-left: 0px;margin-bottom:5px;">
                                        <div class="row" style="margin-right: 0px;margin-left: 0px;">
                                            <div class="col-md-2" style="padding-left: 5px;padding-right: 0px;">
                                            <el-button type="danger" plain size="small"
                                              title="Apply now" @click.prevent="Clear(CartItems)">Clear</el-button>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-right: 0px;margin-left: 0px;">
                                             <div class="col-md-12" style="padding-left: 5px;padding-right: 0px;">
                                                 <hr style="margin-top: 3px;margin-bottom: 3px;">
                                                <div style="; margin-top: 7px;">
                                                    <b id="fileHelp" class="form-text text-muted">
                                                        <p style="color: #9a009a"> By Mpesa, use Paybil: <b style="color: red">522522 </b></p>
                                                        <b style="color: #9a009a"> Account Name:</b>
                                                           <span>
                                                               <b style="color: red">Technology and Engineering Innovation Empowerment Foundation (TEIF Foundation</b>
                                                               <span><b style="color: #9a009a"> Account Number:</b> <b style="color: red">  1238091210</b></span>
                                                           </span>
                                                        <h2>
                                                             <span> <b style="color: #9a009a"> Deposit the Total amount of:</b>
                                                               <Span><b style="color:black;">Kshs.</b><b style="color: red"> Total: Kshs. {{Total}} </b></Span>
                                                             </span>
                                                        </h2>
                                                        <b style="color:blue">Once Completed, kindly Take a photo of the Bank Deposit or Screen Shot Transaction
                                                             Slip and upload via the File Portal.
                                                        </b>
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-right: 0px;margin-left: 0px;">
                                            <div class="col-md-6" style="padding-left: 5px;padding-right: 0px;">
                                                <label for="image" class=" col-form-label">Course Image</label><br>
                                                    <input @change="transactionChangeImage($event)" type="file" name="image"
                                                        :class="{ 'is-invalid': transactionform.errors.has('image') }"
                                                        class="form-control" style=" border: 1px solid #ffffff; padding-left: 0px;height: 40px;">
                                                        <has-error style="color: #e83e8c" :form="transactionform" field="image"></has-error>
                                                    <img  :src="transactionform.image" alt="" width="100%" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="transaction_code" class="col-form-label"> Transaction Code</label>
                                                <input v-model="transactionform.transaction_code" type="text" name="transaction_code" placeholder="Transaction Code"
                                                    class="form-control" :class="{ 'is-invalid': transactionform.errors.has('transaction_code') }" >
                                                <has-error style="color: #e83e8c" :form="transactionform" field="transaction_code"></has-error>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit Transaction</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <div class="modal fade " id="ClientModal" tabindex="-1" role="dialog" aria-labelledby="ClientModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="editmodeClient ? updateClient(clientform.id) : registerClient()" >
                        <div class="modal-body">
                            <h5 class="modal-title" v-show="editmodeClient" id="ClientModalLabel">Update Your Details</h5>
                            <h5 class="modal-title" v-show="!editmodeClient" id="ClientModalLabel">Register Four Our Courses</h5>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="first_name" class="col-form-label"> First Name</label>
                                            <input v-model="clientform.first_name" type="text" name="first_name" placeholder="First Name"
                                                class="form-control" :class="{ 'is-invalid': clientform.errors.has('first_name') }" >
                                            <has-error style="color: #e83e8c" :form="clientform" field="first_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="last_name" class=" col-form-label">Last Name </label>
                                            <input v-model="clientform.last_name" type="client_last_name" name="last_name" placeholder="Last Name"
                                                class="form-control" :class="{ 'is-invalid': clientform.errors.has('last_name') }" >
                                            <has-error style="color: #e83e8c" :form="clientform" field="last_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email" class=" col-form-label">Email </label>
                                            <input v-model="clientform.email" type="email" name="email" placeholder="Email Address"
                                                class="form-control" :class="{ 'is-invalid': clientform.errors.has('email') }" >
                                            <has-error style="color: #e83e8c" :form="clientform" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-3">
                                            <label for="phone" class="col-form-label"> Password</label>
                                            <input  ref="password" v-model="clientform.password" type="password" id="password" placeholder="Password"
                                                class="form-control" :class="{ 'is-invalid': clientform.errors.has('password') }">
                                            <has-error :form="clientform" field="password"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="password-confirm" class="col-form-label"> Confirm Password</label>
                                            <input v-model="clientform.password_confirm" type="password" id="password-confirm" name="password_confirmation" placeholder="Password"
                                                class="form-control" :class="{ 'is-invalid': clientform.errors.has('password') }" >
                                            <has-error :form="clientform" field="password"></has-error>
                                        </div>
                                        <div class="form-group col-md-3" style="padding-left: 0px;padding-right: 0px;margin-bottom: 0px;">
                                            <label for="phone" class="col-form-label"> Your Phone</label>
                                                <div>
                                                    <input v-model="clientform.phone" type="number" name="phone" placeholder="phone"
                                                class="form-control" :class="{ 'is-invalid': clientform.errors.has('phone') }" >
                                                    <has-error style="color: #e83e8c" :form="clientform" field="phone"></has-error>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="address" class=" col-form-label">Address (without P.O.Box)</label>
                                            <input v-model="clientform.address" type="text" name="address" placeholder="Address"
                                                class="form-control" :class="{ 'is-invalid': clientform.errors.has('address') }" >
                                            <has-error style="color: #e83e8c" :form="clientform" field="address"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="id_no" class="col-form-label">ID no.</label>
                                            <input v-model="clientform.id_no" type="text" name="id_no" placeholder="ID NO"
                                                class="form-control" :class="{ 'is-invalid': clientform.errors.has('id_no') }" >
                                            <has-error style="color: #e83e8c" :form="clientform" field="id_no"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="gender_id" class="col-form-label">Gender</label>
                                            <select class="form-control" v-model="clientform.gender_id" :class="{ 'is-invalid': clientform.errors.has('gender_id') }">
                                                    <option disabled value="">Select Gender</option>{{clientform.gender_id}}
                                                    <option v-for="gender in Genders" :value="gender.id" :key="gender.id">{{gender.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="clientform" field="gender_id"></has-error>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="education_id" class="col-form-label">Education</label>
                                            <select class="form-control" v-model="clientform.education_id" :class="{ 'is-invalid': clientform.errors.has('education_id') }">
                                                    <option disabled value="">Select Education</option>{{clientform.education_id}}
                                                    <option v-for="education in Educations" :value="education.id" :key="education.id">{{education.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="clientform" field="education_id"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-3">
                                            <label for="country_id">Select Country</label>
                                            <select class="form-control" @change="ClientcountryCounties(clientform.country_id)"
                                            v-model="clientform.country_id" :class="{ 'is-invalid': clientform.errors.has('country_id') }">
                                                    <option disabled value="">Select Country</option>{{clientform.country_id}}
                                                    <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="clientform" field="country_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="county_id" class=" col-form-label">County</label>
                                            <select class="form-control" @change="ClientcountyConstituencies(clientform.county_id)"
                                            v-model="clientform.county_id" :class="{ 'is-invalid': clientform.errors.has('county_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="clientform" field="county_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="constituency_id" class=" col-form-label">Constituency</label>
                                            <select class="form-control" @change="ClientconstituencyWards(clientform.constituency_id)"
                                            v-model="clientform.constituency_id" :class="{ 'is-invalid': clientform.errors.has('constituency_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="constituency in Constituencies" :value="constituency.id" :key="constituency.id">{{constituency.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="clientform" field="constituency_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="ward_id" class="col-form-label"> Ward </label>
                                            <select class="form-control"
                                            v-model="clientform.ward_id" :class="{ 'is-invalid': clientform.errors.has('ward_id') }">
                                                    <option disabled value="">Select Ward</option>
                                                    <option v-for="ward in Wards" :value="ward.id" :key="ward.id">{{ward.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="clientform" field="ward_id"></has-error>
                                        </div>

                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="photo" class=" col-form-label">Your PassPort Photo</label><br>
                                                <input @change="clientChangePassPhoto($event)" type="file" name="photo"
                                                    :class="{ 'is-invalid': clientform.errors.has('photo') }">
                                                    <img v-show="editmodeClient" :src="updateClientPassPhoto(clientform.photo)" alt="" width="100%" >
                                                    <img  v-show="!editmodeClient" :src="clientform.photo" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="clientform" field="photo"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="id_photo_front" class=" col-form-label">Client FrontSide ID Photo</label><br>
                                                <input @change="clientChangeIDFrontPhoto($event)" type="file" name="id_photo_front"
                                                    :class="{ 'is-invalid': clientform.errors.has('id_photo_front') }">
                                                    <img v-show="editmodeClient" :src="updateClientIDFrontPhoto(clientform.id_photo_front)" alt="" width="100%" >
                                                    <img  v-show="!editmodeClient" :src="clientform.id_photo_front" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="clientform" field="id_photo_front"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="backside_i_photod" class=" col-form-label">BackSide ID Photo</label><br>
                                                <input @change="clientChangeIDBackPhoto($event)" type="file" name="id_photo_back"
                                                    :class="{ 'is-invalid': clientform.errors.has('backside_id') }">
                                                    <img v-show="editmodeClient" :src="updateClientIDBackPhoto(clientform.id_photo_back)" alt="" width="100%" >
                                                    <img  v-show="!editmodeClient" :src="clientform.id_photo_back" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="clientform" field="id_photo_back"></has-error>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeClient" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeClient" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- //login -->
        <div class="modal fade " id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="login()" >
                        <div class="modal-body">
                            <h5 class="modal-title text-center" id="LoginModalLabel">Login</h5>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="email" class=" col-form-label">Email </label>
                                            <input v-model="loginform.email" type="email" name="email" placeholder="Email Address"
                                                class="form-control" :class="{ 'is-invalid': loginform.errors.has('email') }" >
                                            <has-error style="color: #e83e8c" :form="loginform" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-12">
                                            <label for="phone" class="col-form-label"> Password</label>
                                            <input  ref="password" v-model="loginform.password" type="password" id="password" placeholder="Password"
                                                class="form-control" :class="{ 'is-invalid': loginform.errors.has('password') }">
                                            <has-error :form="loginform" field="password"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-12">
                                            <div class="form-check">
                                                <el-checkbox v-model="loginform.remember">Option</el-checkbox>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-12">
                                            <div class="form-check">
                                                <a href="#" title="Reset password" @click.prevent="resetPasswordModal()">Forgot Your Password?</a>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success float-right">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!-- //reset -->
        <div class="modal fade " id="ResetModal" tabindex="-1" role="dialog" aria-labelledby="ResetModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="reset()" >
                        <div class="modal-body">
                            <h5 class="modal-title text-center" id="ResetModalLabel">Reset Password</h5>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="email" class=" col-form-label">Email </label>
                                            <input v-model="resetform.email" type="email" name="email" placeholder="Email Address"
                                                class="form-control" :class="{ 'is-invalid': resetform.errors.has('email') }" >
                                            <has-error style="color: #e83e8c" :form="resetform" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-12">
                                            <label for="phone" class="col-form-label"> Password</label>
                                            <input  ref="password" v-model="resetform.password" type="password" id="password" placeholder="Password"
                                                class="form-control" :class="{ 'is-invalid': resetform.errors.has('password') }">
                                            <has-error :form="resetform" field="password"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                                <label class="form-check-label" for="remember">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-12">
                                            <div class="form-check">
                                                <a href="#" title="Reset password" @click.prevent="resetPasswordModal()">Forgot Your Password?</a>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        <router-view></router-view>
        <!-- <home></home> -->
        <!-- our services -->

        <!-- Footer Main -->
        <footer class="footer-main container-fluid no-padding">
            <!-- Container -->
            <footer-content></footer-content>
            <!-- Container /- -->
        </footer>
        <!-- Footer /- -->

    </div>
</template>

<script>
     export default {
        name:"Home",
        data(){
            return{
                loginform: new Form({
                        email:'',
                        password:'',
                        remember: false,
                }),
                resetform: new Form({
                        email:'',
                        password:'',

                }),
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
                editmodeClient: false,
                clientform: new Form({
                        id:'',
                        first_name:'',
                        last_name:'',
                        email:'',
                        password:'',
                        password_confirm:'',
                        user_type:'',
                        permissions:[],
                        roles:[],
                        user_id:'',
                        position_id:'',
                        gender_id:'',
                        education_id:'',
                        photo:'',
                        active:'',
                        id_no:'',
                        id_photo_front:'',
                        id_photo_back:'',
                        about_me:'',
                        phone:'',
                        landline:'',
                        address:'',
                        country_id:'',
                        county_id:'',
                        constituency_id:'',
                        ward_id:'',
                }),
                //client
                phone:{
                        isValid: false,
                        country: undefined,
                },
                landline:{
                        isValid: false,
                        country: undefined,
                },




           }
        },
       mounted(){
            this.loadCourses();
            this.loadCartItems();
            this.loadCountries();
            this.loadCounties();
            this.loadConstituencies();
            this.loadWards();
            this.loadEducations();
            this.loadGenders();
        },
        computed:{
            Countries(){
                return this.$store.getters.Countries
            },
            Counties(){
               return this.$store.getters.CountryCounties
            },
            Constituencies(){
               return this.$store.getters.CountyConstituencies
            },
            Wards(){
               return this.$store.getters.ConstituencyWards
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
            Client(){
                console.log(this.$store.getters.Client)
               return this.$store.getters.Client//by logged in id
            },
            Genders(){
               return this.$store.getters.Genders
            },
            Educations(){
               return this.$store.getters.Educations
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
            loadCountries(){
                return this.$store.dispatch( "countries")//get all from roles.index
            },
            loadCounties(){
                return this.$store.dispatch( "countrycounties")//get all from counties.index
            },
            loadConstituencies(){
                return this.$store.dispatch( "countyconstituencies")//get all from counties.index
            },
            loadWards(){
                return this.$store.dispatch( "constituencywards")//get all from towns.index
            },
            loadOrganisation(){
                return this.$store.dispatch( "organisation")//get all from organisation. organisation linked to user
            },
            loadGenders(){
               return this.$store.dispatch("genders")
            },
            loadEducations(){
               return this.$store.dispatch("educations")
            },
                        //Client
            ClientInputPhone({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.clientform.phone = number;
            this.phone.isValid = isValid;
            this.phone.country = country && country.name;
            },

            ClientcountryCounties(country_id){
                console.log(country_id);
                this.$store.dispatch('countrycounties', country_id);
            },
            ClientcountyConstituencies(county_id){
                console.log(county_id);
                this.$store.dispatch('countyconstituencies', county_id);
            },
            ClientconstituencyWards(constituency_id){
                console.log(constituency_id);
                this.$store.dispatch('constituencywards', constituency_id); //send to store to the action with id
            },
            loginModal(){
                 this.loginform.reset()
                     $('#LoginModal').modal('show')
            },
            resetPasswordModal(){
                 this.resetform.reset()
                     $('#resetModal').modal('show')
            },
            login(){
                this.$Progress.start();
                    this.loginform.post('login')
                   .then((response)=>{
                        window.location.replace('home')
                        toast({
                            type: 'success',
                            title: 'You have been logged out successfully'
                        })
                        this.loadCourses()
                        this.loadCartItems()
                        this.$Progress.finish()
                })
                .catch((response)=>{
                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        title: 'Sorry there seems to be an issue check it ut first and try again.'
                    })
                })
            },
            logout(){
                this.$Progress.start();
                axios.post('logout')
                .then((response)=>{
                    // if (response.status === 302 || 401) {
                    window.location.replace('/')
                        toast({
                            type: 'success',
                            title: 'You have been logged out successfully'
                        })
                        this.loadCourses()
                        this.loadCartItems()
                        this.$Progress.finish()
                //   }
                })
                .catch((response)=>{
                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        title: 'Sorry there seems to be an issue check it ut first and try again.'
                    })
                })
            },
            registerClientModal(){
                 this.editmodeClient= false;
                 this.clientform.reset()
                     $('#ClientModal').modal('show')
            },
            //organisation client passposrt image
            clientLoadPassPhoto(clientpivot_photo){
                if(clientpivot_photo){
                    return "/assets/organisation/img/clients/passports/"+clientpivot_photo;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            //client passport photo
            clientChangePassPhoto(event){
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
                            this.clientform.photo =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateClientPassPhoto(clientform_photo){
                // console.log(clientform_photo)
                let img = this.clientform.photo;
                      if(img ==null){
                          return "/assets/organisation/img/website/empty.png";
                        //  console.log('its reall null')
                      }else{
                          if(img.length>100){
                            return this.clientform.photo;
                        }else{
                            if(clientform_photo){
                                return "assets/organisation/img/clients/passports/"+clientform_photo;
                            }else{
                                return "/assets/organisation/img/website/empty.png";
                            }
                        }
                      }

            },
            clientLoadIDFrontPhoto(clientpivot_id_photo_front){
                if(clientpivot_id_photo_front){
                    return "/assets/organisation/img/clients/IDs/front/"+clientpivot_id_photo_front;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            clientChangeIDFrontPhoto(event){
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
                            this.clientform.id_photo_front =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateClientIDFrontPhoto(clientform_id_photo_front){
                let img = this.clientform.id_photo_front;
                      if(img ==null){
                          return "/assets/organisation/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.clientform.id_photo_front;
                        }else{
                            if(clientform_id_photo_front){
                                return "assets/organisation/img/clients/IDs/front/"+clientform_id_photo_front;
                            }else{
                                return "/assets/organisation/img/website/empty.png";
                            }
                        }
                      }

            },
            clientLoadIDBackPhoto(clientform_id_photo_back){
                if(clientform_id_photo_back){
                    return "/assets/organisation/img/clients/IDs/back/"+clientform_id_photo_back;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            clientChangeIDBackPhoto(event){
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
                            this.clientform.id_photo_back =event.target.result
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateClientIDBackPhoto(clientform_id_photo_back){
                let img = this.clientform.id_photo_back;
                      if(img ==null){
                          return "/assets/organisation/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.clientform.id_photo_back;
                        }else{
                            if(clientform_id_photo_back){
                                return "assets/organisation/img/clients/IDs/back/"+clientform_id_photo_back;
                            }else{
                                return "/assets/organisation/img/website/empty.png";
                            }
                        }
                      }

            },
            editClientModal(id){
                console.log(id)
                 this.editmodeClient = true;
                 this.clientform.reset()
                    this.$Progress.start();
                      axios.get('/client/edit/'+id)
                        .then((response)=>{
                           $('#ClientModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Client data successfully'
                            })
                            console.log(response.data)
                            this.clientform.fill(response.data.client)
                            this.clientform.user_id = response.data.client.organisationclients[0].pivot.user_id
                            this.clientform.organisation_id = response.data.client.organisationclients[0].pivot.organisation_id
                            // // this.clientform.position_id = response.data.client.organisationclients[0].pivot.position_id
                            this.clientform.photo = response.data.client.organisationclients[0].pivot.photo
                            this.clientform.id_no = response.data.client.organisationclients[0].pivot.id_no
                            this.clientform.id_photo_front = response.data.client.organisationclients[0].pivot.id_photo_front
                            this.clientform.id_photo_back = response.data.client.organisationclients[0].pivot.id_photo_back
                            this.clientform.phone = response.data.client.organisationclients[0].pivot.phone
                            this.clientform.landline = response.data.client.organisationclients[0].pivot.landline
                            this.clientform.address = response.data.client.organisationclients[0].pivot.address

                        // //    //get country id
                            this.clientform.country_id = response.data.client.organisationclients[0].pivot.country_id
                            //get county id using the country id
                            this.clientform.county_id = response.data.client.organisationclients[0].pivot.county_id
                            this.$store.dispatch('countrycounties', response.data.client.organisationclients[0].pivot.country_id);
                            //get contituency using county id
                            this.clientform.constituency_id = response.data.client.organisationclients[0].pivot.constituency_id
                            this.$store.dispatch('countyconstituencies', response.data.client.organisationclients[0].pivot.county_id);
                            // //get ward usng constituency id
                            this.clientform.ward_id = response.data.client.organisationclients[0].pivot.ward_id
                            this.$store.dispatch('constituencywards', response.data.client.organisationclients[0].pivot.constituency_id);
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#ClientModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })
            },
            registerClient() {
                console.log('ssss')
                this.$Progress.start();
                this.clientform.post('register')
                    .then((response)=>{
                         window.location.replace('/home')
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Client Created successfully'
                            })
                            // this.$store.dispatch('organisation');
                            $('#ClientModal').modal('hide')
                            this.clientform.reset()
                              this.$Progress.finish()

                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#ClientModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateClient(id){
                  console.log(id)
                  this.$Progress.start();
                     this.clientform.patch('/client/update/'+id)
                        .then(()=>{
                        this.$store.dispatch('organisation');
                         $('#ClientModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'Client Created successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
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
                    console.log(response)
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
                    console.log(response)
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
