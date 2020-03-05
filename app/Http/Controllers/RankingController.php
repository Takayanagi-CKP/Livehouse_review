<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\Common;
use App\Livehouse;
use App\Review;

class RankingController extends Controller
{
    public function index()
    {
        // ライブハウスのレビュー数 TOP10
        $ranking_review_count = Livehouse::selectLivehouseByReviewCount(10);

        // ライブハウスのいいね数 TOP10
        $ranking_livehouse_like = Livehouse::selectLivehouseByLivehouseLike(10);

        // ライブハウスの評価 TOP10
        $ranking_average_points = Livehouse::selectLivehouseByAveragePoint(10);

        // レビューのいいね数 TOP10
        $ranking_audience_comments_like = Review::selectAudienceReviewByCommentsLike(10);

        // 出演者、その他レビューのいいね数 TOP10
        $ranking_player_comments_like = Review::selectPlayerReviewByCommentsLike(10);

        // 最新のレビュー10件
        $newly_reviews = Review::selectNewlyReviews();

        // ライブハウスの合計
        $total_livehouse_count = Livehouse::countLivehouseTotal();

        // レビューの合計
        $total_review_count = Review::countReviewTotal();

        // 共通クラス
        $common = new Common;

        return view('ranking')->with('ranking_review_count', $ranking_review_count)
            ->with('ranking_livehouse_like', $ranking_livehouse_like)
            ->with('ranking_audience_comments_like', $ranking_audience_comments_like)
            ->with('ranking_player_comments_like', $ranking_player_comments_like)
            ->with('ranking_average_points', $ranking_average_points)
            ->with('newly_reviews', $newly_reviews)
            ->with('total_livehouse_count', $total_livehouse_count)
            ->with('total_review_count', $total_review_count)
            ->with('common', $common);
    }
}