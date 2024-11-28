<?php



route('service','Service@index');
route('service/postpet','Postpet@index');
route('service/postpet/postpetnext','Postpetnext@index');
route('service/postpet/postpetnext/selling','Selling@index');
route('service/manage','Manage@index');

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
route('admin/add_announcement/submit', 'admin/AdminAddAnnouncement@submit');
route('admin/view_announcement', 'admin/AdminViewAnnouncement@index');
route('admin/edit_announcement', 'admin/AdminEditAnnouncement@index');
route('admin/edit_announcement/submit', 'admin/AdminEditAnnouncement@submit');

route('admin/medical_registration', 'admin/AdminMedicalRegistration@index');
route('admin/report', 'admin/AdminReport@index');
route('admin/user_account', 'admin/AdminUserAccount@index');
route('admin/event', 'admin/AdminEvent@index');
route('admin/post', 'admin/AdminPost@index');
route('admin/donation', 'admin/AdminDonation@index');
route('admin/profile', 'admin/AdminProfile@index');
route('admin/donation_card', 'admin/AdminDonationCard@index');

// User routings
route('announcements','announcements');
route('lostandfound','lostandfound');
route('eventsandcampaigns','events');
route('eventsandcampaigns/event_id','EventInfo');
route('lostandfound/report-found','ReportFound');
route('lostandfound/idoflost','LostPet');

// merchanted pets
route('findapet','PetPosts');
route('findapet/post_id','PetPost_purchase');
// medical centres
route('services','Services');
// Pet shelters
route('shelters','PetShelters');
// Donation requests
route('donationsnsupport','DonationsAndSupport');

//pet shelter routings
route('shelter/profile','shelter/Profile@index');
route('shelter/notification','shelter/Notification@index');
route('shelter/donation','shelter/Donation@index');
route('shelter/lost_and_found','shelter/LostAndFound@index');

//medical routing
route('medical-centers','Medical/FindMedi@index');
route('medical-center','Medical/MediCenter@index');
route('medical-appointment-date','Medical/Appointment_Date@index');
route('medical-appointment-selectpet','Medical/Appointment_Pet@index');
route('medical-appointment-reason','Medical/Appointment_Reason@index');
//medical profile
route('medical-center/dashboard','Medical/profile/Medical_Profile_SPA@index');
route('medical-center/dashboard/profile','Medical/profile/Med_Dashboard_Profile@index');
route('medical-center/dashboard/appointments','Medical/profile/Med_Dashboard_Appointments@index');
route('medical-center/dashboard/notification','Medical/profile/Med_Dashboard_Notification@index');
route('medical-center/dashboard/veterinarians/edit','Medical/profile/Med_Dashboard_Veterinarians@edit');
route('medical-center/dashboard/veterinarians/edit/{id}','Medical/profile/Med_Dashboard_Veterinarians@getVeterinarian');
route('medical-center/dashboard/veterinarians','Medical/profile/Med_Dashboard_Veterinarians@index');