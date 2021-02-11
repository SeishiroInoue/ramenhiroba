<h1>ラーメン広場</h1>
<div>
    <p><b>食べたラーメンの写真と感想を共有できるアプリです。</b></p>
    <p><b>URL：</b><a href="https://www.ramenhiroba.com/" target="_blank">https://www.ramenhiroba.com/</a></p>
</div>
<div>
    <h2>アプリ概要</h2>
    <p>このアプリのコンセプトは、以下の2点です。
    <ol type="1">
        <li>手軽に食べたラーメンの感想を共有できる</li>
        <li>手軽に様々なラーメンのレビューを集めることができる</li>
    </ol>
    <p>ラーメンが集まる場所をイメージして<b>「ラーメン広場」</b>というサービスを開発しました。
    <p>基本的にはレビューの投稿、コメント、お気に入り、コメント機能があるSNSですが、以下の特徴がラーメンに特化しています。<p>
    <ul>
        <li>ラーメンのおすすめ度(スコア)、都道府県の情報をレビューと一緒に登録できる</li>
        <li>上記2つとタグ機能を使って簡単にレビューを条件付き検索できる</li>
        <li>場所がグーグルマップにピン止めしてあるため、レビューを見て行きたくなったときに行きやすい</li>
        <li>レビュー詳細ページでは同じ店舗のレビューが関連して表示される</li>
        <li>お気に入り数が多いレビューなどのランキング画面で評判の良いレビューを見ることができる</li>
</div>
<div>
    <h2>開発した背景</h2>
    <p>私はラーメンが好きなのですが、ラーメンを好きな人が集まった空間を作り、そこでラーメンの情報を集めたり、感想を共有したいと思ったのがきっかけです。</p>
    <p>そこで、ラーメンの情報として欲しい基本的な要素</p>
    <ul>
        <li>画像</li>
        <li>都道府県</li>
        <li>おすすめ度(スコア)</li>
        <li>位置情報(地図)</li>
    </ul>
    <p>の要素を入れたレビューを投稿できるさサービスを開発することにしました。</p>
<div>
    <h2>使用画面のイメージ</h2>
    <h3>トップページ(1)<h3>
    <img src="https://user-images.githubusercontent.com/72069383/104877852-1c557700-599e-11eb-9187-4ed04d89bf27.png">
    <h3>トップページ(2)<h3>
    <img src="https://user-images.githubusercontent.com/72069383/104877966-5888d780-599e-11eb-8c0c-cc8c4d65b0a5.png">
    <h3>投稿画面<h3>
    <img src="https://user-images.githubusercontent.com/72069383/104878138-bb7a6e80-599e-11eb-9862-2e3d22b814bf.png">
    <h3>都道府県検索(例：兵庫県)<h3>
    <img src="https://user-images.githubusercontent.com/72069383/104878380-2d52b800-599f-11eb-9447-cbc51e4eafa8.png">
    <h3>レビュー詳細画面(1)<h3>
    <img src="https://user-images.githubusercontent.com/72069383/104897619-ede69480-59bb-11eb-8025-068fd9116c4a.png">
    <h3>レビュー詳細画面(2)<h3>
    <img src="https://user-images.githubusercontent.com/72069383/104878749-db5e6200-599f-11eb-9207-7994419fbf4d.png">
    <h3>ユーザー詳細画面<h3>
    <img src="https://user-images.githubusercontent.com/72069383/104883126-99391e80-59a7-11eb-9c54-66ddfe295825.png">
    <h3>ランキング画面<h3>
    <img src="https://user-images.githubusercontent.com/72069383/104883537-43b14180-59a8-11eb-8b78-136822541a9f.png">
</div>
<div>
    <h2>使用技術</h2>
     <ul>
        <li><b>フロントエンド</b></li>  
         <ul type="circle">
             <li>jQuery 3.3.1</li>
             <li>HTML/CSS/Bootstrap 4.2.1</li>
         </ul>
    </ul>
    <ul>
        <li><b>バックエンド</b></li>  
         <ul type="circle">
             <li>PHP 7.3.24</li>
             <li>Laravel 6.20.7</li>
             <li>PHPUnit 6.5.5</li>
             <li>Google Maps Platform API(Maps JavaScript API)</li>
             <li>CircleCI</li>
         </ul>
    </ul>
    <ul>
        <li><b>インフラ</b></li>  
         <ul type="circle">
             <li>HEROKU</li>
             <li>PostgreSQL </li>
             <li>AWS(S3)</li>
         </ul>
    </ul>
    <ul>
        <li><b>その他使用ツール</b></li>  
         <ul type="circle">
             <li>AWS(Cloud9)</li>
             <li>GIMP 2.10</li>
         </ul>
    </ul>
</div>
<div>
    <h2>機能一覧</h2>
    <ul>
        <li><b>ユーザー登録関連</b></li>  
         <ul type="circle">
             <li>新規登録、表示、プロフィール編集、退会機能(CRUD)</li>
             <li>ログイン、ログアウト機能</li>
             <li>ゲストユーザーログイン機能(簡単ログイン機能)</li>
         </ul>
    </ul>
    <ul>
        <li><b>Google Maps Platform API連携</b></li>  
         <ul type="circle">
             <li>店名や地名でマップを検索してピンを立てる機能</li>
             <li>ピンを立てて投稿、表示機能</li>
         </ul>
    </ul>
    <ul>
        <li><b>レビュー投稿関連</b></li>  
         <ul type="circle">
             <li>新規投稿、削除機能</li>
             <li>画像投稿機能(AWS S3バケット)</li>
             <li>おすすめ度(スコア)、都道府県、地図投稿機能</li>
         </ul>
    </ul>
    <ul>
        <li><b>同じ店舗のレビューを関連表示機能</b></li> 
    </ul>
    <ul>
        <li><b>画像拡大表示機能</b></li> 
    </ul>
    <ul>
        <li><b>レビュー内容表示/折りたたみ機能</b></li> 
    </ul>
    <ul>
        <li><b>ページネーション機能</b></li>  
         <ul type="circle">
             <li>レビュー一覧、コメント一覧、ユーザー一覧、フォロー/フォロワー一覧、ランキング一覧など</li>
         </ul>
    </ul>     
    <ul>
        <li><b>ユーザーパスワード編集機能</b></li> 
    </ul>
    <ul>
        <li><b>コメント投稿関連</b></li>
        <ul type="circle">
             <li>新規投稿、削除機能</li>
             <li>画像投稿機能(AWS S3バケット)</li>
         </ul>
    </ul>
    <ul>
        <li><b>レビュー検索機能関連</b></li>
        <ul type="circle">
             <li>キーワード検索(ユーザー名、レビュー内容、都道府県、タグが対象)</li>
             <li>おすすめ度(スコア)検索</li>
             <li>都道府県検索</li>
             <li>タグ検索</li>
         </ul>
    </ul>
    <ul>
        <li><b>フォロー/フォロワー機能</b></li> 
    </ul>
    <ul>
        <li><b>お気に入り機能</b></li> 
    </ul>
    <ul>
        <li><b>ゲストユーザー関連</b></li>
        <ul type="circle">
             <li>退会防止機能</li>
             <li>初期レビュー(3件)削除防止機能</li>
         </ul>
    </ul>
    <ul>
        <li><b>レスポンシブWEBデザイン</b></li> 
    </ul>
</div>
<div>
    <h2>データベース設計</h2>
    <h3>ER図</h3>
    <img src="https://user-images.githubusercontent.com/72069383/104967890-d04f1480-5a27-11eb-850c-1a5015fea0cb.png">
    <h3>各テーブルについて</h3>
    <table>
        <tr>
            <th>テーブル名</th>
            <th>説明</th>
        </tr>
        <tr>
            <td>users</td>
            <td>登録ユーザー情報</td>
        </tr>
        <tr>
            <td>reviews</td>
            <td>ユーザー投稿の情報</td>
        </tr>
        <tr>
            <td>comments</td>
            <td>ユーザー投稿への、コメントの情報</td>
        </tr>
        <tr>
            <td>favorites</td>
            <td>投稿への、お気に入りの情報</td>
        </tr>
        <tr>
            <td>user_follow</td>
            <td>フォロー中/フォロワーのユーザー情報</td>
        </tr>
        <tr>
            <td>tags</td>
            <td>ユーザー投稿のタグ情報</td>
        </tr>
        <tr>
            <td>review_tag</td>
            <td>reviewsとtagsの中間テーブル</td>
        </tr>
    </table>    
</div>