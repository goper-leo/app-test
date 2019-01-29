<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Passer;
use Illuminate\Http\Request;
use DB;

class PassersController extends Controller
{
  /**
   * Fetch passers info's
   *
   * @return Response
   */
  public function index(Request $request)
  {
    if ($request->filled('keyword')) {
      $keyword = $request->keyword;
      $passers = Passer::where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('school', 'LIKE', '%' . $keyword . '%')
                ->orWhere('division', 'LIKE', '%' . $keyword . '%')
                ->paginate(50);
    } else {
      $passers = Passer::orderBy('name')->paginate(50);
    }

    return response()->json(compact('passers'));
  }

  /**
   * Store
   *
   * @param  Request $request
   * @return response
   */
  public function store(Request $request)
  {
    $passer = Passer::create($request->all());

    return response()->json(['success' => true, 'message' => trans('message.passers.store.success')]);
  }

  /**
   * Sort by school
   * @param  Request $request [description]
   * @return response
   */
  public function sort(Request $request)
  {
    $data = Passer::select('division', DB::raw('count(*) as total'))
            ->orderBy('division')
            ->groupBy('division')->get();
            
    return response()->json(compact('data'));
  }
}
