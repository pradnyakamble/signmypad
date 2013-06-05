<!-- Full width content box with minimizer -->

<script type="text/javascript">

       $(document).ready(function () {
       	
           $.validator.addMethod("NameRegex", function (value, element) {
                return this.optional(element) || /^[A-Za-z][a-z0-9\_\s]+$/i.test(value);
            }, "city name must contain only letters, numbers, or dashes.");
            $.validator.addMethod("PasswordRegex",function(value,element){
                return this.optional(element)|| /(?=.*[A-Z])(?=.*\W).{8}/.test(value);
            },"Password must contain minimum of 8 characters, with 1 capital and 1 special character.");
            $("#frmadminstrator").validate({
                rules: {                    
                    
                    "emailId": {
                                required: true
                    },
                    
                    "Password1": {
                        required: true,
                        PasswordRegex: true
                    },
                    
                     "Password2": {
                        required: true,
                        equalTo: "#Password1",
                        PasswordRegex: true
                    }
                },
                
                messages: {                   
                    "emailId": {
                        required: "You must enter your Email Id"
                    },
                    
                     "Password1": {
                        required: "You must enter your Password",
                        PasswordRegex: "Password requires one capital latter, one special character and minimum of 8 characters."
                    },
                    
                    "Password2": {
                        required: "You must enter your Password",
                        PasswordRegex: "Password requires one capital latter, one special character and minimum of 8 characters."
                    },
                }
            });
        });
    </script>   

   
<section class="page-wrapper" role="main">
    <section id="dashboard">
            <!-- Nav Shortcuts -->
            <!-- /Nav Shortcuts -->

    <article class="content-box minimizer">
        <header>	
            <h2>Edit Your Detail</h2>
            <nav style="display: block;">
                <ul class="button-switch">
                    <li><a href="<?php echo base_url(); ?>admin/manageuser/addmanageuser" class="button">Add New User</a>
                    </li>
                </ul>
            </nav>
        </header> 
        <section>
            
                    <!-- Sample jQuery DataTable  -->
             
                    
											
                    <form class="validate" name="frmadminstrator" id="frmadminstrator" action="<?php echo base_url(); ?>login/editUserdetail" method="post" enctype="multipart/form-data">
								<input type = "hidden" name = "UserId" value= "<?php echo $s_id;?>"/>
								<fieldset>
									 <?php if($this->session->flashdata('edit_unsuccess')){?>
            <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Failed</h4>

                <p>Email id already exist you can not use this email id</p>
            </div>
        <?php } ?> 
                                	<legend>Change Your Password <?php echo $s_fname;?></legend>

								<dl>
									
									<dt>
										<label>First Name : </label>
									</dt>
									<dd>
										<div id ="FileUploader">
										<input class="small required" type = "text" name = "FirstName" id = "FirstName" value="<?php echo $s_fname; ?>"/>
										</div>
									</dd>
							
									<dt>
										<label>Last Name : </label>
									</dt>
									<dd>
										<div id ="FileUploader">
										<input class="small required" type = "text" name = "LastName" id = "LastName" value="<?php echo $s_lname; ?>"/>
										</div>
									</dd>
								
									<dt>
										<label>User Name : </label>
									</dt>
									<dd>
										<div id ="FileUploader">
										<input class="small required" type = "text" name = "UserName" id = "UserName" value="<?php echo $s_uname; ?>"/>
										</div>
									</dd>
									
									<dt>
										<label>Mobile No. : </label>
									</dt>
									<dd>
										<div id ="FileUploader">
										<input class="small required mobile" type = "text" name = "mobileNo" id = "mobileNo" value="<?php echo $s_mob; ?>"/>
										</div>
									</dd>
								
								
									<dt>
										<label>Email : </label>
									</dt>
									<dd>
										<div id ="FileUploader">
										<input class="small required email" type = "text" name = "emailId" id = "emailId" value="<?php echo $s_email; ?>"/>										
										</div>
									</dd>
									
									<dt>
										<label>New Password : </label>
									</dt>
									<dd>
										<div id ="FileUploader">
										<input class="small required" type = "password" name = "Password1" id = "Password1"/>										
										</div>
									</dd>
									
									
									<dt>
										<label>Conform Password : </label>
									</dt>
									<dd>
										<div id ="FileUploader">
										<input class="small required" type = "password" name = "Password2" id = "Password2" />										
										</div>
									</dd>
						
								</dl>
											
								
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