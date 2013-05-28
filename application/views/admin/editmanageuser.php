<!-- Full width content box with minimizer -->

<script type="text/javascript">

       $(document).ready(function () {
       	
            $.validator.addMethod("NameRegex", function (value, element) {
                return this.optional(element) || /^[A-Za-z][a-z0-9\_\s]+$/i.test(value);
            }, "city name must contain only letters, numbers, or dashes.");
            $("#frmadminstrator").validate({
                rules: {
                    "FirstName": {
                        required: true,
                        NameRegex: true
                    },
                    
                    "LastName": {
                        required: true,
                        NameRegex: true
                    },
                    																	
                    "UserName": {
                        required: true,
                        NameRegex: true
                    },
                    
                    "mobileNo": {
                        required: true,
                        NameRegex: true
                    },
                    
                    "emailId": {
							  required: true,
                       		  NameRegex: true
							                       
                    }
                },
                
                messages: {
                    "FirstName": {
                        required: "You must enter your Frist Name",
                        NameRegex: "Frist Name format not valid"
                    },
                    
                    "LastName": {
                        required: "You must enter your Last Name",
                        NameRegex: "Last Name format not valid"
                    },
                    
                    "UserName": {
                        required: "You must enter your User Name",
                        NameRegex: "User Name format not valid"
                    },
                    
                    "mobileNo": {
                        required: "You must enter your Mobile No.",
                        NameRegex: "Mobile No. format not valid"
                    },
                    
                    "emailId": {
                        required: "You must enter your Email Id",
                        NameRegex: "Email Id format not valid"
                    }
                }
            });
        });
    </script>   

   <!--
   <script type="text/javascript">
        $().ready(function() {
            // validate the comment form when it is submitted
            $("#frmadminstrator").validate();

            // validate signup form on keyup and submit
            $("#frmadminstrator").validate({
                rules: {
                    FirstName: "required",
                    LastName: "required",
                    UserName: "required",
                    mobileNo: "required",

                    emailId: {
                        required: true,
                        email: true
                    },                },
                messages: {
                    FirstName: "You must enter your Frist Name",
                    LastName: "You must enter your Last Name",
                    UserName: "You must enter your User Name",
                    mobileNo: "You must enter your Mobile No.",

                    email: "Please enter a valid email address"
                    
                }
            });

        });
    </script>
    -->
<section class="page-wrapper" role="main">
    <section id="dashboard">
            <!-- Nav Shortcuts -->
            <!-- /Nav Shortcuts -->
        </section>
    <article class="content-box minimizer">
        <header>	
            <h2>Manage User</h2>
            <nav style="display: block;">
                <ul class="button-switch">
                    <li><a href="<?php echo base_url();  ?>admin/manageuser/addmanageuser" class="button">Add New User</a>
                    </li>
                </ul>
            </nav>
        </header> 
        <section>
            
                    <!-- Sample jQuery DataTable  -->
             
                    
											
                    <form class="validate" name="frmadminstrator" id="frmadminstrator" action="<?php echo base_url(); ?>admin/manageuser/editmanageuserdetail" method="post" enctype="multipart/form-data">
								<input type = "hidden" name = "UserId" value= "<?php echo $userDetails['UserId'];?>"/>
								<fieldset>
									 <?php if($this->session->flashdata('edit_unsuccess')){?>
            <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Failed</h4>

                <p>Email id already exist you can not use this email id</p>
            </div>
        <?php } ?> 
                                	<legend>Edit Details of <?php echo $userDetails['FirstName'];?></legend>

								<div>
									
									<div style="padding: 10px; spacing: 10px">
										<label style="padding: 15px;">
										First Name	
										</label>
										<input class="small required" name="FirstName" type="text" value="<?php echo $userDetails['FirstName'];?>" />									
									</div>
									
									<div style="padding: 10px;">
										<label style="padding: 15px;">
										Last Name	
										</label>
										<input class="small required" name="LastName" type="text" value="<?php echo $userDetails['LastName'];?>" />
									</div>
									
									<div style="padding: 10px;">
										<label style="padding: 15px;">
										User Name	
										</label>
										<input class="small required" name="UserName" type="text" value="<?php echo $userDetails['UserName'];?>" />
									
									</div>
									
									<div style="padding: 10px;">
										<label style="padding: 10px;">
										Mobile No	
										</label>
										<label style="padding: 15px;">
										<input class="small required" name="mobileNo" type="text" value="<?php echo $userDetails['mobileNo'];?>" />
										</abel>
									</div>
									
									<div style="padding: 10px;">
										<label style="padding: 15px;">
										Email Id:	
										</label>
										<label style="padding: 15px;">
										<input class="small required" name="emailId" type="text" value="<?php echo $userDetails['emailId'];?>" />
										</label>
									</div>
										<br>					
								</div>
								</fieldset>
								<div class="actions" style="width: 920px;">
									<div>
										<input type="reset" class="button"/>
										<input type="submit" value="Update User Name" name="cmdSubmit"/>
									</div>
								</div>
						  </form>
						  
                   
                
           
        </section>	
    </article>
</section>    