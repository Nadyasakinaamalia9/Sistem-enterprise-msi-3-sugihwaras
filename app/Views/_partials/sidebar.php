<aside class="main-sidebar navbar-light accent-olive elevation-4">
  <a href="<?php echo base_url('/'); ?>" class="brand-link">
    <img src="<?php echo base_url('themes/dist'); ?>/img/msi.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">MSI 3 Sugihwaras</span>

  </a>

  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <div class="card-footer ">
          <li class="nav-item">
            <a href="<?php echo base_url('/'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <hr color="primary">

          <?php if (session()->get('role') == 'tata usaha') : ?>
            <!-- TATA USAHA -->
            <li class="nav-item">
              <a href="<?php echo base_url('spp'); ?>" class="nav-link">
                <!-- <i class="nav-icon fas fa-users-viewfinder"></i> -->
                <i class="nav-icon fas fa-light fa-users"></i>
                <p>Tata Usaha</p>
              </a>
              <hr color="primary">
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('emis'); ?>" class="nav-link">
                    <i class="fas fa-graduation-cap"></i>
                    <p>EMIS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('dataguru'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-user"></i>
                    <!-- <i class="fa-solid fa-user"></i> -->
                    <p>Data Pegawai</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('manajemenajaran'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>Manajemen Ajaran</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="<?php echo base_url('manajemenajaran1'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>Manajemen Ajaran </p>
                  </a>
                </li>
                <li class="nav-item">
                <li class="nav-item">
                  <a href="<?php echo base_url('manajemenkelas'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>Manajemen Kelas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('spp'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-light fa-money-bill-wave"></i>
                    <p>Pembayaran </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url('spp'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>SPP</p>
                      </a>
                    </li>
                  </ul>
                </li>


                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('product'); ?>" class="nav-link">
                    <i class="fas fa-hand-holding-usd"></i>
                    <p>Pengeluaran</p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url('kemenag'); ?>" class="nav-link active">
                        <i class="fas fa-landmark"></i>
                        <p>Kemenag</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="./idx15.html" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sarpras</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="./index2.html" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Penggajian</p>
                      </a>
                    </li>
                  </ul>
                </li> -->
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('dataguru'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-bell"></i>
                    <p>Pengumuman</p>
                  </a>
                </li> -->

                <li class="nav-item">
                  <a href="<?php echo base_url('spp'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>Jadwal</p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url('penjadwalan'); ?>" class="nav-link">
                        <i class="fas fa-check-double"></i>
                        <p>Verifikasi Jadwal</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url('penjadwalan/jadwalfix'); ?>" class="nav-link">
                        <i class="fas fa-check-double"></i>
                        <p>Penjadwalan</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('pengumuman'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-bell"></i>
                    <p>Pengumuman</p>
                  </a>
                </li>


              </ul>
              <hr color="primary">
            </li>


          <?php elseif (session()->get('role') == 'guru') : ?>
            <!-- GURU -->
            <li class="nav-item">
              <a href="<?php echo base_url('spp'); ?>" class="nav-link">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>Guru</p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('guruprofil/edit14') . "/" . session('id_pegawai'); ?>" class="nav-link active">
                    <i class="nav-icon fas fa-solid fa-user"></i>
                    <p>Profil</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('pembelajaran'); ?>" class="nav-link active">
                    <!-- <i class="far fa-circle nav-icon"></i> -->
                    <i class="nav-icon fas fa-book-open"></i>
                    <p>Pembelajaran</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('datanilai'); ?>" class="nav-link">
                    <i class="fab fa-leanpub"></i>
                    <p>Nilai </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url('datanilai'); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-sharp fa-regular fa-bars-progress"></i>
                        <p>Data Nilai</p>
                      </a>

                      <a href="<?php echo base_url('pengajuanhasil'); ?>" class="nav-link active">
                        <i class="fab fa-leanpub"></i>
                        <p>Verifikasi Pengajuan Hasil Belajar</p>
                      </a>
                  </ul>
                </li>
                <!-- 
                <li class="nav-item">
                  <a href="<php echo base_url('datanilai'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-bookmark"></i>
                    <p>Data Nilai</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<php echo base_url('pengajuanhasil'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-bookmark"></i>
                    <p>Verifikasi Pengajuan Nilai</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="<?php echo base_url('penjadwalan/create16'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-bookmark"></i>
                    <p>Pengajuan Jadwal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('penjadwalan/view'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>LIhat Jadwal</p>
                  </a>
                </li>
              </ul>
            </li>
            <hr color="primary">

          <?php elseif (session()->get('role') == 'sarpras') : ?>
            <!-- SARPRAS -->
            <li class="nav-item">
              <a href="<?php echo base_url('spp'); ?>" class="nav-link">
                <i class="nav-icon fas fa-light fa-users"></i>
                <p>Sarana Prasarana</p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('sarpras'); ?>" class="nav-link active">
                    <i class="nav-icon fas fa-chart-line"></i>

                    <p>Manajemen Sarpras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('peminjaman'); ?>" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Peminjaman Sarpras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('pengembaliansarpras'); ?>" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengembalian Sarpras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('pengeluaransarpras'); ?>" class="nav-link active">
                    <i class="nav-icon fas fa-light fa-money-bill-wave"></i>
                    <p>Pembelian Sarpras </p>
                  </a>
                </li>
              </ul>
            </li>
            <hr color="primary">
          <?php elseif (session()->get('role') == 'siswa') : ?>
            <!-- SISWA -->
            <li class="nav-item">
              <a href="<?php echo base_url('spp'); ?>" class="nav-link">
                <i class="fas fa-graduation-cap"></i>

                <p>Siswa</p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('siswaprofil/edit17') . "/" . session('nis'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-user"></i>
                    <p>Profil Siswa</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="<php echo base_url('siswaprofil'); ?>" class="nav-link">
                    <i class="fas fa-graduation-cap"></i>
                    <p>Data Siswa</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="<?php echo base_url('viewpembayaran'); ?>" class="nav-link">
                    <i class="fas fa-credit-card"></i>
                    <p>Pembayaran</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="<php echo base_url('viewnilai') . "/" . session('nis'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-bookmark"></i>
                    <p>Nilai</p>
                  </a>
                </li> -->

                <li class="nav-item">
                  <a href="<?php echo base_url('datanilai/create24'); ?>" class="nav-link">
                    <i class="fab fa-leanpub"></i>
                    <p>Data Nilai </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url('datanilai/create24'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Pengajuan Hasil Belajar</p>
                      </a>

                      <a href="<?php echo base_url('pengajuanhasil/view') . "/" . session('nis'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Hasil Belajar</p>
                      </a>
                  </ul>
                </li>
                <!-- 
                <li class="nav-item">
                  <a href="?php echo base_url('datanilai/create24'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-bookmark"></i>
                    <p>Nilai</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?php echo base_url('pengajuanhasil/view') . "/" . session('nis'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-bookmark"></i>
                    <p>Hasil Studi</p>
                  </a>
                </li> -->
              </ul>
            </li>
            <hr color="primary">



        </div>

      <?php endif; ?>
      <ul>
        <li class="nav-header">ACCOUNT</li>
        <li class="nav-item">
          <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
            <p class="text">
              <i class="nav-icon far fa-circle text-danger"></i> LogOut
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>