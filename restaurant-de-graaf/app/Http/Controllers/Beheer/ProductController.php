<?php

namespace App\Http\Controllers\Beheer;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProductController extends Controller
{
    /**
     * Maakt een nieuwe controllen instantie.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('beheer');
    }

    /**
     * Laat het product overzicht zien.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();

        return view('beheer/product', compact('products'));
    }

    /**
     * Retourneerd de product-toevoeg pagina
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNew()
    {
        $check = User::check_privileges();

        return view('beheer/product-add', compact('check'));
    }

    /**
     * Voegt een nieuw product toe aan de database
     *
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function post(Request $request, Product $product)
    {
        // Validatie
        $this->validate($request, [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'type' => [
                'required',
                'int'
            ],
            'price' => [
                'required',
                'numeric'
            ],
            'enabled' => [
                'required',
                'int'
            ],
            'robot' => ['required']
        ]);

        // Velden en opslaan
        $product->name = request('name');
        $product->subtype = request('type');
        $product->price = request('price');
        $product->enabled = request('enabled');
        $product->save();

        return redirect('/beheer/producten');
    }

    /**
     * Toggles the deletion of a product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete()
    {
        $enabled = request('enabled');
        $id = request('id');

        if ($enabled == 1)
        {
            Product::where('id', $id)->update(['enabled' => 0]);
            $msg = "Het product is succesvol gedeactiveerd!";
        } else
        {
            Product::where('id', $id)->update(['enabled' => 1]);
            $msg = "Het product is succesvol weer toegevoegd!";
        }

        $products = Product::all();
        $putSuccess = true;

        return view('/beheer/product', compact('putSuccess', 'msg', 'products'));
    }

    /**
     * Past de waardes van een bepaald product aan op basis van het request
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function put(Request $request)
    {
        // Validatie
        $this->validate($request, [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'type' => [
                'required',
                'int'
            ],
            'price' => [
                'required',
                'numeric'
            ],
            'enabled' => [
                'required',
                'int'
            ],
            'robot' => ['required']
        ]);

        // Velden
        $name = request('name');
        $subtype = request('type');
        $price = request('price');
        $enabled = request('enabled');

        // Aanpas query
        Product::where('id', \request('id'))->update([
            'name' => $name,
            'subtype' => $subtype,
            'price' => $price,
            'enabled' => $enabled
        ]);

        return redirect('/beheer/producten');
    }

    /**
     * Retourneerd de detailpagina van een product op basis van het id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get()
    {
        // Zet id en pak het bijhorende product
        $id = request('id');
        $product = Product::where('id', $id)->first();

        return view('beheer/product-detail', compact('product'));
    }
}
