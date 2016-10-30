<?php

function redirection($path) {
	header("Location:".url($path));
	die();
}