<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Livehouse;
use App\Review;

class RankingController extends Controller
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
        // ライブハウスのレビュー数 TOP30
        $ranking_review_count = Livehouse::selectLivehouseByReviewCount(30);

        // ライブハウスのいいね数 TOP30
        $ranking_livehouse_like = Livehouse::selectLivehouseByLivehouseLike(30);

        // ライブハウスの平均評価 TOP30
        $ranking_average_points = Livehouse::selectLivehouseByAveragePoint(30);

        // お客さんのレビューのいいね数 TOP30
        $ranking_audience_comments_like = Review::selectAudienceReviewByCommentsLike(30);

        // 出演者、その他レビューのいいね数 TOP30
        $ranking_player_comments_like = Review::selectPlayerReviewByCommentsLike(30);

        // ライブハウスの合計
        $total_livehouse_count = Livehouse::countLivehouseTotal();

        // レビューの合計
        $total_review_count = Review::countReviewTotal();

        return view('admin/ranking')->with('ranking_review_count', $ranking_review_count)
            ->with('ranking_livehouse_like', $ranking_livehouse_like)
            ->with('ranking_audience_comments_like', $ranking_audience_comments_like)
            ->with('ranking_player_comments_like', $ranking_player_comments_like)
            ->with('ranking_average_points', $ranking_average_points)
            ->with('total_livehouse_count', $total_livehouse_count)
            ->with('total_review_count', $total_review_count);
    }
}