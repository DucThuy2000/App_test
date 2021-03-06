<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Product as MainModel;
use App\Helper\Functions;
use App\Product_category;
use App\Product_tags;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends AdminController
{
    protected $pathView = "admin.core.";

    protected $resize = [
        'thumbnail' => ['width' => 100],
        'standard' => ['width' => 150],
    ];

    protected $fieldForm = [
        'general_tab' => [
            'tab_label' => 'General (VI)',
            'items' => [
                ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
                ['label' => 'Description', 'name' => 'description', 'type' => 'textarea'],
                ['label' => 'Price Base', 'name' => 'price_base', 'type' => 'text'],
                ['label' => 'Price Final', 'name' => 'price_final', 'type' => 'text'],
                ['label' => 'Information', 'name' => 'information', 'type' => 'ckeditor'],
                ['label' => 'Picture', 'name' => 'picture', 'type' => 'file'],
                ['label' => 'Gallery', 'name' => 'gallery', 'type' => 'multipleFile'],
                ['label' => 'Category', 'name' => 'category_id', 'type' => 'select', 'modal' => Product_category::class],
                ['label' => 'Tags', 'name' => 'tag_id', 'type' => 'multipleSelect', 'modal' => Product_tags::class],
                ['label' => 'Type', 'name' => 'type', 'type' => 'select', 'data-source' => [
                    'Best Seller' => 'best seller',
                    'New arrivals' => 'new',
                    'On sale' => 'sale',
                ]],
                ['label' => 'Status', 'name' => 'status', 'type' => 'checkbox'],

            ]
        ],

        'seo_tab' => [
            'tab_label' => 'Meta (VI)',
            'items' => [
                ['label' => 'Slug', 'name' => 'slug', 'type' => 'slug'],
            ]
        ],
    ];

    protected $removeRedundant = ["_token", "tag_id"];

    protected $fieldList = [
        ['label' => 'iD', 'name' => 'id', 'type' => 'id'],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Picture', 'name' => 'picture', 'type' => 'picture'],
        ['label' => 'Status', 'name' => 'status', 'type' => 'status'],
        ['label' => 'Created At', 'name' => 'created_at', 'type' => 'dateFormat'],
        ['label' => 'Updated At', 'name' => 'updated_at', 'type' => 'dateFormat']
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

    public function store(Request $request){
        //G???i request sang h??m validateForm ????? x??c th???c
        $this -> validateForm($request);
        $data = $this -> getData($request -> all());
        //G??n c??c tr?????ng trong db b???ng value
        if($data){
            foreach ($data as $key => $value){
                if( is_object($value) ){
                    $value = $this -> uploadImage($value);
                }
                if($key == "gallery"){
                    if( is_object($value[0]) ){
                        $value = $this -> uploadMultipleImage($value);
                    }
                }
                $this -> model -> $key = $value; //create
            }
        }

        $this -> model -> save(); //store

        // X??? l?? v???i tags
        if( isset($request->tag_id)  && count($request->tag_id) > 0 ){
            $tag_id = $request->tag_id;
            $tags_id = [];
            foreach($tag_id as $k => $v){
                // Ki???m tra xem c?? ph???i l?? s??? ho???c ch??? s??? hay kh??ng
                if(is_numeric ($v)){
                    $tags_id[] = $v;
                }
            }
            // attach(array);
            $this-> model -> tags() -> attach($tags_id);
        }

        Session::flash("action_success", "Th??m m???i th??nh c??ng");
        return redirect() -> route("admin." . $this -> controllerName . ".index");
    }

    public function update(Request $request, $id){
        //dd($request ->all());
        $record = $this -> model -> find($id);

        $this -> validateForm($request);
        $data = $this -> getData($request -> all());

        foreach ($data as $key => $value){
            if(is_object($value)){
                $this -> deleteImage($record -> {$key});
                $value = $this->uploadImage($value);
            }
            if($key == "gallery" ){
                if( is_object($value[0]) ){
                    $value = $this -> uploadMultipleImage($value);
                }
            }
            $record[$key] = $value;
        }

        $record -> save();

        if(isset($request -> tag_id) && count($request -> tag_id) > 0)
        {
            $tag_id = $request -> tag_id;
            $tags_id = [];
            foreach ($tag_id as $key => $value){
                if(is_numeric($value)){
                    $tags_id[] = $value;
                }
            }

            $record -> tags() -> sync($tags_id);
        }

        Session::flash("action_success", "S???a m???i th??nh c??ng");
        return redirect() -> route("admin." . $this -> controllerName . ".index");
    }

    //X??a review c???a product
    public function deleteReview($id){
        $review = Review::find($id);

        if($review){
            $review -> delete();

            return response() -> json([
                "code" => 200,
            ],200);
        }
    }

    public function uploadMultipleImage($object){
        $data = [];
        foreach ($object as $key => $file){
            $data[] = $this -> uploadImage($file);
        }
        return json_encode($data);
    }
}
