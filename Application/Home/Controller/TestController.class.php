<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {

	//2、创建订单
    public function test_create(){
        $url = "http://115.238.169.185:8080/index.php?g=admin&m=ApiOrderNew&a=OrderPostXml";
        $post_data = array("Message" =>"
<Order>
  <OrderFrom>0000</OrderFrom>
  <OrderNo>1603014612840518211558</OrderNo>
  <DistributorId>126</DistributorId>
  <AppSecret>test123456</AppSecret>
  <GoodsAmount>120</GoodsAmount>
  <PostFee>0</PostFee>
  <Amount>120</Amount>
  <BuyerAccount>miya15190293925</BuyerAccount>
  <RealName>车娉妮</RealName>
  <PeopleId>360424198311270085</PeopleId>
  <Date>2016-03-01T09:41:44</Date>
  <TaxAmount>0</TaxAmount>
  <DisAmount>0</DisAmount>
  <Goods>
    <Detail>
      <ProductId>NBS04</ProductId>
      <GoodsName>北海道白色恋人白巧克力夹心饼干 12枚*2盒</GoodsName>
      <Qty>1</Qty>
      <Unit>盒</Unit>
      <Price>120</Price>
    </Detail>
  </Goods>
  <PaymentNo>2016030121001003920235272777</PaymentNo>
  <Source>02</Source>
  <PayAmount>0</PayAmount>
  <CurrCode>RMB</CurrCode>
  <LogisticsNo>3242343</LogisticsNo>
  <LogisticsName>邮政速递</LogisticsName>
  <Consignee>车娉妮</Consignee>
  <City>无锡市</City>
  <District>滨湖区</District>
  <ConsigneeAddr>雪浪街道军东新村33号信箱</ConsigneeAddr>
  <ConsigneeTel>15190293925</ConsigneeTel>
  <PayDate>2016-03-01T09:41:59</PayDate>
  <Province>江苏省</Province>
</Order>");
        header("Content-Type:text/html; charset=utf-8");
        $result = $this->post_url($url, $post_data);
        print_r($result);
        exit;
    }

    //3、 获取订单状态
    public function get_order_status($orderid='1603014612840518211558'){
    	$url = "http://115.238.169.185:8080/index.php?g=admin&m=ApiOrderNew&a=order_status";
    	if(!empty($orderid)){
	    	$post_data = array("Message"=>"<Order><OrderId>$orderid</OrderId><AppSecret>test123456</AppSecret><ReturnType>json</ReturnType></Order>");
	    	$data = $this->post_url($url,$post_data);
	    	header("Content-Type:text/html; charset=utf-8");
	    	print_r($data);    		
    	}else{
            echo '请输入订单id号';
        }
    }

	//1、取消订单
	public function test_cancel_order($orderid='1603014612840518211558'){
        $url = "http://115.238.169.185:8080/index.php?g=admin&m=ApiOrder&a=cancel_order";
        if(!empty($orderid)){
            $post_data = array("Message" =>"<Order><OrderId>$orderid</OrderId><ReturnType>json</ReturnType></Order>");
            $result = $this->post_url($url, $post_data);
            header("Content-Type:text/html; charset=utf-8");
            print_r($result);
        }else{
            echo '请输入订单id号';
        }
    }

    
    //5、获取库存信息
    public function get_stock() {
        $url='http://115.238.169.185:8080/index.php?g=Api&m=GoodsApi&a=get_goods_inventory';
        $params = array(
        	"system"=>"LM",
        	"DistributorId"=>"122",
            "hgGoodsNo" => "0",
            "pageRows" =>  "10",
        	"pageSum" =>  "1"
        );
        //获取加密
        $params['signStr'] = $this->get_sign_str($params);
        $res= $this->post_url($url, $params);
        print_r($res);
    }
    
    // 6、获取详情
    public function get_detail($orderid='1603014612840518211558',$appsecret='test123456'){
    	$url = "http://115.238.169.185:8080/index.php?g=admin&m=ApiOrderNew&a=order_info";
    	$params = array("Message"=>"<Order><OrderId>$orderid</OrderId><AppSecret>$appsecret</AppSecret><ReturnType>json</ReturnType></Order>"
        );
        $res= $this->post_url($url, $params);
        header("Content-Type:text/html; charset=utf-8");
        print_r($res);
    }

    // 加密参数
	public function get_sign_str($params) {
        ksort($params);
        $paramStr = serialize($params).'fx.seabuy.com';
        return md5($paramStr);
    }

    function post_url($url, $params){
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	// post数据
    	curl_setopt($ch, CURLOPT_POST, 1);
    	// post的变量
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    	$result = curl_exec($ch);
		curl_close($ch);
		return $result;
    }

}