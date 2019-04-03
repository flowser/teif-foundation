<?php

namespace App\Http\Controllers\Backend\Course;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Standard\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\Course\Syllabus\CourseSyllabus;

class CourseController extends Controller
{
    public function index()
    {
          $courses = Course::with(
            'coursesyllabus',
            // 'reviews',
            'accessibility',
            'skill',
            'school',
            'duration',
            'availability',
            'subject',
            'type',
            'feature',
            'language'
          )->get();
        //   )->paginate(6);
            return response()-> json([
                 'courses' => $courses,
            ], 200);


    }


    // detailed filtration
    public function filter(Request $request)
    {
        
        $courses = Course::with(
                'coursesyllabus',
                // 'reviews',
                'accessibility',
                'skill',
                'school',
                'duration',
                'availability',
                'subject',
                'type',
                'feature',
                'language'
                )->filter($request)->get();
            return response()-> json([
                'courses' => $courses,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  =>'required',
            'image'  =>'required',
            'brief'  =>'required',
            'start_date'  =>'required', //standard
            //regular
            'regular_end_date'  =>'required',
            'regular_fee'  =>'required',
            //partitime

            'parttime_end_date'  =>'required',
            'parttime_fee'  =>'required',

            'course_school_id'  =>'required',
            'course_skill_id'  =>'required',
            'course_duration_id'  =>'required',
            'course_availability_id'  =>'required',
            'course_subject_id'  =>'required',
            'course_type_id'  =>'required',
            'course_accessibility_id'  =>'required',
            'course_feature_id'  =>'required',
            'course_language_id'  =>'required',

            //syllabus
            'requirement'  =>'required',
            'practice_id'  =>'required',
            'lessons'  =>'required',
            'hours'  =>'required',
            'what_to_learn'  =>'required',
            'what_to_achieve'  =>'required',
          ]);


                $image = $request->image;
                     //processing passport name
                     $strpos = strpos($image, ';'); //positionof image name semicolon
                     $sub = substr($image, 0, $strpos);
                     $ex = explode('/', $sub)[1];
                     $name = time().".".$ex;

                     $Path = public_path()."/assets/organisation/img/courses";
                         $img = Image::make($image);
                         $img ->save($Path.'/'.$name);
                     //end processing
                $course_image= $name;
                //saving image
                //days calculation
                $start_date= Carbon::parse($request->input('start_date'));
                $regular_end_date = Carbon::parse($request->input('regular_end_date'));
                $parttime_end_date = Carbon::parse($request->input('parttime_end_date'));

                $regular_duration = $start_date->diffInDaysFiltered(function(Carbon $date)
                        {
                            return !$date->isWeekend();
                        }, $regular_end_date) +1;

                $parttime_duration = $start_date->diffInDaysFiltered(function(Carbon $date)
                        {
                            return !$date->isWeekend();
                        }, $parttime_end_date) +1;
               //days calculation

                $course = new Course();
                $course->name                    = $request->name;
                $course ->active                 = true;
                $course->image                   = $course_image;
                $course->brief                   = $request->brief;

                $course->start_date              = $start_date; //standard
                // regular
                //regular duration
                $course->regular_duration        = $regular_duration;  //number of days
                $course->regular_end_date        = $regular_end_date;
                $course->regular_fee             = $request->regular_fee;
                //parttime

                $course->parttime_duration       = $parttime_duration;
                $course->parttime_end_date       = $parttime_end_date;
                $course->parttime_fee            = $request->parttime_fee;

                //course categories
                $course->course_school_id        = $request->course_school_id;
                $course->course_skill_id         = $request->course_skill_id;
                $course->course_duration_id      = $request->course_duration_id;
                $course->course_availability_id  = $request->course_availability_id;
                $course->course_subject_id       = $request->course_subject_id;
                $course->course_type_id          = $request->course_type_id;
                $course->course_accessibility_id = $request->course_accessibility_id;
                $course->course_feature_id       = $request->course_feature_id;
                $course->course_language_id      = $request->course_language_id;
                $course->save();

                //syllabus
                if($course){
                    $syllabus = new CourseSyllabus();
                    $syllabus->course_id         = $course->id;
                    $syllabus->requirement       = $request->requirement;
                    $syllabus->practice_id       = $request->practice_id;
                    $syllabus->lessons           = $request->lessons;
                    $syllabus->hours             = $request->hours;
                    $syllabus->what_to_learn     = $request->what_to_learn;
                    $syllabus->what_to_achieve   = $request->what_to_achieve;
                    $syllabus->save();
                }
    }

    public function activate($id)
    {
        $course = Course:: find($id);
        $course->active = true;
        $course->save();
        return response()-> json([
            'course'=>$course,
        ], 200);
    }
    public function deactivate($id)
    {
        $course = Course:: find($id);
        $course->active = false;
        $course->save();
        return response()-> json([
            'course'=>$course,
        ], 200);
    }

    public function show($id)
    {
        $course = Course::with(
            'coursesyllabus',

            'accessibility',
            'skill',
            'school',
            'duration',
            'availability',
            'subject',
            'type',
            'feature',
            'language',
            'coursesyllabus',
            'reviews'
          )->find($id);
        return response()-> json([
            'course'=>$course,
        ], 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $course = Course::with(
            'coursesyllabus',
            'reviews',
            'accessibility',
            'skill',
            'school',
            'duration',
            'availability',
            'subject',
            'type',
            'feature',
            'language'
          )->find($id);
        return response()-> json([
            'course'=>$course,
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

       //image
        //getting previous photo
        $currentImage = $course->image;
        // return $currentImage;
        //processing image nme and size
        if($request->image != $currentImage){
            $Path = public_path()."/assets/organisation/img/courses/";
            $S_currentImage = $Path. $currentImage;
            //deleting if exists
                if(file_exists($S_currentImage)){
                    @unlink($S_currentImage);
                }
                $image = $request->image;

                $strpos = strpos($image, ';'); //positionof image name semicolon
                $sub = substr($image, 0, $strpos);
                $ex = explode('/', $sub)[1];
                $name = time().".".$ex;

                $img = Image::make($image);
                $img ->save($Path.'/'.$name);
            //end processing
            $course_image= $name;
        }else{
            $course_image = $course->image;
        }
        //days calculation
        $start_date= Carbon::parse($request->input('start_date'));
        $regular_end_date = Carbon::parse($request->input('regular_end_date'));
        $parttime_end_date = Carbon::parse($request->input('parttime_end_date'));

        $regular_duration = $start_date->diffInDaysFiltered(function(Carbon $date)
                {
                    return !$date->isWeekend();
                }, $regular_end_date) +1;

        $parttime_duration = $start_date->diffInDaysFiltered(function(Carbon $date)
                {
                    return !$date->isWeekend();
                }, $parttime_end_date) +1;
       //days calculation


        $course->name                    = $request->name;
        $course ->active                 = true;
        $course->image                   = $course_image;
        $course->brief                   = $request->brief;

        $course->start_date              = $start_date; //standard
        // regular
        //regular duration
        $course->regular_duration        = $regular_duration;  //number of days
        $course->regular_end_date        = $regular_end_date;
        $course->regular_fee             = $request->regular_fee;
        //parttime

        $course->parttime_duration       = $parttime_duration;
        $course->parttime_end_date       = $parttime_end_date;
        $course->parttime_fee            = $request->parttime_fee;

        //course categories
        $course->course_school_id        = $request->course_school_id;
        $course->course_skill_id         = $request->course_skill_id;
        $course->course_duration_id      = $request->course_duration_id;
        $course->course_availability_id  = $request->course_availability_id;
        $course->course_subject_id       = $request->course_subject_id;
        $course->course_type_id          = $request->course_type_id;
        $course->course_accessibility_id = $request->course_accessibility_id;
        $course->course_feature_id       = $request->course_feature_id;
        $course->course_language_id      = $request->course_language_id;
        $course->save();

        //syllabus
        if($course){
            $syllabus = CourseSyllabus::find($request->coursesyllabus_id);
            $syllabus->requirement       = $request->requirement;
            $syllabus->practice_id       = $request->practice_id;
            $syllabus->lessons           = $request->lessons;
            $syllabus->hours             = $request->hours;
            $syllabus->what_to_learn     = $request->what_to_learn;
            $syllabus->what_to_achieve   = $request->what_to_achieve;
            $syllabus->save();
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user){

             $currentPassport = $user->bureaucourses()->first()->pivot->photo;
            //  ->photo;
                 $ps_Path = public_path()."/assets/bureau/img/courses/passports/";
                 $S_currentPassport = $ps_Path. $currentPassport;
                     if(file_exists($S_currentPassport)){
                         @unlink($S_currentPassport);
                     }

            $course = Course::where('user_id', $user->id)->first();
            //front side id

            if($course){

                $idstatus = $course->idstatuses()->first();
                if($idstatus){
                    $currentFrontside_id = $course->idstatuses()->first()->id_photo_front;

                    if($currentFrontside_id !=null){
                        $fr_id_Path = public_path()."/assets/bureau/img/courses/IDs/front/";
                        $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;
                        if(file_exists($S_currentFrontside_id)){
                            @unlink($S_currentFrontside_id);
                        }
                    }

                //backside id
                    $currentBackside_id = $course->idstatuses()->first()->id_photo_back;
                    if($currentBackside_id !=null){
                        $bs_id_Path = public_path()."/assets/bureau/img/courses/IDs/back/";
                        $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                            if(file_exists($S_currentBackside_id)){
                                @unlink($S_currentBackside_id);
                            }
                    }
                    //wating card photo
                    $currentWaitingCard = $course->idstatuses()->first()->waiting_card_photo;
                    if($currentWaitingCard !=null){
                        $waitingcard_Path = public_path()."/assets/bureau/img/courses/waitingcards/";
                        $S_currentWaitingCard = $waitingcard_Path. $currentWaitingCard;
                            if(file_exists($S_currentWaitingCard)){
                                @unlink($S_currentWaitingCard);
                            }
                    }
                   $idstatus->delete();
                }

                $healthstatus = $course->healthstatuses()->first();
                if($healthstatus != null){
                    $healthstatus->delete();
                }
                $coursekin = $course->coursekins()->first();
                    if($coursekin != null){
                        $currentPassport = $coursekin->pivot->photo;
                        $ps_Path = public_path()."/assets/bureau/img/courses/coursekins/passports/";
                        $S_currentPassport = $ps_Path. $currentPassport;
                            if(file_exists($S_currentPassport)){
                                @unlink($S_currentPassport);
                            }
                        $currentFrontside_id = $coursekin->pivot->id_photo_front;
                        $fr_id_Path = public_path()."/assets/bureau/img/courses/coursekins/IDs/front/";
                        $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;
                            if(file_exists($S_currentFrontside_id)){
                                @unlink($S_currentFrontside_id);
                            }
                    //backside id
                        $currentBackside_id = $coursekin->pivot->id_photo_back;
                        $bs_id_Path = public_path()."/assets/bureau/img/courses/coursekins/IDs/back/";
                        $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                            if(file_exists($S_currentBackside_id)){
                                @unlink($S_currentBackside_id);
                            }
                    }
                $coursekin->delete();
                $userkin = User::find($coursekin->user_id);
                $userkin->delete();
            }
            $course->delete();
        $user->delete();
        }
    }
}



