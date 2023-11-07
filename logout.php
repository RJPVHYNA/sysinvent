<?php
session_start();
if(isset($_SESSION['id_user_sorteio'])){
	unset($_SESSION['id_user_sorteio']);
}
print "<script>window.location='./';</script>";
?>