import VueRouter from 'vue-router';
        //frontend pages
        import Home from './pages/Home.vue';
        import CourseDetails from './pages/frontend/Course-Details.vue';
        import About from './pages/frontend/About-Us.vue';
        import Events from './pages/frontend/Full-Event.vue';
        import Services from './pages/frontend/Services.vue';
        import Team from './pages/frontend/Team.vue';

       //frontend pages

    // dashboards
       //    backend
       import SuperadminDashboard  from './pages/user/admin/superadmin/Dashboard.vue';
       import DirectorDashboard  from './pages/user/admin/director/Dashboard.vue';
       import AdministratorDashboard  from './pages/user/admin/administrator/Dashboard.vue';
       import AccountantDashboard  from './pages/user/admin/accountant/Dashboard.vue';
        //    front end
       import TutorDashboard  from './pages/user/tutor/Dashboard.vue';
       import AffiliateDashboard  from './pages/user/afilliate/Dashboard.vue';
       import ClientDashboard  from './pages/user/client/Dashboard.vue';

        //backend pages
        // users
        import Directors  from './pages/backend/users/Directors.vue';
        import Admins  from './pages/backend/users/Admins.vue';
        import Employees  from './pages/backend/users/Employees.vue';
        import Tutors  from './pages/backend/users/Tutors.vue';
        import Affiliates  from './pages/backend/users/Affiliates.vue';
        import Users  from './pages/backend/users/Users.vue';

        //courses
        import Courses  from './pages/backend/courses/Courses.vue';
        import SingleCourse  from './pages/backend/courses/SingleCourse.vue';

        import Timetable  from './pages/backend/courses/timetable/Timetable.vue';
        import SingleCourseTimetable  from './pages/backend/courses/timetable/SingleCourseTimetable.vue';
        import SingleTutorTimetable  from './pages/backend/courses/timetable/SingleTutorTimetable.vue';
        import Syllabi  from './pages/backend/courses/syllabus/Syllabi.vue';
        import SingleSyllabus  from './pages/backend/courses/syllabus/SingleSyllabus.vue';

        // settings
        import Permissions  from './pages/backend/settings/Permissions.vue';
        import Settings  from './pages/backend/settings/Settings.vue';
        // standard
        import AboutBackend  from './pages/backend/standard/about.vue';
        //service
        import ServicesBackend  from './pages/backend/standard/services/Services.vue';
        import SingleServiceBackend  from './pages/backend/standard/services/SingleService.vue';
        // Advert
        import AdvertsBackend  from './pages/backend/standard/adverts/Adverts.vue';
        import SingleAdvertBackend from './pages/backend/standard/adverts/SingleAdvert.vue';
        // Policy
        import PoliciesBackend  from './pages/backend/standard/policies/Policies.vue';
        import SinglePolicyBackend from './pages/backend/standard/policies/SinglePolicy.vue';

        // end of backend pages

export const routes = [

// 1. Front End view
  // 1.1 landing Page home
      {
        path:'/', //with courses
        name:'home',
        component: Home,
      },

  // 1.2. dashboards front
     //1.2.1 tutor
          {
            path: '/tutor',
            name: 'tutor.dashboard',
            component: TutorDashboard,
          },
     // 1.2.2 affiliate
          {
            path: '/affiliate',
            name: 'affiliate.dashboard',
            component: AffiliateDashboard,
          },
     //1.2.3 client
          {
            path: '/client',
            name: 'client.dashboard',
            component: ClientDashboard,
          },
  // 1.3 pages
     //1.3.1 Couse Details
          {
            path:'/coursedetails/:id',
            name: 'details',
            component: CourseDetails,
          },
     //1.3.2 Couse Details
          {
            path:'/about',
            name:'about',
            component: About ,
          },
     //1.3.4 Events
          {
            path:'/events',
            name:'events',
            component: Events,
          },
     //1.3.5 Sevices
          {
            path:'/services',
            name: 'services',
            component: Services,
          },
     //1.3.3 Team
          {
            path:'/team',
            name: 'team',
            component: Team,
          },

// 2. Backend view
  //2.1 Dashboards backend
    //2.1.1 superadmin
          {
            path: '/superadmin',
            name: 'superadmin.dashboard',
            component: SuperadminDashboard,
          },
    //2.1.1 director
          {
            path: '/director',
            name: 'director.dashboard',
            component: DirectorDashboard,
          },
    //2.1.1 adminstrator
          {
            path: '/administrator',
            name: 'administrator.dashboard',
            component: AdministratorDashboard,
          },
    //2.1.1 account
          {
            path: '/account',
            name: 'account.dashboard',
            component: AccountantDashboard,
          },

    //2.2 Pages
      //2.2.1 users
       //2.2.1.1 directors
          {
            path: '/directors',
            name: 'dashboard.directors',
            component: Directors,
          },
       //2.2.1.2 admins
          {
            path: '/admins',
            name: 'dashboard.admins',
            component:Admins,
          },
       //2.2.1.3 employees
          {
            path: '/employees',
            name: 'dashboard.employees',
            component:Employees,
          },
       //2.2.1.4 Tutors
          {
            path: '/tutors',
            name: 'dashboard.tutors',
            component:Tutors,
          },
       //2.2.1.5 affiliates
          {
            path: '/affiliates',
            name: 'dashboard.affiliates',
            component:Affiliates,

          },
       //2.2.1.5 users
          {
            path: '/users',
            name: 'dashboard.users',
            component:Users,

          },
    // 2.2.2 Courses
       //2.2.2.1 all courses
          {
            path: '/courses',
            name: 'dashboard.courses', //all courses
            component: Courses,

          },
       //2.2.2.2 Single course with details
          {
              path: '/course/:id',
              name: 'dashboard.course',//view single course with all details
              component: SingleCourse,

          },
       //2.2.2.3 all courses timetable
          {
              path: '/timetable',
              name: 'dashboard.timetable', //timetable with all courses
              component: Timetable,

          },
       //2.2.2.4 single course timetable
          {
              path: '/timetable/course/:id',
              name: 'timetable.course',//view single course timetable with all details
              component: SingleCourseTimetable,

         },
       //2.2.2.5 single tutor timetable
          {
              path: '/timetable/tutor/:id',
              name: 'timetable.tutor',//view single tutor timetable with all details
              component: SingleTutorTimetable,

         },
      //2.2.2.6 Syllabi Backend
        {
            path: '/syllabi',
            name: 'dashboard.syllabi', //all syllabi
            component: Syllabi,
        },
      //2.2.2.7 Single Syllabi Backend
        {
            path: '/syllabus/:id',
            name: 'dashboard.syllabus.id',//view single syllabus with all details
            component: SingleSyllabus,

        },
    // 2.2.2 Settings
       //2.2.2.1 Roles & permissions
          {
              path: '/permissions',
              name: 'dashboard.permissions',
              component: Permissions,

          },
       //2.2.2.2 settings
          {
              path: '/settings',
              name: 'dashboard.settings',
              component:Settings,

          },
    // 2.2.3 Standard
       //2.2.3.1 About backend
          {
              path: '/backend/about',
              name: 'dashboard.about',
              component:AboutBackend,

          },
    // 2.2.4 Service backend
       //2.2.4.1 Service backend
          {
              path: '/backend/services',
              name: 'dashboard.services',
              component:ServicesBackend,

          },
       //2.2.4.2 Single Service backend
          {
              path: '/service/:id',
              name: 'dashboard.service.id',
              component:SingleServiceBackend,

          },
    // 2.2.4 Advert backend
       //2.2.4.1 Advert backend
          {
              path: '/backend/adverts',
              name: 'dashboard.adverts',
              component:AdvertsBackend,

          },
       //2.2.4.2 Single Advert backend
          {
              path: '/advert/:id',
              name: 'dashboard.advert.id',
              component:SingleAdvertBackend,

          },
    // 2.2.4 Policies backend
       //2.2.4.1 Policies backend
          {
              path: '/backend/policies',
              name: 'dashboard.policies',
              component:PoliciesBackend,

          },
       //2.2.4.2 Single Policy backend
          {
              path: '/policy/:id',
              name: 'dashboard.policy.id',
              component:SinglePolicyBackend,

          },

];

const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})
export default router

