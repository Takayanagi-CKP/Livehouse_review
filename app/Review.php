<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    const CREATED_AT = 'regist_date';
    const UPDATED_AT = 'update_time';

    Public function livehouse()
    {
        return $this->belongsTo('App\Livehouse');
    }

    // ライブハウスごとのレビュー(新着順)
    static public function selectReviewsById($livehouse_id)
    {
        return review::where('livehouse_id', $livehouse_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    // ライブハウスごとのレビュー(評価順)
    static public function selectReviewsByPoints($livehouse_id)
    {
        return review::where('livehouse_id', $livehouse_id)
            ->orderBy('points', 'desc')
            ->get();
    }

    // ライブハウスごとのレビュー(いいね順)
    static public function selectReviewsByLike($livehouse_id)
    {
        return review::where('livehouse_id', $livehouse_id)
            ->orderBy('comments_like', 'desc')
            ->get();
    }

    // ライブハウスごとのレビュー（お客さん）
    static public function selectReviewsForAudience($livehouse_id)
    {
        return review::where('livehouse_id', $livehouse_id)
            ->where('user_type', 0)
            ->orderBy('id', 'desc')
            ->get();
    }

    // ライブハウスごとのレビュー（出演者とその他）
    static public function selectReviewsForPlayer($livehouse_id)
    {
        return review::where('livehouse_id', $livehouse_id)
            ->where('user_type', '>=', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    // 出演者レビューの有無
    static public function isPlayerReviews($livehouse_id)
    {
        $player_reviews_count = count(self::selectReviewsForPlayer($livehouse_id));
        return !empty($player_reviews_count);
    }

    // トップページ用 評価3以上の新着レビュー（最新2件を除く10件）
    static public function selectNewlyReviews($limit = 10)
    {
        return Review::with('livehouse')
            ->where('points', '>=', 3.5)
            ->orderBy('id', 'desc')
            ->offset(2)
            ->limit($limit)
            ->get();
    }

    // ランキング集計用
    // お客さんレビューのいいね数
    static public function selectAudienceReviewByCommentsLike($limit)
    {
        return Review::with('livehouse')
            ->where('user_type', '=', 0)
            ->orderBy('comments_like', 'desc')
            ->limit($limit)
            ->get();
    }

    // 出演者とその他のレビューのいいね数
    static public function selectPlayerReviewByCommentsLike($limit)
    {
        return Review::with('livehouse')
            ->where('user_type', '>=', 1)
            ->orderBy('comments_like', 'desc')
            ->limit($limit)
            ->get();
    }

    // レビュー数の総合計
    static public function countReviewTotal()
    {
        return Review::count();
    }

    // お客さんのレビュー数の総合計
    static public function countReviewTotalByAudience()
    {
        return Review::where('user_type', '=', 0)->count();
    }

    // 出演者のレビュー数の総合計
    static public function countReviewTotalByPlayer()
    {
        return Review::where('user_type', '=', 1)->count();
    }

    // その他のレビュー数の総合計
    static public function countReviewTotalByOther()
    {
        return Review::where('user_type', '=', 2)->count();
    }
}