
<template>
    <div id="admin-main">
        <!-- top-header -->
        <BackendTopHead/>
        <!-- sidebar -->
        <BackendSidebar/>
        <div class="content-wrapper" >
            <div class="content">
                 <vue-progress-bar></vue-progress-bar>
                <router-view></router-view>
            </div>
        </div>
        <BackendFooter/>
    </div>
</template>
<script>
    import BackendSidebar from "../pages/includes/backend/SideBar.vue";
    import BackendTopHead from "../pages/includes/backend/Top-Header.vue";
    import BackendFooter from "../pages/includes/backend/Footer.vue";
    export default {
        name:"Superadmin",
        components:{
            BackendSidebar,
            BackendTopHead,
            BackendFooter,
        },
        data(){
            return{
           }
        },
       mounted(){
            console.log('Admin Master mounted.')
        },
        computed:{
        }
    }
</script>
