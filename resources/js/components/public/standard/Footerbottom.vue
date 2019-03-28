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

                </ul>
            </div>
        </nav>
      </div>
  </div>
</template>

<script>
    export default {
        name:"Footerbottom",
        mounted() {
            console.log('Footerbottom')
        }
    }
</script>
