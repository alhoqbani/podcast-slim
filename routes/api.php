<?php
$app->get('/podcasts', \App\Controllers\PodcastsController::class . ':index');
$app->get('/podcasts/{id}', \App\Controllers\PodcastsController::class . ':show');