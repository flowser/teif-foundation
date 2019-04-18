<template>
  <div id="footerbottom">
     <div class="footer-bottom col-md-12 col-sm-12 no-padding">
        <div class="copyright no-padding">
            <span>Copyright &copy; 2019. All Rights Reserved.</span>
        </div>
        <nav class="navbar ow-navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar2" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                     <li><router-link title="Home" :to="`/`">Home</router-link></li>
                     <li><router-link title="Events" :to="`/events`">Events</router-link></li>
                     <!-- <li><router-link title="Team" :to="`/Team`">Team</router-link></li> -->
                     <li><router-link title="About" :to="`/about`">About</router-link></li>
                     <!-- <li><router-link title="Contact Us" :to="`/contact`">Contact</router-link></li> -->
                     <li> <a href="#" v-show ="User == null" title="Register as an Affiliate"
                              @click.prevent="registerAffiliateModal()">Register as an Affiliate
                         </a>
                    </li>
                     <!-- <li><router-link title="Contact Us" :to="`/contact`">Contact</router-link></li> -->

                </ul>
            </div>
        </nav>
      </div>
  </div>
</template>

<script>
    export default {
        name:"Footerbottom",
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
        mounted() {
            this.loadUser();
            console.log('Footerbottom')
        },
        computed:{
            User(){
                return this.$store.getters.User
            },
        },
        methods:{
            //logged
            loadUser(){
                this.$store.commit('setAuthUser', window.logged_user);
            },
            registerAffiliateModal(){
                 this.editmodeAffiliate= false;
                 this.affiliateform.reset()
                     $('#AffiliateModal').modal('show')
            },
        },
    }
</script>
