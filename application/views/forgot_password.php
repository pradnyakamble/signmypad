<script>
    $(document).ready(function(){
        $("#Form").validate();
                            
    });
</script>
<style type="text/css">
    form p {
        margin: 0;
        padding: 0;
        color: red;
    }
</style>
<div class="clear"></div>
    <form action="<?php echo base_url(); ?>login/change_password" method="post" id="Form">
        <div style="margin:0px 0px 10px 16px;">Please enter your email below and we will send you a new password.</div>
        <ul>
            <?php
            if ($this->session->flashdata('success_msg')) {
            ?>
            <li><span style="color:green;font-size:12px;padding-left:150px;"><?php echo $this->session->flashdata('success_msg'); ?></span></li>
            <?php
            }
            elseif($this->session->flashdata('msg'))
            {
            ?>
            <li><span style="color:red;font-size:12px;padding-left:150px;"><?php echo $this->session->flashdata('msg'); ?></span></li>
            <?php
            }
            ?>
            <li>
                <label class="left_txt">Email ID :</label>
                <span class="rght star">
                    <input type="text" name="email" id="email" class="required email">
                    <font color=red><?php echo form_error('email'); ?></font>
                </span>
            </li>
            <li>
                <span class="btn_forgot"><input type="submit" value="Submit" /></span>
                <span class="btn_forgot_back"><a href="<?php echo base_url(); ?>login"><< Back to login</a></span>
            </li>
            <li>
            </li>
            <div class="clear"></div>
        </ul>
    <?php form_close(); ?>
            