
//bureaucourse module

const state = {
    courses:[],
    course:[],
  };
const getters = {
    Courses(state){
      return state.courses;
    },
    Course(state){
      return state.course;
    }
  };
const actions = {
    courses(context){//permission.index route laravel
      axios.get('/course/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesByGenderID(context, payload){//permission.index route laravel
      axios.get('/gendercourses/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesByEducationID(context, payload){//permission.index route laravel
      axios.get('/educationcourses/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesByDurationID(context, payload){//permission.index route laravel
      axios.get('/durationcourses/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesByExperienceID(context, payload){//permission.index route laravel
      axios.get('/experiencecourses/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesByMaritalstatusID(context, payload){//permission.index route laravel
      axios.get('/maritalstatuscourses/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesByOperationID(context, payload){//permission.index route laravel
      axios.get('/operationcourses/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesBySkillID(context, payload){//permission.index route laravel
      axios.get('/skillcourses/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesByReligionID(context, payload){//permission.index route laravel
      axios.get('/religioncourses/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesByTribeID(context, payload){//permission.index route laravel
      axios.get('/tribecourses/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesByFilter(context, payload){//permission.index route laravel
        console.log(payload)
      axios.post('/coursefilter/get', payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CourseById(context, payload){
        // console.log(payload)
        axios.get('/course/show/'+payload)
              .then((response)=>{
                  console.log(response.data, 'teiyo');
                  context.commit('course', response.data.course);
              });
    }
  };
const mutations = {
    courses(state, data){
      return state.courses = data;
    },
    course(state, data){
      return state.course = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};






