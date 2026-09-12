<?php

if (getenv('VERCEL')) {
	@mkdir('/tmp/views', 0775, true);
}

require __DIR__.'/../public/index.php';
