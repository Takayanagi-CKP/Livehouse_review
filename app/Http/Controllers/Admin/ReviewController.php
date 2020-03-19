<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
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
        $query = Review::query();
        $keyword = $request->input('keyword');

        $reviews = Review::with('livehouse:id,livehouse_name,region')
            ->when($request->input('keyword') ?? null, function($query, $keyword) {
                $query->where('comments','like','%'. $keyword .'%')
                    ->orWhere('title','like','%'. $keyword .'%')
                    ->orWhere('user_name','like','%'. $keyword .'%');
            })
            ->orderBy('id', 'desc')
            ->paginate(50);

        // 全体のレビュー数
        $total_review_count = Review::countReviewTotal();

        // お客さんのレビュー数
        $total_review_count_audience = Review::countReviewTotalByAudience();

        // 出演者のレビュー数
        $total_review_count_player = Review::countReviewTotalByPlayer();

        // その他のレビュー数
        $total_review_count_other = Review::countReviewTotalByOther();

        return view('admin/reviews')->with('reviews', $reviews)
            ->with('keyword', $keyword)
            ->with('total_review_count', $total_review_count)
            ->with('total_review_count_audience', $total_review_count_audience)
            ->with('total_review_count_player', $total_review_count_player)
            ->with('total_review_count_other', $total_review_count_other);
    }

    public function edit($id)
    {
        $review = Review::find($id);
        return view('admin/review_edit', compact('review'));
    }

    public function update(ReviewRequest $request, $id)
    {
        $review = Review::find($id);

        $review->user_name     = $request->user_name;
        $review->title         = $request->title;
        $review->comments      = $request->comments;
        $review->user_type     = $request->user_type;
        $review->points        = $request->points;
        $review->comments_like = $request->comments_like;
        $review->save();

        return redirect("admin/reviews");
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();

        return redirect("admin/reviews");
    }
}