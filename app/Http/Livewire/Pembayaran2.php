<?php

namespace App\Http\Livewire;

use App\Models\Gunabayar;
use App\Models\Kelas;
use Livewire\Component;
use App\Models\Pembayaran;
use App\Models\Siswa;

class Pembayaran2 extends Component
{
    public $idsiswa;
    public $namasiswa;
    public $nis;
    public $idkelas;
    public $idgunabayar;
    public $tahun;
    public $tanggalbayar;
    public $wajibbayar;
    public $wajibbayarf;
    public $jumlahbayar;
    public $jumlahbayarf;
    public $action;
    public $button;

    // tagihan
    public $juli, $agustus, $september, $oktober, $november, $desember, $januari, $februari, $maret, $april, $mei, $juni, $seragam, $alatpraktek, $uanggedung;
    public $wjuli, $wagustus, $wseptember, $woktober, $wnovember, $wdesember, $wjanuari, $wfebruari, $wmaret, $wapril, $wmei, $wjuni, $wseragam, $walatpraktek, $wuanggedung;
    public $tjuli, $tagustus, $tseptember, $toktober, $tnovember, $tdesember, $tjanuari, $tfebruari, $tmaret, $tapril, $tmei, $tjuni, $tseragam, $talatpraktek, $tuanggedung;


    protected $rules = [
        'idsiswa' => 'required',
        'nis' => 'required',
        'idkelas' => 'required',
        'idgunabayar' => 'required',
        'tahun' => 'required',
        'tanggalbayar' => 'required',
        'wajibbayar' => 'required',
        'jumlahbayar' => 'required',
    ];
    protected $messages = [
        'idsiswa.required' => 'Pilih Siswa',
        'nis.required' => 'Isi NIS',
        'idkelas.required' => 'Pilih Kelas',
        'idgunabayar.required' => 'Pilih Pembayaran',
        'tahun.required' => 'Pilih Tahun',
        'tanggalbayar.required' => 'Isi Tanggal',
        'wajibbayar.required' => 'Isi Wajib Bayar',
        'jumlahbayar.required' => 'Jumlah Bayar min 0',
    ];

    public function store()
    {
        $data = [
            'idsiswa' => $this->idsiswa,
            'nis' => $this->nis,
            'idkelas' => $this->idkelas,
            'idgunabayar' => $this->idgunabayar,
            'tahun' => $this->tahun,
            'tanggalbayar' => $this->tanggalbayar,
            'wajibbayar' => $this->wajibbayar,
            'jumlahbayar' => $this->jumlahbayar,
        ];

        $this->validate();
        Pembayaran::Create($data);
        $this->resetErrorBag();
        $this->clearVar();
        $this->emit('saved');
    }
    public function kembali()
    {
        return redirect()->to('pembayaran');
    }
    public function clearVar()
    {
        $this->idkelas = '';
        $this->idsiswa = '';
        $this->nis = '';
        $this->idgunabayar = '';
        $this->tahun = '';
        $this->tanggalbayar = gmdate('Y-m-d');
        $this->jumlahbayar = 0;
        $this->wajibbayar = '';
        $this->button = create_button($this->action, "Pembayaran Baru");
    }

    public function mount()
    {
        $this->tanggalbayar = gmdate('Y-m-d');
        $this->jumlahbayar = 0;
        $this->button = create_button($this->action, "Pembayaran Baru");
        // this button untuk menampilkan emit atau message toast 

    }
    public function render()
    {
        $data = [
            'kelas' => Kelas::orderBy('tingkat')->orderBy('jurusan')->get(),
            'tahuns' => Siswa::select('tahun')->distinct()->orderBy('tahun')->get(),
            'siswas' => Siswa::where('idkelas', $this->idkelas)
                ->where('tahun', $this->tahun)
                ->orderBy('nama')
                ->get(),
            'gunabayars' => Gunabayar::where('jenisket', 'SPP')->orderBy('urut')->get(),
        ];
        if (!empty($this->idgunabayar)) {
            $cari = Gunabayar::findOrFail($this->idgunabayar);
            $this->wajibbayar = $cari->wajibbayar;
        }
        $this->jumlahbayarf = 'Rp. ' . number_format(intval($this->jumlahbayar), 0, ".", ".") . ",-";
        //start id siswa
        if (!empty($this->idsiswa)) {
            $carinis = Siswa::findOrFail($this->idsiswa);
            $this->nis = $carinis->nis;
            $this->namasiswa = $carinis->nama;

            //Juli
            $this->juli = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 7)
                ->sum('jumlahbayar');
            $cariwjuli = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 7)->first();
            if (!empty($cariwjuli)) {
                $this->wjuli = $cariwjuli->wajibbayar;
                $hitung = intval($this->wjuli) - intval($this->juli);
                if ($hitung == 0) {
                    $this->tjuli = 'table-info';
                } else {
                    $this->tjuli = 'table-danger';
                }
            } else {
                $this->wjuli = 0;
                $this->tjuli = 'table-danger';
            }
            // end of juli

            //agustus
            $this->agustus = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 8)
                ->sum('jumlahbayar');
            $cariwagustus = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 8)->first();
            if (!empty($cariwagustus)) {
                $this->wagustus = $cariwagustus->wajibbayar;
                $hitung = intval($this->wagustus) - intval($this->agustus);
                if ($hitung == 0) {
                    $this->tagustus = 'table-info';
                } else {
                    $this->tagustus = 'table-danger';
                }
            } else {
                $this->wagustus = 0;
                $this->tagustus = 'table-danger';
            }
            // end of agustus

            //september
            $this->september = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 9)
                ->sum('jumlahbayar');
            $cariwseptember = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 9)->first();
            if (!empty($cariwseptember)) {
                $this->wseptember = $cariwseptember->wajibbayar;
                $hitung = intval($this->wseptember) - intval($this->september);
                if ($hitung == 0) {
                    $this->tseptember = 'table-info';
                } else {
                    $this->tseptember = 'table-danger';
                }
            } else {
                $this->wseptember = 0;
                $this->tseptember = 'table-danger';
            }
            // end of september

            //oktober
            $this->oktober = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 10)
                ->sum('jumlahbayar');
            $cariwoktober = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 10)->first();
            if (!empty($cariwoktober)) {
                $this->woktober = $cariwoktober->wajibbayar;
                $hitung = intval($this->woktober) - intval($this->oktober);
                if ($hitung == 0) {
                    $this->toktober = 'table-info';
                } else {
                    $this->toktober = 'table-danger';
                }
            } else {
                $this->woktober = 0;
                $this->toktober = 'table-danger';
            }
            // end of oktober

            //november
            $this->november = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 11)
                ->sum('jumlahbayar');
            $cariwnovember = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 11)->first();
            if (!empty($cariwnovember)) {
                $this->wnovember = $cariwnovember->wajibbayar;
                $hitung = intval($this->wnovember) - intval($this->november);
                if ($hitung == 0) {
                    $this->tnovember = 'table-info';
                } else {
                    $this->tnovember = 'table-danger';
                }
            } else {
                $this->wnovember = 0;
                $this->tnovember = 'table-danger';
            }
            // end of november

            //desember
            $this->desember = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 12)
                ->sum('jumlahbayar');
            $cariwdesember = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 12)->first();
            if (!empty($cariwdesember)) {
                $this->wdesember = $cariwdesember->wajibbayar;
                $hitung = intval($this->wdesember) - intval($this->desember);
                if ($hitung == 0) {
                    $this->tdesember = 'table-info';
                } else {
                    $this->tdesember = 'table-danger';
                }
            } else {
                $this->wdesember = 0;
                $this->tdesember = 'table-danger';
            }
            // end of desember

            //januari
            $this->januari = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 1)
                ->sum('jumlahbayar');
            $cariwjanuari = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 1)->first();
            if (!empty($cariwjanuari)) {
                $this->wjanuari = $cariwjanuari->wajibbayar;
                $hitung = intval($this->wjanuari) - intval($this->januari);
                if ($hitung == 0) {
                    $this->tjanuari = 'table-info';
                } else {
                    $this->tjanuari = 'table-danger';
                }
            } else {
                $this->wjanuari = 0;
                $this->tjanuari = 'table-danger';
            }
            // end of januari

            //agustus
            $this->februari = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 2)
                ->sum('jumlahbayar');
            $cariwfebruari = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 2)->first();
            if (!empty($cariwfebruari)) {
                $this->wfebruari = $cariwfebruari->wajibbayar;
                $hitung = intval($this->wfebruari) - intval($this->februari);
                if ($hitung == 0) {
                    $this->tfebruari = 'table-info';
                } else {
                    $this->tfebruari = 'table-danger';
                }
            } else {
                $this->wfebruari = 0;
                $this->tfebruari = 'table-danger';
            }
            // end of februari

            //maret
            $this->maret = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 3)
                ->sum('jumlahbayar');
            $cariwmaret = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 3)->first();
            if (!empty($cariwmaret)) {
                $this->wmaret = $cariwmaret->wajibbayar;
                $hitung = intval($this->wmaret) - intval($this->maret);
                if ($hitung == 0) {
                    $this->tmaret = 'table-info';
                } else {
                    $this->tmaret = 'table-danger';
                }
            } else {
                $this->wmaret = 0;
                $this->tmaret = 'table-danger';
            }
            // end of maret

            //april
            $this->april = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 4)
                ->sum('jumlahbayar');
            $cariwapril = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 4)->first();
            if (!empty($cariwapril)) {
                $this->wapril = $cariwapril->wajibbayar;
                $hitung = intval($this->wapril) - intval($this->april);
                if ($hitung == 0) {
                    $this->tapril = 'table-info';
                } else {
                    $this->tapril = 'table-danger';
                }
            } else {
                $this->wapril = 0;
                $this->tapril = 'table-danger';
            }
            // end of april

            //mei
            $this->mei = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 5)
                ->sum('jumlahbayar');
            $cariwmei = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 5)->first();
            if (!empty($cariwmei)) {
                $this->wmei = $cariwmei->wajibbayar;
                $hitung = intval($this->wmei) - intval($this->mei);
                if ($hitung == 0) {
                    $this->tmei = 'table-info';
                } else {
                    $this->tmei = 'table-danger';
                }
            } else {
                $this->wmei = 0;
                $this->tmei = 'table-danger';
            }
            // end of mei

            //juni
            $this->juni = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 6)
                ->sum('jumlahbayar');
            $cariwjuni = Pembayaran::where('idsiswa', $this->idsiswa)
                ->where('idgunabayar', 6)->first();
            if (!empty($cariwjuni)) {
                $this->wjuni = $cariwjuni->wajibbayar;
                $hitung = intval($this->wjuni) - intval($this->juni);
                if ($hitung == 0) {
                    $this->tjuni = 'table-info';
                } else {
                    $this->tjuni = 'table-danger';
                }
            } else {
                $this->wjuni = 0;
                $this->tjuni = 'table-danger';
            }
            // end of juni

            //uanggedung
            $this->uanggedung = Pembayaran::where('nis', $this->nis)
                ->where('idgunabayar', 13)
                ->sum('jumlahbayar');
            $cariwuanggedung = Pembayaran::where('nis', $this->nis)
                ->where('idgunabayar', 13)->first();
            if (!empty($cariwuanggedung)) {
                $this->wuanggedung = $cariwuanggedung->wajibbayar;
                $hitung = intval($this->wuanggedung) - intval($this->uanggedung);
                if ($hitung == 0) {
                    $this->tuanggedung = 'table-info';
                } else {
                    $this->tuanggedung = 'table-danger';
                }
            } else {
                $this->wuanggedung = 0;
                $this->tuanggedung = 'table-danger';
            }
            // end of uanggedung

            //alatpraktek
            $this->alatpraktek = Pembayaran::where('nis', $this->nis)
                ->where('idgunabayar', 14)
                ->sum('jumlahbayar');
            $cariwalatpraktek = Pembayaran::where('nis', $this->nis)
                ->where('idgunabayar', 14)->first();
            if (!empty($cariwalatpraktek)) {
                $this->walatpraktek = $cariwalatpraktek->wajibbayar;
                $hitung = intval($this->walatpraktek) - intval($this->alatpraktek);
                if ($hitung == 0) {
                    $this->talatpraktek = 'table-info';
                } else {
                    $this->talatpraktek = 'table-danger';
                }
            } else {
                $this->walatpraktek = 0;
                $this->talatpraktek = 'table-danger';
            }
            // end of alatpraktek

            //seragam
            $this->seragam = Pembayaran::where('nis', $this->nis)
                ->where('idgunabayar', 15)
                ->sum('jumlahbayar');
            $cariwseragam = Pembayaran::where('nis', $this->nis)
                ->where('idgunabayar', 15)->first();
            if (!empty($cariwseragam)) {
                $this->wseragam = $cariwseragam->wajibbayar;
                $hitung = intval($this->wseragam) - intval($this->seragam);
                if ($hitung == 0) {
                    $this->tseragam = 'table-info';
                } else {
                    $this->tseragam = 'table-danger';
                }
            } else {
                $this->wseragam = 0;
                $this->tseragam = 'table-danger';
            }
            // end of seragam
        } else {
            $this->januari = 0;
            $this->februari = 0;
            $this->maret = 0;
            $this->april = 0;
            $this->mei = 0;
            $this->juni = 0;
            $this->juli = 0;
            $this->agustus = 0;
            $this->september = 0;
            $this->oktober = 0;
            $this->november = 0;
            $this->desember = 0;
            $this->uanggedung = 0;
            $this->alatpraktek = 0;
            $this->seragam = 0;
            $this->wjanuari = 0;
            $this->wfebruari = 0;
            $this->wmaret = 0;
            $this->wapril = 0;
            $this->wmei = 0;
            $this->wjuni = 0;
            $this->wjuli = 0;
            $this->wagustus = 0;
            $this->wseptember = 0;
            $this->woktober = 0;
            $this->wnovember = 0;
            $this->wdesember = 0;
            $this->wuanggedung = 0;
            $this->walatpraktek = 0;
            $this->wseragam = 0;
            $this->tjanuari = '';
            $this->tfebruari = '';
            $this->tmaret = '';
            $this->tapril = '';
            $this->tmei = '';
            $this->tjuni = '';
            $this->tjuli = '';
            $this->tagustus = '';
            $this->tseptember = '';
            $this->toktober = '';
            $this->tnovember = '';
            $this->tdesember = '';
            $this->tuanggedung = '';
            $this->talatpraktek = '';
            $this->tseragam = '';
            $this->namasiswa = '';
        }

        //end of idsiswa
        return view('livewire.pembayaran2', $data);
    }
}
