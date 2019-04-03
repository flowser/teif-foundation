
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
        // console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CoursesByPage(context, payload){//permission.index route laravel
      axios.get('/courses/get?page=' + payload)
      .then((response)=>{
        console.log(response.data, 'page')
        context.commit('courses', response.data.courses);
      });
    },
    
    CoursesByFilter(context, payload){//permission.index route laravel
        console.log(payload)
      axios.post('/coursefilter/get', payload)
      .then((response)=>{
        // console.log(response.data)
        context.commit('courses', response.data.courses);
      });
    },
    CourseById(context, payload){
        // console.log(payload)
        axios.get('/course/show/'+payload)
              .then((response)=>{
                //   console.log(response.data, 'teiyo');
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






