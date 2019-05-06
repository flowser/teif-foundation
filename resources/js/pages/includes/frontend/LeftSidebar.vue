<template>
  <div id="leftsidebar">
     <div class="left-sidebar">
        <h2>Categoriess</h2>
            <aside class="widget widget_categories" style="padding-left: 5px; padding-top: 1px; padding-right: 5px;margin-bottom: 5px;">
                <div class="col-md-12 col-xs-6 col-sm-6" style="padding-right: 5px;padding-left: 5px;">
                    <label>Duration </label><br>
                    <el-select
                        v-model="filterform.duration_id"
                            multiple
                            filterable

                            placeholder="Select Duration"
                            @change="remoteMethod"
                            :loading="loading">
                        <el-option

                        v-for="duration in Durations" :key="duration.id"
                        v-show="duration.courses.length"
                        :label="duration.name"
                        :value="duration.id"> {{duration.name}} ({{duration.courses.length}})
                        </el-option>
                    </el-select>
                </div>
                <div class="col-md-12 col-xs-6 col-sm-6" style="padding-right: 5px;padding-left: 5px;">
                    <label>Skill </label><br>
                    <el-select
                        v-model="filterform.skill_id"
                            multiple
                            filterable
                            placeholder="Select Skill"
                            @change="remoteMethod"
                            :loading="loading">
                        <el-option
                        v-for="skill in Skills" :key="skill.id"
                        v-show="skill.courses.length"
                        :label="skill.name"
                        :value="skill.id">{{skill.name}} ({{skill.courses.length}})
                        </el-option>
                    </el-select>
                </div>
                <div class="col-md-12 col-xs-6 col-sm-6" style="padding-right: 5px;padding-left: 5px;">
                    <label>School </label><br>
                    <el-select
                        v-model="filterform.school_id"
                            multiple
                            filterable

                            placeholder="Select School"
                            @change="remoteMethod"
                            :loading="loading">
                        <el-option
                        v-for="school in Schools" :key="school.id"
                        v-show="school.courses.length"
                        :label="school.name"
                        :value="school.id">{{school.name}} ({{school.courses.length}})
                        </el-option>
                    </el-select>
                </div>
                <div class="col-md-12 col-xs-6 col-sm-6" style="padding-right: 5px;padding-left: 5px;">
                    <label>Type </label><br>
                    <el-select
                        v-model="filterform.type_id"
                            multiple
                            filterable

                            placeholder="Select Type"
                            @change="remoteMethod"
                            :loading="loading">
                        <el-option
                        v-for="Type in Types" :key="Type.id"
                        v-show="Type.courses.length"
                        :label="Type.name"
                        :value="Type.id">{{Type.name}} ({{Type.courses.length}})
                        </el-option>
                    </el-select>
                </div>
                <div class="col-md-12 col-xs-6 col-sm-6" style="padding-right: 5px;padding-left: 5px;">
                    <label>Subject </label><br>
                    <el-select
                        v-model="filterform.subject_id"
                            multiple
                            filterable

                            placeholder="Select Subject"
                            @change="remoteMethod"
                            :loading="loading">
                        <el-option
                        v-for="subject in Subjects" :key="subject.id"
                        v-show="subject.courses.length"
                        :label="subject.name"
                        :value="subject.id">{{subject.name}} ({{subject.courses.length}})
                        </el-option>
                    </el-select>
                </div>
                <div class="col-md-12 col-xs-6 col-sm-6" style="padding-right: 5px;padding-left: 5px;">
                    <label>Feature </label><br>
                    <el-select
                        v-model="filterform.feature_id"
                            multiple
                            filterable

                            placeholder="Select Feature"
                            @change="remoteMethod"
                            :loading="loading">
                        <el-option
                        v-for="feature in Features" :key="feature.id"
                        v-show="feature.courses.length"
                        :label="feature.name"
                        :value="feature.id">{{feature.name}} ({{feature.courses.length}})
                        </el-option>
                    </el-select>
                </div>
                <div class="col-md-12 col-xs-6 col-sm-6" style="padding-right: 5px;padding-left: 5px;">
                    <label>Availability </label><br>
                    <el-select
                        v-model="filterform.availability_id"
                            multiple
                            filterable

                            placeholder="Select Availability"
                            @change="remoteMethod"
                            :loading="loading">
                        <el-option
                        v-for="availability in Availabilities" :key="availability.id"
                        v-show="availability.courses.length"
                        :label="availability.name"
                        :value="availability.id">{{availability.name}} ({{availability.courses.length}})
                        </el-option>
                    </el-select>
                </div>
                <div class="col-md-12 col-xs-6 col-sm-6" style="padding-right: 5px;padding-left: 5px;">
                    <label>Accessibility </label><br>
                    <el-select
                        v-model="filterform.accessibility_id"
                            multiple
                            filterable

                            placeholder="Select Accessibility"
                            @change="remoteMethod"
                            :loading="loading">
                        <el-option
                        v-for="accessibility in Accessibilities" :key="accessibility.id"
                        v-show="accessibility.courses.length"
                        :label="accessibility.name"
                        :value="accessibility.id">{{accessibility.name}} ({{accessibility.courses.length}})
                        </el-option>
                    </el-select>
                </div>
                <div class="col-md-12 col-xs-6 col-sm-6" style="padding-right: 5px;padding-left: 5px;">
                    <label>Language </label><br>
                    <el-select
                        v-model="filterform.language_id"
                            multiple
                            filterable

                            placeholder="Select Language"
                            @change="remoteMethod"
                            :loading="loading">
                        <el-option
                        v-for="language in Languages" :key="language.id"
                        v-show="language.courses.length"
                        :label="language.name"
                        :value="language.id">{{language.name}} ({{language.courses.length}})
                        </el-option>
                    </el-select>
                </div>
                <hr class="col-md-12 col-xs-12 col-sm-12" style="padding-right: 0px;padding-left: 0px;">
			</aside>

    </div>
  </div>
</template>

<script>
    export default {
        name:"Leftsidebar",
        data(){
            return{
                dynamicTags: ['Tag 1', 'Tag 2', 'Tag 3'],
                inputVisible: false,
                inputValue: '',
                loading: false,
                filterform: new Form({
                        school_id:'',
                        skill_id:'',
                        duration_id:'',
                        availability_id:'',
                        subject_id:'',
                        type_id:'',
                        accessibility_id:'',
                        feature_id:'',
                        language_id:'',
                        //syllabus
                        practice_id:'',
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
            // this.loadCourses(); //from methods
        },
        computed:{
            // Courses(){
            //     return this.$store.getters.Courses
            // },
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
            // loadCourses(){
            //     return this.$store.dispatch("courses")
            // },
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
            courseLoadImage(course_image){
                if(course_image){
                    return "/assets/organisation/img/courses/"+course_image;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            remoteMethod(query) {
                // console.log(this.filterform)
                this.$Progress.start()
                this.$store.dispatch("CoursesByFilter", this.filterform)
                .then((response)=>{
                     toast({
                        type: 'success',
                        title: 'Course Filtration search has been successful'
                        })
                        //   this.filterform.reset()
                          this.$Progress.finish()
                })
                .catch(()=>{
                    this.$Progress.fail()
                    toast({
                        type: 'error',
                        title: 'Course Filtration search was not successful, change your Filters.'
                    })
                })
                // var vm = this
                // if (query !== '') {
                //     axios.get('/api/search?search=' + query).then(function (query) {
                //         vm.options4 = query.data.map(item => {
                //             return {value: item.id, label: item.name};
                //         })
                //     })
                // } else {
                //     vm.options4 = [];
                // }
            },
        },
    }
</script>


