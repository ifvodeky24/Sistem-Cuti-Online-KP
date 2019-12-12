<?php

/* @var $this yii\web\View */

$nama_karyawan=Yii::$app->user->identity->nama_karyawan;


$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang <?php echo $nama_karyawan; ?></h1>

        <p class="lead">Sistem Cuti Online PT.Kunango Jantan</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Sejarah Singkat PT.Kunango Jantan</h2>

                <p><b>PT.KUNANGO JANTAN</b> adalah sebuah perusahaan yang bergerak di bidang manufacturing dan trading yang didirikan berdasarkan Akta Notaris Arry Supratno, SH No. 30 tanggal 09 April 1993, perusahaan ini awalnya bergerak  bidang trading mekanikal elektrikal yang mengakibatkan terjadinya perubahan pada Akta Notaris Frida Damayanti, SH No. 4 tanggal 09 Januari 2001. Pada awal berdirinya perusahaan ini hanya memproduksi Manufacture Tiang Besi. Dimana proses produksi ini ber alamat di Jalan By Pass KM 6 Parak Kerakah, Padang.</p>

                <p>Luas areal pabrik di sana berkisar 3.000 m2 serta telah mempunyai bangunan pabrik yang kokoh, bangunan kantor, yang disertai dengan mes karyawan. Pada awal berdirinya jumlah karyawan di bagian produksi adalah 40 orang serta ditambah dengan pegawai bagian kantor yang terdiri dari 8 orang. Selang beberapa waktu, sejalan dengan makin berkembangnya perusahaan, maka PT.KUNANGO JANTAN akhirnya mengambil langkah baru yaitu dengan melakukan pengembangan terhadap  usahanya, baik dari pengembangan lokasi maupun di bagian diversifikasi usahanya.</p>

                <p>Sekarang, PT.KUNANGO JANTAN telah memiliki pabrik tiang listrik dari beton dan tiang pancang (spun pile) yang beralamat  di Jl. Raya Pekanbaru – Bangkinang Km.23 Desa Rimbo Panjang, Kec. Tambang, RIAU- Indonesia. Produksi tisng listrik dari beton ini sangat diprioritaskan untuk mendukung program pemetaan jaringan listrik yang dimana konsumen terbesar dari produksi ini adalah PT.PLN (Persero) se Sumatera.</p>

            </div>
            <div class="col-lg-4">
                <h2>Visi PT.KUNANGO JANTAN</h2>

                <p>“Ikut menunjang Pembangunan Listrik & Infrastruktur Bagi Masyarakat Luas”</p>

            </div>
            <div class="col-lg-4">
                <h2>Misi PT.KUNANGO JANTAN</h2>

                <p>Demi mewujudkan visi tersebut, <b>PT.KUNANGO JANTAN</b> memiliki misi sebangai berikut :</br>
                        <p>a.  Menjadi sebuah pabrik Tiang Beton dan Tiang Pancang yang terpercaya, dan selalu mengutamakan kualitas demi kepuasan pelanggan.</p>
                        <p>b.  Memperhatikan dan peduli terhadap kondisi lingkungan sekitar pabrik</p>
                        <p>c.  Mengembangkan perusahaan dengan manajemen yang bersifat professional, sehat dan menguntungkan.</p>
                        <p>d.  Menjadi mitra bisnis yang tepat di bidang pelistrikan dan infrastruktur Indonesia.</p>
                        <p>e.  Menyadari bahwa setiap hasil dari produksi nantinya bisa dipakai dan bermanfaat bagi kehidupan orang banyak.</p>
                        <p>f.  Menjadi seuatu kebanggaan bagi setiap karyawan dan karyawati yang bekerja di perusahaan.</p>

            </div>
        </div>

    </div>
</div>
