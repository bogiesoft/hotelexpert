 <tr>
            <td id="div-consol-topimg">
            	<span class="admin-txt-mintit">
                 <?php if($this->session->userdata('admin_type')==1){ ?> Super Admin Console<?php } ?>
                 <?php if($this->session->userdata('admin_type')==2){ ?> Sub Admin Console<?php } ?>
                  <?php if($this->session->userdata('admin_type')==3){ ?> Supplier Console<?php } ?>
                </span>
                <span style="float:right; color:#FFF; margin-right:31px;"><a  style="color: #FFF; text-decoration:none;" href='<?php echo site_url('index/dashboard/')?>'  >Home</a> | <a href="<?php echo WEB_URL; ?>index/logout"   style="color: #FFF; text-decoration:none;" >logout</a>
</span>
            </td>
          </tr>
          <tr>
            <td style="text-align:left; height:38px; background-color:#ebeceb; color:#1c1c1c; font-size:11px; padding-right:31px;  border-bottom:1px #aaaaaa solid; border-top:none">
            	<span style=" text-align:left;padding-left:10px">New Booking :    </span>
                
                <span style=" float:right; margin-left:20px;">&nbsp;Visiter count : </span>
                <span style=" float:right; margin-left:20px;"><img src="<?php echo WEB_DIR; ?>images/g-r.png" border="0" />&nbsp;Agent Online Now : </span>
                <span style=" float:right;"><img src="<?php echo WEB_DIR; ?>images/g-r.png" border="0" />&nbsp;Suppliers Online Now :  </span>
                 
            </td>
          </tr>