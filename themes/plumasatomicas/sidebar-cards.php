<aside class="sidebar">
	<div class="filler"></div>
<?php
	$card_stacks = fetch_stacks(3);
	foreach ($card_stacks as $each_stack) :
		echo <<<HTML
		<a class="ficha-link" data-id="$each_stack->ID" href="$each_stack->permalink">
			<div class="thumb_container"><img class="thumb_stack" src="$each_stack->thumb"></div>
			<span>$each_stack->name</span><span>$each_stack->card_count FICHAS</span>
		</a>
HTML;
	endforeach; ?>
</aside>