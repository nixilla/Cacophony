<h1>Welcome to Cacophony App!</h1>

<p>The purpose of this app is to show the possibilities of sfCacophonyPlugin.</p>

<?php if($sf_user->isAuthenticated()): ?>
<p>You are logged in as <?php echo $sf_user->getGuardUser()->getUsername(); ?> using provider: <?php echo ucfirst($sf_user->getGuardUser()->getTokens()->get(0)->getProvider()); ?></p>
<?php endif; ?>

<ul>
  <?php if($sf_user->isAuthenticated()): ?>
  <li><?php echo link_to('Logout','@sf_guard_signout'); ?></li>
  <li><?php echo link_to('See what you can do with Twitter','@homepage'); ?></li>
  <li><?php echo link_to('See what you can do with Vimeo','@homepage'); ?></li>
  <li><?php echo link_to('See what you can do with Facebook','@homepage'); ?></li>
  <?php else: ?>
  <li><?php echo link_to('Login with Twitter','@sf_cacophony_connect?provider=twitter'); ?></li>
  <li><?php echo link_to('Login with Vimeo','@sf_cacophony_connect?provider=vimeo'); ?></li>
  <li><?php echo link_to('Login with Facebook','@sf_cacophony_connect?provider=facebook'); ?></li>
  <?php endif; ?>
</ul>
