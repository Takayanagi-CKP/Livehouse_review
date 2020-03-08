<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livehouse extends Model
{
    protected $table = 'livehouse';
    const CREATED_AT = 'regist_date';
    const UPDATED_AT = 'update_time';

    // 登録ライブハウス数
    static public function countLivehouseTotal()
    {
        return Livehouse::count();
    }

    // ライブハウス全件表示
    static public function selectLivehouse()
    {
        return Livehouse::orderBy('region', 'asc')
            ->orderBy('city', 'asc')
            ->orderBy('id', 'asc')
            ->get();
    }

    // キャパシティ別の出力
    static public function selectLivehouseByCapacity($capacity)
    {
        switch ($capacity) {
            // 50以下
            case 1:
                $lower = 0;
                $upper = 50;
                break;
            // 50 〜 100
            case 2:
                $lower = 50;
                $upper = 100;
                break;
            // 100 〜 199
            case 3:
                $lower = 100;
                $upper = 199;
                break;
            // 200 〜 299
            case 4:
                $lower = 200;
                $upper = 299;
                break;
            // 300 〜 499
            case 5:
                $lower = 300;
                $upper = 499;
                break;
            // 500以上
            case 6:
                $lower = 500;
                $upper = 99999;
                break;
        }

        return Livehouse::whereBetween('capacity', [$lower, $upper])
            ->orderBy('capacity', 'asc')
            ->orderBy('region', 'asc')
            ->get();
    }

    // 都市ごとのライブハウス
    static private function selectLivehouseByCity($region, $city)
    {
        return Livehouse::orderBy('id', 'desc')
            ->where('region', $region)
            ->where('city', $city)
            ->get();
    }

    // 近隣のライブハウス3件（レビュー件数順）
    static public function selectAroundLivehouse($region, $city, $livehouse_id)
    {
        // 宮城県のその他のライブハウスが1件だけなので仙台を入れる
        if ($region === "宮城県" && $city === "その他") {
            $city = "仙台";
        }

        return Livehouse::whereNotIn('id', [$livehouse_id])
            ->where('region', $region)
            ->where('city', $city)
            ->orderBy('review_count', 'desc')
            ->limit(3)
            ->get();
    }

    // 都市ごとの表示用
    static public function showLivehouseByCity($region, $city = "その他")
    {
        $livehouses = self::selectLivehouseByCity($region, $city);

        foreach ($livehouses as $key => $livehouse) {
            // レビューがある時のみ件数を表示
            if ($livehouse['review_count']) {
                echo "<i class='far fa-comment has-text-warning'></i> " . $livehouse['review_count'] . " ";
            }

            // ライブハウス名の表示
            echo "<a href='review?id={$livehouse['id']}'>{$livehouse['livehouse_short_name']}</a>";

            // 4件ごと改行を挟む
            if ($key !== 0 && $key % 4 === 0) {
                echo "</br>";
            } else {
                // 最後以外は / をつける
                if ($key !== count($livehouses) -1) {
                    echo " / ";
                }
            }

            // 12件以上の場合はもう一度改行を入れる
            if ($key !== 0 && $key % 12 === 0 && $key !== count($livehouses) -1) {
                echo "</br>";
            }
        }
    }

    // ランキング集計用
    // レビュー数
    static public function selectLivehouseByReviewCount($limit)
    {
        return Livehouse::orderBy('review_count', 'desc')->limit($limit)->get();
    }

    // いいね数
    static public function selectLivehouseByLivehouseLike($limit) {
        return Livehouse::orderBy('livehouse_like', 'desc')->limit($limit)->get();
    }

    // レビュー数5件以上の平均評価
    static public function selectLivehouseByAveragePoint($limit) {
        return Livehouse::orderBy('average_points', 'desc')
            ->where('review_count', '>=', 5)
            ->limit($limit)
            ->get();
    }
}
