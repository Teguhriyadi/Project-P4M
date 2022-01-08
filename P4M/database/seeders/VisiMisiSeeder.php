<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Model\VisiMisi;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VisiMisi::create([
            "visi" => "SEJAHTERA, AMANAH, AGAMIS DAN TERAMPIL (SEHAT)",
            "misi" => "<ol>
            <li>Mingktankatnya kesejahteraan masyarakatnya yang makin makmur</li>
            <li>Menguat kemitraan dan tanggung jawab dalam pembnagunan pendidikan kegamaan seta dapat dipercaya dengan nilai-nilai norma kegamaan.</li>
            <li>Menguatnya kesaehan social masyarakat dan aparatur pemerintahan Desa  serta memperkokoh nilai-nilai silaturahmi</li>
            <li>Menjaikan masyarakat yang pandai dengan peningktan SDM yang terpadu.</li>
            </ol>
            "
        ]);
    }
}
