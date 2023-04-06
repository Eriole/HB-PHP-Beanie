<?php session_start();
session_destroy();

header('Location: ?disconnected=1');