<?php

route('home','Home@index');

//signup login routing
route('signup','SignUp@index');
route('signup/signupnext','SignUpNext@index');
route('signin','SignIn@index');
route('login','Login@index');


// Admin routing

route('admin/overview','admin/AdminOverview@index');
route('admin/announcement','admin/AdminAnnouncement@index');
route('admin/add_announcement','admin/AdminAddAnnouncement@index');
route('admin/notice','admin/AdminNotice@index');
route('admin/add_notice','admin/AdminAddNotice@index');
route('admin/medical_registration','admin/AdminMedicalRegistration@index');
route('admin/report','admin/AdminReport@index');

//medical routing
route('medical-centers','Medical/FindMedi@index');
route('medical-center','Medical/MediCenter@index');
route('medical-appointment-date','Medical/Appointment_Date@index');
route('medical-appointment-selectpet','Medical/Appointment_Pet@index');
route('medical-appointment-reason','Medical/Appointment_Reason@index');

route('admin/user_account','admin/AdminUserAccount@index');
route('admin/event','admin/AdminEvent@index');
route('admin/post','admin/AdminPost@index');
route('admin/donation','admin/AdminDonation@index');
route('admin/profile','admin/AdminProfile@index');
route('admin/donation_card','admin/AdminDonationCard@index');
