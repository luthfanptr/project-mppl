<?php 
session_start();
ob_start();
include 'assets/php/koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CAMPP</title>
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="assets/css/alertify.min.css" rel="stylesheet" type='text/css' />
    <link href="assets/css/creative.css" rel="stylesheet">
    <style>
        header.masthead{ background:linear-gradient(to bottom,rgba(0,0,0,.2) 0,rgba(0,0,0,.2) 100%),url("assets/img/mainbg.jpg"); background-position:center; background-repeat:no-repeat; background-attachment:scroll; background-size:cover; }
        option:disabled { background: #f2f2f2; color: #999; }
    </style>
</head>
<body id="page-top">
    <!-- NavBAR -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">CA<span class="text-primary">MPP</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="responsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#barang-sewa-list">Lihat Barang</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#online">Pesan</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                </ul>
                <a href="login-user.php" class="btn btn-outline-primary ml-lg-3 px-4 py-2 rounded-pill">LOGIN</a>
            </div>
        </div>
    </nav>
    <!-- ENDNAV -->

    <!-- HEADER -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <img src="assets/img/logoo.png" class="logo">
                    <hr class="divider-primary my-4">
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <h3 class="text-white font-weight-light mb-5 text-shadow">Selamat Datang di CAMPP</h3>
                </div>
            </div>
        </div>
    </header>
    <!-- ENDHEADER -->

    <!-- ABOUT SECTION -->
    <section class="page-section bg-primary" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white ">Tempat Sewa Alat Camping & Outdoor</h2>
                    <hr class="divider-light my-3">
                    <h5 class="text-white mb-4">Menyewakan Segala Macam Peralatan Camping & Outdoor, Murah dan Lengkap</h5>
                    <a class="btn btn-light btn-xl js-scroll-trigger" href="#online">Pesan Sekarang</a>
                    <span class="text-white mx-2">Atau</span>
                    <a class="btn btn-dark btn-xl js-scroll-trigger" href="#barang-sewa-list">Lihat Barang</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ENDABOUT -->

    <!-- SERVICES SECTION -->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">At Your Service</h2>
            <hr class="divider-primary my-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-shopping-basket text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Pemesanan Online</h3>
                        <p class="text-muted mb-0">Pesan Dimana Saja dan Kapan Saja</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-campground text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Barang Terbaru</h3>
                        <p class="text-muted mb-0">Barang Terjamin Dengan Kualitas Terbaik</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-tags text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Harga Terjangkau</h3>
                        <p class="text-muted mb-0">Dapatkan Harga Terjangkau Untuk Barang Terbaik</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Melayanin dengan Ramah</h3>
                        <p class="text-muted mb-0">Melayani anda dengan Senyum, Ramah dan Transparan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICES SECTION -->
    
    <!-- Barang Sewa List Section -->
    <section class="page-section" id="barang-sewa-list">
        <div class="container">
            <h2 class="text-center mt-0">Barang Tersedia</h2>
            <p class="text-center text-muted mb-4">Daftar di bawah ini diperbarui secara otomatis sesuai tanggal yang Anda pilih.</p>
            <hr class="divider-primary my-4">
            
            <div class="row" id="product-list-container">
                <div class="col-12 text-center">
                    <p class="h5 mt-4 text-muted">Silakan pilih tanggal pengambilan dan lama sewa untuk melihat ketersediaan barang.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END Barang Sewa List Section -->

    <!-- Online Booking Section -->   
    <section class="page-section bg-dark text-white" id="online">
        <div class="container">
            <h2 class="mb-1 text-center">Pesan Online</h2><h5 class="mb-4 text-center">Pesan Dulu, Nanti Ambil Ditoko</h5><hr class="divider-light my-4">
            <form name="pesanOnline" method="POST" action="simpan-sewa.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6 col-sm-12"><div class="form-group"><label>Nama Lengkap</label><input type="text" name="namaLengkap" class="form-control" required></div></div>
                    <div class="col-lg-6 col-sm-12"><div class="form-group"><label>Alamat Email Anda</label><input type="email" name="emailPenerima" class="form-control" placeholder="contoh@email.com" required></div></div>
                    <div class="col-lg-6 col-sm-12"><div class="form-group"><label>Foto Identitas</label><input type="file" name="fotoIdentitas" class="form-control" required></div></div>
                    <div class="col-lg-6 col-sm-12"><div class="form-group"><label>Bukti Pembayaran</label><input type="file" name="buktiPembayaran" class="form-control" required></div></div>
                </div> <hr style="background-color: #fff;">
                <h5 class="mb-4 text-center">Pilih Barang</h5> 
                <div class="input_fields_wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-sm-12">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select name="barang[]" class="form-control dynamic-item-select">
                                    <option value="">-- Pilih Barang --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="form-group">
                                <label>Harga (per Hari)</label>
                                <input type="text" name="harga[]" class="form-control" placeholder="Harga/Hari" readonly>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="number" name="qty[]" value="1" min="1" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="button" class="add_field_button btn btn-light">
                        <i class="fas fa-plus"></i> Tambah Barang Lain
                    </button>
                </div>
                <hr style="background-color: #fff;">
                <h5 class="mb-4 text-center">Tentukan Waktu & Total</h5> 
                <div class="row">
                    <div class="col-lg-3 col-sm-12"><div class="form-group"><label>Tanggal Pengambilan</label><input type="date" name="tanggalAmbil" id="tanggalAmbil" class="form-control" required></div></div>
                    <div class="col-lg-2 col-sm-12"><div class="form-group"><label>Lama Sewa (Hari)</label><input type="number" name="lamaSewa" id="lamaSewa" class="form-control" value="1" min="1" required></div></div>
                    <div class="col-lg-3 col-sm-12"><div class="form-group"><label>Tanggal Kembali</label><input type="text" name="tglKembali" id="tglKembali" class="form-control" readonly></div></div>
                    <div class="col-lg-2 col-sm-12"><div class="form-group"><label>Total Bayar</label><input type="text" name="totalBayar" id="totalBayar" class="form-control" readonly></div></div>
                    <div class="col-lg-2 col-sm-12"><div class="form-group"><label>Min. DP (10%)</label><input type="text" name="minDp" id="minDp" class="form-control" readonly style="font-weight: bold; color: #1cc88a;"></div></div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-4 col-md-6 text-center">
                        <h5 class="text-white mb-2">Pembayaran DP via QRIS</h5>
                        <img src="assets/img/qris.jpg" class="img-fluid rounded" alt="Scan QRIS untuk Pembayaran">
                        <small class="form-text text-white-50 mt-2">
                            Silakan scan untuk transfer Down Payment (DP).<br>
                            Pastikan Anda mengupload bukti transfer di form bagian atas.
                        </small>
                    </div>
                </div>
                <hr class="my-4" style="background-color: #fff;">
                <div style="text-align: center;" class="mt-3">  
                    <button type="submit" class="btn btn-primary btn-xl">Simpan dan Cetak Bukti Sewa</button>
                </div>
            </form>
        </div>
    </section>
    <!-- END Online Booking Section -->

    <!-- Contact -->
    <section class="page-section" id="contact">
        <div class="container">
            <h2 class="text-center mt-0">Hubungi Kami</h2>
            <hr class="divider-primary my-4">
            <div class="row">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fab fa-4x fa-whatsapp text-success mb-4"></i>
                        <h3 class="h4 mb-2">WhatsApp</h3>
                        <p class="text-muted mb-3">0899-9999-9999</p>
                        <a class="btn btn-success btn-xl" href="https://wa.me/6289999999999" target="_blank">Chat Sekarang</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fab fa-4x fa-instagram text-danger mb-4"></i>
                        <h3 class="h4 mb-2">Instagram</h3>
                        <p class="text-muted mb-3">@campp.campp</p>
                        <a class="btn btn-danger btn-xl" href="https://www.instagram.com/campp.campp" target="_blank">Lihat Profil</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-map-marker-alt text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Lokasi Toko</h3>
                        <p class="text-muted mb-3">CITRA RAYA</p>
                        <a class="btn btn-primary btn-xl" href="https://maps.app.goo.gl/59f5k6D9SbthcaEu6" target="_blank">Lihat di Peta</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Contact -->
    
    <section class="page-section" id="contact"> ... </section>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> <!-- Plugin JavaScript -->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script> <!-- efek scroll -->
    <script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>  
    <script src="assets/js/alertify.min.js"></script> <!-- notifikasi popup -->
    <script src="assets/js/creative.min.js"></script>

    <script type="text/javascript">
    
    // memastikan kode js dijalankan setelah seluruh halaman dimuat(html, css, js, gambar)
    $(document).ready(function() {
        
        // --- Variabel Global ---
        // menyimpan data barang yang tersedia saat mengisi form pesan online
        var dataBarangTersedia = {};
        // menampung semua item yang tersedia untuk paginasi
        var semuaItemTersedia = [];
        var currentPage = 1;
        var itemsPerPage = 12; // bisa ubah angka ini, misal jadi 12 (3 baris)

        // --- Fungsi-Fungsi Paginasi dan Tampilan ---
        function displayProductsAndPagination() {
            var productContainer = $('#product-list-container');
            productContainer.empty();

            var startIndex = (currentPage - 1) * itemsPerPage;
            var endIndex = startIndex + itemsPerPage;
            var paginatedItems = semuaItemTersedia.slice(startIndex, endIndex);

            if (paginatedItems.length > 0) {
                paginatedItems.forEach(function(item) {
                    var hargaFormatted = parseInt(item.harga).toLocaleString('id-ID');
                    var productHtml = `
                        <div class="col-lg-3 col-md-6 text-center mb-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="admin/assets/img/barang/${item.gambar}" alt="${item.nama}" style="height: 180px; object-fit: cover;" onerror="this.onerror=null;this.src='admin/assets/img/barang/default.png';">
                                <div class="card-body">
                                    <h5 class="card-title">${item.nama.replace(/ \(Sisa .*\)/, '')}</h5>
                                    <p class="card-text">Rp. ${hargaFormatted} / Hari</p>
                                </div>
                            </div>
                        </div>`;
                    productContainer.append(productHtml);
                });
            } else if (semuaItemTersedia.length === 0 && currentPage === 1) {
                productContainer.html('<div class="col-12 text-center"><p class="h5 mt-4 text-muted">Silakan pilih tanggal pengambilan dan lama sewa untuk melihat ketersediaan barang.</p></div>');
            }

            renderPaginationControls();
        }

        function renderPaginationControls() {
            $('#pagination-container').remove();
            var totalPages = Math.ceil(semuaItemTersedia.length / itemsPerPage);
            
            if (totalPages > 1) {
                var paginationHtml = '<nav id="pagination-container" class="mt-4"><ul class="pagination justify-content-center">';
                
                var prevDisabled = (currentPage === 1) ? 'disabled' : '';
                paginationHtml += `<li class="page-item ${prevDisabled}"><a class="page-link" href="#" data-page="${currentPage - 1}">Previous</a></li>`;

                for (let i = 1; i <= totalPages; i++) {
                    var activeClass = (i === currentPage) ? 'active' : '';
                    paginationHtml += `<li class="page-item ${activeClass}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
                }

                var nextDisabled = (currentPage === totalPages) ? 'disabled' : '';
                paginationHtml += `<li class="page-item ${nextDisabled}"><a class="page-link" href="#" data-page="${currentPage + 1}">Next</a></li>`;
                
                paginationHtml += '</ul></nav>';
                $('#product-list-container').after(paginationHtml);
            }
        }
        
        // fungsi untuk mengambil data barang yang tersedia berdasarkan tanggal ambil dan lama sewa
        function fetchAvailableItems() {
            //ambil value dari inputan tanggalAmbil dan lamaSewa
            var tanggalAmbil = $('#tanggalAmbil').val();
            //mengubah lamaSewa menjadi integer, jika tidak ada inputan maka default 0
            var lamaSewa = parseInt($('#lamaSewa').val()) || 0;

            // jika tanggalAmbil bernilai false (kosong) atau lamaSewa kurang dari 1
            if (!tanggalAmbil || lamaSewa <= 0) {
                semuaItemTersedia = [];
                dataBarangTersedia = {};
                updateItemSelect([]);
                currentPage = 1;
                displayProductsAndPagination();
                return;
            }

            // mengubah tanggalAmbil menjadi objek Date, lalu menambahkan lamaSewa ke tanggalAmbil
            var tglAmbilDate = new Date(tanggalAmbil);
            tglAmbilDate.setDate(tglAmbilDate.getDate() + lamaSewa);
            //megubah tanggalAmbil menjadi format YYYY-MM-DD
            var tanggalKembali = tglAmbilDate.toISOString().split('T')[0];
            
            $.ajax({
                //target url
                url: 'get_available_items_json.php',
                //menggunakan metode POST (tidak terlihat di URL)
                type: 'POST',
                data: { tanggal_ambil: tanggalAmbil, tanggal_kembali: tanggalKembali },
                //format data yang diterima
                dataType: 'json',
                // jika berhasil
                success: function(response) {
                    // jika ada error dari server kosongkan semuaItemTersedia dan dataBarangTersedia
                    if (response.error) {
                        alertify.error("Error: " + response.error);
                        semuaItemTersedia = [];
                        dataBarangTersedia = {};
                        updateItemSelect([]);
                    } else {
                        // jika tidak ada error, simpan data barang yang tersedia
                        semuaItemTersedia = response; 
                        dataBarangTersedia = {};
                        response.forEach(function(item) {
                            dataBarangTersedia[item.id] = item;
                        });
                        updateItemSelect(response);
                    }
                    //kembali ke halaman pertama
                    currentPage = 1;
                    //tampilkan produk dan paginasi
                    displayProductsAndPagination(); 
                },
                error: function() { alertify.error('Gagal terhubung ke server untuk cek ketersediaan.'); }
            });
        }

        // fungsi untuk memperbarui pilihan barang pada form pesan online
        function updateItemSelect(items) {
            var optionsHtml = '<option value="">-- Pilih Barang --</option>';
            // jika items memiliki data, looping untuk membuat opsi barang
            if (items.length > 0) {
                items.forEach(function(item) {
                    optionsHtml += `<option value="${item.id}">${item.nama}</option>`;
                });
            } else {
                optionsHtml = '<option value="" disabled>Tidak ada barang tersedia</option>';
            }
            // agar saat terjadi update dan barang yang dipilih masih tersedia, kita simpan pilihan sebelumnya
            $("select[name='barang[]']").each(function() {
                // menampung pilihan yang sudah ada
                var selectedValue = $(this).val();
                // menhapus pilihan lama dan mengisinya dengan opsi yang tersedia
                $(this).html(optionsHtml);
                // jika pilihan yang sudah ada masih tersedia, set pilihan tersebut
                if (dataBarangTersedia[selectedValue]) {
                    $(this).val(selectedValue);
                }
            });
            hitungTotalBayar();
        }

        function hitungTanggalKembali() {
            // mengambil value dari input tanggalAmbil dan lamaSewa
            var tanggalAmbil = $('#tanggalAmbil').val();
            var lamaSewa = parseInt($('#lamaSewa').val()) || 0;
            if (tanggalAmbil && lamaSewa > 0) {
                // ubah menjadi objek Date, agar bisa dihitung dan ditambahkan lamaSewa
                var tglAmbilDate = new Date(tanggalAmbil);
                tglAmbilDate.setDate(tglAmbilDate.getDate() + lamaSewa);
                // ubah menjadi format tanggal Indonesia
                var options = { day: 'numeric', month: 'long', year: 'numeric' };
                var tglKembaliFormatted = tglAmbilDate.toLocaleDateString('id-ID', options);
                // ubah menjadi format YYYY-MM-DD untuk disimpan di hidden input
                var tglKembaliValue = tglAmbilDate.toISOString().split('T')[0];
                $('#tglKembali').val(tglKembaliFormatted);
                if ($('input[name="tanggalKembaliHidden"]').length === 0) {
                    $('<input>').attr({ type: 'hidden', name: 'tanggalKembaliHidden', id: 'tanggalKembaliHidden' }).appendTo('form[name="pesanOnline"]');
                }
                $('#tanggalKembaliHidden').val(tglKembaliValue);
            } else {
                //kosongkan input
                $('#tglKembali').val('');
                $('#tanggalKembaliHidden').val('');
            }
            hitungTotalBayar();
        }

        // fungsi untuk menghitung total bayar dan minimal DP
        function hitungTotalBayar() {
            // mengubah lamaSewa menjadi integer, jika tidak ada inputan ubah menjadi 0
            var lamaSewa = parseInt($('#lamaSewa').val()) || 0;
            var total = 0;
            $(".input_fields_wrap .row").each(function() {
                var row = $(this);
                var idBarang = row.find("select[name='barang[]']").val();
                var qty = parseInt(row.find("input[name='qty[]']").val()) || 0;
                // jika idBarang ada di dataBarangTersedia dan qty lebih dari 0, tambahkan ke total
                if (idBarang && dataBarangTersedia[idBarang] && qty > 0) {
                    total += parseInt(dataBarangTersedia[idBarang].harga) * qty;
                }
            });
            var totalKeseluruhan = total * lamaSewa;
            var minimalDp = totalKeseluruhan * 0.10; 
            // tampilkan total bayar dan minimal DP, tolocalkan ke format mata uang Indonesia
            $('#totalBayar').val("Rp " + totalKeseluruhan.toLocaleString('id-ID'));
            $('#minDp').val("Rp " + minimalDp.toLocaleString('id-ID'));
        }
        
        function initializePage() {
            var today = new Date().toISOString().split('T')[0];
            // Set tanggal ambil ke hari ini dan pastikan tidak bisa memilih tanggal sebelum hari ini
            $('#tanggalAmbil').attr('min', today);
            // Set default tanggal ambil ke hari ini
            $('#tanggalAmbil').val(today);
            // agar fetchAvailableItems dipanggil saat halaman pertama kali dimuat
            $('#tanggalAmbil').trigger('change');
        }

        // --- Event Listeners ---
        $('body').on('click', '#pagination-container .page-link', function(e) {
            e.preventDefault();
            var page = parseInt($(this).data('page'));
            if (!$(this).parent().hasClass('disabled') && !$(this).parent().hasClass('active')) {
                if(page > 0 && page <= Math.ceil(semuaItemTersedia.length / itemsPerPage)) {
                    currentPage = page;
                    displayProductsAndPagination();
                }
            }
        });

        // jika terjadi perubahan pada input tanggalAmbil atau lamaSewa, panggil fungsi
        $('#tanggalAmbil, #lamaSewa').on('change', function() {
            hitungTanggalKembali();
            fetchAvailableItems();
        });

        var wrapper = $(".input_fields_wrap");
        // jika terjadi perubahan pada barang atau qty, hitung harga dan stok
        $(wrapper).on('change', "select[name='barang[]'], input[name='qty[]']", function() {
            var row = $(this).closest('.row');
            // 
            var idBarang = row.find("select[name='barang[]']").val();
            var hargaInput = row.find("input[name='harga[]']");
            var qtyInput = row.find("input[name='qty[]']");
            var qtyValue = parseInt(qtyInput.val()) || 0;
            if (idBarang && dataBarangTersedia[idBarang]) {
                var harga = parseInt(dataBarangTersedia[idBarang].harga);
                hargaInput.val("Rp " + harga.toLocaleString('id-ID'));
                var stokTersedia = dataBarangTersedia[idBarang].stok_tersedia;
                if (qtyValue > stokTersedia) {
                    alertify.error('Stok untuk barang ini hanya tersisa ' + stokTersedia + ' unit.');
                    qtyInput.val(stokTersedia);
                }
            } else {
                hargaInput.val('');
            }
            hitungTotalBayar();
        });
        
        var max_fields = 5; 
        var x = 1; 
        $('.add_field_button').click(function(e) {
            e.preventDefault();
            if (x < max_fields) {
                var selected_ids = [];
                $("select[name='barang[]']").each(function() {
                    if ($(this).val() !== '') {
                        selected_ids.push($(this).val());
                    }
                });
                var options_html = '<option value="">-- Pilih Barang --</option>';
                for (var id in dataBarangTersedia) {
                    if (selected_ids.indexOf(id) === -1) {
                        options_html += `<option value="${dataBarangTersedia[id].id}">${dataBarangTersedia[id].nama}</option>`;
                    }
                }
                if ($(options_html).length > 1 || (options_html.match(/<option/g) || []).length > 1) {
                    x++;
                    var newRowHTML = `
                    <div class="row align-items-center mt-3 mb-3">
                        <div class="col-lg-5 col-sm-12"><div class="form-group mb-0"><select name="barang[]" class="form-control">${options_html}</select></div></div>
                        <div class="col-lg-3 col-sm-12"><div class="form-group mb-0"><input type="text" name="harga[]" class="form-control" placeholder="Harga/Hari" readonly></div></div>
                        <div class="col-lg-2 col-sm-12"><div class="form-group mb-0"><input type="number" name="qty[]" value="1" min="1" class="form-control"></div></div>
                        <div class="col-lg-2 col-sm-12"><button type="button" class="btn btn-danger remove_field">&times;</button></div>
                    </div>`;
                    $(wrapper).append(newRowHTML);
                } else {
                    alertify.warning('Semua barang yang tersedia sudah dipilih.');
                }
            } else {
                alertify.warning('Anda hanya dapat menambah maksimal ' + max_fields + ' jenis barang.');
            }
        });
        
        $(wrapper).on("click", ".remove_field", function(e) { 
            e.preventDefault();
            $(this).closest('.row').remove(); 
            x--;
            hitungTotalBayar();
        });

        // Panggil fungsi inisialisasi
        initializePage();
    });
</script>
</body>
</html>