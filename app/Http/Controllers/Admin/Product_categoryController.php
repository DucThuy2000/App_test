<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Helper\Functions;
use App\Product_category as MainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Product_categoryController extends AdminController
{
    protected $pathView = "admin.core.";

    protected $resize = [
        'thumbnail' => ['width' => 100],
        'standard' => ['width' => 100],
    ];

    protected $fieldForm = [
        'general_tab' => [
            'tab_label' => 'General (VI)',
            'items' => [
                ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
                ['label' => 'Description', 'name' => 'description', 'type' => 'text'],
                ['label' => 'Status', 'name' => 'status', 'type' => 'checkbox']
            ]
        ],

        'seo_tab' => [
            'tab_label' => 'Meta (VI)',
            'items' => [
                ['label' => 'Slug', 'name' => 'slug', 'type' => 'slug'],
                ['label' => 'Meta Title', 'name' => 'meta_title', 'type' => 'text'],
            ]
        ],
    ];

    protected $fieldList = [
        ['label' => 'iD', 'name' => 'id', 'type' => 'id'],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Status', 'name' => 'status', 'type' => 'status'],
        ['label' => 'Created At', 'name' => 'created_at', 'type' => 'dateFormat'],
        ['label' => 'Updated At', 'name' => 'updated_at', 'type' => 'dateFormat']
    ];

    protected $removeRedundant = ['_token','tag_id'];
    public function __construct(){
        //Get name of Controller
        $getControllerName = (new \ReflectionClass($this))->getShortName();
        $shortController = Functions::getModelName($getControllerName);
        $this -> folderUpload = $shortController;
        $this -> controllerName = $shortController;
        view()->share("shortController", $shortController);
        view()->share("controllerName",$this -> controllerName);
        view()->share("folderUpload", $this -> folderUpload);
        view()->share("fieldForm", $this -> fieldForm);
        view()->share("fieldList", $this -> fieldList);
        $this -> model = new MainModel();
    }

    public function store(Request $request){
        //Gửi request sang hàm validateForm để xác thực
        $this -> validateForm($request);
        $data = $this -> getData($request -> all());
        //Gán các trường trong db bằng value
        if($data){
            foreach ($data as $key => $value){
                if( is_object($value) ){
                    $value = $this -> uploadImage($value);
                }

                if($key == "name"){
                    $value = ucfirst($value);
                }
                $this -> model -> $key = $value; //create
            }
        }

        $this -> model -> save(); //store

        // Xử lý với tags
        if( isset($request->tag_id)  && count($request->tag_id) > 0 ){
            $tag_id = $request->tag_id;
            $tags_id = [];
            foreach($tag_id as $k => $v){
                // Kiểm tra xem có phải là số hoặc chữ số hay không
                if(is_numeric ($v)){
                    $tags_id[] = $v;
                }
            }
            // attach(array);
            $this-> model -> tags() -> attach($tags_id);
        }

        Session::flash("action_success", "Thêm mới thành công");
        return redirect() -> route("admin." . $this -> controllerName . ".index");
    }

}
