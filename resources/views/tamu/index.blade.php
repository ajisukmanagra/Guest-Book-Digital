<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<title>GuestBook | SMK NURUL ISLAM</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
        font-family: 'Raleway';
    }

    #regForm {
        background-color: #ffffff;
        margin: 20px auto;
        font-family: Raleway;
        padding: 40px;
        width: 90%;
        min-width: 300px;
    }

    /* h1,
    h5 {
        text-align: center;
    } */

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    input.invalid {
        background-color: #ffdddd;
    }

    select {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    select.invalid {
        background-color: #ffdddd;
    }

    textarea {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    textarea.invalid {
        background-color: #ffdddd;
    }

    .tab {
        display: none;
    }

    button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    .step.finish {
        background-color: #4CAF50;
    }
</style>

<body>

    <form id="regForm" action="/tamu_send_form" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-10">
                <h2>DAFTAR TAMU KUNJUNGAN</h2>
                <h5>SMK NURUL ISLAM</h5>
            </div>
            <div class="col-2">
                <img src="{{ asset('img/logo-smk.jpg') }}" alt="" width="40%" class="float-right">
            </div>
        </div>

        <hr>

        <?php if (Session::has('sukses')) : ?>
            <div class="message message-success">
                <span class="close"></span>
                <?php echo Session::get('sukses') ?>
            </div>
        <?php endif; ?>

        <br>

        <div class="tab">Data Diri :
            <div class="mt-3"></div>
            <p><input placeholder="Nama" oninput="this.className = ''" name="nama_tamu" type="text"></p>
            <p><input placeholder="NIK KTP" oninput="this.className = ''" name="nik_ktp" type="text" onkeypress="return onlyNumberKey(event)"></p>
            <p><input placeholder="No HP" oninput="this.className = ''" name="no_hp" type="text" onkeypress="return onlyNumberKey(event)"></p>
            <p>
                <textarea placeholder="Alamat" oninput="this.className = ''" name="alamat" cols="30" rows="5"></textarea>
            </p>
        </div>

        <div class="tab">Tujuan :
            <div class="mt-3"></div>
            <p>
                <select oninput="this.className = ''" name="tujuan">
                    <option value="">-- pilih tujuan --</option>
                    <option value="1">Kepala Sekolah</option>
                    <option value="2">Tata Usaha</option>
                    <option value="3">Kesiswaan</option>
                    <option value="4">Kurikulum</option>
                    <option value="5">Humas</option>
                    <option value="6">Ketua Jurusan</option>
                    <option value="7">Wali Kelas</option>
                </select>
            </p>
            <p>
                <textarea placeholder="Deskripsi/penjelasan" oninput="this.className = ''" name="deskripsi" cols="30" rows="5"></textarea>
            </p>
        </div>

        <div class="tab"> Foto :
            <div class="row">
                <div class="col-sm-6">
                    <center>
                        <div id="my_camera"></div>
                    </center>
                    <br>
                    <input type="button" value="Ambil" onClick="take_snapshot()" class="btn btn-primary">
                    <input type="hidden" name="foto" class="image-tag">
                </div>

                <div class="col-sm-6">
                    <center>
                        <div id="results">Gambar akan muncul disini saat anda menekan tombol ambil.</div>
                    </center>
                </div>
            </div>
        </div>

        <br>

        <div style="overflow:auto;">
            <div style="float: left;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">&lsaquo;&lsaquo;</button>
            </div>
            <div style="float:right;">
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
            </div>
        </div>

        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>

    <script>
        // Form Wizard START
        var currentTab = 0;
        showTab(currentTab);

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }

            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Kirim";
                // document.getElementById("nextBtn").setAttribute('type', 'submit');
            } else {
                document.getElementById("nextBtn").innerHTML = "&rsaquo;&rsaquo;";
            }

            var btnSend = document.getElementById("nextBtn");
            if (btnSend == "Kirim") {
                btnSend.setAttribute('type', 'submit');
            }

            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                document.getElementById("regForm").submit();
                return false;
            }
            showTab(currentTab);
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            t = x[currentTab].getElementsByTagName("textarea");
            s = x[currentTab].getElementsByTagName("select");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
            }

            for (i = 0; i < t.length; i++) {
                if (t[i].value == "") {
                    t[i].className += " invalid";
                    valid = false;
                }
            }

            for (i = 0; i < s.length; i++) {
                if (s[i].value == "") {
                    s[i].className += " invalid";
                    valid = false;
                }
            }

            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }

            x[n].className += " active";
        }
        // Form WIzard END

        // Hanya angka input
        function onlyNumberKey(evt) {

            // Only ASCII charactar in that range allowed 
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
        // End Hanya Angka

        // Kamera
        Webcam.set({
            // facingMode: "environment",
            image_format: 'jpeg',
            jpeg_quality: 90,
            force_flash: false,
            width: 500,
            height: 250,
            dest_width: 640,
            dest_height: 360,
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
        // End Kamera
    </script>


    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>