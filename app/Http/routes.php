<?php

get('/api/rodri', function () {
    return response()->json(\App\User::find(1)->products);
});

get('rodri', function () {
    $products = \App\User::find(1)->products;
    return view('list', compact('products'));
});

get('all', function () {
    $products = \App\Product::all();
    return view('list', compact('products'));
});
