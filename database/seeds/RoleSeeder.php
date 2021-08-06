<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            ['id' => 1, 'name' => 'Admin', 'permissions' => '{\"user.index\":true,\"user.create\":true,\"user.edit\":true,\"user.delete\":true,\"role.index\":true,\"role.create\":true,\"role.edit\":true,\"role.delete\":true,\"product.index\":true,\"product.create\":true,\"product.edit\":true,\"product.delete\":true,\"product_category.index\":true,\"product_category.create\":true,\"product_category.edit\":true,\"product_category.delete\":true,\"product_tags.index\":true,\"product_tags.create\":true,\"product_tags.edit\":true,\"product_tags.delete\":true,\"setting.index\":true,\"setting.create\":true,\"setting.edit\":true,\"setting.delete\":true,\"partner.index\":true,\"partner.create\":true,\"partner.edit\":true,\"partner.delete\":true,\"menu.index\":true,\"blog.index\":true,\"blog.create\":true,\"blog.edit\":true,\"blog.delete\":true,\"blog_category.index\":true,\"blog_category.create\":true,\"blog_category.edit\":true,\"blog_category.delete\":true,\"banner.index\":true,\"banner.create\":true,\"banner.edit\":true,\"banner.delete\":true,\"bank.index\":true,\"bank.create\":true,\"bank.edit\":true,\"bank.delete\":true,\"coupon.index\":true,\"coupon.create\":true,\"coupon.edit\":true,\"coupon.delete\":true,\"widget.index\":true,\"widget.create\":true,\"widget.edit\":true,\"widget.delete\":true,\"order.index\":true,\"order.create\":true,\"order.edit\":true,\"order.delete\":true,\"faq.index\":true,\"faq.create\":true,\"faq.edit\":true,\"faq.delete\":true,\"contact.index\":true,\"contact.create\":true,\"contact.edit\":true,\"contact.delete\":true}', 'created_at' => '2021-06-06 08:41:57', 'updated_at' => '2021-08-03 16:01:57'],
            ['id' => 2, 'name' => 'Staff', 'permissions' => '{\"user.index\":false,\"user.create\":false,\"user.edit\":false,\"user.delete\":false,\"role.index\":false,\"role.create\":false,\"role.edit\":false,\"role.delete\":false,\"product.index\":true,\"product.create\":true,\"product.edit\":true,\"product.delete\":true,\"product_category.index\":true,\"product_category.create\":true,\"product_category.edit\":true,\"product_category.delete\":true,\"product_tags.index\":true,\"product_tags.create\":true,\"product_tags.edit\":true,\"product_tags.delete\":true,\"setting.index\":true,\"setting.create\":true,\"setting.edit\":true,\"setting.delete\":true}', 'created_at' => '2021-06-06 08:42:51', 'updated_at' => '2021-06-11 21:00:15'],
            ['id' => 3, 'name' => 'Guest', 'permissions' => '{\"user.index\":false,\"user.create\":false,\"user.edit\":false,\"user.delete\":false,\"role.index\":false,\"role.create\":false,\"role.edit\":false,\"role.delete\":false,\"product.index\":true,\"product.create\":false,\"product.edit\":false,\"product.delete\":false,\"product_category.index\":true,\"product_category.create\":false,\"product_category.edit\":false,\"product_category.delete\":false,\"product_tags.index\":true,\"product_tags.create\":false,\"product_tags.edit\":false,\"product_tags.delete\":false,\"setting.index\":true,\"setting.create\":false,\"setting.edit\":false,\"setting.delete\":false}', 'created_at' => '2021-06-06 08:43:11', 'updated_at' => '2021-06-11 21:00:29'],
        ]);
    }
}
