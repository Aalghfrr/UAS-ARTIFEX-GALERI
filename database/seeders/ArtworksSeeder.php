<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artwork;
use App\Models\User;

class ArtworksSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Pastikan user seniman default ada
        $artist = User::firstOrCreate(
            ['email' => 'seniman@artifex.com'],
            [
                'name' => 'Seniman Default',
                'password' => bcrypt('password123'),
                'role' => 'seniman'
            ]
        );

        // ✅ Daftar karya lengkap dengan senimannya
        $artworks = [
            [
                'artist_name' => 'Raden Saleh',
                'title' => 'Penangkapan Pangeran Diponegoro',
                'description' => 'Karya Raden Saleh (1857) menggambarkan penangkapan Pangeran Diponegoro oleh de Kock dengan emosi dan dramatis.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Raden_Saleh_-_Diponegoro_arrest.jpg/330px-Raden_Saleh_-_Diponegoro_arrest.jpg'
            ],
            [
                'artist_name' => 'Salvador Dalí',
                'title' => 'The Persistence of Memory',
                'description' => 'Karya surealis terkenal dengan jam-jam meleleh di lanskap mimpi.',
                'image' => 'https://www.singulart.com/blog/wp-content/uploads/2023/12/The-Persistence-of-Memory.jpg'
            ],
            [
                'artist_name' => 'Basoeki Abdullah',
                'title' => 'Perkelahian Rahwana dan Jatayu Memperebutkan Shinta',
                'description' => 'Karya penuh dinamika menggambarkan pertarungan Rahwana dengan burung Jatayu.',
                'image' => 'https://s3-ap-southeast-1.amazonaws.com/cntatr-assets-ap-southeast-1-250226768838-55a62c9399d4d8a6/2024/05/HkqDYcKF-image.png'
            ],
            [
                'artist_name' => 'Paul Cézanne',
                'title' => 'Pemain Kartu',
                'description' => 'Karya post-impresionis menggambarkan ketenangan pemain kartu dalam kesunyian.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Les_Joueurs_de_cartes%2C_par_Paul_C%C3%A9zanne.jpg/330px-Les_Joueurs_de_cartes%2C_par_Paul_C%C3%A9zanne.jpg'
            ],
            [
                'artist_name' => 'Edward Hopper',
                'title' => 'Nighthawks',
                'description' => 'Lukisan ikonik menggambarkan kesunyian kota besar lewat pemandangan restoran larut malam.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Hopper_Nighthawks.jpg/500px-Hopper_Nighthawks.jpg'
            ],
            [
                'artist_name' => 'Leonardo da Vinci',
                'title' => 'Mona Lisa',
                'description' => 'Potret misterius wanita dengan senyum paling terkenal di dunia.',
                'image' => 'https://i.pinimg.com/1200x/bf/b3/b0/bfb3b0c5969f1e94b4fba4ba921b8c94.jpg'
            ],
            [
                'artist_name' => 'S. Sudjojono',
                'title' => 'The Ruins and The Piano',
                'description' => 'Simbol keteguhan budaya di tengah kehancuran melalui piano yang masih utuh.',
                'image' => 'https://lh7-us.googleusercontent.com/a5y-3dADVP4HjoreBlKRisUsegUflNR9rZJOJ7P3LAkVYZ7TRliqTMJxnZcntVLtrnsg4-yJSrGfZBkGOU8us2WJzso2gcPTwehiMxY-jxSrnFjRIHcz9ObYyRsjIPqjin7RW4H9FomQ5QT4cMoR2ks'
            ],
            [
                'artist_name' => 'Sandro Botticelli',
                'title' => 'The Birth of Venus',
                'description' => 'Venus muncul dari laut, simbol keindahan dan kelahiran seni renaisans.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg/500px-Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg'
            ],
            [
                'artist_name' => 'Pablo Picasso',
                'title' => 'Guernica',
                'description' => 'Karya hitam putih monumental yang menggambarkan penderitaan akibat perang.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Mural_del_Gernika.jpg/250px-Mural_del_Gernika.jpg'
            ],
            [
                'artist_name' => 'Hendra Gunawan',
                'title' => 'Ali Sadikin Pada Masa Kemerdekaan',
                'description' => 'Lukisan tentang semangat dan perjuangan rakyat Indonesia.',
                'image' => 'https://lh7-us.googleusercontent.com/2tFr8UoXYeQRRU8nafy3zaZqtbtHo4t7DonKtEORWsQVQvVar_UeEx_LJVzxlArkY34BsXDWX-BsvJHwaYwqlae6oWclcz7HuRXK_yN58Acskurp9-P_7g3wLkZNPq5vTDIJfLBOwwgHUNJzT5psdFE'
            ],
            [
                'artist_name' => 'Raden Saleh',
                'title' => 'A View of Mount Megamendung',
                'description' => 'Karya klasik yang menampilkan pemandangan alam Jawa Barat dengan langit dramatis.',
                'image' => 'https://lh7-us.googleusercontent.com/-b_CimrN1ESoJ7n3D7y5Ewgsd-FHlg0nauJMNBb-kjoWr5JZzVFQ61volGee_YNz_irPYaNrOPwvG2gkSj2qxqySL6l9-FRlWbxzhNxxxikQR47wsHV5wNLVYfh9bRVndI49_Bmfvjt0NqiMZqNaYt0'
            ],
            [
                'artist_name' => 'Georges Seurat',
                'title' => 'A Sunday Afternoon on the Island of La Grande Jatte',
                'description' => 'Teknik pointilisme indah yang menggambarkan masyarakat Paris di taman sore hari.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/A_Sunday_on_La_Grande_Jatte%2C_Georges_Seurat%2C_1884.jpg/500px-A_Sunday_on_La_Grande_Jatte%2C_Georges_Seurat%2C_1884.jpg'
            ],
            [
                'artist_name' => 'Affandi',
                'title' => 'Badai Pasti Berlalu',
                'description' => 'Lukisan penuh energi yang menggambarkan kekuatan dan semangat hidup.',
                'image' => 'https://lh7-us.googleusercontent.com/5-RxGCRfKgK6T-ZSoXr-rKHKSRKVGFscMIaqDyCQ0pxFlrV8gRKRlj9zwJHDLwn2KEgxBBeBb58OK3DEF0lFCw0DjCMapfQSkNrQ9dXJUq9OAA0FNm4DUJTw_DUVakJQDELaTiyH6UadDSGLu0wrrbY'
            ],
            [
                'artist_name' => 'Pierre-Auguste Renoir',
                'title' => 'Bal du Moulin de la Galette',
                'description' => 'Lukisan impresionis menggambarkan pesta dansa penuh cahaya dan kebahagiaan di Paris.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Auguste_Renoir_-_Dance_at_Le_Moulin_de_la_Galette_-_Mus%C3%A9e_d%27Orsay_RF_2739_%28derivative_work_-_AutoContrast_edit_in_LCH_space%29.jpg/500px-Auguste_Renoir_-_Dance_at_Le_Moulin_de_la_Galette_-_Mus%C3%A9e_d%27Orsay_RF_2739_%28derivative_work_-_AutoContrast_edit_in_LCH_space%29.jpg'
            ],
            [
                'artist_name' => 'Claude Monet',
                'title' => 'Impression, Sunrise',
                'description' => 'Karya yang menandai lahirnya impresionisme modern.',
                'image' => 'https://smarthistory.org/wp-content/uploads/2023/07/dezoomify-result-27-870x673.jpg'
            ],
            [
                'artist_name' => 'Caravaggio',
                'title' => 'Pemanggilan Santo Matius',
                'description' => 'Karya religius dramatis dengan permainan cahaya khas Caravaggio.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Caravaggio_%E2%80%94_The_Calling_of_Saint_Matthew.jpg/500px-Caravaggio_%E2%80%94_The_Calling_of_Saint_Matthew.jpg'
            ],
        ];

        foreach ($artworks as $art) {
            Artwork::create([
                'artist_id' => $artist->id,
                'artist_name' => $art['artist_name'],
                'title' => $art['title'],
                'description' => $art['description'],
                'price' => rand(1000000, 10000000),
                'image' => $art['image'],
            ]);
        }
    }
}
