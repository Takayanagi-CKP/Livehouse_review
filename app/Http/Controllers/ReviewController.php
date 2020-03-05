<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Controllers\Controller;
use App\Library\Common;
use App\Review;
use App\Livehouse;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $livehouse_id = $request->id;
        $review_type  = is_null($request->review_type) ? 1 : $request->review_type;

        // ライブハウス情報
        $livehouse = Livehouse::find($livehouse_id);

        // レビューの並び替えと絞り込み
        switch ($review_type) {
            // 全ての口コミ（新着順）
            case 1:
                $reviews = review::selectReviewsById($livehouse_id);
                break;
            // 全ての口コミ（評価順）
            case 2:
                $reviews = review::selectReviewsByPoints($livehouse_id);
                break;
            // 全ての口コミ（いいね順）
            case 3:
                $reviews = review::selectReviewsByLike($livehouse_id);
                break;
            // お客さんの口コミ
            case 4:
                $reviews = review::selectReviewsForAudience($livehouse_id);
                break;
            // 出演者の口コミ
            case 5:
                $reviews = review::selectReviewsForPlayer($livehouse_id);
                break;
        }

        // レビューの合計数
        $review_count = count($reviews);

        // 出演者レビューの有無
        $is_player_review = review::isPlayerReviews($livehouse_id);

        // レビューが0件の場合のテキストタイプ
        $review_type = $review_count ? $review_type : 0;

        // 最近のレビュー（レビュー数+2件またはレビューがない場合は3件）
        $newly_reviews_count = $review_count ? $review_count + 2 : 3;
        $newly_reviews       = Review::selectNewlyReviews($newly_reviews_count);

        // 近隣の店舗
        $around_livehouse = Livehouse::selectAroundLivehouse(
            $livehouse['region'],
            $livehouse['city'],
            $livehouse_id
        );

        // 共通クラス
        $common      = new Common;
        $review_text = $common->showReviewText($review_type);

        return view('review')->with('reviews', $reviews)
            ->with('livehouse', $livehouse)
            ->with('around_livehouse', $around_livehouse)
            ->with('newly_reviews', $newly_reviews)
            ->with('review_count', $review_count)
            ->with('review_text', $review_text)
            ->with('is_player_review', $is_player_review)
            ->with('common', $common);
    }

    // レビューの投稿
    public function store(ReviewRequest $request)
    {
        $review = review::create();

        // ユーザー名が空の場合は「名無し」を入れる
        $user_name = $request->user_name ? : '名無し';

        $review->livehouse_id  = $request->id;
        $review->user_name     = $user_name;
        $review->title         = $request->title;
        $review->comments      = $request->comments;
        $review->user_type     = $request->user_type;
        $review->points        = $request->points;
        $review->comments_like = 0;
        $review->save();

        return redirect("review?id=" . $request->id . "#review");
    }

    // ライブハウスのいいね
    public function updateLivehouseLike($id)
    {
        $livehouse = Livehouse::find($id);

        $livehouse->increment('livehouse_like');
        $livehouse->save();

        return redirect("review?id=" . $id . "#livehouse_like");
    }

    // レビューのいいね
    public function updateReviewLike($id)
    {
        $review = review::find($id);

        $review->increment('comments_like');
        $review->save();

        return redirect("review?id=" . $review['livehouse_id'] . "#review" . $id);
    }
}