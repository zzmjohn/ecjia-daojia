<?php defined('IN_ECJIA') or exit('No permission resources.'); ?>
<!-- {extends file="ecjia.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
    ecjia.admin.agent.init();
</script>
<!-- {/block} -->

<!-- {block name="main_content"} -->
<div>
    <h3 class="heading">
        <!-- {if $ur_here}{$ur_here}{/if} -->
        <!-- {if $action_link} -->
        <a class="btn plus_or_reply data-pjax" href="{$action_link.href}" id="sticky_a"><i class="fontello-icon-reply"></i>{$action_link.text}</a>
        <!-- {/if} -->
    </h3>
</div>

<div class="row-fluid">
    <div class="span12 foldable-list">
        <div class="accordion-group">
            <div class="accordion-heading">
                <div class="accordion-toggle acc-in" data-toggle="collapse" data-target="#detail_info_one">
                    <strong>{t domain="agent"}基本信息{/t}</strong>
                    <a class="m_l5 stop_propagation" target="_blank" href='{url path="agent/admin/edit" args="id={$data.user_id}"}'>{t domain="agent"}编辑{/t}</a>
                </div>
            </div>
            <div class="accordion-body in collapse" id="detail_info_one">
                <table class="table table-oddtd m_b0">
                    <tbody class="first-td-no-leftbd">
                        <tr>
                            <td>
                                <div align="right"><strong>{t domain="agent"}代理商名称：{/t}</strong></div>
                            </td>
                            <td>{$data.name}</td>
                            <td>
                                <div align="right"><strong>{t domain="agent"}手机号码：{/t}</strong></div>
                            </td>
                            <td>{$data.mobile}</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right"><strong>{t domain="agent"}邮箱账号：{/t}</strong></div>
                            </td>
                            <td>{$data.email}</td>
                            <td>
                                <div align="right"><strong>{t domain="agent"}代理等级：{/t}</strong></div>
                            </td>
                            <td>{$data.rank_name}{if $data.rank_alias}<span class="ecjiafc-999">（别名：{$data.rank_alias}）</span>{/if}</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right"><strong>{t domain="agent"}管辖区域：{/t}</strong></div>
                            </td>
                            <td>{$data.area_region}</td>
                            <td>
                                <div align="right"><strong>{t domain="agent"}添加时间：{/t}</strong></div>
                            </td>
                            <td>{$data.formated_add_time}</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right"><strong>{t domain="agent"}最后登录：{/t}</strong></div>
                            </td>
                            <td colspan="3">{$data.formated_last_login}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="accordion-group">
            <div class="accordion-heading">
                <div class="accordion-toggle acc-in" data-toggle="collapse" data-target="#detail_info_two">
                    <strong>{t domain="agent"}管辖情况{/t}</strong>
                </div>
            </div>
            <div class="accordion-body in collapse" id="detail_info_two">
                <div class="item-content">
                    <div class="item">{t domain="agent"}今日新增店铺：{/t}<span class="ecjiafc-FF0000">{$count.new_store}</span></div>
                    <div class="item">{t domain="agent"}等待审核店铺：{/t}<span class="ecjiafc-FF0000">{$count.uncheck_store}</span></div>
                    <div class="item">{t domain="agent"}累计推广店铺：{/t}<span class="ecjiafc-FF0000">{$count.spread_store}</span></div>
                </div>
            </div>
        </div>

        <div class="accordion-group">
            <div class="accordion-heading">
                <div class="accordion-toggle acc-in" data-toggle="collapse" data-target="#detail_info_three">
                    <strong>{t domain="agent"}管辖店铺{/t}</strong>
                </div>
            </div>
            <div class="accordion-body in collapse" id="detail_info_three">
                <table class="table table-striped m_b0">
                    <thead class="ecjiaf-bt">
                        <tr>
                            <th>{t domain="agent"}店铺名称{/t}</th>
                            <th>{t domain="agent"}商家分类{/t}</th>
                            <th>{t domain="agent"}负责人{/t}</th>
                            <th>{t domain="agent"}手机号码{/t}</th>
                            <th class="w130">{t domain="agent"}申请时间{/t}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- {foreach from=$list.item item=val} -->
                        <tr>
                            <td>{$val.merchants_name}</td>
                            <td>{$val.category_name}</td>
                            <td>{$val.responsible_person}</td>
                            <td>{$val.contact_mobile}</td>
                            <td>{$val.formated_apply_time}</td>
                        </tr>
                        <!-- {foreachelse} -->
                        <tr>
                            <td class="no-records" colspan="6">{t domain="agent"}没有找到任何记录{/t}</td>
                        </tr>
                        <!-- {/foreach} -->
                    </tbody>
                </table>
                <!-- {$list.page} -->
            </div>
        </div>
    </div>
</div>
<!-- {/block} -->