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
                    <thead>
                        <tr>
                                <th>File Name</th>
                                <th>Time Stamp</th>
                                <th>Date</th>
                                <th>Created By</th>
                                <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($pdflistDetails)) { foreach($pdflistDetails as $istart=>$pdflistDetail) { if($istart%2==0){ $trclass="gradeA odd"; } else { $trclass="gradeA even"; } ?>
                        <tr class="<?php echo $trclass;?>">
                                <td> <?php echo $pdflistDetails[$istart]['pdfFilename']; ?></td>
                                <td><?php echo date("H:i:s", strtotime($pdflistDetails[$istart]['createdOn'])); ?></td>
                                <td><?php echo date("Y-m-d", strtotime($pdflistDetails[$istart]['createdOn'])); ?></td>
                                <td><?php echo $pdflistDetails[$istart]['FirstName']. ' '.$pdflistDetails[$istart]['LastName']; ?></td>
                                <td><?php echo $pdflistDetails[$istart]['status']; ?></td>
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
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>	
    </article>
</section>    