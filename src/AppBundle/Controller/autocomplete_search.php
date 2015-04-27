<?php

	if(isset($_GET['type'])) {

		$type= htmlspecialchars($_GET['type'])

		$res = $doctrine->getRepository('AppBundle:'.$type)->findAll();

		$json_ret =  array();


		foreach ($res as $key => $value) {
			$getId = $value->get."$type";

			$row = array();
			$row['label'] = $getId;
			$row['value'] = $value->getLibelle();

			array_push($json_ret, $row);
		}

		echo json_encode($json_ret);

	} else {
		echo '';
	}