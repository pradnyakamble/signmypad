<script type="text/javascript">
       $(document).ready(function () {
            $.validator.addMethod("NameRegex", function (value, element) {
                return this.optional(element) || /^[A-Za-z][a-z0-9\_\s]+$/i.test(value);
            }, "city name must contain only letters, numbers, or dashes.");
            $("#frmadminstrator").validate();
        });
    </script>
    <!-- Main Content -->
    <section class="page-wrapper" role="main">
        <section id="dashboard"></section>
        <script type="text/javascript">
            
        </script>
        <article class="content-box">
            <header>
                	<h2 style="padding-right: 90px;">Assign PDF To User</h2>

                <nav>
                    <ul class="button-switch">
                        <li><a href="<?php echo base_url(); ?>admin/pdfmanager/index"
                            class="button">List PDF File</a>
                        </li>
                    </ul>
                </nav>	
            </header>
            <section>
                <form id="frmadminstrator" action="<?php echo base_url(); ?>admin/pdfmanager/revokeUserFromPdf/<?php echo $pdfId; ?>"
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

                                        <p>PDF name already Exist</p>
                                    </div>
                                    <?php }?>
                                <legend>PDF File Access</legend>
                                <dl>	
                                        <dt>
                                            <label>Total User</label>
                                        </dt>

                                    <dd>
                                        <select  class="small " disabled ="disabled" multiple="multiple" id="totalUser" name="totaluser">
                                                <?php foreach($UserList as $User) { 
                                                echo ' <option value="'.$User['UserId'].'" >'.$User['FirstName'].' '.$User['LastName'].'</option>';
                                                } ?>
                                        </select>
                                    </dd>
                                    <dt>
                                            <label>Select User To Revoke Permission</label>
                                        </dt>

                                    <dd>
                                        <select name="User[]" class="small required" id="user" multiple="multiple">
						<option value='' selected>select</option>
                                                <?php foreach($revokeUserList as $revokeUser) { 
                                                echo ' <option value="'.$revokeUser['UserId'].'" >'.$revokeUser['FirstName'].' '.$revokeUser['LastName'].'</option>';
                                                  
                                                } ?>
                                        </select>
                                    </dd>
                                    
                                </dl>
                    </fieldset>
                    <input type="submit" value="Revoke Access" name="Revoke Access">
                </form>
            </section>
        </article>
    </section>
    <!-- /Main Content -->
<a id="toTop" href="#" style="display: none;"><span id="toTopHover"></span>To Top</a>
    <div></div>