<?php
route('donationsnsupport/create-checkout-session', 'DonationsAndSupport@createCheckoutSession');
route('donationsnsupport/paymentsuccess', 'DonationsAndSupport@paySuccess');
// for notification sys
route('notifications/fetch', 'user/NotificationsController@fetchNewNotifications');
route('notifications/mark-read', 'user/NotificationsController@markAllRead');
route('notifications/mark-read-notification', 'user/NotificationsController@markNotiRead');
route('events/download_enrollments', 'user/Events@downloadEnrollments');
// Middleware-like function for admin-only routes
// function adminRoute($path, $controllerAction) {
//     if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
//         route($path, $controllerAction);
//     } else {
//         redirect('login'); // Redirect to login if not admin
//     }
// }


route('service','Service@index');
// Postpet Routes
route('service/postpet', 'Postpet@index');
route('service/postpet/submit', 'Postpet@submit');

// Postpetnext Routes
route('service/postpet/postpetnext', 'Postpetnext@index');
route('service/postpet/postpetnext/submit', 'Postpetnext@submit');

// Selling Routes
route('service/postpet/postpetnext/selling', 'Selling@index');
route('service/postpet/postpetnext/selling/submit', 'Selling@submit');

// Rent Routes
route('service/postpet/postpetnext/rent', 'Rent@index'); // Use 'rent' instead of 'renting'
route('service/postpet/postpetnext/rent/submit', 'Rent@submit'); // Use 'rent' instead of 'renting'

// Import Routes
route('service/postpet/postpetnext/import', 'Import@index'); // Use 'import' instead of 'importing'
route('service/postpet/postpetnext/import/submit', 'Import@submit'); // Use 'import' instead of 'importing'

// Manage Routes
route('service/manage', 'Manage@index');
route('service/manage/edit', 'Manage@edit');
route('service/manage/delete', 'Manage@delete'); // Typo: 'manage' is misspelled as 'manage'
route('service/manage/details','Manage@details');

// Merchant Routes
route('merchant/profile', 'Merchant/Profile@index');
route('merchant/notification', 'Merchant/Notification@index');



route('service/profile','Profile@index');
route('service/manage/editpost/update','Manage@update');
// Home route
route('home', 'Home@index');

// Signup and Login routing
route('signup', 'SignUp@index');                 // Display signup page (first step)
route('signup/signupnext', 'SignUpNext@index');  // Display signup second step
route('login', 'Login@index');// Route for displaying the login page


// Admin routing
route('admin/overview', 'admin/AdminOverview@index');
route('admin/announcement', 'admin/AdminAnnouncement@index');
route('admin/add_announcement', 'admin/AdminAddAnnouncement@index');
route('admin/view_announcement', 'admin/AdminViewAnnouncement@index');
route('admin/edit_announcement', 'admin/AdminEditAnnouncement@index');
route('admin/medical_registration', 'admin/AdminMedicalRegistration@index');
route('admin/report', 'admin/AdminReport@index');
route('admin/user_account', 'admin/AdminUserAccount@index');
route('admin/event', 'admin/AdminEvent@index');
route('admin/event_view', 'admin/AdminEventView@index');
route('admin/post', 'admin/AdminPost@index');
route('admin/post_info', 'admin/AdminPostInfo@index');
route('admin/donation', 'admin/AdminDonation@index');
route('admin/profile', 'admin/AdminProfile@index');
route('admin/profile_view','admin/AdminProfileView@index');
route('admin/donation_card', 'admin/AdminDonationCard@index');
route('admin/notification', 'admin/AdminNotification@index');

// User routings
route('announcements','announcements');
route('lostandfound','LostAndFound@index');
// route('eventsandcampaigns','events');
route('eventsandcampaigns','events@indexWithpagination');
route('eventsandcampaigns/event','events@EventInfo');
route('eventsandcampaigns/event/enroll','events@Enroll');
route('lostandfound/report-animal','ReportFound');

// route('lostandfound/idoflost','LostPet');

// userprofile
route('userprofile','user/Profile@index');
route('userprofile/profile','user/Profile@index');
route('userprofile/update','user/Profile@update');
route('userprofile/notifications','user/NotificationsController@index');
route('userprofile/donations','user/Donation@index');
route('userprofile/donations/req','user/Donation@AddReq');
route('userprofile/donations/closeReq','user/Donation@CloseReq');
route('userprofile/donations/update','user/Donation@UpdateView');
route('userprofile/donations/edit','user/Donation@EditReq');
route('userprofile/donations/updatereq','user/Donation@UpdateReq');
// route('userprofile/donations/updateInfo','user/Donation@SubmitUpdate');
route('userprofile/lost_and_found','user/LostAndFound@index');
route('userprofile/mypets','user/Mypets@index');
route('userprofile/mypets/Pet','user/Mypets@ShowPetProfile');
route('userprofile/mypets/Pet_medrecords','user/Mypets@ShowPetRecords');
route('userprofile/mypets/register_pet','user/Mypets@RegPet');
route('userprofile/event','user/Events@index');
route('userprofile/event/addevent','user/Events@NewEvent');
route('userprofile/event/closeevent','user/Events@closeEvent');
route('userprofile/enrolled_events','user/Events@showEnrolledEvents');
route('lostandfound/marklostnfound', 'user/LostAndFound@markAsComplete');
route('lostandfound/postdetails','user/LostAndFound@show');
route('lostandfound/post-report-animal','user/LostAndFound@createReport');
route('lostandfound/edit', 'user/LostAndFound@edit'); //updating pet post
route('lostandfound/update', 'user/LostAndFound@update');


// merchanted pets
route('findapet','PetPosts');
route('findapet/post_id','PetPost_purchase');
route('findapet/adoptionpost','AdoptionPost@index');
route('findapet/adoptionpost/adoptionrequest','AdoptionPost@AddAdoptionRequest');

// medical centres
route('services','Services');
route('services/careservice','Careservice');
// Pet shelters
route('shelters','PetShelters');
// Donation requests
route('donationsnsupport','DonationsAndSupport');
route('donationsnsupport','DonationsAndSupport@indexWithpagination');
route('donationsnsupport/req','DonationsAndSupport@showPost');
route('donationsnsupport/donate','DonationsAndSupport@AddDonation');


//pet shelter routings
route('shelter/profile', 'shelter/Profile@index');
route('shelter/update', 'shelter/Profile@update');
route('shelter/notification', 'shelter/Notification@index');
route('shelter/donation','shelter/Donation@index');
route('shelter/donation/req', 'shelter/Donation@AddReq');
route('shelter/donation/closeReq', 'shelter/Donation@CloseReq');
route('shelter/donation/update', 'shelter/Donation@UpdateView');
route('shelter/donation/edit', 'shelter/Donation@EditReq');
route('shelter/donation/updatereq', 'shelter/Donation@UpdateReq');
// route('shelter/lost_and_found','shelter/LostAndFound@index');
route('shelter/event', 'shelter/Events@index');
route('shelter/event/addevent', 'shelter/Events@NewEvent');
route('shelter/event/closeevent', 'shelter/Events@closeEvent');
route('shelter/enrolled_events', 'shelter/Events@showEnrolledEvents');
route('shelter/adoption_requests','shelter/AdoptionRequests@index');
route('shelter/requests_to_adopt','shelter/RequestToAdopt@index');
route('shelter/post','shelter/Post@index');
route('shelter/post/addpost', 'shelter/Post@NewPost');
route('shelter/postinfo','shelter/Postinfo@index');
route('shelter/postinfo/edit','shelter/Postinfo@update');



//service routings
// route('service','Service@index');
// route('service/postpet','Postpet@index');
// route('service/postpet/postpetnext','Postpetnext@index');
// route('service/postpet/postpetnext/selling','Selling@index');
// route('service/manage','Manage@index');



//medical routing
    route('medical-centers','Medical/FindMedi@index');
    route('medical-centers/medical-center','Medical/MediCenter@index');
    route('medical-appointment-date','Medical/Appointment_Date@index');
    route('medical-appointment-selectpet','Medical/Appointment_Pet@index');
    route('medical-appointment-reason','Medical/Appointment_Reason@index');

//medical dashboard
    route('medical-center/dashboard','Medical/profile/Medical_Profile_SPA@index');
    //medical profile
    route('medical-center/dashboard/profile','Medical/profile/Med_Dashboard_Profile@index');
    route('medical-center/dashboard/profile/update','Medical/profile/Med_Dashboard_Profile@getProfile');
    route('medical-center/dashboard/profile/update-profile','Medical/profile/Med_Dashboard_Profile@updateProfile');
    route('medical-center/dashboard/profile/upload-image','Medical/profile/Med_Dashboard_Profile@uploadImage');  // Add this route for direct image upload

    route('medical-center/dashboard/appointments','Medical/profile/Med_Dashboard_Appointments@index');
    //veterinarians
    route('medical-center/dashboard/veterinarians/edit','Medical/profile/Med_Dashboard_Veterinarians@edit');
    route('medical-center/dashboard/veterinarians/edit-vet','Medical/profile/Med_Dashboard_Veterinarians@getVeterinarian');
    route('medical-center/dashboard/veterinarians','Medical/profile/Med_Dashboard_Veterinarians@index');
    
    route('medical-center/dashboard/notification','Medical/profile/Med_Dashboard_Notification@index');
    route('medical-center/dashboard/services','Medical/profile/Med_Dashboard_Services@index');
    route('medical-center/dashboard/donations','Medical/profile/Med_Dashboard_Donations@index');
    route('medical-center/dashboard/events','Medical/profile/Med_Dashboard_Events@index');

    //medical services
    // route('medical-center/dashboard/services/add','Medical/profile/Med_Dashboard_Services@submit');

// Add logout route for medical center
route('logout', 'Medical/Auth@logout');