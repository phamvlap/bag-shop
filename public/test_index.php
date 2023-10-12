<?php

function foo() {
	$props = func_get_args();
	echo "<pre>";
	print_r($props);
	echo "</pre>";
}

foo('pham', 'van', 'lap');

function get_func_argNames($funcName) {
    $f = new ReflectionFunction($funcName);
    $result = array();
    foreach ($f->getParameters() as $param) {
        $result[] = $param->name;   
    }
    return $result;
}

print_r(get_func_argNames('foo'));



[
    {
        "id_customer": 10,
        "name": "lap pham",
        "username": "lp",
        "password": "fjKF90dj",
        "avatar": "dhdhdh",
        "phone_number": "0373338569",
        "gender": "male",
        "email": "lapb2105580@student.ctu.edu.vn",
        "address": "An Giang"
    },
    {
        "id_customer": 12,
        "name": "pham v lap",
        "username": "b2105580",
        "password": "KGht80of",
        "avatar": "",
        "phone_number": "0373338569",
        "gender": "other",
        "email": "pvl@gmail.com",
        "address": "Xuan Khanh, Ninh Kieu, Can Tho"
    },
    {
        "id_customer": 15,
        "name": "pvlap",
        "username": "b2105582",
        "password": "KGht80of",
        "avatar": "",
        "phone_number": "0373338569",
        "gender": "",
        "email": "pvl@gmail.com",
        "address": "Xuan Khanh, Ninh Kieu, Can Tho"
    },
    {
        "id_customer": 16,
        "name": "pham van lap",
        "username": "b2105580",
        "password": "KGht80of",
        "avatar": "",
        "phone_number": "0373338569",
        "gender": "",
        "email": "pvl@gmail.com",
        "address": "Xuan Khanh, Ninh Kieu, Can Tho"
    }
]