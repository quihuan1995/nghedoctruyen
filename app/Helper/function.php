<?php
function isImgGenre($image){
    if (file_exists( public_path() . '/image_genres/' . $image)) {
        return '/image_genres/' . $image;
    } else {
        return '/admins/img/no-img.jpg';
    }
}

function isImgBook($image){
    if (file_exists( public_path() . '/image_books/' . $image)) {
        return '/image_books/' . $image;
    } else {
        return '/image_books/no-img.jpg';
    }
}

function isAvatar($avatar){
    if (file_exists( public_path() . '/avatar_users/' . $avatar)) {
        return '/avatar_users/' . $avatar;
    } else {
        return $avatar;
    }
}

function isGallery($image){
    if (file_exists( public_path() . '/galleries/' . $image)) {
        return '/galleries/' . $image;
    } else {
        return '/galleries/no-img.jpg';
    }
}

function print_dd($print){
    echo "<pre>";
    print_r($print);
    exit;
}

function urlGenre($slug){
    return "/genre/$slug.html";
}

function urlBook($slug){
    return "/book/$slug.html";
}

function urlAuthor($slug){
    return "/author/$slug.html";
}
function urlAccent($slug){
    return "/accent/$slug.html";
}
function postedTimer($minutes) {
    $msg = "";
    if($minutes < 1) {
        $msg = "khoảng 1 phút trước";
    } else if($minutes >= 1 && $minutes < 60) {
        $msg = round($minutes) . " phút trước";
    } else if($minutes >= 60 && $minutes < 1140) {
        $msg = round($minutes / 60) . " giờ trước";
    } else {
    		$msg = round($minutes / (60 * 24)) . " ngày trước";
    }
    return $msg;
}

function str_totime($str = ""){
	if($str == "") return;
	global	$lang_id;
	$time					=	strtotime($str);

	if($lang_id	==	1){
		$arr				=	explode("/", $str);
		$str_convert	=	$arr[1]	.	"/"	.	$arr[0]	.	"/"	.	$arr[2];
		$time				=	strtotime($str_convert);
	}

	return $time;
}
