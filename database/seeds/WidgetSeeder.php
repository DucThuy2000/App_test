<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('widgets')->insert([
            ['id' => 1, 'name' => 'Liên hệ', 'location' => 'footer 1', 'content' => '<p>Địa chỉ: 29 Khương Hạ, Thanh Xuân, Hà Nội</p>\r\n\r\n<p>Phone: 0982782923</p>\r\n\r\n<p>Email: ducthuy1705@gmail.com</p>', 'status' => 'active', 'created_at' => '2021-07-17 06:21:19', 'updated_at' => '2021-07-17 06:21:47'],
            ['id' => 2, 'name' => 'Thông tin', 'location' => 'footer 2', 'content' => '<p><a href=\"https://demo-clock-app.herokuapp.com/\">Trang chủ</a></p>\r\n\r\n<p><a href=\"https://demo-clock-app.herokuapp.com/lien-lac\">Liên hệ</a></p>\r\n\r\n<p><a href=\"https://demo-clock-app.herokuapp.com/tin-tuc\">Tin Tức</a></p>\r\n\r\n<p><a href=\"https://demo-clock-app.herokuapp.com/cua-hang\">Sản Phẩm</a></p>', 'status' => 'active', 'created_at' => '2021-07-17 06:26:11', 'updated_at' => '2021-07-31 01:05:09'],
            ['id' => 3, 'name' => 'Tính năng thêm', 'location' => 'footer 3', 'content' => '<p><a href=\"https://demo-clock-app.herokuapp.com/gio-hang\">Giỏ hàng</a></p>\r\n\r\n<p><a href=\"https://demo-clock-app.herokuapp.com/danh-sach-yeu-thich\">Danh sách yêu thích</a></p>\r\n\r\n<p><a href=\"https://demo-clock-app.herokuapp.com/cau-hoi-thuong-gap\">Các câu hỏi thường gặp</a></p>', 'status' => 'active', 'created_at' => '2021-07-17 06:24:06', 'updated_at' => '2021-08-03 11:00:13'],
        ]);
    }
}
