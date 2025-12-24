<?php	require 'validator.php'; ?>
<?php include('componets/header.php'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('componets/sidebar.php'); ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('componets/topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-4 text-gray-800">Documentation Page</h1>
					<a href="/userguide/PAB_DMS.pdf" target="_blank" type="button"  class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" >
                    <i class="fas fa-download fa-sm text-white-50"></i> Download User Guide</a>
					</div>
					
					<h3><u>Document Management System User Guide </u></h3>	
		
					<ol>
		
		<li>	
			<h5><strong>Objective: </strong></h5>
			Document Management System is system software responsible for the storage of old and new mails. The main objective of this system is for the easy of storage of mails electronically and for the quick retrieval of mails both in soft and hard copy when needed. It will secure, manage and restore the important mails and documents.
		</li> </br>
		
		<li>
			<h5><strong>	Dashboard: </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li> </li>
				<li></li>
			</ol>
		</li> </br>
		
		<li>
			<h5><strong>Add / Edit User Module (Admin Only) </strong></h5> 
				<ol style="list-style-type:lower-alpha">
					<li>Function: This module is used to create new user profile and login credentials and to edit the user where necessary. </li>
					<li>Usage: The administrator clicks on the “+ Add New User” button, a dialoge box pops up, there he registers a new user and clicks on save to commit to database. He can also edit uses by clicking on “Edit User” button, a dialogue box pops up, where he can update a user record as necessary.</li>
				</ol>
		</li> </br>

		
		<li>
			<h5><strong>	Add / Edit Policy Name Module (Admin Only): </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li> Function: This module is used to create and edit policy details which includes policy name (e.g. Security General), code (e.g CB) and policy number (e.g. 1020). Note: About 920 policy details have been preregister to the application.</li>
				<li>Usage: The administrator clicks on the “+ Add New Policy Number” button, a dialogue box pops up, there he registers a new policy details, and clicks on save to commit to database. He can also edit policy details by clicking on “Edit Policy Name” button, a dialogue box pops up, where he can update the record as necessary. </li>
			</ol>
		</li> </br>
		
		<li>
			<h5><strong>	Update Volume / Folio Module (Admin Only): </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li>Function: This module initialises the default policy number of every policy name, this is done by entering the last Volume/Folio number manually written for each policy name into the “Update Volume/Folio Number Module”. So that on next request of Policy number, the user simple generates it, by searching the police name on the system, and this will automatically generate the policy code, volume and folio number. </li>
				<li>Usage: The administrator clicks on the “Update Vol. & Folio No.” button, a dialogue box pops up, where he initialises the volume number and the folio number of that particular policy name, using the record of the last manually generated volume and folio number.</li>
			</ol>
		</li> </br>
		
		<li>
			<h5><strong>	Generate Folio Number: </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li>Function: The module system automatically generate the policy number (which includes the volume and folio number) of every mail. </li>
				<li>Usage: the user simple generates the folio number by searching the policy name on the search dialogue box, and then clicks on the “Generate Folio No.” button next to the policy name, a dialog box pops up asking the user to confirm his selection. The user confirms and the generate the folio number by clicking the “Generate” this will automatically generate the policy code, volume and folio number, which he can then copy and paste on the mail been treated.</li>
			</ol>
		</li> </br>
		
		<li>
			<h5><strong>	Backup Database (Admin Only): </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li> Function: This module automates the periodic backup of the database of the application.</li>
				<li>Usage: the admin simple clicks on the “Backup Database” link on the sidebar, then download the most recent backup file, and save it in an external storage device.</li>
			</ol>
		</li> </br>
		
		<li>
			<h5><strong>	Register Incoming Mail: </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li> Function: This module is used to register incoming mails together with a scanned copy of the mail.</li>
				<li>Usage: the user enters the address of the incoming mail, date on the mail, date received, subject matter/title, policy number (if available) of the mail and finally uploads a scanned copy of the mail and clicks on submit to commit the registration into the database.</li>
			</ol>
		</li> </br>
		
		<li>
			<h5><strong>	Register Outgoing Mail: </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li> Function: This module is used to register outgoing mails together with a scanned copy of the mail.</li>
				<li>Usage: the user enters the address of the outgoing mail, date on the mail, date received, subject matter/title, policy number (if available) of the mail and finally uploads a scanned copy of the mail and clicks on submit to commit the registration into the database.</li>
			</ol>
		</li> </br>
		
		<li>
			<h5><strong>	View Incoming Mail Module: </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li> Function: This module displays the most recent registered incoming mails entered into the system.</li>
				<li>Usage: the user search for an incoming mail by entering Subject matter/title of the mail, address of the mail, policy number or date uploaded in the search dialogue box. User can also download or edit the mails if given the privilege by the admin.</li>
			</ol>
		</li> </br>
		
		<li>
			<h5><strong>	View Outgoing Mail Module: </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li>Function: This module displays the most recent registered outgoing mails entered into the system. </li>
				<li>Usage: the user search for an outgoing mail by entering subject matter/title of the mail, receivers’ address of the mail, policy number or date uploaded in the search dialogue box. User can also download or edit the mails if given the privilege by the admin.</li>
			</ol>
		</li> </br>
		
		<li>
			<h5><strong>	Search Incoming Mail Module:  </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li> Function: This module is similar to the function of the “View incoming mail Module” only that it searches the entire database for incoming mail unlike the view module that searches the most recent.</li>
				<li>Usage: the user search any incoming mail by entering subject matter/title of the mail, address of the mail, policy number or date uploaded in the search dialogue box. User can also download or edit the mails if given the privilege by the admin.</li>
			</ol>
		</li> </br>
		
		<li>
			<h5><strong>	Search Outgoing Mail Module: </strong></h5>
			<ol style="list-style-type:lower-alpha">
				<li>Function: This module is similar to the function of the “View outgoing mail Module” only that it searches the entire database for outgoing mail unlike the view module that searches the most recent. </li>
				<li>Usage: the user search of an outgoing mail by entering subject matter/title of the mail, receivers’ address of the mail, policy number or date uploaded in the search dialogue box. User can also download or edit the mails if given the privilege by the admin.</li>
			</ol>
		</li> </br>

	</ol>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('componets/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- All Modal-->
    <?php include('componets/modals.php'); ?>

    <!-- ALL JavaScript-->
    <?php include('componets/scripts.php'); ?>


</body>

</html>