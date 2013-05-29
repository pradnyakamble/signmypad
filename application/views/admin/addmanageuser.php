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
                    
                    "Password": {
                        required: true,
                        NameRegex: true
                    },
                    
                    "Status": {
                        required: true,
                        NameRegex: true
                    },
                    
                    "UserTypeId": {
                        required: true,
                    },
                    
                    "mobileNo": {
                        required: true,
                        digits : true,
			            minlength : 10,
			            maxlength : 13
                    },
                    
                    "emailId": {
							  required: true,
							                       
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
                    
                     "Password": {
                        required: "You must enter your Password",
                        NameRegex: "Password format not valid"
                    },
                    
                     "Status": {
                        required: "You must select atlist one Status",
                        NameRegex: "Status format not valid"
                    },
                    
                    "UserTypeId": {
                        required: "You must selest atlist one User Type Id",
                    },
                    
                    "mobileNo": {
                        required: "You must enter your Mobile No.",
                        digits : 'Please enter numbers only',
			            minlength : 'Please enter a Mobile No. (10 digits)',
			            maxlength : 'Please enter a Mobile No. (13 digits)'
                    },
                    
                    "emailId": {
                        required: "You must enter your Email Id",
                         
                    }
                }
            });
        });
    </script>   
    <script>
     $.validator.addMethod("NameRegex", function (value, element) {
                return this.optional(element) || /^[A-Za-z][a-z0-9\_\s]+$/i.test(value);
            }, "city name must contain only letters, numbers, or dashes.");
    </script>
<section class="page-wrapper" role="main">
	  <section id="dashboard"></section>
        <script type="text/javascript">
            
        </script>
    <article class="content-box minimizer">
        <header>	
            <h2 style="padding-right: 90px;">Add New User</h2>
            
             <nav>
                    <ul class="button-switch">
                        <li><a href="<?php echo base_url(); ?>admin/manageuser"
                            class="button">User Manage List</a>
                        </li>
                    </ul>
                </nav>	
                <a style="display: block; left: 163px;" href="#" class="content-box-minimizer"
                title="Toggle Content Block">Toggle</a>
				<a title="Toggle Content Block"
                class="content-box-minimizer" href="#" style="display: block; left: 163px;">Toggle</a>
        </header>
        <section>
           
             <form name="frmadminstrator" id="frmadminstrator" action = "<?php echo base_url(); ?>admin/manageuser/addManageUser/" method = "POST" enctype="multipart/form-data">
										
										   <?php $msg=validation_errors(); if(!empty($msg)){ ?>
                            <div class="notification error">	<a title="Hide Notification" class="close-notification " href="#">x</a>

                                	<h5><?php echo $msg ?></h5>

                            </div>
                            <?php } ?> 
										 
										  <fieldset>
											<dl>
												<dt>
													<label>First Name : </label>
												</dt>
												<dd>
													<div id ="FileUploader">
													<input class="small required" type = "text" name = "FirstName" id = "FirstName"/>
													<label class="error" for="file" generated="true"><?php echo form_error('FirstName') ;?></label>
													</div>
												</dd>
										
												<dt>
													<label>Last Name : </label>
												</dt>
												<dd>
													<div id ="FileUploader">
													<input class="small required" type = "text" name = "LastName" id = "LastName"/>
													<label class="error" for="file" generated="true"><?php echo form_error('LastName') ;?></label>
													</div>
												</dd>
											
												<dt>
													<label>User Name : </label>
												</dt>
												<dd>
													<div id ="FileUploader">
													<input class="small required" type = "text" name = "UserName" id = "UserName"/>
													<label class="error" for="file" generated="true"><?php echo form_error('UserName') ;?></label>
													</div>
												</dd>
											
												<dt>
													<label>Password : </label>
												</dt>
												<dd>
													<div id ="FileUploader">
													<input class="small required" type = "text" name = "Password" id = "Password"/>
													<label class="error" for="file" generated="true"><?php echo form_error('Password') ;?></label>
													</div>
												</dd>
											</tr>
											
												<tr>
												<dt>
													<label>Status : </label>
												</dt>
												<dd>	
													<div id ="FileUploader">
													<select class="small required" name="Status" value="<?php $userDetails['Status'] ;?>">
									                  <option></option>
									                  <option value="Active">Active</option>
									                  <option value="Inactive">Inactive</option>
									                </select>
									                <label class="error" for="file" generated="true"><?php echo form_error('Status') ;?></label>
									                </div>
												</dd>
											
												<dt>
													<label>User Type Id : </label>
												</dt>
												<dd>
													<div id ="FileUploader">
													<select class="small required UserTypeId" name="UserTypeId" value="<?php $userDetails['UserTypeId'] ;?>">
									                  <option></option>
									                  <option value="1">SuperAdmin</option>
									                  <option value="2">Admin</option>
									                  <option value ="3">User</option>
									                </select>
									                <label class="error" for="file" generated="true"><?php echo form_error('UserTypeId') ?></label>
									                </div>
												</dd>
											</tr>
											
												<tr>
												<dt>
													<label>Mobile No. : </label>
												</dt>
												<dd>
													<div id ="FileUploader">
													<input class="small required mobile" type = "text" name = "mobileNo" id = "mobileNo"/>
													<label class="error" for="file" generated="true"><?php echo form_error('mobileNo') ?></label>
													</div>
												</dd>
											
												<dt>
													<label>Email Id : </label>
												</dt>
												<dd>
													<div id ="FileUploader">
													<input class="small required email" type = "text" name = "emailId" id = "emailId"/>
													<label class="error" for="file" generated="true"><?php echo form_error('emailId') ?></label>
													</div>
												</dd>
												
											</dl>
										  </fieldset>
												
													<input type="reset" class="button"/>
													<input type="submit" name="submit" value="Add New Uaer">
												
									</form> 
        </section>	
    </article>
</section>    
    <!-- /Main Content -->
<a id="toTop" href="#" style="display: none;"><span id="toTopHover"></span>To Top</a>
    <div></div>