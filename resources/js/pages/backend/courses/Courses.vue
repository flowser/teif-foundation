<template>
  <div class="container-fluid mt-5">
      <!-- Main content -->
    <div class="col-md-12">
     <section class="content">
      <div class="row justify-content-around">
        <div class="col-md">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Welcome to {{Organisation.name}}  Courses</h3>
              <h3 class="card-title">Courses Table</h3>
              <div class="card-tools">
                    <button class="btn btn-success"  @click.prevent="newCourseModal()">Add New Course and Syllabus
                        <i class="fas fa-plus fw"></i>
                     </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>S1</th>
                    <th>Course Image</th>
                    <th>Course Details</th>
                    <th>Regular</th>
                    <th>Part Time</th>
                    <th>Status</th>
                    <th style="padding-left: 14px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(course, index) in Courses" :key="course.id">
                    <td >{{index+1}}</td>
                    <td >
                        <div class="col" style="padding: 3px;">
                           <img class="card-img-top" :src="courseLoadImage(course.image)" style="width:100%; height:130px" alt="Card image cap">
                        </div>
                    </td>
                    <td >
                        <div class="row">
                            <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                <div>{{course.name}},</div>
                                <div>
                                    Brief: <span style="color:#9a009a;">{{course.brief }},</span>
                                </div>
                                <div>
                                    Start Date: <span style="color:#9a009a;">{{course.start_date | dateformat}},</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                           <div class="col" style="padding: 3px;">
                               <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                <div>Duration: <span style="color:#9a009a;">{{course.regular_duration}}</span>,
                                    </div>
                                    <div>
                                        End Date: <span style="color:#9a009a;">{{course.regular_end_date | dateformat}} </span>
                                    </div>
                                    <div>
                                       Regular Fee: Kshs. <span style="color:#9a009a;">{{course.regular_fee}} </span>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                           <div class="col" style="padding: 3px;">
                               <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                    <div>Duration: <span style="color:#9a009a;">{{course.parttime_duration}}</span>,
                                    </div>
                                    <div>
                                        End Date: <span style="color:#9a009a;">{{course.parttime_end_date | dateformat}} </span>
                                    </div>
                                    <div>
                                       Regular Fee: Kshs. <span style="color:#9a009a;">{{course.parttime_fee}} </span>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </td>
                    <td style="padding: 3px; width:130px" >
                        <div class="clearfix" style="font-weight:bold;font-size:0.7em;">
                            <span style="color:#9a009a;">
                               <div v-if="course.active == true">
                                   <a type="button" class="btn btn-success btn-sm"> Active</a>
                               </div>
                               <div v-else-if="course.active == false">
                                   <a type="button" class="btn btn-danger btn-sm"> Inactive</a>
                               </div>
                           </span>
                        </div>
                    </td>
                    <td style="padding: 3px; width:130px" >
                        <div class="clearfix" style="font-weight:bold;font-size:0.7em;">
                            <span class="float-left" style="margin-bottom:-0.5em" >
                                <div style="margin-bottom:0.25em"> Updated at:
                                    <span style="color:#9a009a;">{{course.created_at | dateformat}} </span>
                                </div>
                            </span>
                        </div>
                        <br>
                        <div class="clearfix" style="font-weight:bold;font-size:0.7em;">
                            <span class="float-left">
                                <router-link  :to="`/course/${course.id}`">
                                    <i class="fa fa-eye "></i>
                                </router-link>
                            </span>
                            <span class="float-right" style="color:#9a009a;">
                                <div v-if="course.active == true">
                                    <a href="" @click.prevent="DeactivateCourse(course.id)" type="button"
                                       class="btn btn-danger btn-sm"> Deactivate
                                     </a>
                                </div>
                                <div v-else-if="course.active == false">
                                    <a href="" @click.prevent="ActivateCourse(course.id)" type="button"
                                       class="btn btn-success btn-sm"> Activate
                                     </a>
                                </div>
                            </span>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </section>

    </div>
        <!-- Course Modal -->

    <div class="modal fade " id="CourseModal" tabindex="-1" role="dialog" aria-labelledby="CourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4> Course Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="addCourse()" >
                        <div class="modal-body">
                            <h5 class="modal-title" id="CourseModalLabel">Add New Course</h5>
                                <h5 class="text-center">Course Details</h5>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name" class="col-form-label"> Course Name</label>
                                        <input v-model="courseform.name" type="text" name="name" placeholder="Course Name"
                                            class="form-control" :class="{ 'is-invalid': courseform.errors.has('name') }" >
                                        <has-error style="color: #e83e8c" :form="courseform" field="name"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="brief" class=" col-form-label">Brief Description </label>
                                        <textarea v-model="courseform.brief" type="text" name="brief" placeholder="Brief Description"
                                            class="form-control" :class="{ 'is-invalid': courseform.errors.has('brief') }" >
                                        </textarea>
                                        <has-error style="color: #e83e8c" :form="courseform" field="brief"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="start_date" class="col-form-label">Start Date</label>
                                            <datetime v-model="courseform.start_date" type="text" id="start_date"
                                            class="form-control"  input-class="form-control border-0" style="padding-top: 0px;height: 40px;"
                                            :class="{ 'is-invalid': courseform.errors.has('start_date') }"></datetime>
                                        <has-error style="color: #e83e8c" :form="courseform" field="start_date"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="image" class=" col-form-label">Course Image</label><br>
                                            <input @change="courseChangeImage($event)" type="file" name="image"
                                                :class="{ 'is-invalid': courseform.errors.has('image') }"
                                                class="form-control" style=" border: 1px solid #ffffff; padding-left: 0px;height: 40px;">
                                                <img  :src="courseform.image" alt="" width="100%" >
                                        <has-error style="color: #e83e8c" :form="courseform" field="image"></has-error>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="regular_end_date" class="col-form-label">Regular End Date</label>
                                                <datetime v-model="courseform.regular_end_date" type="text" id="regular_end_date" placeholder="Regular End Date"
                                                class="form-control"  input-class="form-control border-0" style="padding-top: 0px;height: 40px;"
                                                :class="{ 'is-invalid': courseform.errors.has('regular_end_date') }"></datetime>
                                            <has-error style="color: #e83e8c" :form="courseform" field="regular_end_date"></has-error>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="parttime_end_date" class="col-form-label">Part-Time End Date</label>
                                                <datetime v-model="courseform.parttime_end_date" type="text" id="parttime_end_date" placeholder="Part-Time End Date"
                                                class="form-control"  input-class="form-control border-0" style="padding-top: 0px;height: 40px;"
                                                :class="{ 'is-invalid': courseform.errors.has('parttime_end_date') }"></datetime>
                                            <has-error style="color: #e83e8c" :form="courseform" field="parttime_end_date"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="regular_fee" class=" col-form-label">Regular Fee </label>
                                        <input v-model="courseform.regular_fee" type="text" name="regular_fee" placeholder="Regular Fee"
                                            class="form-control" :class="{ 'is-invalid': courseform.errors.has('regular_fee') }" >
                                        <has-error style="color: #e83e8c" :form="courseform" field="regular_fee"></has-error>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="parttime_fee" class=" col-form-label">Part Time Fee </label>
                                        <input v-model="courseform.parttime_fee" type="text" name="parttime_fee" placeholder="Part Time Fee"
                                            class="form-control" :class="{ 'is-invalid': courseform.errors.has('parttime_fee') }" >
                                        <has-error style="color: #e83e8c" :form="courseform" field="parttime_fee"></has-error>
                                    </div>
                                </div>

                                <h5 class="text-center">Course categories</h5>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="course_school_id">Select School</label>
                                        <select class="form-control" v-model="courseform.course_school_id"
                                                :class="{ 'is-invalid': courseform.errors.has('course_school_id') }">
                                                <option disabled value="">Select School</option>
                                                <option v-for="school in Schools" :value="school.id" :key="school.id">{{school.name}}</option>
                                        </select>
                                       <has-error style="color: #e83e8c" :form="courseform" field="course_school_id"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="course_skill_id">Select Skill</label>
                                        <select class="form-control" v-model="courseform.course_skill_id"
                                                :class="{ 'is-invalid': courseform.errors.has('course_skill_id') }">
                                                <option disabled value="">Select Skill</option>
                                                <option v-for="skill in Skills" :value="skill.id" :key="skill.id">{{skill.name}}</option>
                                        </select>
                                       <has-error style="color: #e83e8c" :form="courseform" field="course_skill_id"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="course_duration_id">Select Duration</label>
                                        <select class="form-control" v-model="courseform.course_duration_id"
                                                :class="{ 'is-invalid': courseform.errors.has('course_duration_id') }">
                                                <option disabled value="">Select Duration</option>
                                                <option v-for="duration in Durations" :value="duration.id" :key="duration.id">{{duration.name}}</option>
                                        </select>
                                       <has-error style="color: #e83e8c" :form="courseform" field="course_duration_id"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="course_availability_id">Select Availability</label>
                                        <select class="form-control" v-model="courseform.course_availability_id"
                                                :class="{ 'is-invalid': courseform.errors.has('course_availability_id') }">
                                                <option disabled value="">Select Availability</option>
                                                <option v-for="availability in Availabilities" :value="availability.id" :key="availability.id">{{availability.name}}</option>
                                        </select>
                                       <has-error style="color: #e83e8c" :form="courseform" field="course_availability_id"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">

                                        <label for="course_subject_id">Select Subject</label>
                                        <select class="form-control" v-model="courseform.course_subject_id"
                                                :class="{ 'is-invalid': courseform.errors.has('course_subject_id') }">
                                                <option disabled value="">Select Subject</option>
                                                <option v-for="subject in Subjects" :value="subject.id" :key="subject.id">{{subject.name}}</option>
                                        </select>
                                       <has-error style="color: #e83e8c" :form="courseform" field="course_subject_id"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="course_type_id">Select Type</label>
                                        <select class="form-control" v-model="courseform.course_type_id"
                                                :class="{ 'is-invalid': courseform.errors.has('course_type_id') }">
                                                <option disabled value="">Select Type</option>
                                                <option v-for="type in Types" :value="type.id" :key="type.id">{{type.name}}</option>
                                        </select>
                                       <has-error style="color: #e83e8c" :form="courseform" field="course_type_id"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="course_accessibility_id">Select Accessibility</label>
                                        <select class="form-control" v-model="courseform.course_accessibility_id"
                                                :class="{ 'is-invalid': courseform.errors.has('course_accessibility_id') }">
                                                <option disabled value="">Select Accessibility</option>
                                                <option v-for="accessibility in Accessibilities" :value="accessibility.id" :key="accessibility.id">{{accessibility.name}}</option>
                                        </select>
                                       <has-error style="color: #e83e8c" :form="courseform" field="course_accessibility_id"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="course_feature_id">Select Feature</label>
                                        <select class="form-control" v-model="courseform.course_feature_id"
                                                :class="{ 'is-invalid': courseform.errors.has('course_feature_id') }">
                                                <option disabled value="">Select Feature</option>
                                                <option v-for="feature in Features" :value="feature.id" :key="feature.id">{{feature.name}}</option>
                                        </select>
                                       <has-error style="color: #e83e8c" :form="courseform" field="course_feature_id"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="course_language_id">Select Language</label>
                                        <select class="form-control" v-model="courseform.course_language_id"
                                                :class="{ 'is-invalid': courseform.errors.has('course_language_id') }">
                                                <option disabled value="">Select Language</option>
                                                <option v-for="language in Languages" :value="language.id" :key="language.id">{{language.name}}</option>
                                        </select>
                                       <has-error style="color: #e83e8c" :form="courseform" field="course_language_id"></has-error>
                                    </div>
                                </div>

                                <h5 class="text-center">Course Syllabus</h5>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="lessons" class=" col-form-label">Number of Lessons </label>
                                        <input v-model="courseform.lessons" type="text" name="lessons" placeholder="Number of Lessons"
                                            class="form-control" :class="{ 'is-invalid': courseform.errors.has('lessons') }" >
                                        <has-error style="color: #e83e8c" :form="courseform" field="lessons"></has-error>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="hours" class=" col-form-label">Credit Hours </label>
                                        <input v-model="courseform.hours" type="text" name="hours" placeholder="Credit Hours"
                                            class="form-control" :class="{ 'is-invalid': courseform.errors.has('hours') }" >
                                        <has-error style="color: #e83e8c" :form="courseform" field="hours"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="practice_id">Select Practice</label>
                                        <select class="form-control" v-model="courseform.practice_id"
                                                :class="{ 'is-invalid': courseform.errors.has('practice_id') }">
                                                <option disabled value="">Select Practice</option>
                                                <option v-for="practice in Practices" :value="practice.id" :key="practice.id">{{practice.name}}</option>
                                        </select>
                                        <has-error style="color: #e83e8c" :form="courseform" field="practice_id"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="requirement" class=" col-form-label">Course Requirement </label>
                                        <textarea v-model="courseform.requirement" type="text" name="requirement" placeholder="Course Requirement"
                                            class="form-control" :class="{ 'is-invalid': courseform.errors.has('requirement') }" >
                                        </textarea>
                                        <has-error style="color: #e83e8c" :form="courseform" field="requirement"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="what_to_learn" class=" col-form-label">What to Learn </label>
                                        <textarea v-model="courseform.what_to_learn" type="text" name="what_to_learn" placeholder="What to Learn"
                                            class="form-control" :class="{ 'is-invalid': courseform.errors.has('what_to_learn') }" >
                                        </textarea>
                                        <has-error style="color: #e83e8c" :form="courseform" field="what_to_learn"></has-error>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="what_to_achieve" class=" col-form-label">What to Achieve</label>
                                        <textarea v-model="courseform.what_to_achieve" type="text" name="what_to_achieve" placeholder="What to Achieve"
                                            class="form-control" :class="{ 'is-invalid': courseform.errors.has('what_to_achieve') }" >
                                        </textarea>
                                        <has-error style="color: #e83e8c" :form="courseform" field="what_to_achieve"></has-error>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
    export default {
        name:"Courses",
        data(){
            return{
                courseform: new Form({
                        id:'',
                        name:'',
                        image:'',
                        brief:'',
                        start_date:'', //standard
                        //regular
                        regular_duration:'',  //automatic after selection of end date
                        regular_end_date:'',
                        regular_fee:'',
                        //partitime
                        parttime_duration:'',
                        parttime_end_date:'',
                        parttime_fee:'',

                        course_school_id:'',
                        course_skill_id:'',
                        course_duration_id:'',
                        course_availability_id:'',
                        course_subject_id:'',
                        course_type_id:'',
                        course_accessibility_id:'',
                        course_feature_id:'',
                        course_language_id:'',

                        //syllabus
                        requirement:'',
                        practice_id:'',
                        lessons:'',
                        hours:'',
                        what_to_learn:'',
                        what_to_achieve:'',
                }),
           }
        },
        mounted(){
            this.loadDurations(); //from methods
            this.loadEducations(); //from methods
            this.loadAccessibilities(); //from methods
            this.loadAvailabilities(); //from methods
            this.loadLanguages(); //from methods
            this.loadSchools(); //from methods
            this.loadSubjects(); //from methods
            this.loadTypes(); //from methods
            this.loadSkills(); //from methods
            this.loadCourseFeatures(); //from methods
            this.loadPractices(); //from methods
            this.loadCourses(); //from methods
            this.loadOrganisation(); //from methods
        },
        computed:{
            Organisation(){
               return this.$store.getters.Organisation
            },
            Courses(){
               return this.$store.getters.Courses
            },
            Educations(){
               return this.$store.getters.Educations
            },
            Durations(){
               return this.$store.getters.Durations
            },
            Accessibilities(){
               return this.$store.getters.Accessibilities
            },
            Availabilities(){
               return this.$store.getters.Availabilities
            },
            Languages(){
               return this.$store.getters.Languages
            },
            Schools(){
               return this.$store.getters.Schools
            },
            Subjects(){
               return this.$store.getters.Subjects
            },
            Types(){
               return this.$store.getters.Types
            },
            Skills(){
               return this.$store.getters.Skills
            },
            Features(){
               return this.$store.getters.CourseFeatures
            },
            Practices(){
               return this.$store.getters.Practices
            },

        },
        methods:{
            loadOrganisation(){
                return this.$store.dispatch("organisation")
            },
            loadCourses(){
                return this.$store.dispatch("courses")
            },
            loadGenders(){
               return this.$store.dispatch("genders")
            },
            loadEducations(){
               return this.$store.dispatch("educations")
            },
            loadDurations(){
               return this.$store.dispatch("durations")
            },
            loadAccessibilities(){
               return this.$store.dispatch("accessibilities")
            },
            loadAvailabilities(){
               return this.$store.dispatch("availabilities")
            },
            loadLanguages(){
               return this.$store.dispatch("languages")
            },
            loadSchools(){
               return this.$store.dispatch("schools")
            },
            loadSubjects(){
               return this.$store.dispatch("subjects")
            },
            loadTypes(){
               return this.$store.dispatch("types")
            },
            loadSkills(){
               return this.$store.dispatch("skills")
            },
            loadCourseFeatures(){
               return this.$store.dispatch("coursefeatures")
            },
            loadPractices(){
               return this.$store.dispatch("practices")
            },

             //course
            newCourseModal(){
                 this.courseform.reset()
                     $('#CourseModal').modal('show')
            },
                        //course course passposrt image
            courseLoadImage(course_image){
                if(course_image){
                    return "/assets/organisation/img/courses/"+course_image;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            courseChangeImage(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.courseform.image =event.target.result
                            };
                        reader.readAsDataURL(file);
                }
            },

            addCourse() {
                this.$Progress.start();
                this.courseform.patch('/course/')
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Course Created successfully'
                            })
                            this.$store.dispatch('courses');
                            $('#CourseModal').modal('hide')
                             this.courseform.reset()
                             this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#CourseModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            ActivateCourse(id) {
                console.log(id)
                this.$Progress.start();
                axios.post('/course/activate/'+id)
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Course Acitvated successfully'
                            })
                            this.$store.dispatch('courses');
                            this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                        toast({
                            type: 'error',
                            title: 'There was something wrong.'
                        })
                    })
            },
            DeactivateCourse(id) {
                console.log(id)
                this.$Progress.start();
                axios.post('/course/deactivate/'+id)
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                        type: 'success',
                        title: 'Course Deacitvated successfully'
                        })
                        this.$store.dispatch('courses');
                        this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                        toast({
                            type: 'error',
                            title: 'There was something wrong.'
                        })
                    })
            },
            deleteCourse(id){
                Swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.value) {
                    //  console.log('delete course', id)
                        this.$Progress.start();
                        this.courseform.get('/course/delete/'+id)
                            .then(()=>{
                            toast({
                            type: 'success',
                            title: 'Course Deleted successfully'
                            })
                            this.$store.dispatch("courseByUserID")
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
                     }
                })
            },


        },

    }
</script>

