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
                    }
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
                                	<legend>Change Detail of <?php echo $s_fname;?></legend>

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
								<!--	
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
								-->
								</dl>
											
								
								</fieldset>
								<div class="actions" style="width: 920px;">
									<div>
										<input type="reset" class="button"/>
										<input type="submit" value="Update User Detail" name="cmdSubmit"/>
									</div>
								</div>
						  </form>
						  
                   
                
           
        </section>	
    </article>
</section>    



<!-- Full width content box with minimizer -->

<script type="text/javascript">

       $(document).ready(function () {
       	
            $.validator.addMethod("PasswordRegex",function(value,element){
                return this.optional(element)|| /(?=.*[A-Z])(?=.*\W).{8}/.test(value);
            },"Password must contain minimum of 8 characters, with 1 capital and 1 special character.");
            $("#passadminstrator").validate({
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
 <section>
 	
 	<?php if($this->session->flashdata('password_update_success')) { ?>
     <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>Password hase been successfully Updated !!</p>
        </div>
  
    <?php } if($this->session->flashdata('password_update_fail')) { ?>
     <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>There is some problem please try later !!</p>
        </div>
  
  
        <?php } ?>
    <article class="content-box minimizer">
        <header>	
            <h2>Edit Your Password</h2>            
        </header> 
        <section>
            
                    <!-- Sample jQuery DataTable  -->
             
                    
											
                    <form class="validate" name="passadminstrator" id="passadminstrator" action="<?php echo base_url(); ?>login/getUserPass" method="post" enctype="multipart/form-data">
								<input type = "hidden" name = "UserId" value= "<?php echo $s_id;?>"/>
								<fieldset>
									 <?php if($this->session->flashdata('edit_unsuccess')){?>
            <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Failed</h4>

                <p>Email id already exist you can not use this email id</p>
            </div>
        <?php } ?> 
                                	<legend>Change Password of <?php echo $s_fname;?></legend>

								<dl>
									
									<dt>
										<label>Old Password : </label>
									</dt>
									<dd>
										<div id ="FileUploader">
										<input class="small required" type = "text" name = "Password" id = "Password" >										
										</div>
									</dd>
									
									<dt>
										<label>New Password : </label>
									</dt>
									<dd>
										<div id ="FileUploader">
										<input class="small required" type = "text" name = "Password1" id = "Password1"/>										
										</div>
									</dd>
									
									
									<dt>
										<label>Conform Password : </label>
									</dt>
									<dd>
										<div id ="FileUploader">
										<input class="small required" type = "text" name = "Password2" id = "Password2" />										
										</div>
									</dd>
								
								</dl>
											
								
								</fieldset>
								<div class="actions" style="width: 920px;">
									<div>
										<input type="reset" class="button"/>
										<input type="submit" value="Update User Password" name="cmdSubmit"/>
									</div>
								</div>
						  </form>
						  
                   
                
           
        </section>	
    </article>
</section>    