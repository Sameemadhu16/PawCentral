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

//medical routing
route('medical','Medical/FindMedi@index');

route('admin/user_account','admin/AdminUserAccount@index');
route('admin/event','admin/AdminEvent@index');
route('admin/post','admin/AdminPost@index');
route('admin/donation','admin/AdminDonation@index');
route('admin/profile','admin/AdminProfile@index');
route('admin/donation_card','admin/AdminDonationCard@index');
