<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Order;
use App\Order as MainModel; //Alias (bí danh) 'use' để gọi đến namespace App\Bank với bí danh là MainModel
use App\Helper\Functions;
use App\Http\Controllers\AdminController;
use App\OrderAddress;
use App\OrderDetail;
use Illuminate\Http\Request;
use Session;

class OrderController extends AdminController
{
    protected $pathView = "admin.page.orders.";

    protected $resize = [
        'thumbnail' => ['width' => 800],
        'standard' => ['width' => 100],
    ];

    protected $fieldForm = [];

    protected $removeRedundant = ["_token", "tag_id"];

    protected $fieldList = [
        ['label' => 'Mã', 'name' => 'id', 'type' => 'id'],
        ['label' => 'Khách hàng', 'name' => 'user_name', 'type' => 'otherModel'],
        ['label' => 'Email', 'name' => 'email', 'type' => 'otherModel'],
        ['label' => 'SĐT', 'name' => 'phone', 'type' => 'otherModel'],
        ['label' => 'Method', 'name' => 'pay_method', 'type' => 'text'],
        ['label' => 'Total', 'name' => 'price_total', 'type' => 'numberFormat'],
        ['label' => 'Status', 'name' => 'status', 'type' => 'status'],
        ['label' => 'Created', 'name' => 'created_at', 'type' => 'dateFormat'],
    ];

    public function __construct(){
        //Get name of Controller
        $getControllerName = (new \ReflectionClass($this))->getShortName();
        $shortController = Functions::getModelName($getControllerName);
        $this -> folderUpload = $shortController;
        $this -> controllerName = $shortController;
        view()->share("shortController", $shortController);
        view()->share("folderUpload", $this -> folderUpload);
        view()->share("controllerName",$this -> controllerName);
        view()->share("fieldForm", $this -> fieldForm);
        view()->share("fieldList", $this -> fieldList);
        $this -> model = new MainModel();
    }

    public function index(){
        $data = $this -> model -> latest() -> paginate(12);

        return view($this -> pathView . "index", compact("data"));
    }

    public function viewOrderDetail(Request $request, $id){
        $data['order'] = Order::find($id);

        //Get giá coupon
        $data['order_coupon'] = Coupon::where("id", $data['order'] -> coupon_id) -> pluck("price") -> first();

        //Get order details qua relationship đã tạo ở order model
        $data['order_details'] = $data['order'] -> orderDetails;

        //Get order address qua relationship đã tạo ở order model
        $data['order_address'] = $data['order'] -> orderAddress;

        //Get user qua relationship đã tạo ở order model
        $data['user'] = $data['order'] -> user;

        return view($this -> pathView . "viewOrderDetail")->with($data);
    }

    public function changeStatus(Request $request,$id){
        $order = Order::find($id);
        if(isset($request -> status)){
            $order -> status = $request -> status;
            $order -> save();

            Session::flash("action_success", "Cập nhật trạng thái đơn hàng thành công !!");
            return back();
        }
    }

    public function delete($id){
        $record = $this -> model -> find($id);
        // Xóa địa chỉ sau khi xóa đơn hàng
        $orderAddress = OrderAddress::where("id", $record -> address_id)->first();
        $orderAddress -> delete();

        //Xóa các sản phẩm trong đơn hàng
        $orderDetails = OrderDetail::where("order_id", $record -> id)->get();

        foreach ($orderDetails as $item){
            $item -> delete();
        }

        //Xoá đơn hàng
        $record -> delete();

        if($record){
            return response() -> json([
                "code" => 200,
                "message" => "Delete success"
            ],200);
        }
        else{
            return response() -> json([
                "code" => 500,
                "message" => "Cant delete this record"
            ], 500);
        }
    }
}
