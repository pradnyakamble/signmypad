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
                    
                     "Password": {
                        required: "You must enter your Password",
                        NameRegex: "Password format not valid"
                    },
                    
                     "Status": {
                        required: "You must select atlist one Status",
                        NameRegex: "Status format not valid"
                    },
                    
                    "UserTypeId": {
                        required: "You must enter your UserTypeId",
                        NameRegex: "UserTypeId format not valid"
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
                       <?php
                     // echo validation_errors();					   
                       ?>       
                    <form action = "<?php echo base_url(); ?>admin/manageuser/addManageUser/" method = "POST" enctype="multipart/form-data">
										<table>
											<tr>
												<td>
													<label>First Name : </label>
												</td>
												<td>
													<input class="small required" type = "text" name = "FirstName" id = "FirstName"/>
													<label class="error" for="file" generated="true"><?php echo form_error('FirstName') ;?></label>
												</td>
											</tr>
											
											<tr>
												<td></br>
													<label>Last Name : </label>
												</td>
												<td>
													<input class="small required" type = "text" name = "LastName" id = "LastName"/>
													<label class="error" for="file" generated="true"><?php echo form_error('LastName') ;?></label>
												</td>
											</tr>
											
											<tr>
												<td></br>
													<label>User Name : </label>
												</td>
												<td>
													<input class="small required" type = "text" name = "UserName" id = "UserName"/>
													<label class="error" for="file" generated="true"><?php echo form_error('UserName') ;?></label>
												</td>
											</tr>
											
											<tr>
												<td></br>
													<label>Password : </label>
												</td>
												<td>
													<input class="small required" type = "text" name = "Password" id = "Password"/>
													<label class="error" for="file" generated="true"><?php echo form_error('Password') ;?></label>
												</td>
											</tr>
											
												<tr>
												<td></br>
													<label>Status : </label>
												</td>
												<td>	
													<select class="small required" name="Status" value="<?php $userDetails['Status'] ;?>">
									                  <option></option>
									                  <option value="Active">Active</option>
									                  <option value="Inactive">Inactive</option>
									                </select>
									                <label class="error" for="file" generated="true"><?php echo form_error('Status') ;?></label>
												</td>
											</tr>
											
												<tr>
												<td></br>
													<label>User Type Id : </label>
												</td>
												<td>
													<select class="small required" name="UserTypeId" value="<?php $userDetails['UserTypeId'] ;?>">
									                  <option></option>
									                  <option value="1">SuperAdmin</option>
									                  <option value="2">Admin</option>
									                  <option value ="3">User</option>
									                </select>
									                <label class="error" for="file" generated="true"><?php echo form_error('UserTypeId') ?></label>
												</td>
											</tr>
											
												<tr>
												<td></br>
													<label>Mobile No. : </label>
												</td>
												<td>
													<input class="small required" type = "text" name = "mobileNo" id = "mobileNo"/>
													<label class="error" for="file" generated="true"><?php echo form_error('mobileNo') ?></label>
												</td>
											</tr>
											
												<tr>
												<td></br>
													<label>Email Id : </label>
												</td>
												<td>
													<input class="small required" type = "text" name = "emailId" id = "emailId"/>
													<label class="error" for="file" generated="true"><?php echo form_error('emailId') ?></label>
												</td>
											</tr>
									
											<tr>
												<td colspan = "2">
													<input type="reset" class="button"/>
													<input type="submit" name="submit" value="Add New Uaer">
												</td>
											</tr>
											
										</table>
									</form> 
           
        </section>	
    </article>
</section>    
    <!-- /Main Content -->
<a id="toTop" href="#" style="display: none;"><span id="toTopHover"></span>To Top</a>
    <div></div>