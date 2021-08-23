<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalTesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('soal_tes')->insert([
            'statement1' => 'Spontan, Fleksibel, tidak diikat waktu',
            'statement2' => 'Terencana dan memiliki deadline jelas',
            'type1' => 'P',
            'type2' => 'J',
        ]);
        // 2
        DB::table('soal_tes')->insert([
            'statement1' => 'Lebih memilih berkomunikasi dengan menulis',
            'statement2' => 'Lebih memilih berkomunikasi dengan bicara',
            'type1' => 'I',
            'type2' => 'E',
        ]);
        // 3
        DB::table('soal_tes')->insert([
            'statement1' => 'Tidak menyukai hal-hal yang bersifat mendadak dan di luar perencanaan',
            'statement2' => 'Perubahan mendadak tidak jadi masalah',
            'type1' => 'J',
            'type2' => 'P',
        ]);
        // 4
        DB::table('soal_tes')->insert([
            'statement1' => 'Obyektif',
            'statement2' => 'Subyektif',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 5
        DB::table('soal_tes')->insert([
            'statement1' => 'Menemukan dan mengembangkan ide dengan mendiskusikannya',
            'statement2' => 'Menemukan dan mengembangkan ide dengan merenungkan',
            'type1' => 'E',
            'type2' => 'I',
        ]);
        // 6
        DB::table('soal_tes')->insert([
            'statement1' => 'Bergerak dari gambaran umum baru ke detail',
            'statement2' => 'Bergerak dari detail ke gambaran umum sebagai kesimpulan akhir',
            'type1' => 'N',
            'type2' => 'S',
        ]);
        // 7
        DB::table('soal_tes')->insert([
            'statement1' => 'Berorientasi pada dunia eksternal (kegiatan, orang)',
            'statement2' => 'Berorientasi pada dunia internal (memori, pemikiran, ide)',
            'type1' => 'E',
            'type2' => 'I',
        ]);
        // 8
        DB::table('soal_tes')->insert([
            'statement1' => 'Berbicara mengenai masalah yang dihadapi hari ini dan langkah-langkah praktis mengatasinya',
            'statement2' => 'Berbicara mengenai visi masa depan dan konsep-konsep mengenai visi tersebut',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 9
        DB::table('soal_tes')->insert([
            'statement1' => 'Diyakinkan dengan penjelasan yang menyentuh perasaan',
            'statement2' => 'Diyakinkan dengan penjelasan yang masuk akal',
            'type1' => 'F',
            'type2' => 'T',
        ]);
        // 10
        DB::table('soal_tes')->insert([
            'statement1' => 'Fokus pada sedikit hobi namun mendalam',
            'statement2' => 'Fokus pada banyak hobi secara luas dan umum',
            'type1' => 'I',
            'type2' => 'E',
        ]);
        // 11
        DB::table('soal_tes')->insert([
            'statement1' => 'Tertutup dan mandiri',
            'statement2' => 'Sosial dan ekspresif',
            'type1' => 'I',
            'type2' => 'E',
        ]);
        // 12
        DB::table('soal_tes')->insert([
            'statement1' => 'Aturan, jadwal dan target sangat mengikat dan membebani',
            'statement2' => 'Aturan, jadwal dan target akan sangat membantu dan memperjelas tindakan',
            'type1' => 'P',
            'type2' => 'J',
        ]);
        // 13
        DB::table('soal_tes')->insert([
            'statement1' => 'Menggunakan pengalaman sebagai pedoman',
            'statement2' => 'Menggunakan imajinasi dan perenungan sebagai pedoman',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 14
        DB::table('soal_tes')->insert([
            'statement1' => 'Berorientasi tugas dan job description',
            'statement2' => 'Berorientasi pada manusia dan hubungan',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 15
        DB::table('soal_tes')->insert([
            'statement1' => 'Pertemuan dengan orang lain dan aktivitas sosial melelahkan',
            'statement2' => 'Bertemu orang dan aktivitas sosial membuat bersemangat',
            'type1' => 'I',
            'type2' => 'E',
        ]);
        // 16
        DB::table('soal_tes')->insert([
            'statement1' => 'SOP sangat membantu',
            'statement2' => 'SOP sangat membosankan',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 17
        DB::table('soal_tes')->insert([
            'statement1' => 'Mengambil keputusan berdasar logika dan aturan main',
            'statement2' => 'Mengambil keputusan berdasar perasaan pribadi dan kondisi orang lain',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 18
        DB::table('soal_tes')->insert([
            'statement1' => 'Bebas dan dinamis',
            'statement2' => 'Prosedural dan tradisional',
            'type1' => 'N',
            'type2' => 'S',
        ]);
        // 19
        DB::table('soal_tes')->insert([
            'statement1' => 'Berorientasi pada hasil',
            'statement2' => 'Berorientasi pada proses',
            'type1' => 'J',
            'type2' => 'P',
        ]);
        // 20
        DB::table('soal_tes')->insert([
            'statement1' => 'Beraktifitas sendirian di rumah menyenangkan',
            'statement2' => 'Beraktifitas sendirian di rumah membosankan',
            'type1' => 'I',
            'type2' => 'E',
        ]);
        // 21
        DB::table('soal_tes')->insert([
            'statement1' => 'Membiarkan orang lain bertindak bebas asalkan tujuan tercapai',
            'statement2' => 'Mengatur orang lain dengan tata tertib agar tujuan tercapai',
            'type1' => 'P',
            'type2' => 'J',
        ]);
        // 22
        DB::table('soal_tes')->insert([
            'statement1' => 'Memilih ide inspiratif lebih penting daripada fakta',
            'statement2' => 'Memilih fakta lebih penting daripada ide inspiratif',
            'type1' => 'N',
            'type2' => 'S',
        ]);
        // 23
        DB::table('soal_tes')->insert([
            'statement1' => 'Mengemukakan tujuan dan sasaran lebih dahulu',
            'statement2' => 'Mengemukakan kesepakatan terlebih dahulu',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 24
        DB::table('soal_tes')->insert([
            'statement1' => 'Fokus pada target dan mengabaikan hal-hal baru',
            'statement2' => 'Memperhatikan hal-hal baru dan siap menyesuaikan diri serta mengubah target',
            'type1' => 'J',
            'type2' => 'P',
        ]);
        // 25
        DB::table('soal_tes')->insert([
            'statement1' => 'Kontinuitas dan stabilitas lebih diutamakan',
            'statement2' => 'Perubahan dan variasi lebih diutamakan',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 26
        DB::table('soal_tes')->insert([
            'statement1' => 'Pendirian masih bisa berubah tergantung situasi nantinya',
            'statement2' => 'Berpegang teguh pada pendirian',
            'type1' => 'P',
            'type2' => 'J',
        ]);
        // 27
        DB::table('soal_tes')->insert([
            'statement1' => 'Bertindak step by step dengan timeframe yang jelas',
            'statement2' => 'Bertindak dengan semangat tanpa menggunakan timeframe',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 28
        DB::table('soal_tes')->insert([
            'statement1' => 'Berinisiatif tinggi hampir dalam berbagai hal meskipun tidak berhubungan dengan dirinya',
            'statement2' => 'Berinisiatif bila situasi memaksa atau berhubungan dengan kepentingan sendiri',
            'type1' => 'E',
            'type2' => 'I',
        ]);
        // 29
        DB::table('soal_tes')->insert([
            'statement1' => 'Lebih memilih tempat yang tenang dan pribadi untuk berkonsentrasi',
            'statement2' => 'Lebih memilih tempat yang ramai dan banyak interaksi / aktifitas',
            'type1' => 'I',
            'type2' => 'E',
        ]);
        // 30
        DB::table('soal_tes')->insert([
            'statement1' => 'Menganalisa',
            'statement2' => 'Berempati',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 31
        DB::table('soal_tes')->insert([
            'statement1' => 'Berpikir secara matang sebelum bertindak',
            'statement2' => 'Berani bertindak tanpa terlalu lama berfikir',
            'type1' => 'I',
            'type2' => 'E',
        ]);
        // 32
        DB::table('soal_tes')->insert([
            'statement1' => 'Menghargai seseorang karena sifat dan perilakunya',
            'statement2' => 'Menghargai seseorang karena skill dan faktor teknis',
            'type1' => 'F',
            'type2' => 'T',
        ]);
        // 33
        DB::table('soal_tes')->insert([
            'statement1' => 'Merasa nyaman bila situasi tetap terbuka terhadap pilihan-pilihan lain',
            'statement2' => 'Merasa tenang bila semua sudah diputuskan',
            'type1' => 'P',
            'type2' => 'J',
        ]);
        // 34
        DB::table('soal_tes')->insert([
            'statement1' => 'Menarik kesimpulan dengan lama dan hati-hati',
            'statement2' => 'Menarik kesimpulan dengan cepat sesuai naluri',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 35
        DB::table('soal_tes')->insert([
            'statement1' => 'Mengekspresikan semangat',
            'statement2' => 'Menyimpan semangat dalam hati',
            'type1' => 'E',
            'type2' => 'I',
        ]);
        // 36
        DB::table('soal_tes')->insert([
            'statement1' => 'Mengklarifikasi ide dan teori sebelum dipraktekkan',
            'statement2' => 'Memahami ide dan teori saat mempraktekkannya langsung',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 37
        DB::table('soal_tes')->insert([
            'statement1' => 'Melibatkan perasaan itu tidak profesional',
            'statement2' => 'Terlalu kaku pada peraturan dan pekerjaan itu kejam',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 38
        DB::table('soal_tes')->insert([
            'statement1' => 'Mencari kesempatan untuk berkomunikasi secara perorangan',
            'statement2' => 'Memilih berkomunikasi pada sekelompok orang',
            'type1' => 'I',
            'type2' => 'E',
        ]);
        // 39
        DB::table('soal_tes')->insert([
            'statement1' => 'Yang penting situasi harmonis terjaga',
            'statement2' => 'Yang penting tujuan tercapai',
            'type1' => 'F',
            'type2' => 'T',
        ]);
        // 40
        DB::table('soal_tes')->insert([
            'statement1' => 'Ketidakpastian itu seru, menegangkan dan membuat hati lebih senang',
            'statement2' => 'Ketidakpastian membuat bingung dan meresahkan',
            'type1' => 'P',
            'type2' => 'J',
        ]);
        // 41
        DB::table('soal_tes')->insert([
            'statement1' => 'Berfokus pada masa kini (apa yang bisa diperbaiki sekarang)',
            'statement2' => 'Berfokus pada masa depan (apa yang mungkin dicapai di masa depan)',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 42
        DB::table('soal_tes')->insert([
            'statement1' => 'Mempertanyakan',
            'statement2' => 'Mengakomodasi',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 43
        DB::table('soal_tes')->insert([
            'statement1' => 'Secara konsisten mengamati dan mengingat detail',
            'statement2' => 'Mengamati dan mengingat detail hanya bila berhubungan dengan pola',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 44
        DB::table('soal_tes')->insert([
            'statement1' => 'Situasi last minute membuat bersemangat dan memunculkan potensi',
            'statement2' => 'Situasi last minute sangat menyiksa, membuat stress dan merupakan kesalahan',
            'type1' => 'P',
            'type2' => 'J',
        ]);
        // 45
        DB::table('soal_tes')->insert([
            'statement1' => 'Lebih suka komunikasi tidak langsung (telp, surat, e-mail)',
            'statement2' => 'Lebih suka komunikasi langsung (tatap muka)',
            'type1' => 'I',
            'type2' => 'E',
        ]);
        // 46
        DB::table('soal_tes')->insert([
            'statement1' => 'Praktis',
            'statement2' => 'Konseptual',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 47
        DB::table('soal_tes')->insert([
            'statement1' => 'Perubahan adalah musuh',
            'statement2' => 'Perubahan adalah semangat hidup',
            'type1' => 'J',
            'type2' => 'P',
        ]);
        // 48
        DB::table('soal_tes')->insert([
            'statement1' => 'Sering dianggap keras kepala',
            'statement2' => 'Sering dianggap terlalu memihak',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 49
        DB::table('soal_tes')->insert([
            'statement1' => 'Bersemangat saat menolong orang keluar dari kesalahan dan meluruskan',
            'statement2' => 'Bersemangat saat mengkritik dan menemukan kesalahan',
            'type1' => 'F',
            'type2' => 'T',
        ]);
        // 50
        DB::table('soal_tes')->insert([
            'statement1' => 'Bertindak sesuai situasi dan kondisi yang terjadi saat itu',
            'statement2' => 'Bertindak sesuai apa yang sudah direncanakan',
            'type1' => 'P',
            'type2' => 'J',
        ]);
        // 51
        DB::table('soal_tes')->insert([
            'statement1' => 'Menggunakan keterampilan yang sudah dikuasai',
            'statement2' => 'Menyukai tantangan untuk menguasai keterampilan baru',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 52
        DB::table('soal_tes')->insert([
            'statement1' => 'Membangun ide pada saat berbicara',
            'statement2' => 'Membangun ide dengan matang baru membicarakannya',
            'type1' => 'E',
            'type2' => 'I',
        ]);
        // 53
        DB::table('soal_tes')->insert([
            'statement1' => 'Memilih cara yang sudah ada dan sudah terbukti',
            'statement2' => 'Memilih cara yang unik dan belum dipraktekkan orang lain',
            'type1' => 'S',
            'type2' => 'N',
        ]);
        // 54
        DB::table('soal_tes')->insert([
            'statement1' => 'Hidup harus sudah diatur dari awal',
            'statement2' => 'Hidup seharusnya mengalir sesuai kondisi',
            'type1' => 'J',
            'type2' => 'P',
        ]);
        // 55
        DB::table('soal_tes')->insert([
            'statement1' => 'Standar harus ditegakkan di atas segalanya (itu menunjukkan kehormatan dan harga diri)',
            'statement2' => 'Perasaan manusia lebih penting dari sekadar standar (yang adalah benda mati)',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 56
        DB::table('soal_tes')->insert([
            'statement1' => 'Daftar dan checklist adalah panduan penting',
            'statement2' => 'Daftar dan checklist adalah tugas dan beban',
            'type1' => 'J',
            'type2' => 'P',
        ]);
        // 57
        DB::table('soal_tes')->insert([
            'statement1' => 'Menuntut perlakuan yang adil dan sama pada semua orang',
            'statement2' => 'Menuntut perlakuan khusus sesuai karakteristik masing-masing orang',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 58
        DB::table('soal_tes')->insert([
            'statement1' => 'Mementingkan sebab-akibat',
            'statement2' => 'Mementingkan nilai-nilai personal',
            'type1' => 'T',
            'type2' => 'F',
        ]);
        // 59
        DB::table('soal_tes')->insert([
            'statement1' => 'Puas ketika mampu beradaptasi dengan momentum yang terjadi',
            'statement2' => 'Puas ketika mampu menjalankan semuanya sesuai rencana',
            'type1' => 'P',
            'type2' => 'J',
        ]);
        // 60
        DB::table('soal_tes')->insert([
            'statement1' => 'Spontan, Easy Going, fleksibel',
            'statement2' => 'Berhati-hati, penuh pertimbangan, kaku',
            'type1' => 'E',
            'type2' => 'I',
        ]);
    }
}
