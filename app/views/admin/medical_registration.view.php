<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>PawCentral Dashboard - Medical Registrations</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/medicalRegistration.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/admin/medicalRegistration.js" defer></script>
</head>

<body class="body">


    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <div>
            <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        </div>

        <div class="med-container">
            <h2>Medical Registrations</h2>
            <div class="content">
                <table class="medical-registration-table">
                    <thead class="mr_table_t">
                        <th>
                            <h5>Vaterinarian Name</h5>
                        </th>
                        <th>
                            <h5>Vaterinarian Degree</h5>
                        </th>
                        <th>
                            <h5>Vaterinarian's CV</h5>
                        </th>
                        <th>
                            <h5>Status</h5>
                        </th>
                        <th>
                            <h5>Send Email</h5>
                        </th>
                    </thead>
                    <tbody>
                        <div class="">
                            <!-- <tr class="mr_row">
                                <td>Sameera Madhuranga</td>
                                <td>DVM</td>
                                <td><button class="view-btn">View</button></td>
                                <td>
                                    <select class="action-select">
                                        <option value="approve">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                                <td><button class="view-btn">Send</button></td>
                            </tr> -->
                            <tr class="mr_row">
                                <td>Nishan Perera</td>
                                <td>VMD</td>
                                <td><button class="view-btn">View</button></td>
                                <td>
                                    <select class="action-select">
                                        <option value="approve">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                                <td><button class="view-btn">Send</button></td>
                            </tr>
                            <tr class="mr_row">
                                <td>Chamari Senanayake</td>
                                <td>BVM&S</td>
                                <td><button class="view-btn">View</button></td>
                                <td>
                                    <select class="action-select">
                                        <option value="approve">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                                <td><button class="view-btn">Send</button></td>
                            </tr>
                            <tr class="mr_row">
                                <td>Kasun Fernando</td>
                                <td>BVSc</td>
                                <td><button class="view-btn">View</button></td>
                                <td>
                                    <select class="action-select">
                                        <option value="approve">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                                <td><button class="view-btn">Send</button></td>
                            </tr>
                            <tr class="mr_row">
                                <td>Isuru Wijesinghe</td>
                                <td>MVSc</td>
                                <td><button class="view-btn">View</button></td>
                                <td>
                                    <select class="action-select">
                                        <option value="approve">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                                <td><button class="view-btn">Send</button></td>
                            </tr>
                            <tr class="mr_row">
                                <td>Ruwan Kumara</td>
                                <td>DVSc</td>
                                <td><button class="view-btn">View</button></td>
                                <td>
                                    <select class="action-select">
                                        <option value="approve">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                                <td><button class="view-btn">Send</button></td>
                            </tr>
                            <tr class="mr_row">
                                <td>Sanduni Rathnayake</td>
                                <td>BVS</td>
                                <td><button class="view-btn">View</button></td>
                                <td>
                                    <select class="action-select">
                                        <option value="approve">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                                <td><button class="view-btn">Send</button></td>
                            </tr>
                            <tr class="mr_row">
                                <td>Tharindu Jayawardana</td>
                                <td>BVMS</td>
                                <td><button class="view-btn">View</button></td>
                                <td>
                                    <select class="action-select">
                                        <option value="approve">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                                <td><button class="view-btn">Send</button></td>
                            </tr>
                            <tr class="mr_row">
                                <td>Anjali Herath</td>
                                <td>MVetSc</td>
                                <td><button class="view-btn">View</button></td>
                                <td>
                                    <select class="action-select">
                                        <option value="approve">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                                <td><button class="view-btn">Send</button></td>
                            </tr>
                            <tr class="mr_row">
                                <td>Praveen Silva</td>
                                <td>MVDr</td>
                                <td><button class="view-btn">View</button></td>
                                <td>
                                    <select class="action-select">
                                        <option value="approve">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                                <td><button class="view-btn">Send</button></td>
                            </tr>
                        </div>




                    </tbody>
                </table>



            </div>


        </div>

    </div>

    <?php include("../app/views/components/footer.php"); ?>

</body>

</html>