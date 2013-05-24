<!-- Full width content box with minimizer -->
<section class="page-wrapper" role="main">
    <article class="content-box minimizer">
        <header>	
            <h2>Manage Pdf</h2>
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
										Name:	
										</label>
										<input name="FirstName" type="text" value="<?php echo $arrData['0']['FirstName'];?>" class="required" />
										</p>
									</div>
									
									<div>
										<p>
										<label for="file">
										Sub Title:	
										</label>
										<input name="LastName" type="text" value="<?php echo $arrData['0']['LastName'];?>" class="required" />
										</p>
									</div>
									
									<div>
										<p>
										<label for="file">
										Address:	
										</label>
										<input name="UserName" type="text" value="<?php echo $arrData['0']['UserName'];?>" class="required" />
										</p>
									</div>
									
										<div>
										<p>
										<label for="file">
										Phone No:	
										</label>
										<input name="mobileNo" type="text" value="<?php echo $arrData['0']['mobileNo'];?>" class="required" />
										</p>
									</div>
									
										<div>
										<p>
										<label for="file">
										Phone No:	
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
						  
                    <tfoot>
                        <tr>
                                <th>File Name</th>
                                <th>Time Stamp</th>
                                <th>Date</th>
                                <th>Created By</th>
                                <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>	
    </article>
</section>    