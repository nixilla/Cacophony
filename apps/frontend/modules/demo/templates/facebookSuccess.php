<h3>Facebook news feed</h3>

<ul>
  <?php foreach($feed->data as $post): ?>
  <li><strong><?php echo $post->from->name; ?></strong> on <?php echo $post->created_time; ?>
    <ul>
      <?php if(isset($post->story)): ?><li><?php echo $post->story ?></li><?php endif; ?>
      <?php if(isset($post->description)): ?><li><?php echo $post->description ?></li><?php endif; ?>
      <?php if(isset($post->message)): ?><li><?php echo $post->message ?></li><?php endif; ?>
    </ul>
  </li>
  <?php endforeach; ?>
</ul>

<p>Some methods to call:</p>

<ul>
  <li><?php echo link_to('me/checkins','@demo_call?provider=facebook&method=me/checkins'); ?></li>
  <li><?php echo link_to('me/likes','@demo_call?provider=facebook&method=me/likes'); ?></li>
</ul>

<p>Please note! Facebook limits access to some methods. Using scope parameter, you can gain access to this methods. For more information ready <a href="http://developers.facebook.com/docs/reference/api/permissions/">Facebook API permissions docs</a> and <a href="https://github.com/nixilla/sfCacophonyPlugin/wiki/Scopes">sfCacophonyPlugin wiki</a></p>

<p>For more methods go to <a href="http://developers.facebook.com/docs/reference/api/">Facebook API page</a> | <?php echo link_to('Home','@homepage'); ?></p>