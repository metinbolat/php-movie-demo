<?php include 'layout/_header.php' ?>
<?php include 'layout/_navbar.php' ?>

<h1>Nasıl Çalışır?</h1>

<div class="card">
    <div class="card-header">
        Film Ekleme
    </div>
    <div class="card-body">
        <p>Film eklemek için <a href="https://www.themoviedb.org/">TMDB</a> adresinden bir filme ait id seçilmesi gerekiyor.</p>
        <p>Id'yi bir filme ait detay sayfasına tıkladıktan sonra url'de şurada bulabilirsiniz:</p>
        <p><img src="assets/images/tmdb-id.png" class="img-thumbnail rounded-0" alt=""></p>
        <p>Daha sonra bu id, index.php sayfasındaki form alanına giriliyor.</p>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Filmler
    </div>
    <div class="card-body">
        <p>Filmlerin altındaki "Detay" butonları film detay sayfasına gider.</p>
        <p>Burada 2 Bootstrap card component'i bulunur.</p>
        <p>Soldaki kartta yer alan veriler, <span class="text-danger fw-bold">Movie class'ı üzerinden Object olarak</span>,
            sağdakiler ise aynı class üzerinden <span class="text-danger fw-bold">Array</span> olarak
            veritabanından alınmıştır.</p>
    </div>
</div>

<?php include 'layout/_footer.php' ?>