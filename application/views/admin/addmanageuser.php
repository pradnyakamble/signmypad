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
    <article class="content-box minimizer">
        <header>	
            <h2>Add New User</h2>
        </header>
        <section>
            <div id="tab1" class="tab default-tab" style="display: block;">
                    <!-- Sample jQuery DataTable  -->
                <table class="datatable">                    
                    <form action = "<?php echo base_url(); ?>admin/manageuser/addManageUser/" method = "POST" enctype="multipart/form-data">
										<table id="table-example" class="table">
											<tr>
												<td></br>
													<center>First Name : </center>
												</td>
												<td>
													<input class="small required" type = "text" name = "FirstName" id = "FirstName"/>
												</td>
											</tr>
											
											<tr>
												<td></br>
													<center>Last Name : </center>
												</td>
												<td>
													<input class="small required" type = "text" name = "LastName" id = "LastName"/>
												</td>
											</tr>
											
											<tr>
												<td></br>
													<center>User Name : </center>
												</td>
												<td>
													<input class="small required" type = "text" name = "UserName" id = "UserName"/>
												</td>
											</tr>
											
											<tr>
												<td></br>
													<center>Password : </center>
												</td>
												<td>
													<input class="small required" type = "text" name = "Password" id = "Password"/>
												</td>
											</tr>
											
												<tr>
												<td></br>
													<center>Status : </center>
												</td>
												<td>	
													<select class="small required" name="Status" value="<?php $userDetails['Status'] ;?>">
									                  <option></option>
									                  <option value="Active">Active</option>
									                  <option value="Inactive">Inactive</option>
									                </select>
												</td>
											</tr>
											
												<tr>
												<td></br>
													<center>User Type Id : </center>
												</td>
												<td>
													<select class="small required" name="UserTypeId" value="<?php $userDetails['UserTypeId'] ;?>">
									                  <option></option>
									                  <option value="1">SuperAdmin</option>
									                  <option value="2">Admin</option>
									                  <option value ="3">User</option>
									                </select>
												</td>
											</tr>
											
												<tr>
												<td></br>
													<center>Mobile No. : </center>
												</td>
												<td>
													<input class="small required" type = "text" name = "mobileNo" id = "mobileNo"/>
												</td>
											</tr>
											
												<tr>
												<td></br>
													<center>EmailId : </center>
												</td>
												<td>
													<input class="small required" type = "text" name = "emailId" id = "emailId"/>
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
                   
                </table>
            </div>
        </section>	
    </article>
</section>    