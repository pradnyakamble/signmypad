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
                        digits : true,
			            minlength : 10,
			            maxlength : 13
                    },
                    
                    "emailId": {
                                required: true
                    },
                    
                    "UserTypeId": {
                        required: true
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
                        digits : 'Please enter numbers only',
			            minlength : 'Please enter a Mobile No. (10 digits)',
			            maxlength : 'Please enter a Mobile No. (13 digits)'
                    },
                    
                    "emailId": {
                        required: "You must enter your Email Id"
                    },
                    
                     "UserTypeId": {
                        required: "You must selest atlist one User Type Id"
                    }
                }
            });
        });
    </script>   

   
<section class="page-wrapper" role="main">
    <section id="dashboard">
            <!-- Nav Shortcuts -->
            <!-- /Nav Shortcuts -->
        </section>
    <article class="content-box minimizer">
        <header>	
            <h2>Edit Manage User</h2>
            <nav style="display: block;">
                <ul class="button-switch">
                    <li><a href="<?php echo base_url(); ?>admin/manageuser/addmanageuser" class="button">Add New User</a>
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
                                	<legend>Editing Details of <?php echo $userDetails['FirstName'];?></legend>

								<div>
									
									<div style="padding: 10px; spacing: 10px">
										<label style="padding: 10px;">
										First Name	
										</label>
										<label style="padding: 32px;">
										<input class="small required" name="FirstName" type="text" value="<?php echo $userDetails['FirstName'];?>" />									
										</label>
									</div>
									
									<div style="padding: 10px;">
										<label style="padding: 10px;">
										Last Name	
										</label>
										<label style="padding: 32px;">
										<input class="small required" name="LastName" type="text" value="<?php echo $userDetails['LastName'];?>" />
										</label>
									</div>
									
									<div style="padding: 10px;">
										<label style="padding: 10px;">
										User Name	
										</label>
										<label style="padding: 32px;">
										<input class="small required" name="UserName" type="text" value="<?php echo $userDetails['UserName'];?>" />
										</label>
									</div>
									
									<div style="padding: 10px;">
										<label style="padding: 10px;">
										Mobile No	
										</label>
										<label style="padding: 37px;">
										<input class="small required" name="mobileNo" type="text" value="<?php echo $userDetails['mobileNo'];?>" />
										</abel>
									</div>
									
									<div style="padding: 10px;">
										<label style="padding: 15px;">
										Email 
										</label>
										<label style="padding: 58px;">
										<input class="small required email" name="emailId" type="text" value="<?php echo $userDetails['emailId'];?>" />
										</label>
									</div>
									
									<?php if($s_utid == '1'){
										
										//if(User_TypeId)?>
									<div style="padding: 10px;">
										<label style="padding: 15px;">
										User Type Id
										</label>
										<label style="padding: 15px;">
										<select class="small required UserTypeId" name="UserTypeId" value="<?php $userDetails['UserTypeId'] ;?>">
									                  <option></option>
									                  <option value="2">Admin</option>
									                  <option value ="3">User</option>
									                </select>
										</label>
									</div>
									<?php } ?>			
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