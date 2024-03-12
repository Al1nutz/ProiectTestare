<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Jung Kook (BTS) – Golden (Weverse Gift Version) 3CD SET',
                'description' => 'WEVERSE GIFT: 3 Logo Phone Grips + 1 Unreleased Photocard Random 1 Out Of 2 Versions
                 + 1 Holographic Photo Frame Featuring The Same Image With The Photocard Random 1 Out Of 2 Versions',
                'price' => 530.00,
                'category_id' => 1,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2023/10/WEVERSE-GIFT-6-510x510.png',
                'stock' => 50,
            ],
            [
                'name' => 'ATEEZ – The World EP. Fin: Will',
                'description' => 'SPECIAL GIFT: Officially Licensed Photocard 1EA',
                'price' => 130.00,
                'category_id' => 1,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2023/10/8809704426909.jpg',
                'stock' => 30,
            ],
            [
                'name' => 'BamBam – Vol. 1 (Sour & Sweet) Sour Version',
                'description' => 'CD-R 120*120mm 1EA',
                'price' => 155.00,
                'category_id' => 1,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2023/02/8804775253737.jpg',
                'stock' => 2,
            ],
            [
                'name' => 'Monsta X – 2023 7th Official Fanclub Monbebe Fan-Concert (MX Friends) DVD (4DISC)',
                'description' => 'Duration: Disc 01 About 99 Mins, Disc 02 About 95 Mins, Disc 03 About 100 Mins, Disc 04 About 105 Mins',
                'price' => 355.99,
                'category_id' => 2,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2023/12/kpop_shop_online_Monsta-X-2023-7th-Official-Fanclub-Monbebe-Fan-Concert-Mx-Friends-DVD-4DISC-8809375126245.jpg',
                'stock' => 0,
            ],
            [
                'name' => 'BTS – BTS, The Best',
                'description' => 'Album foarte bun, recomandat insusi de catre Turcu',
                'price' => 330.00,
                'category_id' => 2,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2021/03/kpop_shop_online_BTS-BTS-THE-BEST3.jpg',
                'stock' => 1,
            ],
            [
                'name' => 'Monsta X – Love Killa',
                'description' => 'Love Killa -Japanese ver',
                'price' => 140.00,
                'category_id' => 2,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2020/12/s-l1600-1-510x510.jpg',
                'stock' => 30,
            ],
            [
                'name' => 'BTS – Love Yourself: Tear (Vinyl Version)',
                'description' => 'Vinyl 12″ 180G 1LP',
                'price' => 365.00,
                'category_id' => 3,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2023/12/8809848753213.jpg',
                'stock' => 50,
            ],
            [
                'name' => 'Blackpink – The Album (International LP Version)',
                'description' => 'Love To Hate Me',
                'price' => 125.00,
                'category_id' => 3,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2022/02/s-l1600-510x405.png',
                'stock' => 10,
            ],
            [
                'name' => 'Monsta X – The Dreaming (Black Vinyl)',
                'description' => 'About Last Night',
                'price' => 150.00,
                'category_id' => 3,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2023/03/monstax_dreaming_lp-510x492.png',
                'stock' => 30,
            ],
            [
                'name' => 'Xdinary Heroes – Official Light Stick',
                'description' => 'Official Light Stick',
                'price' => 400.00,
                'category_id' => 4,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2023/08/kpop_shop_online_Xdinary-Heroes-Official-Light-Stick-8809932171534.jpg',
                'stock' => 5,
            ],
            [
                'name' => 'Jimin YOU Hoodie',
                'description' => 'You Never Have To Walk alone in these limited edition Jimin YOU hoodies!',
                'price' => 500.00,
                'category_id' => 4,
                'img_url' => 'https://armymerchgiftshop.com/cdn/shop/products/jimin-you-hoodiearmymerchgiftshop-319636_1024x1024@2x.jpg?v=1649354602',
                'stock' => 1,
            ],
            [
                'name' => 'BTS Tinytan Figure – Butter (V)',
                'description' => 'Figure(PVC, ABS, Height: 7.4cm)',
                'price' => 185.00,
                'category_id' => 4,
                'img_url' => 'https://www.kpop.ro/wp-content/uploads/2022/05/kpop_shop_online_bts-2022-tinytan-figure-butter-v-merch-510x510.jpg',
                'stock' => 5,
            ],
        ];


        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
