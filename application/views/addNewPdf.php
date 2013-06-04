<script type="text/javascript">
       $(document).ready(function () {
            $.validator.addMethod("NameRegex", function (value, element) {
                return this.optional(element) || /^[A-Za-z][a-z0-9\_\s]+$/i.test(value);
            }, "city name must contain only letters, numbers, or dashes.");
            $("#frmadminstrator").validate({
                rules: {
                    "uploadfile": {
                        required: true
                    }

                },
                messages: {
                    "uploadfile": {
                        required: "Please select file to upload."
                    }
                }
            });
        });
    </script>
    <!-- Main Content -->
    <section class="page-wrapper" role="main">
        <section id="dashboard"></section>
        <script type="text/javascript">
            
        </script>
        <article class="content-box">
            <header>
                	<h2 style="padding-right: 90px;">Add New PDF</h2>

                <nav>
                    <ul class="button-switch">
                        <li><a href="<?php echo base_url(); ?>admin/pdfmanager/index"
                            class="button">List PDF File</a>
                        </li>
                    </ul>
                </nav>	
            </header>
            <section>
                <form id="frmadminstrator" action="<?php echo base_url(); ?>admin/pdfmanager/addNewPdfFile"  
                accept-charset="utf-8" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    <fieldset>
                        <?php $msg=validation_errors(); if(!empty($msg)){ ?>
                            <div class="notification error">	<a title="Hide Notification" class="close-notification " href="#">x</a>

                                	<h5><?php echo $msg ?></h5>

                            </div>
                            <?php } ?>
			    <div class="notification error" id="errorDiv" style="display:none"></div>
                                <?php if($this->session->flashdata('upload_fail')){?>
                                    <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                                        	<h4>Failed</h4>

                                        <p>There is some error in uploading file</p>
                                    </div>
                                    <?php }?>
                                <legend>Add New PDF</legend>
                                <dl>	
                                        <dt>
                                            <label>Select File</label>
                                        </dt>
                                    
                                    <dd>
                                        <div id ="FileUploader">
                                            <input type="hidden" value ='1' name="fileuploadercount" id ="fileuploadercount">
                                       <input type="file" name="uploadfile_1" size="20" class="required" id ="file"/><br/>
                                        
                                        </div>
                                    </dd>
                                    <dt>
                                        <label>Select User</label>
                                    </dt>
                                    <dd>
                                        <select name="User[]" class="small required" id="user" multiple="multiple">
						<option value='' selected>select</option>
                                                <?php foreach($mapUserToPdf as $mapuser) { 
                                                echo ' <option value="'.$mapuser['UserId'].'" >'.$mapuser['FirstName'].' '.$mapuser['LastName'].'</option>';
                                                  
                                                } ?>
                                        </select>
                                    </dd>
                                    <dt>
                                        <label>Comment</label>
                                    </dt>
                                    <dd>
                                        <textarea rows="4" cols="50" name="comment" class="small">
                                        </textarea>
                                    </dd>
                                    
                                </dl>
                    </fieldset>
                    <input type="submit" value="Upload" name="Upload">
                     <input type="button" value="Add More Files" name="addMore" onclick="uploadMoreFile()">
                </form>
            </section>
        </article>
    </section>
    <!-- /Main Content -->
<a id="toTop" href="#" style="display: none;"><span id="toTopHover"></span>To Top</a>
    <div></div>
    <script type="text/javascript">
        function uploadMoreFile(){
              var count = $('#fileuploadercount').val();
            count++;
            $('#fileuploadercount').val(count);
            var name = "uploadfile_"+count;
            var divId = "uplad_"+count;
            $('#FileUploader').append('<div id="'+divId+'"><input type="file" name="'+name+'" size="20" class="required" id ="name"/></t><input type="button" id="'+count+'" value ="X" onclick ="deleteFileInput(this.id)" name="cancelFile"></div>');
           
        }
        
        
        function deleteFileInput(id){
            var count = $('#fileuploadercount').val();
            count--;
            $('#fileuploadercount').val(count);
            var divId = "uplad_"+ id;
            $('#'+divId).remove();
        }
    </script>