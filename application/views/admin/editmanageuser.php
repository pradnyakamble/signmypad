<!-- Full width content box with minimizer -->
        
<section class="page-wrapper" role="main">
    <section id="dashboard">
            <!-- Nav Shortcuts -->
            <!-- /Nav Shortcuts -->
        </section>
<?php if($this->session->flashdata('edit_success')){?>
        <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>User Name has been updated successfully</p>
        </div>
        <?php }if($this->session->flashdata('edit_unsuccess')){?>
            <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Failed</h4>

                <p>There is some problem in updating User Name</p>
            </div>
        <?php } ?> 
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
            <div id="tab1" class="tab default-tab" style="display: block;">
                <h3>Table with jQuery.dataTables</h3>
                    <!-- Sample jQuery DataTable  -->
                <table class="datatable">                    
                    <?php for($i = 0;$i<count($arrData);$i++)
										{?>	
											<center><h2 class="grid_12">Edit Details of <?php echo $arrData['0']['FirstName'];?></h2></center>
                    <form class="validate" novalidate action="<?php echo base_url(); ?>admin/manageuser/editmanageuserdetails" method="post" enctype="multipart/form-data">
								<input type = "hidden" name = "UserId" value= "<?php echo $arrData['0']['UserId'];?>"/>
								<div class="content" style="width: 900px;">
									<div>
										<p>
										<label for="file">
										First Name:	
										</label>
										<input name="FirstName" type="text" value="<?php echo $arrData['0']['FirstName'];?>" class="required" />
										</p>
									</div>
									
									<div>
										<p>
										<label for="file">
										Last Name:	
										</label>
										<input name="LastName" type="text" value="<?php echo $arrData['0']['LastName'];?>" class="required" />
										</p>
									</div>
									
									<div>
										<p>
										<label for="file">
										User Name:	
										</label>
										<input name="UserName" type="text" value="<?php echo $arrData['0']['UserName'];?>" class="required" />
										</p>
									</div>
									
										<div>
										<p>
										<label for="file">
										Mobile No:	
										</label>
										<input name="mobileNo" type="text" value="<?php echo $arrData['0']['mobileNo'];?>" class="required" />
										</p>
									</div>
									
										<div>
										<p>
										<label for="file">
										Email Id:	
										</label>
										<input name="emailId" type="text" value="<?php echo $arrData['0']['emailId'];?>" class="required" />
										</p>
									</div>
															
								</div>
								<div class="actions" style="width: 920px;">
									<div class="actions-left">
										<input type="reset" />
									</div>
									<div class="actions-right">
										<input type="submit" />
									</div>
								</div>
							
						  </form>
						  <?php } ?>
                   
                </table>
            </div>
        </section>	
    </article>
</section>    