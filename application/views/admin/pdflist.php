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

            <p>PDF file name has been updated successfully</p>
        </div>
        <?php }if($this->session->flashdata('edit_unsuccess')){?>
            <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Failed</h4>

                <p>There is some problem in updating PDF file name</p>
            </div>
        <?php } if($this->session->flashdata('del_unsuccess')){?>
        <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                <h4>Failed</h4>

            <p>some users are accessing this PDF we cannot delete this PDF file</p>
        </div> 
    <?php } if($this->session->flashdata('del_success')){?>
        <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>PDF File Deleted Successfully !!</p>
        </div>
    <?php } if($this->session->flashdata('allowAccess_success')){?>
        <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>User hase been successfully allowded to access PDF</p>
        </div>
    <?php } if($this->session->flashdata('allowAccess_unsuccess')) { ?>
     <div class="notification attention">	
         <a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Failed</h4>

            <p>There is some problem please try later.</p>
        </div>
    <?php } if($this->session->flashdata('add_success')) { ?>
     <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>PDF file has been uploaded successfully</p>
        </div>
    <?php } if($this->session->flashdata('add_unsuccess')) { ?>
     <div class="notification attention">	
         <a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Failed</h4>

            <p>There is some problem while uploading file . please try later .</p>
        </div>
    <?php } if($this->session->flashdata('revokeAccess_success')){?>
        <div class="notification success"
        id="success">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Success</h4>

            <p>User hase been successfully revoked to access PDF</p>
        </div>
    <?php } if($this->session->flashdata('revokeAccess_unsuccess')) { ?>
     <div class="notification attention">	
         <a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Failed</h4>

            <p>There is some problem while revoking the permission .please try later.</p>
    <?php } ?>
    <article class="content-box">
        <header>
            
            <h2>Manage PDF</h2>
            <nav style="display: block;">
                <ul class="button-switch">
                    <li><a href="<?php echo base_url();  ?>admin/pdfmanager/addNewPdfFile" class="button">Add PDF File</a>
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
                                <th style="width: 35%;">File Name</th>
                                <th style="width: 3%;">Time Stamp</th>
                                <th style="width: 5%;">Date Stamp</th>
                                <th style="width: 8%;">Location Stamp</th>
                                <th style="width: 8%;">Signature</th>
                                <th style="width: 8%;">Status</th>
                                <th style="width: 7%;">Assign</th>
                                <th style="width: 7%;">Revoke</th>
                                <th style="width: 7%;">Delete </th>
                                <th style="width: 10%;">Created By</th>
                               
                                
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($pdflistDetails)) { foreach($pdflistDetails as $istart=>$pdflistDetail) { if($istart%2==0){ $trclass="gradeA odd"; } else { $trclass="gradeA even"; } ?>
                        <tr class="<?php echo $trclass;?>">
                                <td> <a href="<?php echo site_url();?>/admin/pdfmanager/downloadPdf/<?php echo $pdflistDetails[$istart]['pdfFileId'];?>"><?php echo $pdflistDetails[$istart]['pdfFilename']; ?></a></td>
                                <td><?php echo date("H:i", strtotime($pdflistDetails[$istart]['createdOn'])); ?></td>
                                <td><?php echo date("Y-m-d", strtotime($pdflistDetails[$istart]['createdOn'])); ?></td>
                                <td>location</td>
                                <td>Signature</td>
                                <td><?php echo $pdflistDetails[$istart]['status']; ?></td>
                                <td><?php if(!empty($pdflistDetails[$istart]['mapUserToPdf'])) {  ?>
                                    <a href="<?php echo site_url();?>/admin/pdfmanager/mappUserToPdf/<?php echo $pdflistDetails[$istart]['pdfFileId'];?>"><img src="<?php echo base_url(); ?>public/img/icons/buttons/unlocked.png" alt="unlocked"></a>
                                    <?php } else { ?>
                                    ---
                                    <?php } ?>
                                </td>
                                
                                
                                <!--<td><?php// if(empty($pdflistDetails[$istart]['alreadyMapUserToPdf'])) {  ?>
                                    <a href="<?php //echo site_url();?>/admin/pdfmanager/editPdfDetail/<?php //echo $pdflistDetails[$istart]['pdfFileId'];?>"><img src="<?php //echo base_url(); ?>public/img/icons/pencil.png" alt="Pencil"></a>
                                    <?php //} else { ?>
                                    ---
                                    <?php// } ?>
                                </td> -->
                                <td><?php if(!empty($pdflistDetails[$istart]['alreadyMapUserToPdf'])) {  ?>
                                    <a href="<?php echo site_url();?>/admin/pdfmanager/revokeUserFromPdf/<?php echo $pdflistDetails[$istart]['pdfFileId'];?>"><img src="<?php echo base_url(); ?>public/img/icons/buttons/locked_2.png" alt="locked"></a></td>
                                 <?php } else { ?>
                                    ---
                                  <?php } ?>
                                <td><?php if(empty($pdflistDetails[$istart]['alreadyMapUserToPdf'])) {  ?>
                                    <a href="<?php echo site_url();?>/admin/pdfmanager/deletePdfFile/<?php echo $pdflistDetails[$istart]['pdfFileId'];?>"><img alt="Trashcan" src="<?php echo base_url(); ?>public/img/icons/buttons/trashcan.png"></a>
                                    <?php } else { ?>
                                    ---
                                    <?php } ?>
                                </td>
                                <td><?php echo $pdflistDetails[$istart]['FirstName']. ' '.$pdflistDetails[$istart]['LastName']; ?></td>
                                
                                
                        </tr>
                        <?php } 
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                                <th style="width: 35%;">File Name</th>
                                <th style="width: 3%;">Time Stamp</th>
                                <th style="width: 5%;">Date Stamp</th>
                                <th style="width: 8%;">Location Stamp</th>
                                <th style="width: 8%;">Signature</th>
                                <th style="width: 8%;">Status</th>
                                <th style="width: 7%;">Assign</th>
                                <th style="width: 7%;">Revoke</th>
                                <th style="width: 7%;">Delete </th>
                                <th style="width: 10%;">Created By</th>
                               
                               
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>	
    </article>
</section>    