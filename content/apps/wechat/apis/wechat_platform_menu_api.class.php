<?php
//
//    ______         ______           __         __         ______
//   /\  ___\       /\  ___\         /\_\       /\_\       /\  __ \
//   \/\  __\       \/\ \____        \/\_\      \/\_\      \/\ \_\ \
//    \/\_____\      \/\_____\     /\_\/\_\      \/\_\      \/\_\ \_\
//     \/_____/       \/_____/     \/__\/_/       \/_/       \/_/ /_/
//
//   上海商创网络科技有限公司
//
//  ---------------------------------------------------------------------------------
//
//   一、协议的许可和权利
//
//    1. 您可以在完全遵守本协议的基础上，将本软件应用于商业用途；
//    2. 您可以在协议规定的约束和限制范围内修改本产品源代码或界面风格以适应您的要求；
//    3. 您拥有使用本产品中的全部内容资料、商品信息及其他信息的所有权，并独立承担与其内容相关的
//       法律义务；
//    4. 获得商业授权之后，您可以将本软件应用于商业用途，自授权时刻起，在技术支持期限内拥有通过
//       指定的方式获得指定范围内的技术支持服务；
//
//   二、协议的约束和限制
//
//    1. 未获商业授权之前，禁止将本软件用于商业用途（包括但不限于企业法人经营的产品、经营性产品
//       以及以盈利为目的或实现盈利产品）；
//    2. 未获商业授权之前，禁止在本产品的整体或在任何部分基础上发展任何派生版本、修改版本或第三
//       方版本用于重新开发；
//    3. 如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回并承担相应法律责任；
//
//   三、有限担保和免责声明
//
//    1. 本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的；
//    2. 用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未获得商业授权之前，我们不承
//       诺提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任；
//    3. 上海商创网络科技有限公司不对使用本产品构建的商城中的内容信息承担责任，但在不侵犯用户隐
//       私信息的前提下，保留以任何方式获取用户信息及商品信息的权利；
//
//   有关本产品最终用户授权协议、商业授权与技术服务的详细内容，均由上海商创网络科技有限公司独家
//   提供。上海商创网络科技有限公司拥有在不事先通知的情况下，修改授权协议的权力，修改后的协议对
//   改变之日起的新授权用户生效。电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和
//   等同的法律效力。您一旦开始修改、安装或使用本产品，即被视为完全理解并接受本协议的各项条款，
//   在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本
//   授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。
//
//  ---------------------------------------------------------------------------------
//
defined('IN_ECJIA') or exit('No permission resources.');

/**
 * 公众平台菜单
 */
class wechat_platform_menu_api extends Component_Event_Api
{

    public function call(&$options)
    {
        if (ecjia_platform::$controller->getPlatformAccount()->getPlatform() != 'wechat') {
            return null;
        }

        $extend_menus = ecjia_admin::make_admin_menu('01_wechat_extend', __('插件管理', 'wechat'), RC_Uri::url('platform/platform_extend/init'), 1)->add_icon('icon-puzzle')->add_purview('platform_extend_manage');

        $command_menus = ecjia_admin::make_admin_menu('02_wechat_extend', __('关键词命令', 'wechat'), RC_Uri::url('platform/platform_command/init'), 2)->add_icon('ft-command')->add_purview('platform_command_manage');

        $navmenus = ecjia_admin::make_admin_menu('nav-header', __('微信公众平台', 'wechat'), '', 10);

        $custom_menu = ecjia_admin::make_admin_menu('06_wechat', __('自定义菜单', 'wechat'), RC_Uri::url('wechat/platform_menus/init'), 20)->add_icon('ft-menu')->add_purview('wechat_menus_manage');

        $message_manage = ecjia_admin::make_admin_menu('15_content', __('消息管理', 'wechat'), '', 20)->add_icon('icon-bubble')->add_submenu(
            array(
                ecjia_admin::make_admin_menu('02_wechat', __('消息管理', 'wechat'), RC_Uri::url('wechat/platform_message/init'), 2)->add_purview('wechat_subscribe_message_manage'),
                ecjia_admin::make_admin_menu('03_wechat', __('群发消息', 'wechat'), RC_Uri::url('wechat/platform_mass_message/init'), 3)->add_purview('wechat_message_manage'),
            )
        );

        $usermenus = ecjia_admin::make_admin_menu('15_content', __('粉丝管理', 'wechat'), '', 21)->add_icon('icon-user')->add_submenu(
            array(
                ecjia_admin::make_admin_menu('01_wechat', __('粉丝管理', 'wechat'), RC_Uri::url('wechat/platform_subscribe/init'), 1)->add_purview('wechat_subscribe_manage'),
                ecjia_admin::make_admin_menu('02_wechat', __('标签管理', 'wechat'), RC_Uri::url('wechat/platform_subscribe/tag'), 2)->add_purview('wechat_subscribe_manage'),
                ecjia_admin::make_admin_menu('03_wechat', __('取消关注', 'wechat'), RC_Uri::url('wechat/platform_subscribe/cancel_list'), 3)->add_purview('wechat_subscribe_manage'),
                ecjia_admin::make_admin_menu('04_wechat', __('黑名单', 'wechat'), RC_Uri::url('wechat/platform_subscribe/back_list'), 4)->add_purview('wechat_subscribe_manage'),
            )
        );

        $replymenus = ecjia_admin::make_admin_menu('15_content', __('自动回复', 'wechat'), '', 22)->add_icon('fa fa-reply')->add_submenu(
            array(
                ecjia_admin::make_admin_menu('09_wechat', __('关键词回复', 'wechat'), RC_Uri::url('wechat/platform_response/reply_keywords'), 1)->add_purview('wechat_response_manage'),
                ecjia_admin::make_admin_menu('08_wechat', __('收到消息回复', 'wechat'), RC_Uri::url('wechat/platform_response/reply_msg'), 2)->add_purview('wechat_response_manage'),
                ecjia_admin::make_admin_menu('08_wechat', __('被关注回复', 'wechat'), RC_Uri::url('wechat/platform_response/reply_subscribe'), 3)->add_purview('wechat_response_manage'),
            )
        );

        $material_manage = ecjia_admin::make_admin_menu('15_content', __('素材管理', 'wechat'), '', 23)->add_icon('ft-inbox')->add_submenu(
            array(
                ecjia_admin::make_admin_menu('07_wechat', __('永久素材', 'wechat'), RC_Uri::url('wechat/platform_material/init', array('type' => 'news', 'material' => 1)), 7)->add_purview('wechat_material_manage'),
                ecjia_admin::make_admin_menu('07_wechat', __('临时素材', 'wechat'), RC_Uri::url('wechat/platform_material/init', array('type' => 'image')), 7)->add_purview('wechat_material_manage'),
            )
        );

        $kefumenus = ecjia_admin::make_admin_menu('15_content', __('客服管理', 'wechat'), '', 25)->add_icon('fa fa-headphones')->add_submenu(
            array(
                ecjia_admin::make_admin_menu('01_wechat', __('客服账号', 'wechat'), RC_Uri::url('wechat/platform_customer/init'), 11)->add_purview('wechat_customer_manage'),
                ecjia_admin::make_admin_menu('02_wechat', __('客服会话', 'wechat'), RC_Uri::url('wechat/platform_customer/session'), 12)->add_purview('wechat_customer_session_manage'),
                ecjia_admin::make_admin_menu('03_wechat', __('客服聊天记录', 'wechat'), RC_Uri::url('wechat/platform_record/init'), 13)->add_purview('wechat_record_manage')
            )
        );

        $tgmenus = ecjia_admin::make_admin_menu('15_content', __('二维码管理', 'wechat'), '', 27)->add_icon('fa fa-qrcode')->add_submenu(
            array(
                ecjia_admin::make_admin_menu('14_wechat', __('渠道二维码', 'wechat'), RC_Uri::url('wechat/platform_qrcode/init'), 14)->add_purview('wechat_qrcode_manage'),
                ecjia_admin::make_admin_menu('15_wechat', __('推荐二维码', 'wechat'), RC_Uri::url('wechat/platform_share/init'), 15)->add_purview('wechat_share_manage'),
            )
        );

        return array(
            $extend_menus,
            $command_menus,
            $message_manage,
            $navmenus,
            $usermenus,
            $custom_menu,
            $material_manage,
            $replymenus,
            $kefumenus,
            $tgmenus,
        );
    }
}

// end
