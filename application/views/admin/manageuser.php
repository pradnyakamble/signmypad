<!-- Full width content box with minimizer -->
        
<section class="page-wrapper" role="main">
    <section id="dashboard">
	<?php if($this->session->flashdata('edit_success')){?>
        <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>User data has been updated successfully</p>
        </div>
        <?php }if($this->session->flashdata('edit_unsuccess')){?>
            <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Failed</h4>

                <p>There is some problem in updating User data</p>
            </div>
        <?php } if($this->session->flashdata('del_unsuccess')){?>
        <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                <h4>Failed</h4>

            <p>some user one is login with this user id we cannot delete this user data !!</p>
        </div> 
    <?php } if($this->session->flashdata('del_success')){?>
        <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>User data is Deleted Successfully !!</p>
        </div>
           <?php } if($this->session->flashdata('allowAccess_success')){?>
        <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>User Data hase been successfully added in Database !!</p>
        </div>
    <?php } if($this->session->flashdata('allowAccess_unsuccess')) { ?>
     <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>There is some problem please try later.</p>
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
                        <!-- Sample jQuery DataTable  -->
                <table class="datatable">
                    <thead>
                        <tr>
                                <th>User Id</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>User Name(s)</th>
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
								<td><?php echo $query[$i]['mobileNo'];?></td>
								<td><?php echo $query[$i]['emailId'];?></td>
								<td><a href ="<?php echo base_url(); ?>admin/manageuser/editmanageuserdetail/<?php echo $query[$i]['UserId'];?>"><img src="<?php echo base_url(); ?>public/img/icons/pencil.png" alt="Pencil"></a>
								<td><a href ="<?php echo base_url(); ?>admin/manageuser/delManageUser/<?php echo $query[$i]['UserId'];?>"><img alt="Pencil" src="<?php echo base_url(); ?>public/img/icons/trashcan.png"></a>
								</tr>							
							<?php } ;?>
                    </tbody>
                    <tfoot>
                        <tr>
                               <th>User Id</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>User Name(s)</th>
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
 