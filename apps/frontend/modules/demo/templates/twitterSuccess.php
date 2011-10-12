<h3>Twitter timeline</h3>

<ul>
<?php foreach ($timeline as $tweet): ?>
  <li><strong>@<?php echo $tweet->user->screen_name; ?></strong>: <?php echo $tweet->text; ?></li>
<?php endforeach; ?>
</ul>

<p>Some methods to call:</p>

<ul>
  <li><?php echo link_to('statuses/show','@demo_call?provider=twitter&method=statuses/show&id=46239911975727104'); ?></li>
  <li><?php echo link_to('followers/ids','@demo_call?provider=twitter&method=followers/ids&screen_name=symfony_live'); ?></li>
  <li><?php echo link_to('users/show','@demo_call?provider=twitter&method=users/show&screen_name=symfony_live'); ?></li>
  <li><?php echo link_to('geo/id','@demo_call?provider=twitter&method=geo/id/df51dec6f4ee2b2c'); ?></li>
</ul>

<p>For more methods go to <a href="https://dev.twitter.com/docs/api">Twitter API page</a> | <?php echo link_to('Home','@homepage'); ?></p>