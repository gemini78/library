<?php 
if (get_session_user() == null) {
    redirect("?page=login");
}