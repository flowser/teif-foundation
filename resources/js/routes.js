// import AdminHome from './components/admins/AdminHome.vue';

//Organisation
    //org superadmin
        //org Directors


        // course

        // import CourseList from './pages/backend/courses/Courses.vue';
        // import SingleCourse from './pages/backend/courses/SingleCourse.vue';
        //public
        // import Home from './components/public/standard/Home.vue';

        //frontend pages
        import Home from './pages/Home.vue';
        import CourseDetails from './pages/frontend/Course-Details.vue';
        import Events from './pages/frontend/Full-Event.vue';
        import About from './pages/frontend/About-Us.vue';
        import Team from './pages/frontend/Team.vue';
        import Services from './pages/frontend/Services.vue';
        //backend pages
        // import Courses  from
        // import Course_Details  from
        // import Employee  from
        // import Directors  from
        // import Admins  from
        // import Tutors  from
        // import Affiliates  from
        // import Users  from
        // import Roles  from
        // import Settings  from
        // import About  from
        // import Services  from
        // import Adverts  from
        // import UserPolicy  from

                //logged in user
        import SuperadminDashboard from './pages/user/admin/superadmin/Dashboard.vue';
        import DirectorDashboard from  './pages/user/admin/director/Dashboard.vue';
        import AdministratorDashboard from   './pages/user/admin/administrator/Dashboard.vue';
        import AccountantDashboard from './pages/user/admin/accountant/Dashboard.vue';
        import TutorDashboard from  './pages/user/tutor/Dashboard.vue';
        import AffiliateDashboard from  './pages/user/afilliate/Dashboard.vue';
        import ClientDashboard from './pages/user/client/Dashboard.vue';











export const routes = [
    // {
    //   path: '/home',
    //   component: AdminHome
    // },
    //organisation
            //directors
            {
            path: '/orgdirectors',
            component: DirectorList
            },
            //admins
            {
            path: '/orgadmins',
            component:AdminList
            },
            //employees
            {
            path: '/orgemployees',
            component:EmployeeList
            },

            //Permisions
            {
            path: '/permissions',
            component: PermissionList
            },

            //Roles
            // {
            // path: '/roles',
            // component: RoleList
            // },

            //Users
            {
            path: '/users',
            component:UserList
            },
            //Organisation Settings
            {
            path: '/settings',
            component:Orgsetting
            },
        //about pic more
            {
            path:'/aboutimage/:id',
            component: SingleAboutImage
            },
        //advert read more
            {
            path:'/advert/:id',
            component: SingleAdvert
            },
        //service read more
            {
            path:'/service/:id',
            component: SingleService
            },

        //courses
         {
            path: '/courses', //all courses
            component: CourseList
          },
          {
            path: '/course/:id',//view single course with all details
            component: SingleCourse
          },


// //Front End

  {
    path:'/', //with courses
    name:'home',
    component: Home,
    // meta:{
    //     auth:undefined
    // }
  },
  // USER ROUTES

  //superadmin
  {
    path: '/superadmin',
    name: 'superadmin.dashboard',
    component: SuperadminDashboard,
  },
  //director
  {
    path: '/director',
    name: 'director.dashboard',
    component: DirectorDashboard,
  },
  //adminstrator
  {
    path: '/administrator',
    name: 'administrator.dashboard',
    component: AdministratorDashboard,
  },
  //account
  {
    path: '/accountant',
    name: 'account.dashboard',
    component: AccountantDashboard,
  },
  //tutor
  {
    path: '/tutor',
    name: 'tutor.dashboard',
    component: TutorDashboard,
  },
  //affiliate
  {
    path: '/affiliate',
    name: 'affiliate.dashboard',
    component: AffiliateDashboard,
  },
  //client
  {
    path: '/client',
    name: 'client.dashboard',
    component: ClientDashboard,

  },
  {
    path:'/coursedetails/:id',
    name: 'details',
    component: CourseDetails,
    // meta:{
    //     auth:undefined
    // }
  },
  {
    path:'/about',
    name:'about',
    component: About ,
    // meta:{
    //     auth:undefined
    // }
  },
  {
    path:'/events', ///public
    name:'events',
    component: Events
    // meta:{
    //     auth:undefined
    // }
  },
  {
    path:'/services', ///public
    name: 'services',
    component: Services,
    // meta:{
    //     auth:undefined
    // }
  },
  {
    path:'/team', ///public
    name: 'team',
    component: Team
    // meta:{
    //     auth:undefined
    // }
  },
  //logged in
//   {
//     path:'/myaccount', //change to pass user name /felixnyachio
//     name: 'myaccount',
//     component: MyAccount,
//     // meta:{
//     //     auth:undefined
//     // }
//   },
//   {
//     path:'/myaffiliateaccount', //change to pass user name /felixnyachio
//     name: 'myAffiliateAccount',
//     component: MyAffiliateAccount,
//     // meta:{
//     //     auth:undefined
//     // }
//   },
];


