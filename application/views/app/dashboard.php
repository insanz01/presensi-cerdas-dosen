<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section> -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-9">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <h3 id="nama_kelas"></h3>
                    <p id="nomor_pertemuan"></p>
                  </div>
                  <div class="col-7 text-center">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" id="qr_target" width="400px" height="400px" alt="">
                  </div>
                  <div class="col-5">
                    <h3 class="ml-2"><?= date('d M Y', time()) ?></h3>
                    <div class="card ml-2">
                      <div style="width: 100%; height: 300px; overflow-y: scroll">
                        <ul class="list-group" id="list_mahasiswa">
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="matakuliah">Matakuliah</label>
                  <select class="form-control" id="matakuliah" name="matakuliah" onchange="pilihMatkul(this)">
                    <option value="">BELUM DIPILIH</option>
                    <?php foreach($kelas as $k): ?>
                      <option value="<?= $k['Id_jadwal'] ?>-<?= $k['nama_matkul'] ?>"><?= $k['nama_matkul'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="pertemuan">Pertemuan</label>
                  <div id="pertemuan" class="w-100 px-2" style="height: 250px; overflow-y: scroll">
                    <!-- <div class="btn btn-primary btn-block my-2">Pertemuan 1</div> -->
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script type="text/javascript">
    let presensi_mahasiswa = [];
    let GLOBAL_ID = '';
    let GLOBAL_PERTEMUAN = 0;

    let length_of_presensi = 0;

    const getPertemuanData = async (id_jadwal) => {
      return await axios.get('<?= base_url() ?>app/get_data/presensi/'+id_jadwal).then(res => res.data);
    }

    const pilihMatkul = async (x) => {
      console.log(x.value);
      
      if(x.value !== '') {
        let data_jadwal = x.value

        data_jadwal = data_jadwal.split('-');

        const id_jadwal = data_jadwal[0];
        const nama_jadwal = data_jadwal[1];

        await dapatkanPertemuan(id_jadwal);

        document.getElementById('nama_kelas').innerHTML = `Kelas ${nama_jadwal}`;
      } else {
        const pertemuan = document.getElementById('pertemuan');
        pertemuan.innerHTML = '';
      }
    }

    const getMahasiswaHadir = async (id_jadwal) => {
      return await axios.get("<?= base_url('api') ?>/get_data/mahasiswa/"+id_jadwal+'/presensi/'+GLOBAL_PERTEMUAN).then(res => res.data);
    }

    const checkPresensi = async () => {
      setInterval(async () => {
        console.log('cek server update');
        console.log(length_of_presensi);
        let pm = await getMahasiswaHadir(GLOBAL_ID).then(res => res.data);

        console.log(pm)

        if(pm.length > length_of_presensi) {
          let temp = '';
          pm.forEach(res => {
            temp += `<li class="list-group-item">[${res.NIM}] - ${res.Nama}</li>`
          });

          document.getElementById('list_mahasiswa').innerHTML = temp;

          length_of_presensi = pm.length;
        }
      }, 3000);
    }

    const createPresensi = async (id_jadwal, pertemuan) => {
      // membuat data baru pada table pertemuan
      return await axios.get(`http://localhost:5000/api/v1/atur_presensi/${id_jadwal}/${pertemuan}`).then(res => res.data)
    }

    const api_qr = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=";

    const pilihPertemuan = async (pertemuan) => {
      console.log(pertemuan)

      GLOBAL_PERTEMUAN = pertemuan;

      document.getElementById('nomor_pertemuan').innerHTML = `Pertemuan ke-${pertemuan}`;

      let result = await createPresensi(GLOBAL_ID, pertemuan).then(res => res)

      if(result) {
        document.getElementById('qr_target').src = api_qr + result.key;
      }
    }

    const dapatkanPertemuan = async (id_jadwal) => {
      const pertemuan = document.getElementById('pertemuan');

      const list_pertemuan = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];

      let temp = '';
      console.log('sejauh ini berjalan');

      list_pertemuan.forEach((pertemuan_ke) => {
        temp += `<div class="btn btn-primary btn-block my-2" onclick="pilihPertemuan(${pertemuan_ke})">Pertemuan ${pertemuan_ke}</div>`;
      })

      pertemuan.innerHTML = temp;
      
      GLOBAL_ID = id_jadwal;

      let result = await getPertemuanData(id_jadwal).then(res => res);

      console.log(result)

      if(result == null) {
        console.log('sudah berjalan')
      }

    }

    window.addEventListener('load', () => {
      checkPresensi();
    })

  </script>