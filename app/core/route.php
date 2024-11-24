<?php

route('home','Home@index');

//signup login routing
route('signup','SignUp@index');
route('signup/signupnext','SignUpNext@index');
route('login','Login@index');


// Admin routing

route('admin/overview','admin/AdminOverview@index');
route('admin/announcement','admin/AdminAnnouncement@index');
route('admin/add_announcement','admin/AdminAddAnnouncement@index');
route('admin/edit_announcement','admin/AdminEditAnnouncement@index');
route('admin/notice','admin/AdminNotice@index');
route('admin/add_notice','admin/AdminAddNotice@index');
route('admin/medical_registration','admin/AdminMedicalRegistration@index');
route('admin/report','admin/AdminReport@index');
route('admin/user_account','admin/AdminUserAccount@index');
route('admin/event','admin/AdminEvent@index');
route('admin/post','admin/AdminPost@index');
route('admin/donation','admin/AdminDonation@index');
route('admin/profile','admin/AdminProfile@index');
route('admin/donation_card','admin/AdminDonationCard@index');


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

//medical routing
route('medical','Medical/FindMedi@index');



