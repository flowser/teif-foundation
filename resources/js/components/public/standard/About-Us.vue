<template>
  <div id="about-us">
      <div class="container-fluid no-padding pagebanner">
          <div class="container">
              <div class="pagebanner-content">
                  <h3>About us</h3>
                  <ol class="breadcrumb">
                      <li><router-link :to="`/`" class="read-more" title="Home" style="color:white">Home</router-link></li>
                      <li>About us</li>
                  </ol>
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
        mounted() {
            this.loadOrganisation();
        },
        computed:{
            Organisation(){
               return this.$store.getters.Organisation
            },
        },
        methods:{
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
