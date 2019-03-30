//standard
import countries from './modules/standard/countries';
import counties from './modules/standard/counties';
import constituencies from './modules/standard/constituencies';
import wards from './modules/standard/wards';
import genders from './modules/standard/genders';
import positions from './modules/standard/positions';

//universal
import about from './modules/webpages/about';
import advert from './modules/webpages/advert';
import service from './modules/webpages/service';
import servicemodel from './modules/webpages/servicemodel';
import feature from './modules/webpages/feature';
//organisation
import organisation from './modules/organisation/organisation';
import permission from './modules/organisation/permission';
import role from './modules/organisation/role';
import user from './modules/organisation/user';
import orgdirector from './modules/organisation/director';
import orgadmin from './modules/organisation/admin';
import orgemployee from './modules/organisation/employee';

// course Standard
import accessibility from './modules/course/standard/accessibility';
import availability from './modules/course/standard/availability';
import coursefeature from './modules/course/standard/coursefeature';
import duration from './modules/course/standard/duration';
import language from './modules/course/standard/language';
import school from './modules/course/standard/school';
import skill from './modules/course/standard/skill';
import subject from './modules/course/standard/subject';
import type from './modules/course/standard/type';

//course & syllabus
import course from './modules/course/course';
import practice from './modules/course/syllabus/practice';
import syllabus from './modules/course/syllabus/syllabus';

//client standard
import education from './modules/client/standard/education';
//client
import client from './modules/client/client';
import loggeduser from './modules/client/loggeduser';
import cart from './modules/order/standard/cart';
import order from './modules/order/order';


        export default {
          modules: {
            //organisation
                organisation,
                orgdirector,
                orgadmin,
                orgemployee,
                user,
                permission,
                role,
            //standard
                countries,
                counties,
                constituencies,
                wards,
                genders,
                positions,
            //universal
                about,
                advert,
                service,
                servicemodel,
                feature,

                //standard for courses
                accessibility,
                availability,
                coursefeature,
                duration,
                language,
                school,
                skill,
                subject,
                type,

                //course
                course,
                practice,
                syllabus,


                //client
                client,
                loggeduser,
                education,

                //Order
                order,
                cart,
          },
        };

