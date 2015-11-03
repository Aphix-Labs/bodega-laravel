<?php

get('rodri', function () {
    $products = \App\User::find(1)->products;
    return view('list', compact('products'));
});

get('jp', function () {
    $products = \App\User::find(2)->products;
    return view('list', compact('products'));
});

get('aphix', function () {
    $products = \App\User::find(4)->products;
    return view('list', compact('products'));
});

get('amaury', function () {
    $products = \App\User::find(3)->products;
    return view('list', compact('products'));
});

get('all', function () {
    $products = \App\Product::all();
    return view('list', compact('products'));
});
