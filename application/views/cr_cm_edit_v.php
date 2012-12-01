<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="headbar">
    <div class="position"><span><?php $menu = $this->acl->current_location();echo $menu[1]; ?></span>
        <span>></span><span><?php echo $menu[2]; ?></span>
        <span>></span><span><?php echo $menu[3]; ?></span>
        <span>></span><span>编辑</span>
    </div>
</div>
<div class="content_box">
    <div class="content form_content">
        <form action="<?php echo site_url('cr_gm/edit/'.$class->class_id); ?>"  method="post">
            <table class="form_table">
                <col width="150px" />
                <col />
                <tr>
                    <th> 分组名称：</th>
                    <td><input type="text" value="<?php echo $class->class_name; ?>" name="class_name" style="width:150px" class="normal"><label>*2-10个汉字.</label>
                        <b style="color:red"><?php echo form_error('class_name'); ?></b></td>
                </tr>
                <tr>
                    <th> 分组介绍：</th>
                    <td><textarea name="class_introduce" class="normal"><?php echo $class->class_introduce; ?></textarea><label>30个汉字内.</label>
                        <b style="color: red"><?php echo form_error('class_introduce'); ?></b></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button class="submit" type='submit'><span>修改分组信息</span></button>
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>
