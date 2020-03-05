<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LivehouseRequest;
use App\Http\Controllers\Controller;
use App\Livehouse;
use App\Review;

class LivehouseController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Livehouse::query();

        // 検索キーワードがある場合
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $query->where('livehouse_name','like','%' . $keyword .'%')
                ->orWhere('address','like','%' . $keyword . '%')
                ->orWhere('keyword','like','%' . $keyword . '%');
        }

        // エリアIDがある場合
        $area_id = $request->area;
        if ($area_id) {
            $query->where('area', $area_id);
        }

        // ライブハウス
        $livehouses = $query->orderBy('region', 'asc')
            ->orderBy('city', 'asc')
            ->paginate(50);

        // レビューの合計
        $total_review_count = Review::countReviewTotal();

        return view('admin/livehouses')->with('livehouses', $livehouses)
            ->with('keyword', $keyword)
            ->with('area_id', $area_id)
            ->with('total_review_count', $total_review_count);
    }

    public function show($id)
    {
        $livehouse = Livehouse::find($id);
        return view('admin/show', compact('livehouse'));
    }

    public function edit($id)
    {
        $livehouse = Livehouse::find($id);
        return view('admin/edit', compact('livehouse'));
    }

    public function update(LivehouseRequest $request, $id)
    {
        $livehouse = Livehouse::find($id);

        $livehouse->livehouse_name       = $request->livehouse_name;
        $livehouse->livehouse_short_name = $request->livehouse_short_name;
        $livehouse->livehouse_detail     = $request->livehouse_detail;
        $livehouse->livehouse_img        = "livehouse1.png";
        $livehouse->livehouse_url        = $request->livehouse_url;
        $livehouse->genre                = $request->genre;
        $livehouse->area                 = $request->area;
        $livehouse->region               = $request->region;
        $livehouse->city                 = $request->city;
        $livehouse->address              = $request->address;
        $livehouse->capacity             = $request->capacity;
        $livehouse->tag1                 = $request->tag1;
        $livehouse->tag2                 = $request->tag2;
        $livehouse->tag3                 = $request->tag3;
        $livehouse->livehouse_like       = 0;
        $livehouse->keyword              = $request->keyword;
        $livehouse->save();

        return redirect("admin/livehouses");
    }

    public function create()
    {
        return view('admin/create');
    }

    public function store(LivehouseRequest $request)
    {
        $livehouse = Livehouse::create();

        $livehouse->livehouse_name       = $request->livehouse_name;
        $livehouse->livehouse_short_name = $request->livehouse_short_name;
        $livehouse->livehouse_detail     = $request->livehouse_detail;
        $livehouse->livehouse_img        = "livehouse1.png";
        $livehouse->livehouse_url        = $request->livehouse_url;
        $livehouse->genre                = $request->genre;
        $livehouse->area                 = $request->area;
        $livehouse->region               = $request->region;
        $livehouse->city                 = $request->city;
        $livehouse->address              = $request->address;
        $livehouse->capacity             = $request->capacity;
        $livehouse->tag1                 = $request->tag1;
        $livehouse->tag2                 = $request->tag2;
        $livehouse->tag3                 = $request->tag3;
        $livehouse->livehouse_like       = 0;
        $livehouse->keyword              = $request->keyword;
        $livehouse->save();

        return redirect("admin/livehouses");
    }

    public function destroy($id)
    {
        $livehouse = Livehouse::find($id);
        $livehouse->delete();

        return redirect("admin/livehouses");
    }
}