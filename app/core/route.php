<?php

route('home','Home@index');
route('signup','SignUp@index');
route('signin','SignIn@index');


// Admin routing

route('admin/overview','admin/AdminOverview@index');
route('admin/announcement','admin/AdminAnnouncement@index');
route('admin/notice','admin/AdminNotice@index');
route('admin/medical_registration','admin/AdminMedicalRegistration@index');
route('admin/report','admin/AdminReport@index');
route('admin/user_account','admin/AdminUserAccount');
route('admin/event','admin/AdminEvent');
route('admin/post','admin/AdminPost');
route('admin/donation','admin/AdminDonation');
route('admin/profile','admin/AdminProfile');

// User routings
route('announcements','announcements');
route('lostandfound','lostandfound');
route('eventsandcampaigns','events');
route('eventsandcampaigns/event_id','EventInfo');
route('lostandfound/report-found','ReportFound');
route('lostandfound/idoflost','LostPet');
// merchanted pets
route('findapet/post_id','PetPost_purchase');

