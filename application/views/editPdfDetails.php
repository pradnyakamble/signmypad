<script type="text/javascript">
       $(document).ready(function () {
            $.validator.addMethod("NameRegex", function (value, element) {
                return this.optional(element) || /^[A-Za-z][a-z0-9\_\s]+$/i.test(value);
            }, "city name must contain only letters, numbers, or dashes.");
            $("#frmadminstrator").validate({
                rules: {
                    "pdfFileName": {
                        required: true,
                        NameRegex: true,
                    }

                },
                messages: {
                    "pdfFileName": {
                        required: "You must enter a pdf File  name",
                        NameRegex: "Pdf File Name format not valid"
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
        <article class="content-box minimizer">
            <header>
                	<h2 style="padding-right: 90px;">Pdf detail/h2>

                <nav>
                    <ul class="button-switch">
                        <li><a href="<?php echo base_url(); ?>admin/pdfmanager/index"
                            class="button">List Pdf File</a>
                        </li>
                    </ul>
                </nav>	<a style="display: block; left: 163px;" href="#" class="content-box-minimizer"
                title="Toggle Content Block">Toggle</a>
	<a title="Toggle Content Block"
                class="content-box-minimizer" href="#" style="display: block; left: 163px;">Toggle</a>
            </header>
            <section>
                <form id="frmadminstrator" action="<?php echo base_url(); ?>admin/pdfmanager/editPdfDetail/<?php echo $pdfFileDetails['pdfFileId']; ?>"
                accept-charset="utf-8" method="post" novalidate="novalidate">
                    <fieldset>
                        <?php $msg=validation_errors(); if(!empty($msg)){ ?>
                            <div class="notification error">	<a title="Hide Notification" class="close-notification " href="#">x</a>

                                	<h5><?php echo $msg ?></h5>

                            </div>
                            <?php } ?>
			    <div class="notification error" id="errorDiv" style="display:none"></div>
                                <?php if($this->session->flashdata('edit_unsuccess')){?>
                                    <div class="notification attention">	<a href="#" class="close-notification " title="Hide Notification">x</a>

                                        	<h4>Failed</h4>

                                        <p>Pdf name already Exist</p>
                                    </div>
                                    <?php }?>
                                <legend>Pdf File Details</legend>
                                <dl>	<dt>
                                        <label>Pdf File Name</label>
                                        </dt>
                                        <dd>
                                            <input type="text" class="small required" id="yardRegionName" value="<?php echo $pdfFileDetails['pdfFilename'];?>"
                                            name="pdfFileName">
                                        </dd>
                                        <dt>
                                            <label>Select pdf File status</label>
                                        </dt>

                                    <dd>
                                        <select name="status" class="small required">
						<option value="">select</option>
                                                <option value="published" <?php if($pdfFileDetails['status']=="published") echo 'selected="selected"';?>>Published</option>
                                                <option value="Unpublished" <?php if($pdfFileDetails['status']=="Unpublished") echo 'selected="selected"';?>>Unpublished</option>
                                        </select>
                                    </dd>
                                </dl>
                    </fieldset>
                    <input type="submit" value="Update Pdf File" name="cmdSubmit">
                </form>
            </section>
        </article>
    </section>
    <!-- /Main Content -->
<a id="toTop" href="#" style="display: none;"><span id="toTopHover"></span>To Top</a>
    <div></div>