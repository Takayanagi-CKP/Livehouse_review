## 「ライブハウスレビューサイト作ったんだけど口コミある？」

スクラッチのPHPで作成し運用している以下のサイトをLaravelにて書き直したものです。
https://kuchikomiaru.com/livehouse_list.php

ライブハウスレビューサイト主な実装機能
- マイグレーション
- シーディング
- バリデーション
- 各ライブハウスへのレビュー投稿機能
- 各ライブハウス、レビューへのいいね機能
- レビューの並び替え
- ライブハウス公式サイトのスクリーンショット取得API（利用）
- 住所からgoogleMap表示
- 近隣店舗の出力
- ランキング
- ライブハウスのキャパシティごとの表示
- Vueでのインクリメンタルサーチ
- 認証付きCMS管理画面（ライブハウスのCRUD、レビューのRUD）

基本的な機能はだいたい実装できましたが、以下の機能は未実装でこれから実装予定です。
- 連続投稿防止
- 404ページなど
- 投稿のLine通知
- コメントをDocに変更
- 各種バッチ
    * レビューのランダムツイートとツイート内容のLine通知
    * ライブハウス毎のレビュー数と出演者レビューの集計
    * ライブハウス毎の平均評価算出、その他
- Unit Test
