<div id="notification"></div>
<div id="loader" style="display: none"></div>
<!-- ==== MARKETS ==== -->

<div class="container">

  <div class="tab-grid-market">
    <div class="area-top tab-content z-depth-1 full"><span class="h1">Blog rev.00.2.07</span></div>
      <?php $blog = R::getAll('SELECT * FROM posts'); ?>
      <?php foreach ($blog as $key => $value): ?>
        <div id="<?= $value['id'] ?>" class="tab-content-market z-depth-2">
          <div class="img" style="background: url(<?= $value['image'] ?? '/images/standart_blog.jpg' ?>) no-repeat center center;"></div>
          <div class="info"><span class="h2"><?= $value['name'] ?></span></div>
        </div>
      <?php endforeach; ?>
  </div>

</div>

<div class="ajaxpreview" style="display: none">
  <div class="btn-card-exit-post -btn-exit"></div>
  <div class="ajaxpreview-content z-depth-5">
  </div>
</div>

<script>
  jQuery(document).ready(function($) {
    $('.tab-content-market').click(function() {
      $.ajax({
        type: 'POST',
        url: '/ajaxpreviewpost',
        data: 'card=' + $(this).attr('id'),
        cache: true,
        success: function(result) {
          $('.ajaxpreview-content').html(result);
          $('.ajaxpreview').fadeIn(220);
        },
      });
    });

    $('.-btn-exit').click(function() {
      $(this).parent().fadeOut(220);
    });
  });
</script>
<script src="/scripts/script.js"></script>
<script src="/scripts/ripple.js"></script>
<script src="/scripts/form.js"></script>
