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
 * 售后订单信息处理
 */
class RefundOrderInfo
{	
	/**
	 * 售后订单信息获取
	 */
	public static function get_refund_order_info($refund_id, $store_id = 0){
		if (!empty($refund_id)) {
		    $db = RC_DB::table('refund_order')->where('refund_id', $refund_id);
		    if($store_id) {
                $db->where('store_id', $store_id);
            }
			$refund_info = $db->first();
		    if($refund_info) {
                $refund_info['goods_amount_price'] = price_format($refund_info['goods_amount']);
                $refund_info['shipping_fee_price'] = price_format($refund_info['shipping_fee']);
                $refund_info['pay_fee_price'] = price_format($refund_info['pay_fee']);
                $refund_info['pack_fee_price'] = price_format($refund_info['pack_fee']);
                $refund_info['insure_fee_price'] = price_format($refund_info['insure_fee']);
                $refund_info['card_fee_price'] = price_format($refund_info['card_fee']);
                $refund_info['inv_tax_price'] = price_format($refund_info['inv_tax']);
                $refund_info['integral_money_price'] = price_format($refund_info['integral_money']);
                $refund_info['bonus_price'] = price_format($refund_info['bonus']);
                $refund_info['discount_price'] = price_format($refund_info['discount']);
                if ($refund_info['add_time']) {
                    $refund_info['add_time'] = RC_Time::local_date(ecjia::config('time_format'), $refund_info['add_time']);
                }
                if ($refund_info['refund_time']) {
                    $refund_info['refund_time'] = RC_Time::local_date(ecjia::config('time_format'), $refund_info['refund_time']);
                }
                if ($refund_info['return_time']) {
                    $refund_info['return_time'] = RC_Time::local_date(ecjia::config('time_format'), $refund_info['return_time']);
                }
            }

		}
		return $refund_info;
	}

}
