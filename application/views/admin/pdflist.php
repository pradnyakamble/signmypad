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

            <p>Pdf file name has been updated successfully</p>
        </div>
        <?php }if($this->session->flashdata('edit_unsuccess')){?>
            <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                    <h4>Failed</h4>

                <p>There is some problem in updating pdf file name</p>
            </div>
        <?php } ?> 
    <article class="content-box minimizer">
        <header>
            
            <h2>Manage Pdf</h2>
            <nav style="display: block;">
                <ul class="button-switch">
                    <li><a href="<?php echo base_url();  ?>admin/pdfmanager/addpdf" class="button">Add Pdf File</a>
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
                                <th>File Name</th>
                                <th>Time Stamp</th>
                                <th>Date</th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($pdflistDetails)) { foreach($pdflistDetails as $istart=>$pdflistDetail) { if($istart%2==0){ $trclass="gradeA odd"; } else { $trclass="gradeA even"; } ?>
                        <tr class="<?php echo $trclass;?>">
                                <td> <?php echo $pdflistDetails[$istart]['pdfFilename']; ?></td>
                                <td><?php echo date("H:i", strtotime($pdflistDetails[$istart]['createdOn'])); ?></td>
                                <td><?php echo date("Y-m-d", strtotime($pdflistDetails[$istart]['createdOn'])); ?></td>
                                <td><?php echo $pdflistDetails[$istart]['FirstName']. ' '.$pdflistDetails[$istart]['LastName']; ?></td>
                                <td><?php echo $pdflistDetails[$istart]['status']; ?></td>
                                <td>
                                    <a href="<?php echo site_url();?>/admin/pdfmanager/editPdfDetail/<?php echo $pdflistDetails[$istart]['pdfFileId'];?>"><img src="<?php echo base_url(); ?>public/img/icons/pencil.png" alt="Pencil"></a>
                                </td>
                                <td>
                                    <a href="<?php echo site_url();?>/admin/pdfmanager/deletePdf/<?php echo $pdflistDetails[$istart]['pdfFileId'];?>"><img alt="Pencil" src="<?php echo base_url(); ?>public/img/icons/trashcan.png"></a>
                                </td>
                        </tr>
                        <?php } 
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                                <th>File Name</th>
                                <th>Time Stamp</th>
                                <th>Date</th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th> Delete </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>	
    </article>
</section>    