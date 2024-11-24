<?php

// Middleware-like function for admin-only routes
// function adminRoute($path, $controllerAction) {
//     if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
//         route($path, $controllerAction);
//     } else {
//         redirect('login'); // Redirect to login if not admin
//     }
// }
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
route('admin/donation_card', 'admin/AdminDonationCard@index');


// Medical routing
route('medical', 'Medical/FindMedi@index');

// User routings
route('announcements','announcements');
route('lostandfound','lostandfound');
route('eventsandcampaigns','events');
route('eventsandcampaigns/event_id','EventInfo');
route('lostandfound/report-found','ReportFound');
route('lostandfound/idoflost','LostPet');

// userprofile
route('userprofile','user/Profile@index');
route('userprofile/profile','user/Profile@index');
route('userprofile/notifications','user/Notification@index');
route('userprofile/donations','user/Donation@index');
route('userprofile/lost_and_found','user/LostAndFound@index');
route('lostandfound/{postid}','user/LostAndFound@show');

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
// route('shelter/notification','shelter/Notification@index');
route('shelter/donation','shelter/Donation@index');
// route('shelter/lost_and_found','shelter/LostAndFound@index');
route('shelter/event','shelter/Events@index');
route('shelter/adoption_requests','shelter/AdoptionRequests@index');
route('shelter/requests_to_adopt','shelter/RequestToAdopt@index');
route('shelter/post','shelter/Post@index');



//service routings
route('service','Service@index');
route('service/postpet','Postpet@index');
route('service/postpet/postpetnext','Postpetnext@index');
route('service/postpet/postpetnext/selling','Selling@index');
route('service/manage','Manage@index');





