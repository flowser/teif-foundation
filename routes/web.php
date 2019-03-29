<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\PublicController;
use App\Http\Controllers\Backend\Client\ClientController;
use App\Http\Controllers\Backend\Course\CourseController;
use App\Http\Controllers\Backend\Standard\WardController;
use App\Http\Controllers\Backend\Webpage\AboutController;
use App\Http\Controllers\Backend\Webpage\AdvertController;
use App\Http\Controllers\Backend\Standard\CountyController;
use App\Http\Controllers\Backend\Standard\GenderController;
use App\Http\Controllers\Backend\Webpage\FeatureController;
use App\Http\Controllers\Backend\Webpage\ServiceController;
use App\Http\Controllers\Backend\Standard\CountryController;
use App\Http\Controllers\Backend\Organisation\RoleController;
use App\Http\Controllers\Backend\Organisation\UserController;
use App\Http\Controllers\Backend\Standard\PositionController;
use App\Http\Controllers\Backend\Client\standard\CartController;
use App\Http\Controllers\Backend\Course\Standard\TypeController;
use App\Http\Controllers\Backend\Webpage\ServiceModelController;
use App\Http\Controllers\Backend\Client\standard\OrderController;
use App\Http\Controllers\Backend\Course\Standard\SkillController;
use App\Http\Controllers\Backend\Organisation\OrgAdminController;
use App\Http\Controllers\Backend\Standard\ConstituencyController;
use App\Http\Controllers\Backend\Course\Standard\SchoolController;
use App\Http\Controllers\Backend\Course\Standard\SubjectController;
use App\Http\Controllers\Backend\Organisation\PermissionController;
use App\Http\Controllers\Backend\Course\Standard\DurationController;
use App\Http\Controllers\Backend\Course\Standard\LanguageController;
use App\Http\Controllers\Backend\Course\Syllabus\PracticeController;
use App\Http\Controllers\Backend\Course\Syllabus\SyllabusController;
use App\Http\Controllers\Backend\Organisation\OrgDirectorController;
use App\Http\Controllers\Backend\Organisation\OrgEmployeeController;
use App\Http\Controllers\Backend\Course\Standard\EducationController;
use App\Http\Controllers\Backend\Organisation\OrganisationController;
use App\Http\Controllers\Backend\Course\Standard\AvailabilityController;
use App\Http\Controllers\Backend\Course\Standard\AccessibilityController;
use App\Http\Controllers\Backend\Course\Standard\CourseFeatureController;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class, 'index'])->name('public.index');

// Route::get('/{anypath}', [PublicController::class, 'routes'])->where('path','[\/\w\.-]*');

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');

    //     /*
    //      * User CRUD
    //      */
        Route::get('user/get', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user', [UserController::class, 'store'])->name('user.store');

    //     /*
    //      * Specific User
    //      */

            Route::get('user/show/{user}', [UserController::class, 'show'])->name('user.show');
            Route::get('user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
            Route::patch('user/update/{user}', [UserController::class, 'update'])->name('user.update');
            Route::get('user/delete/{user}/', [UserController::class, 'destroy'])->name('user.destroy');

    Route::group(['namespace' => 'Permission'], function () {
        Route::get('permission-list', [PermissionController::class, 'index'])->name('permission.index');
        // Route::get('permission/create', [RoleController::class, 'create'])->name('permission.create');
        Route::post('add-permission', [PermissionController::class, 'store'])->name('permission.store');

        Route::group(['prefix' => 'permission'], function () {
            Route::get('/edit/{permission}', [PermissionController::class, 'edit'])->name('permission.edit');
            Route::patch('/update/{permission}', [PermissionController::class, 'update'])->name('permission.update');
            Route::get('/delete/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');
        });
    });
    /*
     * Role Management
     */
    Route::group(['namespace' => 'Role'], function () {
        Route::get('role-list', [RoleController::class, 'index'])->name('role.index');
        Route::post('add-role', [RoleController::class, 'store'])->name('role.store');

        Route::group(['prefix' => 'role'], function () {
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
            Route::patch('/update/{role}', [RoleController::class, 'update'])->name('role.update');
            Route::get('/delete/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
        });
    });
    /*
     * Country Management
     */
        Route::get('country/get', [CountryController::class, 'index'])->name('country.index');
        Route::post('country', [CountryController::class, 'store'])->name('country.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('country/show/{country}', [CountryController::class, 'show'])->name('country.show');
        Route::get('country/edit/{country}', [CountryController::class, 'edit'])->name('country.edit');
        Route::patch('country/update/{country}', [CountryController::class, 'update'])->name('country.update');
        Route::get('country/delete/{country}/', [CountryController::class, 'destroy'])->name('country.destroy');


        Route::get('county/get', [CountyController::class, 'index'])->name('county.index');
        Route::post('county', [CountyController::class, 'store'])->name('county.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('county/get/list/{county}', [CountyController::class, 'CountyList'])->name('county.list-index');//fetch county list bsedon country id
        Route::get('county/show/{county}', [CountyController::class, 'show'])->name('county.show');
        Route::get('county/edit/{county}', [CountyController::class, 'edit'])->name('county.edit');
        Route::patch('county/update/{county}', [CountyController::class, 'update'])->name('county.update');
        Route::get('county/delete/{county}/', [CountyController::class, 'destroy'])->name('county.destroy');

        //constituency
        Route::get('constituency/get', [ConstituencyController::class, 'index'])->name('constituency.index');
        Route::post('constituency', [ConstituencyController::class, 'store'])->name('constituency.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('constituency/get/list/{constituency}', [ConstituencyController::class, 'ConstituencyList'])->name('constituency.list-index');//fetch county list bsedon country id
        Route::get('constituency/show/{constituency}', [ConstituencyController::class, 'show'])->name('constituency.show');
        Route::get('constituency/edit/{constituency}', [ConstituencyController::class, 'edit'])->name('constituency.edit');
        Route::patch('constituency/update/{constituency}', [ConstituencyController::class, 'update'])->name('constituency.update');
        Route::get('constituency/delete/{constituency}/', [ConstituencyController::class, 'destroy'])->name('constituency.destroy');

//ward
        Route::get('ward/get', [WardController::class, 'index'])->name('ward.index');
        Route::get('ward/get/list/{ward}', [WardController::class, 'WardList'])->name('ward.list-index');
        Route::post('ward', [WardController::class, 'store'])->name('ward.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('ward/show/{ward}', [WardController::class, 'show'])->name('ward.show');
        Route::get('ward/edit/{ward}', [WardController::class, 'edit'])->name('ward.edit');
        Route::patch('ward/update/{ward}', [WardController::class, 'update'])->name('ward.update');
        Route::get('ward/delete/{ward}', [WardController::class, 'destroy'])->name('ward.destroy');

        //position
        Route::get('position/get', [PositionController::class, 'index'])->name('position.index');
        Route::get('position/get/list/{position}', [PositionController::class, 'PositionList'])->name('position.list-index');
        Route::post('position', [PositionController::class, 'store'])->name('position.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('position/show/{position}', [PositionController::class, 'show'])->name('position.show');
        Route::get('position/edit/{position}', [PositionController::class, 'edit'])->name('position.edit');
        Route::patch('position/update/{position}', [PositionController::class, 'update'])->name('position.update');
        Route::get('position/delete/{position}', [PositionController::class, 'destroy'])->name('position.destroy');


//gender
        Route::get('gender/get', [GenderController::class, 'index'])->name('gender.index');
        Route::get('gender/get/list/{gender}', [GenderController::class, 'GenderList'])->name('gender.list-index');
        Route::post('gender', [GenderController::class, 'store'])->name('gender.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('gender/show/{gender}', [GenderController::class, 'show'])->name('gender.show');
        Route::get('gender/edit/{gender}', [GenderController::class, 'edit'])->name('gender.edit');
        Route::patch('gender/update/{gender}', [GenderController::class, 'update'])->name('gender.update');
        Route::get('gender/delete/{gender}', [GenderController::class, 'destroy'])->name('gender.destroy');



        // organisation
        Route::get('organisation/get', [OrganisationController::class, 'index'])->name('organisation.index');
        Route::get('organisation/get/list', [OrganisationController::class, 'OrganisationList'])->name('organisation.list-index');
        Route::post('organisation/verify/info/', [OrganisationController::class, 'verifyOrganisationInfo'])->name('organisation.verify');
        Route::post('organisation/verify/director/', [OrganisationController::class, 'verifyDirectorInfo'])->name('organisation.verifydirector');
        Route::post('organisation', [OrganisationController::class, 'store'])->name('organisation.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('organisation/show/{organisation}', [OrganisationController::class, 'show'])->name('organisation.show');
        Route::get('organisation/edit/{organisation}', [OrganisationController::class, 'edit'])->name('organisation.edit');
        Route::patch('organisation/updateverify/info/{organisation}', [OrganisationController::class, 'updateverifyOrganisationInfo'])->name('organisation.updateverify');
        Route::patch('organisation/updateverify/director/{organisation}', [OrganisationController::class, 'updateverifyDirectorInfo'])->name('organisation.updateverifydirector');
        Route::patch('organisation/update/{organisation}', [OrganisationController::class, 'update'])->name('organisation.update');
        Route::get('organisation/delete/{organisation}', [OrganisationController::class, 'destroy'])->name('organisation.destroy');

        // orgdirector
        Route::get('orgdirector/get', [OrgDirectorController::class, 'index'])->name('orgdirector.index');
        Route::get('orgdirectors/get', [OrgDirectorController::class, 'organisations'])->name('orgdirector.organisations');
        Route::get('orgdirector/get/list', [OrgDirectorController::class, 'orgdirectorList'])->name('orgdirector.list-index');
        Route::post('orgdirector/verify/director/', [OrgDirectorController::class, 'verifyDirectorInfo'])->name('orgdirector.verifydirector');
        Route::patch('orgdirector/{orgdirector}', [OrgDirectorController::class, 'store'])->name('orgdirector.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('orgdirector/show/{orgdirector}', [OrgDirectorController::class, 'show'])->name('orgdirector.show');
        Route::get('orgdirector/edit/{orgdirector}', [OrgDirectorController::class, 'edit'])->name('orgdirector.edit');
        Route::patch('orgdirector/updateverify/director/{orgdirector}', [OrgDirectorController::class, 'updateverifyDirectorInfo'])->name('orgdirector.updateverifydirector');
        Route::patch('orgdirector/update/{orgdirector}', [OrgDirectorController::class, 'update'])->name('orgdirector.update');
        Route::get('orgdirector/delete/{orgdirector}/', [OrgDirectorController::class, 'destroy'])->name('orgdirector.destroy');

                // orgadmin
        Route::get('orgadmin/get', [OrgAdminController::class, 'index'])->name('orgadmin.index');
        Route::get('orgadmins/get', [OrgAdminController::class, 'organisations'])->name('orgadmin.organisations');
        Route::get('orgadmin/get/list', [OrgAdminController::class, 'orgadminList'])->name('orgadmin.list-index');
        Route::post('orgadmin/verify/admin/', [OrgAdminController::class, 'verifyAdminInfo'])->name('orgadmin.verifyadmin');
        Route::patch('orgadmin/{orgadmin}', [OrgAdminController::class, 'store'])->name('orgadmin.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('orgadmin/show/{orgadmin}', [OrgAdminController::class, 'show'])->name('orgadmin.show');
        Route::get('orgadmin/edit/{orgadmin}', [OrgAdminController::class, 'edit'])->name('orgadmin.edit');
        Route::patch('orgadmin/updateverify/admin/{orgadmin}', [OrgAdminController::class, 'updateverifyAdminInfo'])->name('orgadmin.updateverifyadmin');
        Route::patch('orgadmin/update/{orgadmin}', [OrgAdminController::class, 'update'])->name('orgadmin.update');
        Route::get('orgadmin/delete/{orgadmin}/', [OrgAdminController::class, 'destroy'])->name('orgadmin.destroy');

                // orgemployee
        Route::get('orgemployee/get', [OrgEmployeeController::class, 'index'])->name('orgemployee.index');
        Route::get('orgemployees/get', [OrgEmployeeController::class, 'organisations'])->name('orgemployee.organisations');
        Route::get('orgemployee/get/list', [OrgEmployeeController::class, 'orgemployeeList'])->name('orgemployee.list-index');
        Route::post('orgemployee/verify/employee/', [OrgEmployeeController::class, 'verifyEmployeeInfo'])->name('orgemployee.verifyemployee');
        Route::patch('orgemployee/{orgemployee}', [OrgEmployeeController::class, 'store'])->name('orgemployee.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('orgemployee/show/{orgemployee}', [OrgEmployeeController::class, 'show'])->name('orgemployee.show');
        Route::get('orgemployee/edit/{orgemployee}', [OrgEmployeeController::class, 'edit'])->name('orgemployee.edit');
        Route::patch('orgemployee/updateverify/employee/{orgemployee}', [OrgEmployeeController::class, 'updateverifyEmployeeInfo'])->name('orgemployee.updateverifyemployee');
        Route::patch('orgemployee/update/{orgemployee}', [OrgEmployeeController::class, 'update'])->name('orgemployee.update');
        Route::get('orgemployee/delete/{orgemployee}/', [OrgEmployeeController::class, 'destroy'])->name('orgemployee.destroy');



        // about
        Route::get('about/get', [AboutController::class, 'index'])->name('about.index');
        Route::get('abouts/get', [AboutController::class, 'organisations'])->name('about.organisations');
        Route::get('about/get/list', [AboutController::class, 'aboutList'])->name('about.list-index');
        Route::post('about', [AboutController::class, 'store'])->name('about.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('about/show/{about}', [AboutController::class, 'show'])->name('about.show');
        Route::get('about/edit/{about}', [AboutController::class, 'edit'])->name('about.edit');
        Route::patch('about/update/{about}', [AboutController::class, 'update'])->name('about.update');
        Route::get('about/delete/{about}/', [AboutController::class, 'destroy'])->name('about.destroy');

        // service
        Route::get('service/get', [ServiceController::class, 'index'])->name('service.index');
        Route::get('service/get/list', [ServiceController::class, 'organisations'])->name('service.list-index');
        Route::post('service', [ServiceController::class, 'store'])->name('service.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('service/show/{service}', [ServiceController::class, 'show'])->name('service.show');
        Route::get('service/edit/{service}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::patch('service/update/{service}', [ServiceController::class, 'update'])->name('service.update');
        Route::get('service/delete/{service}/', [ServiceController::class, 'destroy'])->name('service.destroy');


                // servicemodel
        Route::get('servicemodel/get', [ServiceModelController::class, 'index'])->name('servicemodel.index');
        Route::get('servicemodel/latest', [ServiceModelController::class, 'latestservicemodels'])->name('servicemodel.latest');
        Route::patch('servicemodel/{servicemodel}', [ServiceModelController::class, 'store'])->name('servicemodel.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('servicemodel/show/{servicemodel}', [ServiceModelController::class, 'show'])->name('servicemodel.show');
        Route::get('servicemodel/fetch/{servicemodel}', [ServiceModelController::class, 'ServiceModelsByServiceID'])->name('servicemodel.ServiceModelsByServiceID');
        Route::get('servicemodel/fetch/latest/{servicemodel}', [ServiceModelController::class, 'LatestServiceModelsByServiceID'])->name('servicemodel.latestServiceModelByServiceID');
        Route::get('servicemodel/fetch/latest/singlemodel/{servicemodel}', [ServiceModelController::class, 'LatestServiceModelsBySingleModelID'])->name('servicemodel.LatestServiceModelsBySingleModelID');
        Route::get('servicemodel/search', [ServiceModelController::class, 'search'])->name('servicemodel.search');
        Route::get('servicemodel/edit/{servicemodel}', [ServiceModelController::class, 'edit'])->name('servicemodel.edit');
        Route::patch('servicemodel/update/{servicemodel}', [ServiceModelController::class, 'update'])->name('servicemodel.update');
        Route::get('servicemodel/delete/{servicemodel}/', [ServiceModelController::class, 'destroy'])->name('servicemodel.destroy');


        // features
        Route::get('feature/get', [FeatureController::class, 'index'])->name('feature.index');
        Route::get('features/get', [FeatureController::class, 'organisations'])->name('feature.organisations');
        Route::get('feature/get/list', [FeatureController::class, 'aboutList'])->name('feature.list-index');
        Route::post('feature', [FeatureController::class, 'store'])->name('feature.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('feature/show/{feature}', [FeatureController::class, 'show'])->name('feature.show');
        Route::get('feature/edit/{feature}', [FeatureController::class, 'edit'])->name('feature.edit');
        Route::patch('feature/update/{feature}', [FeatureController::class, 'update'])->name('feature.update');
        Route::get('feature/delete/{feature}/', [FeatureController::class, 'destroy'])->name('feature.destroy');

        // adverts
        Route::get('advert/get', [AdvertController::class, 'index'])->name('advert.index');
        Route::get('adverts/get', [AdvertController::class, 'organisations'])->name('advert.organisations');
        Route::get('advert/get/list', [AdvertController::class, 'aboutList'])->name('advert.list-index');
        Route::post('advert', [AdvertController::class, 'store'])->name('advert.store');
        //     /*
        //      * Specifics
        //      */
        Route::get('advert/show/{advert}', [AdvertController::class, 'show'])->name('advert.show');
        Route::get('advert/edit/{advert}', [AdvertController::class, 'edit'])->name('advert.edit');
        Route::patch('advert/update/{advert}', [AdvertController::class, 'update'])->name('advert.update');
        Route::get('advert/delete/{advert}/', [AdvertController::class, 'destroy'])->name('advert.destroy');


//filters

        Route::get('duration/get', [DurationController::class, 'index'])->name('duration.index');
        Route::get('duration/get/list/{duration}', [DurationController::class, 'DurationList'])->name('duration.list-index');
        Route::post('duration', [DurationController::class, 'store'])->name('duration.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('duration/show/{duration}', [DurationController::class, 'show'])->name('duration.show');
        Route::get('duration/edit/{duration}', [DurationController::class, 'edit'])->name('duration.edit');
        Route::patch('duration/update/{duration}', [DurationController::class, 'update'])->name('duration.update');
        Route::get('duration/delete/{duration}', [DurationController::class, 'destroy'])->name('duration.destroy');

        Route::get('education/get', [EducationController::class, 'index'])->name('education.index');
        Route::get('education/get/list/{education}', [EducationController::class, 'EducationList'])->name('education.list-index');
        Route::post('education', [EducationController::class, 'store'])->name('education.store');

        Route::get('education/show/{education}', [EducationController::class, 'show'])->name('education.show');
        Route::get('education/edit/{education}', [EducationController::class, 'edit'])->name('education.edit');
        Route::patch('education/update/{education}', [EducationController::class, 'update'])->name('education.update');
        Route::get('education/delete/{education}', [EducationController::class, 'destroy'])->name('education.destroy');


        Route::get('accessibility/get', [AccessibilityController::class, 'index'])->name('accessibility.index');
        Route::get('accessibility/get/list/{accessibility}', [AccessibilityController::class, 'AccessibilityList'])->name('accessibility.list-index');
        Route::post('accessibility', [AccessibilityController::class, 'store'])->name('accessibility.store');

        Route::get('accessibility/show/{accessibility}', [AccessibilityController::class, 'show'])->name('accessibility.show');
        Route::get('accessibility/edit/{accessibility}', [AccessibilityController::class, 'edit'])->name('accessibility.edit');
        Route::patch('accessibility/update/{accessibility}', [AccessibilityController::class, 'update'])->name('accessibility.update');
        Route::get('accessibility/delete/{accessibility}', [AccessibilityController::class, 'destroy'])->name('accessibility.destroy');


        Route::get('availability/get', [AvailabilityController::class, 'index'])->name('availability.index');
        Route::get('availability/get/list/{availability}', [AvailabilityController::class, 'AvailabilityList'])->name('availability.list-index');
        Route::post('availability', [AvailabilityController::class, 'store'])->name('availability.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('availability/show/{availability}', [AvailabilityController::class, 'show'])->name('availability.show');
        Route::get('availability/edit/{availability}', [AvailabilityController::class, 'edit'])->name('availability.edit');
        Route::patch('availability/update/{availability}', [AvailabilityController::class, 'update'])->name('availability.update');
        Route::get('availability/delete/{availability}', [AvailabilityController::class, 'destroy'])->name('availability.destroy');



        Route::get('coursefeature/get', [CourseFeatureController::class, 'index'])->name('coursefeature.index');
        Route::get('coursefeature/get/list/{coursefeature}', [CourseFeatureController::class, 'CoursefeatureList'])->name('coursefeature.list-index');
        Route::post('coursefeature', [CourseFeatureController::class, 'store'])->name('coursefeature.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('coursefeature/show/{coursefeature}', [CourseFeatureController::class, 'show'])->name('coursefeature.show');
        Route::get('coursefeature/edit/{coursefeature}', [CourseFeatureController::class, 'edit'])->name('coursefeature.edit');
        Route::patch('coursefeature/update/{coursefeature}', [CourseFeatureController::class, 'update'])->name('coursefeature.update');
        Route::get('coursefeature/delete/{coursefeature}', [CourseFeatureController::class, 'destroy'])->name('coursefeature.destroy');



        Route::get('language/get', [LanguageController::class, 'index'])->name('language.index');
        Route::get('language/get/list/{language}', [LanguageController::class, 'LanguageList'])->name('language.list-index');
        Route::post('language', [LanguageController::class, 'store'])->name('language.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('language/show/{language}', [LanguageController::class, 'show'])->name('language.show');
        Route::get('language/edit/{language}', [LanguageController::class, 'edit'])->name('language.edit');
        Route::patch('language/update/{language}', [LanguageController::class, 'update'])->name('language.update');
        Route::get('language/delete/{language}', [LanguageController::class, 'destroy'])->name('language.destroy');



        Route::get('school/get', [SchoolController::class, 'index'])->name('school.index');
        Route::get('school/get/list/{school}', [SchoolController::class, 'SchoolList'])->name('school.list-index');
        Route::post('school', [SchoolController::class, 'store'])->name('school.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('school/show/{school}', [SchoolController::class, 'show'])->name('school.show');
        Route::get('school/edit/{school}', [SchoolController::class, 'edit'])->name('school.edit');
        Route::patch('school/update/{school}', [SchoolController::class, 'update'])->name('school.update');
        Route::get('school/delete/{school}', [SchoolController::class, 'destroy'])->name('school.destroy');



        Route::get('skill/get', [SkillController::class, 'index'])->name('skill.index');
        Route::get('skill/get/list/{skill}', [SkillController::class, 'SkillList'])->name('skill.list-index');
        Route::post('skill', [SkillController::class, 'store'])->name('skill.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('skill/show/{skill}', [SkillController::class, 'show'])->name('skill.show');
        Route::get('skill/edit/{skill}', [SkillController::class, 'edit'])->name('skill.edit');
        Route::patch('skill/update/{skill}', [SkillController::class, 'update'])->name('skill.update');
        Route::get('skill/delete/{skill}', [SkillController::class, 'destroy'])->name('skill.destroy');



        Route::get('subject/get', [SubjectController::class, 'index'])->name('subject.index');
        Route::get('subject/get/list/{subject}', [SubjectController::class, 'SubjectList'])->name('subject.list-index');
        Route::post('subject', [SubjectController::class, 'store'])->name('subject.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('subject/show/{subject}', [SubjectController::class, 'show'])->name('subject.show');
        Route::get('subject/edit/{subject}', [SubjectController::class, 'edit'])->name('subject.edit');
        Route::patch('subject/update/{subject}', [SubjectController::class, 'update'])->name('subject.update');
        Route::get('subject/delete/{subject}', [SubjectController::class, 'destroy'])->name('subject.destroy');


        Route::get('type/get', [TypeController::class, 'index'])->name('type.index');
        Route::get('type/get/list/{type}', [TypeController::class, 'TypeList'])->name('type.list-index');
        Route::post('type', [TypeController::class, 'store'])->name('type.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('type/show/{type}', [TypeController::class, 'show'])->name('type.show');
        Route::get('type/edit/{type}', [TypeController::class, 'edit'])->name('type.edit');
        Route::patch('type/update/{type}', [TypeController::class, 'update'])->name('type.update');
        Route::get('type/delete/{type}', [TypeController::class, 'destroy'])->name('type.destroy');

        Route::get('practice/get', [PracticeController::class, 'index'])->name('practice.index');
        Route::get('practice/get/list/{practice}', [PracticeController::class, 'PracticeList'])->name('practice.list-index');
        Route::post('practice', [PracticeController::class, 'store'])->name('practice.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('practice/show/{practice}', [PracticeController::class, 'show'])->name('practice.show');
        Route::get('practice/edit/{practice}', [PracticeController::class, 'edit'])->name('practice.edit');
        Route::patch('practice/update/{practice}', [PracticeController::class, 'update'])->name('practice.update');
        Route::get('practice/delete/{practice}', [PracticeController::class, 'destroy'])->name('practice.destroy');

        Route::get('syllabus/get', [SyllabusController::class, 'index'])->name('syllabus.index');
        Route::get('syllabus/get/list/{syllabus}', [SyllabusController::class, 'SyllabusList'])->name('syllabus.list-index');
        Route::post('syllabus', [SyllabusController::class, 'store'])->name('syllabus.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('syllabus/show/{syllabus}', [SyllabusController::class, 'show'])->name('syllabus.show');
        Route::get('syllabus/edit/{syllabus}', [SyllabusController::class, 'edit'])->name('syllabus.edit');
        Route::patch('syllabus/update/{syllabus}', [SyllabusController::class, 'update'])->name('syllabus.update');
        Route::get('syllabus/delete/{syllabus}', [SyllabusController::class, 'destroy'])->name('syllabus.destroy');





    //                  // course

    Route::get('course/get', [CourseController::class, 'index'])->name('course.index');
    //filter
    Route::get('accessibilitycourses/get/{course}', [CourseController::class, 'accessibility'])->name('accessibilitycourse.index');
    Route::get('educationcourses/get/{course}', [CourseController::class, 'education'])->name('educationcourse.index');
    Route::get('durationcourses/get/{course}', [CourseController::class, 'duration'])->name('durationcourse.index');
    Route::get('availabilitycourses/get/{course}', [CourseController::class, 'availability'])->name('availabilitycourse.index');
    Route::get('featurecourses/get/{course}', [CourseController::class, 'feature'])->name('featurecourse.index');
    Route::get('languagecourses/get/{course}', [CourseController::class, 'language'])->name('languagecourse.index');
    Route::get('skillcourses/get/{course}', [CourseController::class, 'skill'])->name('skillcourse.index');
    Route::get('schoolcourses/get/{course}', [CourseController::class, 'school'])->name('schoolcourse.index');
    Route::get('subjectcourses/get/{course}', [CourseController::class, 'subject'])->name('subjectcourse.index');
    Route::get('typecourses/get/{course}', [CourseController::class, 'type'])->name('typecourse.index');
    Route::post('coursefilter/get', [CourseController::class, 'filter'])->name('course.filter');

    Route::post('course/activate/{course}', [CourseController::class, 'activate'])->name('course.activate');
    Route::post('course/deactivate/{course}', [CourseController::class, 'deactivate'])->name('course.deactivate');

    Route::patch('course', [CourseController::class, 'store'])->name('course.store');

    Route::get('course/show/{course}', [CourseController::class, 'show'])->name('course.show');
    Route::get('course/edit/{course}', [CourseController::class, 'edit'])->name('course.edit');
    Route::patch('course/update/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::get('course/delete/{course}', [CourseController::class, 'destroy'])->name('course.destroy');


//     /*



Route::get('client/get', [ClientController::class, 'index'])->name('client.index');
Route::get('client/get/list/{client}', [ClientController::class, 'ClientList'])->name('client.list-index');
Route::post('client', [ClientController::class, 'store'])->name('client.store');
//     /*
//      * Specifics
//      */
Route::get('client/show/{client}', [ClientController::class, 'show'])->name('client.show');
Route::get('client/edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
Route::patch('client/update/{client}', [ClientController::class, 'update'])->name('client.update');
Route::get('client/delete/{client}', [ClientController::class, 'destroy'])->name('client.destroy');


//cart
Route::get('cart/get', [CartController::class, 'index'])->name('cart.index');
Route::patch('cart', [CartController::class, 'store'])->name('cart.store');
//     /*
//      * Specifics
//      */
Route::get('cart/show/{cart}', [CartController::class, 'show'])->name('cart.show');
Route::get('cart/edit/{cart}', [CartController::class, 'edit'])->name('cart.edit');
Route::patch('cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
Route::get('cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('cart/clear/{cart}', [CartController::class, 'clear'])->name('cart.clear');
Route::patch('cart/checkout/{cart}', [CartController::class, 'checkout'])->name('cart.checkout');


Route::get('order/get', [OrderController::class, 'index'])->name('order.index');
Route::get('order/get/list/{order}', [OrderController::class, 'OrderList'])->name('order.list-index');
Route::patch('order/checkout/{order}', [OrderController::class, 'store'])->name('order.checkout');
//     /*
//      * Specifics
//      */
Route::get('order/show/{order}', [OrderController::class, 'show'])->name('order.show');
Route::get('order/edit/{order}', [OrderController::class, 'edit'])->name('order.edit');
Route::patch('order/update/{order}', [OrderController::class, 'update'])->name('order.update');
Route::get('order/delete/{order}', [OrderController::class, 'destroy'])->name('order.destroy');

