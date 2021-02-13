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
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 text-center">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=123" width="400px" height="400px">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="matakuliah">Matakuliah</label>
                  <select class="form-control" id="matakuliah" name="matakuliah" onchange="pilihMatkul(this)">
                    <option value="">BELUM DIPILIH</option>
                    <?php foreach($matakuliah as $m): ?>
                      <option value="<?= $m['Id_matkul'] ?>"><?= $m['Nama'] ?></option>
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
    const pilihMatkul = (x) => {
      console.log(x.value);
      
      if(x.value !== '') {
        dapatkanPertemuan();
      } else {
        const pertemuan = document.getElementById('pertemuan');
        pertemuan.innerHTML = '';
      }
    }

    const dapatkanPertemuan = () => {
      const pertemuan = document.getElementById('pertemuan');

      const list_pertemuan = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];

      let temp = '';

      list_pertemuan.forEach((pertemuan_ke) => {
        temp += `<div class="btn btn-primary btn-block my-2">Pertemuan ${pertemuan_ke}</div>`;
      })

      pertemuan.innerHTML = temp;
    }

  </script>