<template>
  <div id="about-us">
      <div class="container-fluid no-padding " :style="{ background: `url(${imageUrl}) no-repeat center` }" style="height: 220px" >
		<!-- background_image -->
        <div class="container">
			<div class="pagebanner-content" style="margin-top: 80px;">
                <div class="">
                    <div class="pull-left">
                        <h3 style="margin-top: 0px;margin-bottom: 0px;color: #ffff;">About US</h3>
                    </div>
                    <div class="pull-right">
                        <ol class="breadcrumb" start="background-color: transparent;">
                            <li><router-link title="Home" :to="`/`" style="color: #ffc722;">Home</router-link></li>
                            <li style="color: #ffff;">About US</li>
                        </ol>
                    </div>
                </div>
			</div>
		</div>
	</div><!-- PageBanner /- -->
      <!-- WhyChooseUs Section -->
      <div class="container whychooseus-section">
          <div class="section-padding"></div>
          <div class="section-header">
              <h3>Why Choose <span> {{Organisation.name}}</span></h3>
              <h4 v-if="Organisation.about">{{Organisation.about.title}}</h4>
              <h5 v-if="Organisation.about">{{Organisation.about.subtitle}}</h5>

          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="" v-if="Organisation.about">
                      <img  :src="aboutLoadFrontImage(Organisation.about.front_image)" width="570" height="400" alt="Video Poster"/>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="">
                      <h3>Who We Are</h3>
                      <p v-if="Organisation.about">{{Organisation.about.who_we_are}}</p>
                  </div>
                  <div class="">
                      <h3>What We do</h3>
                      <p v-if="Organisation.about">{{Organisation.about.who_we_are}}</p>
                  </div>
              </div>
          </div>
          <div class="section-padding"></div>
      </div>

  </div>
</template>

<script>
    export default {
        name:"About-US",
         data(){
            return{
                imageUrl:'',
           }
        },
        mounted() {
            this.loadClient();
            this.loadOrganisation();
            this.imageUrl = "/assets/organisation/img/background/background-1.jpg"
        },
        computed:{
            Client(){
                return this.$store.getters.Client
            },
            Organisation(){
               return this.$store.getters.Organisation
            },
        },
        methods:{
            loadClient(){

                return this.$store.dispatch("client")
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
        }

    }
</script>
