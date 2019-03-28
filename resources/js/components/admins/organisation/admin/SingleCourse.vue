<template>
    <!-- Main content -->
    <section class="content">
            <div class="card card-widget widget-user" >
              <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white" style="background: url('assets/organisation/img/background/background-1.jpg')
                     center center;width:100%;height:300px">
                    <div class="clearfix">
                        <span class="float-left">
                            <h3 class="widget-user-username" >{{Course.name}}</h3>
                            <!-- {{Course}} -->
                        </span>
                        <span class="float-right">
                            <p style="margin-bottom:0.25em">
                                <small class="text-muted">Last updated On: {{Course.updated_at | dateformat}}</small>
                            </p>
                        </span>
                    </div>
                </div>
                <div class="widget-user-image" style="top:27px;left: 40%;">
                    <img :src="courseLoadImage(Course.image)"  class="border-0"  style="width:340px;">
                    <h3 class="card-title text-center text-white" >{{Course.name}}</h3>
                </div>
            </div>
            <div class="container-fluid">
                    <div class="row">
                        <div class="card col-md">
                            <div class="card-header">
                               <h3 class="card-title">Course Data</h3>
                            </div>
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col" style="padding: 3px;">
                                        <img class="card-img-top" :src="courseLoadImage(Course.image)" style="width:100%; height:130px" alt="Card image cap">
                                    </div>
                                    <div class="col" style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                        <div >{{Course.name}},</div>
                                        <div>
                                            Start Date: <span style="color:#9a009a;">{{Course.start_date | dateformat}},</span>
                                        </div>
                                        <div>
                                              Brief: <span style="color:#9a009a;">{{Course.brief}},</span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                     <div class="col">
                                         <h3> Regular Course</h3>
                                         <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                           <div>
                                                Regular End Date: <span style="color:#9a009a;">{{Course.regular_end_date | dateformat}},</span>
                                            </div>
                                           <div>
                                               Regular Duration: <span style="color:#9a009a;">{{Course.regular_duration}} days,</span>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="col">
                                          <h3> Part Time Course</h3>
                                         <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                            <div>
                                                Part-time Date: <span style="color:#9a009a;">{{Course.parttime_end_date | dateformat}},</span>
                                            </div>
                                            <div>
                                               Part Time Duration: <span style="color:#9a009a;">{{Course.regular_duration}} days,</span>
                                            </div>
                                            <div class="clearfix" style="font-weight:bold;font-size:0.9em;">
                                                <span class="float-left" style="margin-bottom:-0.5em" >
                                                    <div style="margin-bottom:0.25em"> Updated at:
                                                        <span style="color:#9a009a;">{{Course.updated_at | dateformat}} </span>
                                                    </div>
                                                </span>
                                                <span class="float-right">
                                                    <a href=""  @click.prevent="editCourseModal(Course.id)">
                                                        <i class="fa fa-edit blue"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md">
                            <div class="card-header">
                               <h3 class="card-title">Course Syllabus</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                     <div class="col">
                                         <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                            <div>
                                                Practice: <span style="color:#9a009a;" v-if="(Course.coursesyllabus)">{{Course.coursesyllabus.practice_name}},</span>
                                            </div>
                                            <div>
                                                Lessons: <span style="color:#9a009a;" v-if="(Course.coursesyllabus)">{{Course.coursesyllabus.lessons}} lessons,</span>
                                            </div>
                                            <div>
                                                Hours: <span style="color:#9a009a;" v-if="(Course.coursesyllabus)">{{Course.coursesyllabus.hours}} hrs,</span>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="col">
                                         <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                            <div>
                                                Requirement: <span style="color:#9a009a;" v-if="(Course.coursesyllabus)">{{Course.coursesyllabus.requirement}},</span>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="row">
                                     <div class="col">
                                         <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                            <div>
                                                What To Learn: <span style="color:#9a009a;" v-if="(Course.coursesyllabus)">{{Course.coursesyllabus.what_to_learn}},</span>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="col">
                                         <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                            <div>
                                                What to Achieve: <span style="color:#9a009a;" v-if="(Course.coursesyllabus)">{{Course.coursesyllabus.what_to_achieve}},</span>
                                            </div>
                                        </div>
                                        <div class="clearfix" style="font-weight:bold;font-size:0.9em;">
                                            <span class="float-left" style="margin-bottom:-0.5em" >
                                                <div style="margin-bottom:0.25em"> Updated at:
                                                    <span style="color:#9a009a;" v-if="(Course.coursesyllabus)">{{Course.coursesyllabus.updated_at | dateformat}} </span>
                                                </div>
                                            </span>
                                            <span class="float-right">
                                                <a href=""  @click.prevent="editSyllabusModal(Course.coursesyllabus.id)">
                                                    <i class="fa fa-edit blue"></i>
                                                </a>
                                            </span>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <!-- edit Course modal -->
    <div class="modal fade " id="CourseModal" tabindex="-1" role="dialog" aria-labelledby="CourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4> Course Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="updateCourse(courseform.id)" >
                        <div class="modal-body">
                            <h5 class="modal-title" id="CourseModalLabel">Update Course</h5>
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
                                               <img  :src="updateCourseImage(courseform.image)" alt="" width="100%" >
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
                                    <div class="form-group col-md-12">
                                        <label for="what_to_learn" class=" col-form-label">What to Learn </label>
                                        <textarea v-model="courseform.what_to_learn" type="text" name="what_to_learn" placeholder="What to Learn"
                                            class="form-control" :class="{ 'is-invalid': courseform.errors.has('what_to_learn') }" >
                                        </textarea>
                                        <has-error style="color: #e83e8c" :form="courseform" field="what_to_learn"></has-error>
                                    </div>
                                    <div class="form-group col-md-12">
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
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- syllabus modal -->
    <div class="modal fade " id="SyllabusModal" tabindex="-1" role="dialog" aria-labelledby="SyllabusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4> Syllabus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="updateSyllabus(syllabusform.id)" >
                        <div class="modal-body">
                            <h5 class="modal-title" id="SyllabusModalLabel">Update Syllabus</h5>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="lessons" class=" col-form-label">Number of Lessons </label>
                                        <input v-model="syllabusform.lessons" type="text" name="lessons" placeholder="Number of Lessons"
                                            class="form-control" :class="{ 'is-invalid': syllabusform.errors.has('lessons') }" >
                                        <has-error style="color: #e83e8c" :form="syllabusform" field="lessons"></has-error>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="hours" class=" col-form-label">Credit Hours </label>
                                        <input v-model="syllabusform.hours" type="text" name="hours" placeholder="Credit Hours"
                                            class="form-control" :class="{ 'is-invalid': syllabusform.errors.has('hours') }" >
                                        <has-error style="color: #e83e8c" :form="syllabusform" field="hours"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="practice_id">Select Practice</label>
                                        <select class="form-control" v-model="syllabusform.practice_id"
                                                :class="{ 'is-invalid': syllabusform.errors.has('practice_id') }">
                                                <option disabled value="">Select Practice</option>
                                                <option v-for="practice in Practices" :value="practice.id" :key="practice.id">{{practice.name}}</option>
                                        </select>
                                        <has-error style="color: #e83e8c" :form="syllabusform" field="practice_id"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="requirement" class=" col-form-label">Syllabus Requirement </label>
                                        <textarea v-model="syllabusform.requirement" type="text" name="requirement" placeholder="Syllabus Requirement"
                                            class="form-control" :class="{ 'is-invalid': syllabusform.errors.has('requirement') }" >
                                        </textarea>
                                        <has-error style="color: #e83e8c" :form="syllabusform" field="requirement"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="what_to_learn" class=" col-form-label">What to Learn </label>
                                        <textarea v-model="syllabusform.what_to_learn" type="text" name="what_to_learn" placeholder="What to Learn"
                                            class="form-control" :class="{ 'is-invalid': syllabusform.errors.has('what_to_learn') }" >
                                        </textarea>
                                        <has-error style="color: #e83e8c" :form="syllabusform" field="what_to_learn"></has-error>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="what_to_achieve" class=" col-form-label">What to Achieve</label>
                                        <textarea v-model="syllabusform.what_to_achieve" type="text" name="what_to_achieve" placeholder="What to Achieve"
                                            class="form-control" :class="{ 'is-invalid': syllabusform.errors.has('what_to_achieve') }" >
                                        </textarea>
                                        <has-error style="color: #e83e8c" :form="syllabusform" field="what_to_achieve"></has-error>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>




    </section>
    <!-- /.content -->
</template>

<script>
    export default {
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
                        coursesyllabus_id:'',
                        course_id:'',
                        requirement:'',
                        practice_id:'',
                        lessons:'',
                        hours:'',
                        what_to_learn:'',
                        what_to_achieve:'',
                }),
                syllabusform: new Form({
                    //syllabus
                        id:'',
                        course_id:'',
                        requirement:'',
                        practice_id:'',
                        lessons:'',
                        hours:'',
                        what_to_learn:'',
                        what_to_achieve:'',
                }),
            }
        },
        mounted() {
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
            this.loadOrganisation(); //from methods
            this.singlecourse()
        },
        computed:{
            Organisation(){
               return this.$store.getters.Organisation
            },
            Course(){
                console.log(this.$store.getters.Course)
               return this.$store.getters.Course
            },
            Relationships(){
               return this.$store.getters.Relationships
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
            singlecourse(){
                console.log(this.$route.params.id, 'jjjjj')
                this.$store.dispatch('CourseById', this.$route.params.id);
            },
            loadOrganisation(){
                return this.$store.dispatch("organisation")
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
            updateCourseImage(course_image){
                        let img = this.courseform.image;
                            if(img.length>100){
                                    return this.courseform.image;
                                }else{
                                    if(course_image){
                                        return "assets/organisation/img/courses/"+course_image;
                                    }else{
                                        return "/assets/organisation/img/website/empty.png";
                                    }
                                }
                    },

            editCourseModal(id){
                console.log(id)
                 this.courseform.reset()
                    this.$Progress.start();
                      axios.get('/course/edit/'+id)
                        .then((response)=>{
                           $('#CourseModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Course data successfully'
                            })
                            console.log(response.data.course.coursesyllabus)
                            this.courseform.fill(response.data.course)
                            this.courseform.id = response.data.course.id
                            this.courseform.coursesyllabus_id  = response.data.course.coursesyllabus.id
                            this.courseform.requirement        = response.data.course.coursesyllabus.requirement
                            this.courseform.course_id          = response.data.course.coursesyllabus.course_id
                            this.courseform.practice_id        = response.data.course.coursesyllabus.practice_id
                            this.courseform.lessons            = response.data.course.coursesyllabus.lessons
                            this.courseform.hours              = response.data.course.coursesyllabus.hours
                            this.courseform.what_to_learn      = response.data.course.coursesyllabus.what_to_learn
                            this.courseform.what_to_achieve    = response.data.course.coursesyllabus.what_to_achieve
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#CourseModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })
            },
            updateCourse(id){
                  console.log(id)
                  this.$Progress.start();
                     this.courseform.patch('/course/update/'+id)
                        .then(()=>{
                        this.$store.dispatch('CourseById', this.$route.params.id);
                        this.courseform.reset()
                         $('#CourseModal').modal('hide')

                         toast({
                            type: 'success',
                            title: 'Course Created successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            editSyllabusModal(id){
                console.log(id)
                 this.syllabusform.reset()
                    this.$Progress.start();
                      axios.get('/syllabus/edit/'+id)
                        .then((response)=>{
                           $('#SyllabusModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Syllabus data successfully'
                            })
                            console.log(response.data.syllabus)
                            this.syllabusform.fill(response.data.syllabus)
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#SyllabusModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })

            },
            updateSyllabus(id){
                  console.log(id)
                  console.log(+this.$route.params.id)
                  this.$Progress.start();
                     this.syllabusform.patch('/syllabus/update/'+id)
                        .then(()=>{
                        this.$store.dispatch('CourseById', this.$route.params.id);
                        this.syllabusform.reset()
                         $('#SyllabusModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'Syllabus Updated successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
        },
        watch:{
            $route(to, from){
                  this.singlecourse();//method
            }
        }
    }
</script>
