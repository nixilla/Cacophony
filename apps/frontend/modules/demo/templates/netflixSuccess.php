<h3>Netflix titles</h3>

<p>Searching for term <em>star</em></p>
<p>Result:</p>

<ul>
  <?php foreach ($titles->autocomplete->autocomplete_item as $title): ?>
  <li><?php print_r($title->title->short); ?></li>
  <?php endforeach; ?>
</ul>

<p>Some methods to call:</p>

<ul>
  <li><?php echo link_to('catalog/titles/autocomplete','@demo_call?provider=netflix&method=catalog/titles/autocomplete&term=where'); ?></li>
</ul>

<p>For more methods go to <a href="http://developer.netflix.com/docs/REST_API_Reference">Netflix API page</a> | <?php echo link_to('Home','@homepage'); ?></p>