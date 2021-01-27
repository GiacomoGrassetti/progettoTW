<section class="area-notifica">
    <div class="gradient-top"></div>
    <div class="container-fluid">
        <h1 class="text-center text-white">NOTIFICATION AREA</h1>
        <div class="container d-flex justify-content-center">
            <ul class="list-group">
                <?php foreach($notificationText as $notifica): ?>
                    <li class="list-group-item "><?php echo $notifica["data"]." --> ".$notifica["testo"]?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="gradient-bottom"></div>
</section>