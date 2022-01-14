<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- bootstrap cdn  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- fullcalendar css  -->
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">BOEDJANG COMZ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="agenda.php">Agenda</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-4">
                <form action="" method="get">
                <label>Cari :</label>
                <input type="text" name="cari">
                <input type="submit" value="Cari">
                <button><a href="pdf.php" style="text-decoration: none; color:black;">Cetak Agenda</a></button>
                </form>
                <button><a href="agenda_xml.php" style="text-decoration: none; color:black;">XML</a></button>
                <button><a href="agenda_json.php" style="text-decoration: none; color:black;">JSON</a></button>
                <button><a href="getdatajawal.php" style="text-decoration: none; color:black;">Web Service Get Jadwal</a></button>
                <button><a href="aksesjadwal.php" style="text-decoration: none; color:black;">Web Service Akses Jadwal</a></button>
                <?php 
                if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                echo "<b>Hasil pencarian : ".$cari."</b>";
                }
                ?>
                    <div class="alert alert-warning" role="alert">
                        <h4>Form Kegiatan</h4>
                    </div>
                    <div class="card">
                        <form action="proses_agenda.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-label">Keterangan Kegiatan</div>
                                    <textarea name="kegiatan" class="form-control" id="kegiatan" cols="30"
                                        rows="2"></textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Tgl Mulai</div>
                                    <input type="datetime-local" class="form-control" name="mulai" id="mulai">
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Tgl Selesai</div>
                                    <input type="datetime-local" class="form-control" name="selesai" id="selesai">
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [ <?php 

                    //melakukan koneksi ke database
                    $koneksi    = mysqli_connect('localhost', 'root', '', 'profile_perusahaan');
                    //mengambil data dari tabel jadwal
                    //$data       = mysqli_query($koneksi,'select * from jadwal');
                    //melakukan looping
                    if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $sql="SELECT * FROM jadwal WHERE kegiatan like'%".$cari."%'";
                    $data = mysqli_query($koneksi,$sql);
                    }else{
                    $sql="SELECT * FROM jadwal";
                    $data = mysqli_query($koneksi,$sql);
                    }
                    while($d = mysqli_fetch_array($data)){  
                    ?>{
                    title: '<?php echo $d['kegiatan']; ?>', //menampilkan title dari tabel
                    start: '<?php echo $d['mulai']; ?>', //menampilkan tgl mulai dari tabel
                    end: '<?php echo $d['selesai']; ?>' //menampilkan tgl selesai dari tabel
                    },
                    <?php } ?>],
                    selectOverlap: function (event) {
                        return event.rendering === 'background';
                    }
                });
    
                calendar.render();
            });
        </script>
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Boedjang Comz 2021</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
    
    </html>