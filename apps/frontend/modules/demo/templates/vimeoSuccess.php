<h3>Vimeo</h3>
<?php if($videos->videos->total): ?>
<p>You have uploaded <?php echo $videos->videos->total; ?> video(s):</p>
<ul>
<?php foreach ($videos->videos->video as $video): ?>
  <li><?php echo sprintf('%s - uploaded on: %s, (id: %s)',$video->title, $video->upload_date, $video->id); ?></li>
<?php endforeach; ?>
</ul>
<?php else: ?>
<p>You haven't uploaded any videos.</p>
<?php endif; ?>

<p>Some methods to call:</p>

<ul>
  <li><?php echo link_to('vimeo.videos.getInfo','@demo_call?provider=vimeo&method=vimeo.videos.getInfo&video_id=30288013'); ?></li>
  <li><?php echo link_to('vimeo.videos.getLikes','@demo_call?provider=vimeo&method=vimeo.videos.getLikes'); ?></li>
  <li><?php echo link_to('vimeo.videos.getLikers','@demo_call?provider=vimeo&method=vimeo.videos.getLikers&video_id=30288013'); ?></li>
  <li><?php echo link_to('vimeo.videos.getSubscriptions','@demo_call?provider=vimeo&method=vimeo.videos.getSubscriptions'); ?></li>
</ul>

<p>For more methods go to <a href="http://vimeo.com/api/docs/methods">Vimeo API page</a></p>