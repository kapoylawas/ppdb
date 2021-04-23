<?php
<<<<<<< HEAD

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
=======
/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
$pager->setSurroundCount(0);
?>
<nav>
	<ul class="pager">
		<li <?= $pager->hasPrevious() ? '' : 'class="disabled"' ?>>
			<a href="<?= $pager->getPrevious() ?? '#' ?>" aria-label="<?= lang('Pager.previous') ?>">
				<span aria-hidden="true"><?= lang('Pager.newer') ?></span>
			</a>
		</li>
		<li <?= $pager->hasNext() ? '' : 'class="disabled"' ?>>
			<a href="<?= $pager->getnext() ?? '#' ?>" aria-label="<?= lang('Pager.next') ?>">
				<span aria-hidden="true"><?= lang('Pager.older') ?></span>
			</a>
		</li>
	</ul>
</nav>
