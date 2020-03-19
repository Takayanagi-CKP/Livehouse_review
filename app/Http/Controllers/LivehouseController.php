<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Livehouse;
use App\Review;

class LivehouseController extends Controller
{
    public function index(Request $request)
    {
        $livehouse_repo = new Livehouse;

        // ライブハウスの全件表示
        $livehouses = Livehouse::selectLivehouse();

        // エリアIDがある場合
        $livehouse_capacity = [];
        $capacity = $request->capacity;
        if ($capacity) {
            $livehouse_capacity = Livehouse::selectLivehouseByCapacity($capacity);
        }

        // ライブハウスの合計
        $total_livehouse_count = Livehouse::countLivehouseTotal();

        // レビューの合計
        $total_review_count = Review::countReviewTotal();

        // 最新のレビュー10件
        $newly_reviews = Review::selectNewlyReviews();

        return view('livehouse_list')->with('livehouses', $livehouses)
            ->with('livehouse_repo', $livehouse_repo)
            ->with('livehouse_capacity', $livehouse_capacity)
            ->with('newly_reviews', $newly_reviews)
            ->with('total_review_count', $total_review_count)
            ->with('total_livehouse_count', $total_livehouse_count);
    }
}