<?php
	$data = array();
	$data['foo'] = 'bar';
	$data['post'] = new TimberPost();
	Timber::render('base.twig', $data);