<!-- Full width content box with minimizer -->
        
<section class="page-wrapper" role="main">
    <section id="dashboard">

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
								<th>Edit </th>
								<th>Delete </th>
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
								<td><a href ="<?php echo base_url(); ?>admin/manageuser/editmanageuser?id=<?php echo $query[$i]['UserId'];?>"><img src="<?php echo base_url(); ?>public/img/icons/pencil.png" alt="Pencil"></a>
								<td><a href ="<?php echo base_url(); ?>admin/manageuser/editmanageuser?id=<?php echo $query[$i]['UserId'];?>"><img alt="Pencil" src="<?php echo base_url(); ?>public/img/icons/trashcan.png"></a>
								</tr>							
							<?php } ;?>
                    </tbody>
                    <tfoot>
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
								<th>Edit </th>
								<th>Delete </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>	
    </article>
</section>    