<?php

// Home route
route('home', 'Home@index');

// Signup and Login routing
route('signup', 'SignUp@index');                 // Display signup page (first step)
route('signup/submit', 'SignUp@handleFirstStep'); // Handle first step of signup

route('signup/signupnext', 'SignUpNext@index');  // Display signup second step
route('signup/signupnext/submit', 'SignUpNext@handleSecondStep'); // Handle second step of signup

route('login', 'Login@index');// Route for displaying the login page
route('login/authenticate', 'Login@authenticate');

// Admin routing
route('admin/overview', 'admin/AdminOverview@index');
route('admin/announcement', 'admin/AdminAnnouncement@index');
route('admin/add_announcement', 'admin/AdminAddAnnouncement@index');
route('admin/add_announcement/submit', 'admin/AdminAddAnnouncement@submit');
route('admin/view_announcement', 'admin/AdminViewAnnouncement@index');
route('admin/edit_announcement', 'admin/AdminEditAnnouncement@index');
route('admin/notice', 'admin/AdminNotice@index');
route('admin/add_notice', 'admin/AdminAddNotice@index');
route('admin/medical_registration', 'admin/AdminMedicalRegistration@index');
route('admin/report', 'admin/AdminReport@index');
route('admin/user_account', 'admin/AdminUserAccount@index');
route('admin/event', 'admin/AdminEvent@index');
route('admin/post', 'admin/AdminPost@index');
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

// merchanted pets
route('findapet/post_id','PetPost_purchase');


//pet shelter routings
route('shelter/profile','shelter/Profile@index');
route('shelter/notification','shelter/Notification@index');
route('shelter/donation','shelter/Donation@index');
route('shelter/lost_and_found','shelter/LostAndFound@index');



