<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Model\KlasifikasiSurat;
use App\Models\Model\LogSurat;
use App\Models\Model\Pegawai;
use App\Models\model\Penduduk;
use App\Models\Model\Profil;
use App\Models\Model\StrukturPemerintahan;
use App\Models\Model\SuratFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CetakSuratController extends Controller
{
    public function data_surat()
    {
        $data = [
            "data_surat" => SuratFormat::all(),
        ];

        return view("/admin/page/cetak_surat/data_surat", $data);
    }

    public function form_cetak_surat($url_surat)
    {
        $data = [
            "detail_surat" => SuratFormat::where("url_surat", $url_surat)->first(),
            "data_penduduk" => Penduduk::all(),
            "data_pegawai" => Pegawai::all(),
            "max_nomer" => $this->maxNumber()
        ];

        return view("template-surat.".$url_surat, $data);
    }

    public function ambil_data_penduduk(Request $request, $url_surat)
    {
        $data = [
            "detail_surat" => SuratFormat::where("url_surat", $url_surat)->first(),
            "data_penduduk" => Penduduk::all(),
            "data_penduduk" => Penduduk::all(),
            "data_pegawai" => Pegawai::all(),
            "detail" => Penduduk::where("id", $request->id_penduduk)->first(),
            "max_nomer" => $this->maxNumber()
        ];

        return view("template-surat.".$url_surat, $data);
    }

    public function cetakSuratBeforeUpdate(Request $request)
    {
        $this->simpanLogSurat($request);

        $no_surat = $request->no_surat;
        $keperluan = $request->keperluan;
        $keterangan = $request->keterangan;
        $penduduk = Penduduk::where('id', $request->id_penduduk)->first();
        $format = SuratFormat::where('id', $request->id_surat_format)->first();
        $pegawai = Pegawai::where('id', $request->id_pegawai)->first();
        $jabatan = StrukturPemerintahan::where('pegawai_id', $pegawai->id)->first();
        $profil = Profil::first();

        $template = new \PhpOffice\PhpWord\TemplateProcessor('./template/surat/'.$request->surat.'.docx');
        $template->setValues([
            'provinsi' => $profil->provinsi,
            'kabupaten' => $profil->kabupaten,
            'kabupaten1' => strtoupper($profil->kabupaten),
            'kecamatan' => $profil->kecamatan,
            'kecamatan1' => strtoupper($profil->kecamatan),
            'kode_pos' => $profil->kode_pos,
            'desa' => $profil->nama_desa,
            'desa1' => strtoupper($profil->nama_desa),
            'jenis_surat' => strtoupper($format->nama),
            'no_surat' => $no_surat,
            'akronim' => $format->akronim,
            'bulan' => $this->bulanRomawi(date('m')),
            'tahun' => date("Y"),
            'nama' => $penduduk->nama,
            'nik' => $penduduk->nik,
            'kelamin' => $penduduk->getKelamin->nama,
            'tempat' => $penduduk->tempat_lahir,
            'tgl_lahir' => Carbon::createFromFormat('Y-m-d', $penduduk->tgl_lahir)->isoFormat("D MMMM Y"),
            'warga_negara' => $penduduk->getWargaNegara->nama,
            'agama' => $penduduk->getAgama->nama,
            'pekerjaan' => $penduduk->getPekerjaan->nama,
            'status_kawin' => $penduduk->getKawin->nama,
            'dusun' => $penduduk->getDusun->dusun,
            'rt' => $penduduk->getRt->rt,
            'rw' => $penduduk->getRw->rw,
            'keterangan' => $keterangan,
            'keperluan' => $keperluan,
            'tgl_surat' => Carbon::now()->isoFormat("D MMMM Y"),
            'jabatan' => $jabatan->getJabatan->nama_jabatan,
            'pejabat' => $jabatan->getPegawai->nama,
            'nip' => $jabatan->getPegawai->nip,
        ]);
        header("Content-Disposition: attachment; filename=".$penduduk->nama." - ".$format->nama.".docx");

        $template->saveAs('php://output');
    }

    public function simpanLogSurat($request)
    {
        LogSurat::create([
            "id_format_surat" => $request->id_surat_format,
            "id_penduduk" => $request->id_penduduk,
            "id_pegawai" => $request->id_pegawai,
            "id_user" => auth()->user()->id,
            "tanggal" => now(),
            "no_surat" => $request->no_surat,
            "keterangan" => $request->keterangan,
            "keperluan" => $request->keperluan
        ]);
    }

    public function cetakSuratAfterUpdate($id)
    {
        if ($id) {
            $log = LogSurat::where('id', $id)->first();
            $profil = Profil::first();
            $pegawai = Pegawai::where('id', $log->id_pegawai)->first();
            $jabatan = StrukturPemerintahan::where('pegawai_id', $pegawai->id)->first();
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./template/surat/surat.docx');
            $template->setValues([
                'provinsi' => $profil->provinsi,
                'kabupaten' => $profil->kabupaten,
                'kabupaten1' => strtoupper($profil->kabupaten),
                'kecamatan' => $profil->kecamatan,
                'kecamatan1' => strtoupper($profil->kecamatan),
                'kode_pos' => $profil->kode_pos,
                'desa' => $profil->nama_desa,
                'desa1' => strtoupper($profil->nama_desa),
                'jenis_surat' => strtoupper($log->getFormatSurat->nama),
                'no_surat' => $log->no_surat,
                'akronim' => $log->getFormatSurat->akronim,
                'bulan' => $this->bulanRomawi(date('m')),
                'tahun' => date("Y"),
                'nama' => $log->getPenduduk->nama,
                'nik' => $log->getPenduduk->nik,
                'kelamin' => $log->getPenduduk->getKelamin->nama,
                'tempat' => $log->getPenduduk->tempat_lahir,
                'tgl_lahir' => Carbon::createFromFormat('Y-m-d', $log->getPenduduk->tgl_lahir)->isoFormat("D MMMM Y"),
                'warga_negara' => $log->getPenduduk->getWargaNegara->nama,
                'agama' => $log->getPenduduk->getAgama->nama,
                'pekerjaan' => $log->getPenduduk->getPekerjaan->nama,
                'status_kawin' => $log->getPenduduk->getKawin->nama,
                'dusun' => $log->getPenduduk->getDusun->dusun,
                'rt' => $log->getPenduduk->getRt->rt,
                'rw' => $log->getPenduduk->getRw->rw,
                'keterangan' => $log->keterangan,
                'keperluan' => $log->keperluan,
                'tgl_surat' => Carbon::now()->isoFormat("D MMMM Y"),
                'jabatan' => $jabatan->getJabatan->nama_jabatan,
                'pejabat' => $jabatan->getPegawai->nama,
                'nip' => $jabatan->getPegawai->nip,
            ]);

            header("Content-Disposition: attachment; filename=".$log->getPenduduk->nama.".docx");
            $template->saveAs('php://output');
        } else {
            abort(404);
        }

    }

    public function maxNumber()
    {
        $max = LogSurat::max('no_surat');
        $urutan = (int) substr($max, 2);
        $urutan++;
        $hasil = sprintf("%03s", $urutan);
        return $hasil;
    }

    public function bulanRomawi($bln)
    {
        $bulan = '';
        switch ($bln) {
            case '01':
                $bulan = 'I';
                break;
                case '02':
                    $bulan = 'II';
                    break;
                    case '03':
                        $bulan = 'III';
                        break;
                        case '04':
                            $bulan = 'IV';
                            break;
                            case '05':
                                $bulan = 'V';
                                break;
                                case '06':
                                    $bulan = 'VI';
                                    break;
                                    case '07':
                                        $bulan = 'VII';
                                        break;
                                        case '08':
                                            $bulan = 'VIII';
                                            break;
                                            case '09':
                                                $bulan = 'IX';
                                                break;
                                                case '10':
                                                    $bulan = 'X';
                                                    break;
                                                    case '11':
                                                        $bulan = 'XI';
                                                        break;
                                                        case '12':
                                                            $bulan = 'XII';
                                                            break;
                                                        }

                                                        return $bulan;
                                                    }
                                                }
