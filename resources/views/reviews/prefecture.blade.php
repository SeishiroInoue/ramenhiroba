{{-- 星を表示　--}}
<div>
    @switch ($review->prefecture)
        @case('北海道') <span><a href="{{ route('prefecture.search', ['prefecture' => '北海道']) }}" class="badge badge-info">北海道</a></span>@break
        @case('青森県') <span><a href="{{ route('prefecture.search', ['prefecture' => '青森県']) }}" class="badge badge-info">青森県</a></span>@break
        @case('岩手県') <span><a href="{{ route('prefecture.search', ['prefecture' => '岩手県']) }}" class="badge badge-info">岩手県</a></span>@break
        @case('宮城県') <span><a href="{{ route('prefecture.search', ['prefecture' => '宮城県']) }}" class="badge badge-info">宮城県</a></span>@break
        @case('秋田県') <span><a href="{{ route('prefecture.search', ['prefecture' => '秋田県']) }}" class="badge badge-info">秋田県</a></span>@break
        @case('山形県') <span><a href="{{ route('prefecture.search', ['prefecture' => '山形県']) }}" class="badge badge-info">山形県</a></span>@break
        @case('福島県') <span><a href="{{ route('prefecture.search', ['prefecture' => '福島県']) }}" class="badge badge-info">福島県</a></span>@break
        @case('茨城県') <span><a href="{{ route('prefecture.search', ['prefecture' => '茨城県']) }}" class="badge badge-info">茨城県</a></span>@break
        @case('栃木県') <span><a href="{{ route('prefecture.search', ['prefecture' => '栃木県']) }}" class="badge badge-info">栃木県</a></span>@break
        @case('群馬県') <span><a href="{{ route('prefecture.search', ['prefecture' => '群馬県']) }}" class="badge badge-info">群馬県</a></span>@break
        @case('埼玉県') <span><a href="{{ route('prefecture.search', ['prefecture' => '埼玉県']) }}" class="badge badge-info">埼玉県</a></span>@break
        @case('千葉県') <span><a href="{{ route('prefecture.search', ['prefecture' => '千葉県']) }}" class="badge badge-info">千葉県</a></span>@break
        @case('東京都') <span><a href="{{ route('prefecture.search', ['prefecture' => '東京都']) }}" class="badge badge-info">東京都</a></span>@break
        @case('神奈川県') <span><a href="{{ route('prefecture.search', ['prefecture' => '神奈川県']) }}" class="badge badge-info">神奈川県</a></span>@break
        @case('新潟県') <span><a href="{{ route('prefecture.search', ['prefecture' => '新潟県']) }}" class="badge badge-info">新潟県</a></span>@break
        @case('富山県') <span><a href="{{ route('prefecture.search', ['prefecture' => '富山県']) }}" class="badge badge-info">富山県</a></span>@break
        @case('石川県') <span><a href="{{ route('prefecture.search', ['prefecture' => '石川県']) }}" class="badge badge-info">石川県</a></span>@break
        @case('福井県') <span><a href="{{ route('prefecture.search', ['prefecture' => '福井県']) }}" class="badge badge-info">福井県</a></span>@break
        @case('山梨県') <span><a href="{{ route('prefecture.search', ['prefecture' => '山梨県']) }}" class="badge badge-info">山梨県</a></span>@break
        @case('長野県') <span><a href="{{ route('prefecture.search', ['prefecture' => '長野県']) }}" class="badge badge-info">長野県</a></span>@break
        @case('岐阜県') <span><a href="{{ route('prefecture.search', ['prefecture' => '岐阜県']) }}" class="badge badge-info">岐阜県</a></span>@break
        @case('静岡県') <span><a href="{{ route('prefecture.search', ['prefecture' => '静岡県']) }}" class="badge badge-info">静岡県</a></span>@break
        @case('愛知県') <span><a href="{{ route('prefecture.search', ['prefecture' => '愛知県']) }}" class="badge badge-info">愛知県</a></span>@break
        @case('三重県') <span><a href="{{ route('prefecture.search', ['prefecture' => '三重県']) }}" class="badge badge-info">三重県</a></span>@break
        @case('滋賀県') <span><a href="{{ route('prefecture.search', ['prefecture' => '滋賀県']) }}" class="badge badge-info">滋賀県</a></span>@break
        @case('京都府') <span><a href="{{ route('prefecture.search', ['prefecture' => '京都府']) }}" class="badge badge-info">京都府</a></span>@break
        @case('大阪府') <span><a href="{{ route('prefecture.search', ['prefecture' => '大阪府']) }}" class="badge badge-info">大阪府</a></span>@break
        @case('兵庫県') <span><a href="{{ route('prefecture.search', ['prefecture' => '兵庫県']) }}" class="badge badge-info">兵庫県</a></span>@break
        @case('奈良県') <span><a href="{{ route('prefecture.search', ['prefecture' => '奈良県']) }}" class="badge badge-info">奈良県</a></span>@break
        @case('和歌山県') <span><a href="{{ route('prefecture.search', ['prefecture' => '和歌山県']) }}" class="badge badge-info">和歌山県</a></span>@break
        @case('鳥取県') <span><a href="{{ route('prefecture.search', ['prefecture' => '鳥取県']) }}" class="badge badge-info">鳥取県</a></span>@break
        @case('島根県') <span><a href="{{ route('prefecture.search', ['prefecture' => '島根県']) }}" class="badge badge-info">島根県</a></span>@break
        @case('岡山県') <span><a href="{{ route('prefecture.search', ['prefecture' => '岡山県']) }}" class="badge badge-info">岡山県</a></span>@break
        @case('広島県') <span><a href="{{ route('prefecture.search', ['prefecture' => '広島県']) }}" class="badge badge-info">広島県</a></span>@break
        @case('山口県') <span><a href="{{ route('prefecture.search', ['prefecture' => '山口県']) }}" class="badge badge-info">山口県</a></span>@break
        @case('徳島県') <span><a href="{{ route('prefecture.search', ['prefecture' => '徳島県']) }}" class="badge badge-info">徳島県</a></span>@break
        @case('香川県') <span><a href="{{ route('prefecture.search', ['prefecture' => '香川県']) }}" class="badge badge-info">香川県</a></span>@break
        @case('愛媛県') <span><a href="{{ route('prefecture.search', ['prefecture' => '愛媛県']) }}" class="badge badge-info">愛媛県</a></span>@break
        @case('高知県') <span><a href="{{ route('prefecture.search', ['prefecture' => '高知県']) }}" class="badge badge-info">高知県</a></span>@break
        @case('福岡県') <span><a href="{{ route('prefecture.search', ['prefecture' => '福岡県']) }}" class="badge badge-info">福岡県</a></span>@break
        @case('佐賀県') <span><a href="{{ route('prefecture.search', ['prefecture' => '佐賀県']) }}" class="badge badge-info">佐賀県</a></span>@break
        @case('長崎県') <span><a href="{{ route('prefecture.search', ['prefecture' => '長崎県']) }}" class="badge badge-info">長崎県</a></span>@break
        @case('熊本県') <span><a href="{{ route('prefecture.search', ['prefecture' => '熊本県']) }}" class="badge badge-info">熊本県</a></span>@break
        @case('大分県') <span><a href="{{ route('prefecture.search', ['prefecture' => '大分県']) }}" class="badge badge-info">大分県</a></span>@break
        @case('宮崎県') <span><a href="{{ route('prefecture.search', ['prefecture' => '宮崎県']) }}" class="badge badge-info">宮崎県</a></span>@break
        @case('鹿児島県') <span><a href="{{ route('prefecture.search', ['prefecture' => '鹿児島県']) }}" class="badge badge-info">鹿児島県</a></span>@break
        @case('沖縄県') <span><a href="{{ route('prefecture.search', ['prefecture' => '沖縄県']) }}" class="badge badge-info">沖縄県</a></span>@break
    @endswitch    
</div>