<h1>Welcome to Cacophony App!</h1>

<p>The purpose of this app is to show the possibilities of sfCacophonyPlugin.</p>
<p>By looking into source code, you can find out how to use it and how it works.</p>

<?php if($sf_user->isAuthenticated()): ?>
<p>You are logged in as <?php echo $sf_user->getGuardUser()->getUsername(); ?> using provider: <?php echo ucfirst($sf_user->getCurrentProvider()); ?></p>
<?php endif; ?>

<ul>
  <?php if($sf_user->isAuthenticated()): ?>
  <li><?php echo link_to('Logout','@sf_guard_signout'); ?></li>
  <?php if($sf_user->getCurrentProvider() == 'twitter'): ?><li><?php echo link_to('See what you can do with Twitter','demo/twitter'); ?></li><?php endif; ?>
  <?php if($sf_user->getCurrentProvider() == 'vimeo'): ?><li><?php echo link_to('See what you can do with Vimeo','demo/vimeo'); ?></li><?php endif; ?>
  <?php if($sf_user->getCurrentProvider() == 'facebook'): ?><li><?php echo link_to('See what you can do with Facebook','demo/facebook'); ?></li><?php endif; ?>
  <?php else: ?>
  <li><?php echo link_to('Login with Twitter','@sf_cacophony_connect?provider=twitter'); ?></li>
  <li><?php echo link_to('Login with Vimeo','@sf_cacophony_connect?provider=vimeo'); ?></li>
  <li><?php echo link_to('Login with Facebook','@sf_cacophony_connect?provider=facebook'); ?></li>
  <?php endif; ?>
</ul>
