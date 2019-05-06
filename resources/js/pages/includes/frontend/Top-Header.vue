<template>
  <div class="topheader-left">
            <a href="tel:+5198759822" title="5198759822"><i class="fa fa-mobile" aria-hidden="true"></i>{{Organisation.phone}}</a>
            <router-link title="home" :to="`/`">{{Organisation.name}}</router-link>
            <router-link title="about" :to="`/about`">About</router-link>
            <a href="" title=""><i class="fa fa-envelope-o" aria-hidden="true"></i>Emailus: {{Organisation.organisation_email}}</a>
        </div>
        <div class="topheader-right">
            <a href="#" v-show ="User == null" title="Login" @click.prevent="loginModal()"><i class="fa fa-sign-out" aria-hidden="true"></i>Login</a>
            <a href="#" v-show ="User == null" title="Register" @click.prevent="registerClientModal()">Register</a>
            <a href="#" v-show ="User == null" title="Register as an Affiliate" @click.prevent="registerAffiliateModal()">Register as an Affiliate</a>
            <a href="#" v-show ="User != null" title="Logout" @click.prevent="logout">Logout</a>
        </div>
    </div>
  </div>
</template>

<script>
    export default {
        name:"Top-Header",
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                loginform: new Form({
                        email:'',
                        password:'',
                        remember:'',
                }),
                emaillinkform: new Form({
                        email:'',
                }),
                resetpasswordform: new Form({
                        email:'',
                        password:'',
                        password_confirmation:'',
                        token:'',
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
                editmodeAffiliate: false,
                affiliateform: new Form({
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
                //client oraffiliate
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
            this.loadOrganisation();
            this.loadCourses();
            this.loadCartItems();
            this.loadCountries();
            this.loadCounties();
            this.loadConstituencies();
            this.loadWards();
            this.loadEducations();
            this.loadGenders();
            this.loadUser();
        },
        computed:{
            Organisation(){
               return this.$store.getters.Organisation
            },
            User(){
                return this.$store.getters.User
            },
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
                // console.log(this.$store.getters.Client)
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
            loadOrganisation(){
                this.Url = window.location.href;
                console.log(this.Url,'document.location dddd');
                this.resetPasswordModal()
               return this.$store.dispatch( "organisation")
            },
            loadUser(){
                this.$store.commit('setAuthUser', window.logged_user);
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
            // console.log(number, isValid, country);
            this.clientform.phone = number;
            this.phone.isValid = isValid;
            this.phone.country = country && country.name;
            },

            ClientcountryCounties(country_id){
                // console.log(country_id);
                this.$store.dispatch('countrycounties', country_id);
            },
            ClientcountyConstituencies(county_id){
                // console.log(county_id);
                this.$store.dispatch('countyconstituencies', county_id);
            },
            ClientconstituencyWards(constituency_id){
                // console.log(constituency_id);
                this.$store.dispatch('constituencywards', constituency_id); //send to store to the action with id
            },
            registerClientModal(){
                 this.editmodeClient= false;
                 this.clientform.reset()
                 this.clientform.organisation_id;
                     $('#ClientModal').modal('show')
            },
            registerAffiliateModal(){
                 this.editmodeAffiliate= false;
                 this.affiliateform.reset()
                     $('#AffiliateModal').modal('show')
            },
            loginModal(){
                 this.loginform.reset()
                     $('#LoginModal').modal('show')
                     $('#ResetModal').modal('hide')
            },
            emailresetLinkModal(){
                 this.loginform.reset()
                 this.emaillinkform.reset()
                     $('#LoginModal').modal('hide')
                     $('#EmailResetLinkModal').modal('show')
            },
            resetPasswordModal(){
                 this.loginform.reset()
                 this.emaillinkform.reset()
                 this.resetpasswordform.reset()

                var url = new URL(this.Url);
                console.log(url)
                var token = url.searchParams.get("token");
                if(token !=null){
                    axios.get('/password/reset/'+token)
                     .then((response)=>{
                       this.resetpasswordform.token = response.data.token
                       this.resetpasswordform.email = response.data.email
                        $('#LoginModal').modal('hide')
                        $('#EmailResetLinkModal').modal('hide')
                        $('#ResetPasswordModal').modal('show')
                        toast({
                            type: 'success',
                            title: 'You have successfully fetched your email to windup your passwod reset'
                        })
                        this.$Progress.finish()
                    })
                    .catch((response)=>{
                        this.$Progress.fail()
                        toast({
                            type: 'error',
                            title: 'Sorry there seems to be an issue check it your Email and try again.'
                        })
                    })
                }
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
                // console.log(id)
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
                            // console.log(response.data)
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
            // registerClient() {
            //     // console.log(this.$route.params.id, 'ssss')
            //     console.log('ssss')
            //     this.$Progress.start();
            //     this.clientform.post('register')
            //         .then((response)=>{
            //              window.location.replace('/home')
            //              this.$store.dispatch('client');
            //              this.$store.commit('setAuthUser', window.logged_user);
            //             //  console.log(response.data)
            //              toast({
            //                 type: 'success',
            //                 title: 'Client Created successfully with me'
            //                 })

            //                 $('#ClientModal').modal('hide')
            //                 this.clientform.reset()
            //                   this.$Progress.finish()
            //         })
            //         .catch(()=>{
            //             this.$Progress.fail()
            //             //errors
            //                 $('#ClientModal').modal('show');
            //                 toast({
            //                     type: 'error',
            //                     title: 'There was something wrong me.'
            //                     })
            //         })
            // },
            updateClient(id){
                //   console.log(id)
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

                        this.loadOrders();
                        this.loadClient();
                        this.loadCourses();
                        this.loadCartItems();
                        this.loadCountries();
                        this.loadCounties();
                        this.loadConstituencies();
                        this.loadWards();
                        this.loadEducations();
                        this.loadGenders();
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

                        this.loadOrders();
                        this.loadClient();
                        this.loadCourses();
                        this.loadCartItems();
                        this.loadCountries();
                        this.loadCounties();
                        this.loadConstituencies();
                        this.loadWards();
                        this.loadEducations();
                        this.loadGenders();
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
                        this.loadOrders();
                        this.loadClient();
                        this.loadCourses();
                        this.loadCartItems();
                        this.loadCountries();
                        this.loadCounties();
                        this.loadConstituencies();
                        this.loadWards();
                        this.loadEducations();
                        this.loadGenders();
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
                        this.loadOrders();
                        this.loadClient();
                        this.loadCourses();
                        this.loadCartItems();
                        this.loadCountries();
                        this.loadCounties();
                        this.loadConstituencies();
                        this.loadWards();
                        this.loadEducations();
                        this.loadGenders();
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
                        this.loadCartItems()
                        this.loadCourses();
                        this.loadCartItems();
                        this.loadCountries();
                        this.loadCounties();
                        this.loadConstituencies();
                        this.loadWards();
                        this.loadEducations();
                        this.loadGenders();
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
            login(){
                this.$Progress.start();
                this.loginform.post('login')
                .then((response)=>{
                     window.location.replace('/home')
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
                    this.$store.dispatch('logoutUser');
                    this.$store.commit('setAuthUser', window.logged_user);
                     window.location.replace('/')
                    // if (response.status === 302 || 401) {
                    // this.$router.push('/')//home when logged out
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
        },
    }
</script>
