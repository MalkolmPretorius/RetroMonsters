<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monster;

class SearchController extends Controller
{

    public function searchText(Request $request)
    {
        $texte = $request->input('texte');

        $monsters = Monster::where('name', 'like', "%$texte%")->get();

        return view('search.results', ['monsters' => $monsters]);
    }

    public function searchCriteria(Request $request)
{
    $typeId = $request->input('type');
    $raretyId = $request->input('rarety_id');
    $minPv = $request->input('min_pv');
    $maxPv = $request->input('max_pv');
    $minAttaque = $request->input('min_attaque');
    $maxAttaque = $request->input('max_attaque');

    $query = Monster::query();

    if ($typeId !== null) {
        $query->where('type_id', $typeId);
    }

    if ($raretyId !== null) {
        $query->where('rarety_id', $raretyId);
    }

    if ($minPv !== null && $maxPv !== null) {
        $query->whereBetween('pv', [$minPv, $maxPv]);
    }

    if ($minAttaque !== null && $maxAttaque !== null) {
        $query->whereBetween('attack', [$minAttaque, $maxAttaque]);
    }

    $monsters = $query->get();

    return view('search.results', ['monsters' => $monsters]);
}
    

}
