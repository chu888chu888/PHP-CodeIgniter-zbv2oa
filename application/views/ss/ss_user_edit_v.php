<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="pageContent">
    <form method="post" action="<?php echo site_url('ss_user/edit/submit').'?id='. $user->user_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <dl>
                <dt>用户名：</dt>
                <dd><input name="user_name_add" class="readonly alphanumeric required textInput" readonly="readonly"  minlength="4" maxlength="20" type="text" value="<?php echo $user->user_name; ?>" /></dd>
            </dl>
            <dl>
                <dt>用户密码：</dt>
                <dd><input id="user_pw" name="password" class="alphanumeric" minlength="6" maxlength="16" type="password" value="" /></dd>
            </dl>
            <dl>
                <dt>重复密码：</dt>
                <dd><input name="password_ok" class="textInput" type="password" equalto="#user_pw" value="" /></dd>
            </dl>
            <dl>
                <dt>权限组：</dt>
                <dd>
                    <input name="role_id" value="<?php echo $user->role_id; ?>" type="hidden">
                    <input class="required" name="role_name" type="text" readonly="readonly" suggestFields="role_name" 
                           suggestUrl="<?php echo site_url('ss_user/add_em_user/role'); ?>" lookupGroup="" value="<?php echo $user->role_name; ?>"/>
                </dd>
            </dl>
        </div>
        <div class="formBar">
            <ul>
                <li>
                    <div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div>
                </li>
                <li>
                    <div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
                </li>
            </ul>
        </div>
    </form>
</div>
