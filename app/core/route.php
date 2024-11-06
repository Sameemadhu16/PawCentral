<?php

route('home','Home@index');
route('signup','SignUp@index');
route('signin','SignIn@index');
route('service','Service@index');
route('service/postpet','Postpet@index');
route('service/postpet/postpetnext','postpetnext@index');
route('service/postpet/postpetnext/selling','Selling@index');
route('service/manage','Mange@index');
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