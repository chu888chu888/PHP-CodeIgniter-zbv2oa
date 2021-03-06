<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="headbar">
    <div class="position"><span><?php $menu = $this->acl->current_location();echo $menu[1]; ?></span>
        <span>></span><span><?php echo $menu[2]; ?></span>
        <span>></span><span><?php echo $menu[3]; ?></span></div>
    <div class="operating">
        <a class="hack_ie" href="<?php echo site_url('ss_role/add'); ?>"><button class="operating_btn" type="button"><span class="addition">添加新用户组</span></button></a>
    </div>
    <div class="field">
        <table class="list_table">
            <col width="40px" />
            <col />
            <thead>
                <tr>
                    <th></th>
                    <th>用户组名称</th>
                    <th>操作选项</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="content">
    <table id="list_table" class="list_table">
        <col width="40px" />
        <col />
        <tbody>
            <?php foreach ($list as $v) : ?>
                <tr>
                    <td></td>
                    <td><?php echo $v->role_name; ?></td>
                    <td>
                        <a href="<?php echo site_url('ss_role/edit/' . $v->role_id); ?>"><img class="operator" src="theme/images/icon_edit.gif" alt="修改" title="修改"></a>
                        <a class="confirm_delete" href="<?php echo site_url('ss_role/del/' . $v->role_id); ?>"><img class="operator" src="theme/images/icon_del.gif" alt="删除" title="删除"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script language="javascript">
    $('a.confirm_delete').click(function(){
        return confirm('是否要删除所选用户组？');	
    });
</script>