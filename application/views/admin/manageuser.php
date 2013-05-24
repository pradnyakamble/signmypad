<!-- Full width content box with minimizer -->
<section class="page-wrapper" role="main">
    <article class="content-box minimizer">
        <header>	
            <h2>Manage Pdf</h2>
        </header>
        <section>
            <div id="tab1" class="tab default-tab" style="display: block;">
                <h3>Table with jQuery.dataTables</h3>
                <?php if(isset($successmsg)){echo "successfully done";}
				if(isset($failmsg)){echo "There is some error";}
				 ?>
                    <!-- Sample jQuery DataTable  -->
                <table class="datatable">
                    <thead>
                        <tr>
                                <th>User Id</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>User Name(s)</th>
								<th>Password</th>
								<th>Status</th>
								<th>User TypeId</th>
								<th>mobile No.</th>
								<th>Email Id</th>
								<th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<count($query);$i++)
									  {?>	
									  	<tr>					
								<td><?php echo $query[$i]['UserId'];?></td>
								<td><?php echo $query[$i]['FirstName'];?></td>
								<td><?php echo $query[$i]['LastName'];?></td>
								<td><?php echo $query[$i]['UserName'];?></td>
								<td><?php echo $query[$i]['Password'];?></td>
								<td><?php echo $query[$i]['Status'];?></td>
								<td><?php echo $query[$i]['UserTypeId'];?></td>
								<td><?php echo $query[$i]['mobileNo'];?></td>
								<td><?php echo $query[$i]['emailId'];?></td>
								 <td><a href ="<?php echo base_url(); ?>admin/manageuser/editmanageuser?id=<?php echo $query[$i]['UserId'];?>">Edit</a>
								</tr>							
							<?php } ;?>
                    </tbody>
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