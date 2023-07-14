<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $category = [
        'nisn'     => 'required',
        'nik'     => 'required',
        'nama'     => 'required',
        'jenis_kel'     => 'required',
        'alamat'     => 'required',
        'tempat_lhr'     => 'required',
        'tgl_lhr'     => 'required',
        'agama'     => 'required',
        'kewarganegaraan'     => 'required',
        'anak_ke'     => 'required',
        'jml_sdr'     => 'required',
        'berat_bdn'     => 'required',
        'tinggi_bdn'     => 'required',
        'riwayat_pnykt'     => 'required',
        'tmpt_tinggal'     => 'required',
        'nama_ayah'     => 'required',
        'nama_ibu'     => 'required',

    ];

    public $category_errors = [
        'nik' => [
            'required'    => 'NIK wajib diisi.',
        ],
        'nisn'    => [
            'required' => 'NISN wajib diisi.'
        ],
        'nama' => [
            'required'    => 'Nama wajib diisi.',
        ],
        'jenis_kel'    => [
            'required' => 'Jenis Kelamin wajib diisi.'
        ],
        'alamat' => [
            'required'    => 'Nama Alamat wajib diisi.',
        ],
        'tempat_lhr' => [
            'required'    => 'Tempat Lahir wajib diisi.',
        ],
        'tgl_lhr' => [
            'required'    => 'Tanggal Lahir wajib diisi.',
        ],
        'agama' => [
            'required'    => 'Agama wajib diisi.',
        ],
        'kewarganegaraan' => [
            'required'    => 'Kewarganegaraan wajib diisi.',
        ],
        'anak_ke' => [
            'required'    => 'Anak Ke wajib diisi.',
        ],
        'jml_sdr' => [
            'required'    => 'Jumlah Saudara wajib diisi.',
        ],
        'berat_bdn' => [
            'required'    => 'Berat Badan wajib diisi.',
        ],
        'tinggi_bdn' => [
            'required'    => 'Tinggi Badan wajib diisi.',
        ],
        'riwayat_pnykt' => [
            'required'    => 'Riwayat Penyakit wajib diisi.',
        ],
        'tmpt_tinggal' => [
            'required'    => 'Tempat Tinggal wajib diisi.',
        ],
        'nama_ayah' => [
            'required'    => 'Nama Ayah wajib diisi.',
        ],
        'nama_ibu' => [
            'required'    => 'Nama Ibu wajib diisi.',
        ],
    ];
    public $pembelajaran = [
        'tahun_ajaran'     => 'required',
        'kelas'     => 'required',
        'file'     => 'required',

    ];
    public $pembelajaran_errors = [
        'file'           => [
            'required'          => 'File wajib diisi PDF',
        ],

    ];

    public $penjadwalan = [
        'id_pegawai'     => 'required',
        'hari'     => 'required',
        'waktu_mulai'     => 'required',
        'waktu_selesai'     => 'required',
        'mapel'     => 'required',
        'kelas'     => 'required',
        'tahun_ajaran'     => 'required',

    ];

    public $emis = [
        'nis'     => 'required',
        'nisn'     => 'required',
        'nik'     => 'required',
        'nama'     => 'required',
        'foto'     => 'required',
        'alamat'     => 'required',
        'jenis_kel'     => 'required',
        'tempat_lhr'     => 'required',
        'tgl_lahir'     => 'required',
        'agama'     => 'required',
        'tahun_ajaran'     => 'required',
        'tinggi_bdn'     => 'required',
        'berat_bdn'     => 'required',
        'riwayat_pnykt'     => 'required',
        'nama_ayah'     => 'required',
        'nama_ibu'     => 'required',
    ];
    public $siswaprofil = [
        'nis'     => 'required',
        'nisn'     => 'required',
        'nik'     => 'required',
        'nama'     => 'required',
        'foto'     => 'required',
        'alamat'     => 'required',
        'jenis_kel'     => 'required',
        'tempat_lhr'     => 'required',
        'tgl_lahir'     => 'required',
        'agama'     => 'required',
        'tahun_ajaran'     => 'required',
        'tinggi_bdn'     => 'required',
        'berat_bdn'     => 'required',
        'riwayat_pnykt'     => 'required',
        'nama_ayah'     => 'required',
        'nama_ibu'     => 'required',
    ];

    public $emis_errors = [
        'nis'           => [
            'required'          => 'NIS wajib diisi.',
        ],
        'nisn'          => [
            'required'          => 'NISN wajib diisi.'
        ],
        'nik'         => [
            'required'          => 'NIK wajib diisi.',
        ],
        'nama'           => [
            'required'          => 'NAMA wajib diisi.'
        ],
        'foto'           => [
            'required'          => 'FOTO wajib diisi.'
        ],
        'alamat'           => [
            'required'          => 'ALAMAT wajib diisi.'
        ],
        'jenis_kel'        => [
            'required'          => 'Jenis Kelamin wajib diisi.',
        ],
        'tempat_lhr'        => [
            'required'          => 'Tempat Lahir wajib diisi.',
        ],
        'tgl_lahir'   => [
            'required'          => 'Tanggal Lahir wajib diisi.',
        ],
        'agama'   => [
            'required'          => 'Agama wajib diisi.',
        ],
        'tahun_ajaran'   => [
            'required'          => 'Tahun Ajaran wajib diisi.',
        ],
        'tinggi_badan'           => [
            'required'          => 'Tinggi badan wajib diisi.'
        ],
        'berat_badan'           => [
            'required'          => 'berat badan wajib diisi.'
        ],
        'riwayat_pnykt'           => [
            'required'          => 'Riwayat Penyakit wajib diisi.'
        ],
        'nama_ayah'           => [
            'required'          => 'nama ayah wajib diisi.'
        ],
        'nama_ibu'           => [
            'required'          => 'nama ibu wajib diisi.'
        ],
    ];
    public $siswaprofil_errors = [
        'nis'           => [
            'required'          => 'NIS wajib diisi.',
        ],
        'nisn'          => [
            'required'          => 'NISN wajib diisi.'
        ],
        'nik'         => [
            'required'          => 'NIK wajib diisi.',
        ],
        'nama'           => [
            'required'          => 'NAMA wajib diisi.'
        ],
        'foto'           => [
            'required'          => 'FOTO wajib diisi.'
        ],
        'alamat'           => [
            'required'          => 'ALAMAT wajib diisi.'
        ],
        'jenis_kel'        => [
            'required'          => 'Jenis Kelamin wajib diisi.',
        ],
        'tempat_lhr'        => [
            'required'          => 'Tempat Lahir wajib diisi.',
        ],
        'tgl_lahir'   => [
            'required'          => 'Tanggal Lahir wajib diisi.',
        ],
        'agama'   => [
            'required'          => 'Agama wajib diisi.',
        ],
        'tahun_ajaran'   => [
            'required'          => 'Tahun Ajaran wajib diisi.',
        ],
        'tinggi_badan'           => [
            'required'          => 'Tinggi badan wajib diisi.'
        ],
        'berat_badan'           => [
            'required'          => 'berat badan wajib diisi.'
        ],
        'riwayat_pnykt'           => [
            'required'          => 'Riwayat Penyakit wajib diisi.'
        ],
        'nama_ayah'           => [
            'required'          => 'nama ayah wajib diisi.'
        ],
        'nama_ibu'           => [
            'required'          => 'nama ibu wajib diisi.'
        ],
    ];

    public $dataguru = [
        'nip'     => 'required',
        'nik'     => 'required',
        'id_pegawai'     => 'required',
        'nama'     => 'required',
        'alamat'     => 'required',
        'jenis_kel'     => 'required',
        'tempat_lhr'     => 'required',
        'tgl_lahir'     => 'required',
        'agama'     => 'required',
        'masuk_thn'     => 'required',
        'sk_guru'     => 'required',
        'jabatan'     => 'required',

    ];

    public $guruprofil = [
        'nip'     => 'required',
        'nik'     => 'required',
        'id_pegawai'     => 'required',
        'nama'     => 'required',
        'alamat'     => 'required',
        'jenis_kel'     => 'required',
        'tempat_lhr'     => 'required',
        'tgl_lahir'     => 'required',
        'agama'     => 'required',
        'masuk_thn'     => 'required',
        'sk_guru'     => 'required',
        'jabatan'     => 'required',

    ];

    public $dataguru_errors = [
        'nip'           => [
            'required'          => 'NIp wajib diisi.',
        ],
        'nik'          => [
            'required'          => 'NIk wajib diisi.'
        ],
        'id_pegawai'           => [
            'required'          => 'id_pegawai wajib diisi.'
        ],
        'nama'           => [
            'required'          => 'NAMA wajib diisi.'
        ],
        'alamat'           => [
            'required'          => 'Alamat wajib diisi.'
        ],
        'jenis_kel'        => [
            'required'          => 'Jenis Kelamin wajib diisi.',
        ],
        'tempat_lhr'        => [
            'required'          => 'Tempat Lahir wajib diisi.',
        ],
        'tgl_lahir'   => [
            'required'          => 'tANGGAL Lahir wajib diisi.',
        ],
        'agama'   => [
            'required'          => 'Agama wajib diisi.',
        ],
        'masuk_thn'   => [
            'required'          => 'Diterima wajib diisi.',
        ],
        'sk_guru'           => [
            'required'          => 'NAMA wajib diisi.'
        ],
        'jabatan'           => [
            'required'          => 'NAMA wajib diisi.'
        ]
    ];

    public $spp = [
        'nis'     => 'required',
        'tanggal_bayar'     => 'required',
        'bulan'     => 'required',
        'beban_pembayaran'     => 'required',
        'id_pegawai'     => 'required',

    ];
    public $sarpras = [
        'id_barang'     => 'required',
        'tanggal'     => 'required',
        'keterangan'     => 'required',
        'status'     => 'required',
        // 'jumlah'     => 'required',

    ];

    public $manajemenajaran = [
        'tahun_ajaran'     => 'required',
        'jumlah_kelas'     => 'required',
        'kurikulum'     => 'required',
    ];

    public $manajemenajaran1 = [
        'tahun_ajaran'     => 'required',
        'jumlah_kelas'     => 'required',
        'kurikulum'     => 'required',
    ];

    public $manajemenkelas = [
        'tahun_ajaran'     => 'required',
        'kelas'     => 'required',
        'laki_laki'     => 'required',
        'perempuan'     => 'required',
    ];

    public $peminjaman = [
        'keterangan'     => 'required',
        'jumlah'     => 'required',
        'id_pegawai'     => 'required',

    ];
    public $pengembaliansarpras = [
        'keterangan'     => 'required',
        'jumlah'     => 'required',
        'id_pegawai'     => 'required',

    ];


    public $ujian = [
        'nis'     => 'required',
        'tanggal_bayar'     => 'required',
        'nama_ujian'     => 'required',
        'beban_pembayaran'     => 'required',
        'id_pegawai'     => 'required',

    ];

    public $buku = [
        'nis'     => 'required',
        'tanggal_bayar'     => 'required',
        'nama_buku'     => 'required',
        'beban_pembayaran'     => 'required',
        'id_pegawai'     => 'required',

    ];

    public $kemenag = [
        'id'     => 'required',
        'tanggal'     => 'required',
        'keterangan'     => 'required',
        'biaya'     => 'required',
        'id_pegawai'     => 'required',

    ];

    public $datanilai = [
        'nis'     => 'required',
        'bhs_indonesia'     => 'required',
        'bhs_inggris'     => 'required',
        'matematika'     => 'required',
        'ipa'     => 'required',
        'ips'     => 'required',
        'agama'     => 'required',

    ];


    public $pengajuanhasil = [
        'nis'     => 'required',
    ];

    public $datapembayaran = [
        'tgl_bayar'     => 'required',
        'keperluan'     => 'required',
        'beban_biaya'     => 'required',
        'id_pegawai'     => 'required',

    ];
    public $pengumuman = [
        'konten'     => 'required',
        'tanggal'     => 'required',

    ];


    public $pengumuman_errors = [
        'konten'           => [
            'required'          => 'Konten wajib diisi.',
        ],
        'tanggal'          => [
            'required'          => 'Tanggal wajib diisi.'
        ]
    ];

    public $datapengeluaran = [
        'tgl_bayar'     => 'required',
        'keperluan'     => 'required',
        'beban_biaya'     => 'required',
        'id_pegawai'     => 'required',

    ];

    public $pengeluaransarpras = [
        'keterangan'     => 'required',
        'jumlah'     => 'required',
        'harga'     => 'required',
        'bukti_sarpras'     => 'required',
        'id_pegawai'     => 'required',

    ];

    public $authlogin = [
        'id_pegawai'         => 'required',
        'password'      => 'required'
    ];

    public $auth_siswa = [
        'nis'         => 'required',
        'password'      => 'required',
    ];

    public $auth_siswa_errors = [
        'nis' => [
            'required'  => 'NIS wajib diisi.'
        ],
        'password' => [
            'required'  => 'Password wajib diisi.'
        ]
    ];
    public $authlogin_errors = [
        'id_pegawai' => [
            'required'  => 'ID pegawai wajib diisi.'
        ],
        'password' => [
            'required'  => 'Password wajib diisi.'
        ]
    ];

    public $authregister = [
        'id_pegawai'        => 'required|string|min_length[4]|max_length[10]',
        'password'          => 'required|string|min_length[8]|max_length[35]',
        'role'              => 'required',
    ];

    public $authregister_errors = [
        'id_pegawai' => [
            'required'      => 'nis wajib diisi',
            'is_unique'     => 'nis sudah terdaftar'
        ],
        'password' => [
            'required'      => 'Password wajib diisi',
            'string'        => 'Password hanya boleh berisi huruf, angka, spasi dan karakter lain',
            'min_length'    => 'Password minimal 8 karakter',
            'max_length'    => 'Password maksimal 35 karakter'
        ],
        'role' => [
            'required'      => 'Role wajib diisi',
        ]
    ];

    public $authregistersiswa = [
        'nis'        => 'required|string|min_length[3]|max_length[10]',
        'password'          => 'required|string|min_length[8]|max_length[35]',
    ];

    public $authregistersiswa_errors = [
        'nis' => [
            'required'      => 'nis wajib diisi',
            'is_unique'     => 'nis sudah terdaftar'
        ],
        'password' => [
            'required'      => 'Password wajib diisi',
            'string'        => 'Password hanya boleh berisi huruf, angka, spasi dan karakter lain',
            'min_length'    => 'Password minimal 8 karakter',
            'max_length'    => 'Password maksimal 35 karakter'
        ],
    ];
}
