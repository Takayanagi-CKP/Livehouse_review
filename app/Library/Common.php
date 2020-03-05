<?php

namespace App\Library;

class Common
{
    // 口コミの種類毎のテキスト
    public function showReviewText($review_type) {
        switch ($review_type) {
            // 口コミなし
            case 0:
                return "あなたの口コミを募集中!";
                break;
            // 新着順
            case 1:
                return "みんなの口コミ";
                break;
            // 評価順
            case 2:
                return "みんなの口コミ（評価順）";
                break;
            // いいね順
            case 3:
                return "みんなの口コミ（いいね順）";
                break;
            // お客さんの口コミ
            case 4:
                return "お客さんの口コミ";
                break;
            // 出演者と関係者の口コミ
            case 5:
                return "出演者の口コミ";
                break;
        }
    }

    // 評価ごとの星アイコン
    public function showStarIconByPoint($point) {
        switch ($point) {
            case 0:
                echo "<i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                break;
            case $point <= 0.5:
                echo "<i class='fas fa-star-half-alt'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                break;
            case $point <= 1:
                echo "<i class='fas fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                break;
            case $point <= 1.5:
                echo "<i class='fas fa-star'></i><i class='fas fa-star-half-alt'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                break;
            case $point <= 2:
                echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                break;
            case $point <= 2.5:
                echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star-half-alt'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                break;
            case $point <= 3:
                echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                break;
            case $point <= 3.5:
                echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star-half-alt'></i><i class='far fa-star'></i>";
                break;
            case $point <= 4:
                echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='far fa-star'></i>";
                break;
            case $point <= 4.5:
                echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star-half-alt'></i>";
                break;
            case $point <= 5:
                echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";
                break;
        }
    }

    // 評価の顔アイコン
    public function showFaceIconByPoint($point) {
        switch ($point) {
            case $point <= 0.5:
                echo "<i class='far fa-angry blue'></i>";
                break;
            case $point <= 1:
                echo "<i class='far fa-tired blue'></i>";
                break;
            case $point <= 1.5:
                echo "<i class='far fa-meh-rolling-eyes blue'></i>";
                break;
            case $point <= 2:
                echo "<i class='far fa-frown green'></i>";
                break;
            case $point <= 2.5:
                echo "<i class='far fa-meh green'></i>";
                break;
            case $point <= 3:
                echo "<i class='far fa-smile orange'></i>";
                break;
            case $point <= 3.5:
                echo "<i class='far fa-grin orange'></i>";
                break;
            case $point <= 4:
                echo "<i class='far fa-smile-beam orange'></i>";
                break;
            case $point <= 4.5:
                echo "<i class='far fa-laugh-wink redface'></i>";
                break;
            case $point <= 5:
                echo "<i class='far fa-laugh-beam redface'></i>";
                break;
        }
    }
}