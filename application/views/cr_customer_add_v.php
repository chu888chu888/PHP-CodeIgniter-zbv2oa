<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
    function district(level){
        if(level == 0){
            $("#district").hide();$("#district_tg").show('slow');
        }
        if(level == 1){
            $("#district_tg").hide();$("#district").show('slow');
        }
        if(level == 2){
            $("#district_tg").hide();$("#district").show('slow');
        }
        if(level == 3){
            $("#district_tg").hide();$("#district").show('slow');
        }
    }
    function queryCity(province){
        $.get('<?php echo site_url('cr/ajax'); ?>',{'province':province},function(data){$("._city").replaceWith(data);},'html');
    }
    function queryCity_address(province){
        $.get('<?php echo site_url('cr/ajax/1'); ?>',{'province':province},function(data){$("._city_address").replaceWith(data);},'html');
    }
    function queryArea(city){
        $.get('<?php echo site_url('cr/ajax'); ?>',{'city':city},function(data){$("._area").replaceWith(data);},'html');
    }
    function queryArea_address(city){
        $.get('<?php echo site_url('cr/ajax/1'); ?>',{'city':city},function(data){$("._area_address").replaceWith(data);},'html');
        
    }
    function address_province(){
        var province_name_0 = $("#add_0_customer #province_address option:selected").text(); 
        $("#add_0_customer ._address_1").replaceWith("<span class='_address_1'>"+province_name_0+" </span>");
        var province_name_1 = $("#add_1_customer #province_address option:selected").text(); 
        $("#add_1_customer ._address_1").replaceWith("<span class='_address_1'>"+province_name_1+" </span>");
        var province_name_2 = $("#add_2_customer #province_address option:selected").text(); 
        $("#add_2_customer ._address_1").replaceWith("<span class='_address_1'>"+province_name_2+" </span>");
    }
    function address_city(){
        var city_name_0 = $("#add_0_customer #city_address option:selected").text(); 
        $("#add_0_customer ._address_2").replaceWith("<span class='_address_2'>"+city_name_0+" </span>");
        var city_name_1 = $("#add_1_customer #city_address option:selected").text(); 
        $("#add_1_customer ._address_2").replaceWith("<span class='_address_2'>"+city_name_1+" </span>");
        var city_name_2 = $("#add_2_customer #city_address option:selected").text(); 
        $("#add_2_customer ._address_2").replaceWith("<span class='_address_2'>"+city_name_2+" </span>");
    }
    function address_area(){
        var area_name_0 = $("#add_0_customer #area_address option:selected").text(); 
        $("#add_0_customer ._address_3").replaceWith("<span class='_address_3'>"+area_name_0+" </span>");
        var area_name_1 = $("#add_1_customer #area_address option:selected").text(); 
        $("#add_1_customer ._address_3").replaceWith("<span class='_address_3'>"+area_name_1+" </span>");
        var area_name_2 = $("#add_2_customer #area_address option:selected").text(); 
        $("#add_2_customer ._address_3").replaceWith("<span class='_address_3'>"+area_name_2+" </span>");
    }
</script>
<?php $current_tab = $this->input->get('tab') ? $this->input->get('tab') : 'add_0_customer'; ?>
<div class="headbar">
    <div class="position"><span><?php $menu = $this->acl->current_location();
echo $menu[1]; ?></span>
        <span>></span><span><?php echo $menu[2]; ?></span>
        <span>></span><span><?php echo $menu[3]; ?></span>
        <span>></span><span>添加</span>
    </div>
    <ul class='tab' name='conf_menu'>
        <li <?php echo $current_tab == 'add_0_customer' ? 'class="selected"' : ''; ?>><a href="javascript:void(0);" onclick="select_tab('add_0_customer',this);">未分配客户</a></li>
        <li <?php echo $current_tab == 'add_1_customer' ? 'class="selected"' : ''; ?>><a href="javascript:void(0);" onclick="select_tab('add_1_customer',this);">跟进中客户</a></li>
        <li <?php echo $current_tab == 'add_2_customer' ? 'class="selected"' : ''; ?>><a href="javascript:void(0);" onclick="select_tab('add_2_customer',this);">有效的客户</a></li>
    </ul>
</div>
<div class="content_box">
    <div class="content form_content">
        <form action="<?php echo site_url('cr/add_0_customer') . '?tab=add_0_customer'; ?>"  method="post">
            <table class="form_table _tabs" id="add_0_customer"  style="<?php echo $current_tab == 'add_0_customer' ? '' : 'display:none'; ?>" >
                <col width="150px" />
                <col />
                <tr>
                    <th> 客户来源：</th>
                    <td>
                        <select class="normal" style="width:auto" name="from_id" >
                            <option value="">选择来源</option>
                            <?php foreach ($from as $key): ?>
                                <option value="<?php echo $key->from_id; ?>"><?php echo $key->from_name; ?></option>
<?php endforeach; ?>
                        </select>
                        <label><span style="color:red">*</span> 选择来源.</label>
                        <b style="color:red"><?php echo form_error('from_id'); ?></b>
                    </td>
                </tr>
                <tr>
                    <th> 来源详细：</th>
                    <td><input type="text" value="" name="from_detail" class="normal"><label>来源详细信息，如网址等.</label>
                        <b style="color:red"><?php echo form_error('from_detail'); ?></b></td>
                </tr>
                <tr>
                    <th> 客户状态：</th>
                    <td>
                        <select class="normal" style="width:auto" name="status_id" >
                            <?php foreach ($status_0 as $key): ?>
                                <option value="<?php echo $key->status_id; ?>"><?php echo $key->status_name; ?></option>
<?php endforeach; ?>
                        </select>
                        <label><span style="color:red">*</span> 选择客户状态.</label>
                        <b style="color:red"><?php echo form_error('status_id'); ?></b></td>
                </tr>
                <tr>
                    <th> 姓名：</th>
                    <td><input type="text" value="" name="customer_name" style="width:150px" class="normal"><label><span style="color:red">*</span> 客户姓名或称呼.</label>
                        <b style="color:red"><?php echo form_error('customer_name'); ?></b></td>
                </tr>
                <tr>
                    <th> 电话：</th>
                    <td><input type="text" value="" name="tel" style="width:150px" class="normal"><label><span style="color:red">*</span> 客户电话.</label>
                        <b style="color:red"><?php echo form_error('tel'); ?></b></td>
                </tr>
                <tr>
                    <th> 传真：</th>
                    <td><input type="text" value="" name="fax" style="width:150px" class="normal"><label>客户传真.</label>
                        <b style="color:red"><?php echo form_error('fax'); ?></b></td>
                </tr>
                <tr>
                    <th> 地址：</th>
                    <td>
                        <select class="normal" style="width:auto" id="province_address" name="province_id_address" onchange="queryCity_address(this.options[this.selectedIndex].value);address_province();">
                            <option value="">请选择省份</option>
                            <?php foreach ($province as $key): ?>
                                <option value="<?php echo $key->id.':'.$key->name; ?>"><?php echo $key->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="_city_address"></span>
                        <span class="_area_address"></span></td>
                 </tr>
                 <tr>
                     <th> </th>
                     <td>
                        <span class="_address_1"></span><span class="_address_2"></span><span class="_address_3"></span><input type="text" value="" name="address" style="width:150px" class="normal">
                        <label>客户所在地区.</label>
                        <b style="color:red"><?php echo form_error('address'); ?></b></td>
                </tr>
                <tr>
                    <th> 渠道：</th>
                    <td><input type="text" value="" name="channel" style="width:150px" class="normal"><label>客户渠道.</label>
                        <b style="color:red"><?php echo form_error('channel'); ?></b></td>
                </tr>
                <tr>
                    <th> 代理品牌：</th>
                    <td><input type="text" value="" name="brand" style="width:150px" class="normal"><label>客户目前代理品牌.</label>
                        <b style="color:red"><?php echo form_error('brand'); ?></b></td>
                </tr>
                <tr>
                    <th> 公司或行业：</th>
                    <td><input type="text" value="" name="company" style="width:150px" class="normal"><label>客户公司或者从事行业.</label>
                        <b style="color:red"><?php echo form_error('company'); ?></b></td>
                </tr>
                <tr>
                    <th> 意向或备注：</th>
                    <td><textarea name="intention" class="normal"></textarea><label>客户代理意向或客户信息备注.</label>
                        <b style="color:red"><?php echo form_error('intention'); ?></b></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button class="submit" type='submit'><span>添加客户</span></button>
                    </td>
                </tr>

            </table>
        </form>
        <form action="<?php echo site_url('cr/add_1_customer') . '?tab=add_1_customer'; ?>"  method="post">
            <table class="form_table _tabs" id="add_1_customer" style="<?php echo $current_tab == 'add_1_customer' ? '' : 'display:none'; ?>" >
                <col width="150px" />
                <col />
                <tr>
                    <th> 客户负责人：</th>
                    <td>
                        <select class="normal" style="width:auto" name="user_id" >
                            <option value="">选择负责人</option>
                            <?php foreach ($em_user as $key): ?>
                                <option value="<?php echo $key->user_id; ?>"><?php echo $key->fullname; ?></option>
<?php endforeach; ?>
                        </select>
                        <label><span style="color:red">*</span> 选择客户负责人.</label>
                        <b style="color:red"><?php echo form_error('user_id'); ?></b>
                    </td>
                </tr>
                <tr>
                    <th> 客户来源：</th>
                    <td>
                        <select class="normal" style="width:auto" name="from_id" >
                            <option value="">选择来源</option>
                            <?php foreach ($from as $key): ?>
                                <option value="<?php echo $key->from_id; ?>"><?php echo $key->from_name; ?></option>
<?php endforeach; ?>
                        </select>
                        <label><span style="color:red">*</span> 选择来源.</label>
                        <b style="color:red"><?php echo form_error('from_id'); ?></b>
                    </td>
                </tr>
                <tr>
                    <th> 来源详细：</th>
                    <td><input type="text" value="" name="from_detail" class="normal"><label>来源详细信息，如网址等.</label>
                        <b style="color:red"><?php echo form_error('from_detail'); ?></b></td>
                </tr>
                <tr>
                    <th> 客户状态：</th>
                    <td>
                        <select class="normal" style="width:auto" name="status_id" >
                            <?php foreach ($status_1 as $key): ?>
                                <option value="<?php echo $key->status_id; ?>"><?php echo $key->status_name; ?></option>
<?php endforeach; ?>
                        </select>
                        <label><span style="color:red">*</span> 选择客户状态.</label>
                        <b style="color:red"><?php echo form_error('status_id'); ?></b></td>
                </tr>
                <tr>
                    <th> 姓名：</th>
                    <td><input type="text" value="" name="customer_name" style="width:150px" class="normal"><label><span style="color:red">*</span> 客户姓名或称呼.</label>
                        <b style="color:red"><?php echo form_error('customer_name'); ?></b></td>
                </tr>
                <tr>
                    <th> 电话：</th>
                    <td><input type="text" value="" name="tel" style="width:150px" class="normal"><label><span style="color:red">*</span> 客户电话.</label>
                        <b style="color:red"><?php echo form_error('tel'); ?></b></td>
                </tr>
                <tr>
                    <th> 地址：</th>
                    <td>
                        <select class="normal" style="width:auto" id="province_address" name="province_id_address" onchange="queryCity_address(this.options[this.selectedIndex].value);address_province();">
                            <option value="">请选择省份</option>
                            <?php foreach ($province as $key): ?>
                                <option value="<?php echo $key->id.':'.$key->name; ?>"><?php echo $key->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="_city_address"></span>
                        <span class="_area_address"></span></td>
                 </tr>
                 <tr>
                     <th> </th>
                     <td>
                        <span class="_address_1"></span><span class="_address_2"></span><span class="_address_3"></span><input type="text" value="" name="address" style="width:150px" class="normal">
                        <span style="color:red">*</span><label>客户所在地区.</label>
                        <b style="color:red"><?php echo form_error('address'); ?></b></td>
                </tr>
                <tr>
                    <th> 传真：</th>
                    <td><input type="text" value="" name="fax" style="width:150px" class="normal"><label>客户传真.</label>
                        <b style="color:red"><?php echo form_error('fax'); ?></b></td>
                </tr>
                <tr>
                    <th> 渠道：</th>
                    <td><input type="text" value="" name="channel" style="width:150px" class="normal"><label>客户渠道.</label>
                        <b style="color:red"><?php echo form_error('channel'); ?></b></td>
                </tr>
                <tr>
                    <th> 代理品牌：</th>
                    <td><input type="text" value="" name="brand" style="width:150px" class="normal"><label>客户目前代理品牌.</label>
                        <b style="color:red"><?php echo form_error('brand'); ?></b></td>
                </tr>
                <tr>
                    <th> 公司或行业：</th>
                    <td><input type="text" value="" name="company" style="width:150px" class="normal"><label>客户公司或者从事行业.</label>
                        <b style="color:red"><?php echo form_error('company'); ?></b></td>
                </tr>
                <tr>
                    <th> 意向或备注：</th>
                    <td><textarea name="intention" class="normal"></textarea><label>客户代理意向或客户信息备注.</label>
                        <b style="color:red"><?php echo form_error('intention'); ?></b></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button class="submit" type='submit'><span>添加用户</span></button>
                    </td>
                </tr>

            </table>
        </form>
        <form action="<?php echo site_url('cr/add_2_customer') . '?tab=add_2_customer'; ?>"  method="post">
            <table class="form_table _tabs" id="add_2_customer" style="<?php echo $current_tab == 'add_2_customer' ? '' : 'display:none'; ?>" >
                <col width="150px" />
                <col />
                <tr>
                    <th> 客户负责人：</th>
                    <td>
                        <select class="normal" style="width:auto" name="user_id" >
                            <option value="">选择负责人</option>
                            <?php foreach ($em_user as $key): ?>
                                <option value="<?php echo $key->user_id; ?>"><?php echo $key->fullname; ?></option>
<?php endforeach; ?>
                        </select>
                        <label><span style="color:red">*</span> 客户负责人.</label>
                        <b style="color:red"><?php echo form_error('user_id'); ?></b>
                    </td>
                </tr>
                <tr>
                    <th> 客户来源：</th>
                    <td>
                        <select class="normal" style="width:auto" name="from_id" >
                            <option value="">选择来源</option>
                            <?php foreach ($from as $key): ?>
                                <option value="<?php echo $key->from_id; ?>"><?php echo $key->from_name; ?></option>
<?php endforeach; ?>
                        </select>
                        <label><span style="color:red">*</span> 选择来源.</label>
                        <b style="color:red"><?php echo form_error('from_id'); ?></b>
                    </td>
                </tr>
                <tr>
                    <th> 来源详细：</th>
                    <td><input type="text" value="" name="from_detail" class="normal"><label>来源详细信息等.</label>
                        <b style="color:red"><?php echo form_error('from_detail'); ?></b></td>
                </tr>
                <tr>
                    <th> 客户状态：</th>
                    <td>
                        <select class="normal" style="width:auto" name="status_id" >
                            <?php foreach ($status_2 as $key): ?>
                                <option value="<?php echo $key->status_id; ?>"><?php echo $key->status_name; ?></option>
<?php endforeach; ?>
                        </select>
                        <label><span style="color:red">*</span> 选择客户状态.</label>
                        <b style="color:red"><?php echo form_error('status_id'); ?></b></td>
                </tr>
                <tr>
                    <th> 客户分组：</th>
                    <td>
                        <select class="normal" style="width:auto" name="class_id" >
                            <?php foreach ($class as $key): ?>
                                <option value="<?php echo $key->class_id; ?>"><?php echo $key->class_name; ?></option>
<?php endforeach; ?>
                        </select>
                        <label><span style="color:red">*</span> 选择客户分组.</label>
                        <b style="color:red"><?php echo form_error('class_id'); ?></b></td>
                </tr>
                <tr>
                    <th> 客户级别：</th>
                    <td>
                        <select class="normal" style="width:auto" name="level_id" >
                            <?php foreach ($level as $key): ?>
                                <option value="<?php echo $key->level_id; ?>"><?php echo $key->level_name; ?></option>
<?php endforeach; ?>
                        </select>
                        <label><span style="color:red">*</span> 选择客户级别.</label>
                        <b style="color:red"><?php echo form_error('level_id'); ?></b></td>
                </tr>
                <tr>
                    <th> 代理级别：</th>
                    <td>
                        <input type="radio" name="district_level" value="1" onclick="district(1)" /> 省级 &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="district_level" value="2" onclick="district(2)" /> 市级 &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="district_level" value="3" onclick="district(2)" /> 市区级 &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="district_level" value="4" onclick="district(3)" /> 县级 &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="district_level" value="5" onclick="district(0)" /> 团购 &nbsp;&nbsp;&nbsp;
                        <label><span style="color:red">*</span> 选择代理级别.</label>
                        <b style="color:red"><?php echo form_error('district_level'); ?></b>
                        <b style="color:red"><?php echo form_error('province_id'); ?></b>
                        <b style="color:red"><?php echo form_error('city_id'); ?></b>
                        <b style="color:red"><?php echo form_error('area_id'); ?></b>
                    </td>
                </tr>

                <tr id="district">
                    <th> 代理地区：</th>
                    <td>
                        <select class="normal" style="width:auto" id="province" name="province_id" onchange="queryCity(this.options[this.selectedIndex].value)">
                            <option selected="selected" value="">请选择省份</option>
                            <?php foreach ($province as $key): ?>
                                <option value="<?php echo $key->id.':'.$key->name; ?>"><?php echo $key->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="_city"></span>
                        <span class="_area"></span>
                        <label><span style="color:red">*</span> 选择代理地区.</label>
                    </td>
                </tr>
                <tr id="district_tg" style="display:none;">
                    <th> 团购单位：</th>
                    <td><input type="text" value="" name="group_buy" style="width:150px" class="normal"><label><span style="color:red">*</span> 团购单位或公司.</label>
                        <b style="color:red"><?php echo form_error('group_buy'); ?></b></td>
                </tr>
                <tr>
                    <th> 姓名：</th>
                    <td><input type="text" value="" name="customer_name" style="width:150px" class="normal"><label><span style="color:red">*</span> 客户姓名或称呼.</label>
                        <b style="color:red"><?php echo form_error('customer_name'); ?></b></td>
                </tr>
                <tr>
                    <th> 电话：</th>
                    <td><input type="text" value="" name="tel" style="width:150px" class="normal"><label><span style="color:red">*</span> 客户电话.</label>
                        <b style="color:red"><?php echo form_error('tel'); ?></b></td>
                </tr>
                <tr>
                    <th> 地址：</th>
                    <td>
                        <select class="normal" style="width:auto" id="province_address" name="province_id_address" onchange="queryCity_address(this.options[this.selectedIndex].value);address_province();">
                            <option value="">请选择省份</option>
                            <?php foreach ($province as $key): ?>
                                <option value="<?php echo $key->id.':'.$key->name; ?>"><?php echo $key->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="_city_address"></span>
                        <span class="_area_address"></span></td>
                 </tr>
                 <tr>
                     <th> </th>
                     <td>
                        <span class="_address_1"></span><span class="_address_2"></span><span class="_address_3"></span><input type="text" value="" name="address" style="width:150px" class="normal">
                        <span style="color:red">*</span><label>客户所在地区.</label>
                        <b style="color:red"><?php echo form_error('address'); ?></b></td>
                </tr>
                <tr>
                    <th> 传真：</th>
                    <td><input type="text" value="" name="fax" style="width:150px" class="normal"><label>客户传真.</label>
                        <b style="color:red"><?php echo form_error('fax'); ?></b></td>
                </tr>
                
                <tr>
                    <th> 渠道：</th>
                    <td><input type="text" value="" name="channel" style="width:150px" class="normal"><label>客户渠道.</label>
                        <b style="color:red"><?php echo form_error('channel'); ?></b></td>
                </tr>
                <tr>
                    <th> 代理品牌：</th>
                    <td><input type="text" value="" name="brand" style="width:150px" class="normal"><label>客户目前代理品牌.</label>
                        <b style="color:red"><?php echo form_error('brand'); ?></b></td>
                </tr>
                <tr>
                    <th> 公司或行业：</th>
                    <td><input type="text" value="" name="company" style="width:150px" class="normal"><label>客户公司或者从事行业.</label>
                        <b style="color:red"><?php echo form_error('company'); ?></b></td>
                </tr>
                <tr>
                    <th> 意向或备注：</th>
                    <td><textarea name="intention" class="normal"></textarea><label>客户代理意向或客户信息备注.</label>
                        <b style="color:red"><?php echo form_error('intention'); ?></b></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button class="submit" type='submit'><span>添加用户</span></button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
