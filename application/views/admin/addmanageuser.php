<!-- Full width content box with minimizer -->
<section class="page-wrapper" role="main">
    <article class="content-box minimizer">
        <header>	
            <h2>Manage Pdf</h2>
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
													<input class="small required" type = "text" name = "Status" id = "Status"/>
												</td>
											</tr>
											
												<tr>
												<td></br>
													<center>User Type Id : </center>
												</td>
												<td>
													<!-- <input type = "text" name = "UserTypeId" id = "UserTypeId"/> -->
													<select class="small required" name="UserTypeId" value="<?=$userDetails['UserTypeId'] ?>">
									                  <option></option>
									                  <option>1</option>
									                  <option>2</option>
									                  <option>3</option>
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