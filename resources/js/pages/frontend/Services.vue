<template>
  <div id="servicess">
      <div class="container-fluid no-padding parallax-section">
            <div class="parallax-carousel">
                <div class="parallax-block">
                    <div class="parallax-box">
                        <img src="main_theme/images/parallax-bg.jpg" alt="parallax" width="1920" height="600"/>
                    </div>
                    <div class="parallax-content">
                        <h3>Learn Online Courses</h3>
                        <h3>Only patience & persistence give <span>Good Result</span></h3>
                        <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                        <a href="#" title="Find More About Us">Find More About Us</a>
                        <ul>
                            <li><img src="main_theme/images/parallax-thumb1.jpg" alt="parallax-thumb1" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb2.jpg" alt="parallax-thumb2" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb3.jpg" alt="parallax-thumb3" width="100" height="80"/></li>
                        </ul>
                    </div>
                </div>
                <div class="parallax-block">
                    <div class="parallax-box">
                        <img src="main_theme/images/parallax-bg.jpg" alt="parallax" width="1920" height="600"/>
                    </div>
                    <div class="parallax-content">
                        <h3>Learn Online</h3>
                        <h3>Only patience & persistence give <span>Good Result 2</span></h3>
                        <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                        <a href="#" title="Find More About Us">Find More About Us</a>
                        <ul>
                            <li><img src="main_theme/images/parallax-thumb1.jpg" alt="parallax-thumb1" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb2.jpg" alt="parallax-thumb2" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb3.jpg" alt="parallax-thumb3" width="100" height="80"/></li>
                        </ul>
                    </div>
                </div>
                <div class="parallax-block">
                    <div class="parallax-box">
                        <img src="main_theme/images/parallax-bg.jpg" alt="parallax" width="1920" height="600"/>
                    </div>
                    <div class="parallax-content">
                        <h3>Learn Courses</h3>
                        <h3>Only patience & persistence give <span>Good Result 3</span></h3>
                        <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                        <a href="#" title="Find More About Us">Find More About Us</a>
                        <ul>
                            <li><img src="main_theme/images/parallax-thumb1.jpg" alt="parallax-thumb1" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb2.jpg" alt="parallax-thumb2" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb3.jpg" alt="parallax-thumb3" width="100" height="80"/></li>
                        </ul>
                    </div>
                </div>
                <div class="parallax-block">
                    <div class="parallax-box">
                        <img src="main_theme/images/parallax-bg.jpg" alt="parallax" width="1920" height="600"/>
                    </div>
                    <div class="parallax-content">
                        <h3>Learn Online Courses</h3>
                        <h3>Only patience & persistence give <span>Good Result 4</span></h3>
                        <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                        <a href="#" title="Find More About Us">Find More About Us</a>
                        <ul>
                            <li><img src="main_theme/images/parallax-thumb1.jpg" alt="parallax-thumb1" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb2.jpg" alt="parallax-thumb2" width="100" height="80"/></li>
                            <li><img src="main_theme/images/parallax-thumb3.jpg" alt="parallax-thumb3" width="100" height="80"/></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>
    export default {
        name:"Servicess",
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
