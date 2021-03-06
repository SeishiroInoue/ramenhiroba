<h1 class="text-center"><b>全国のラーメンを探す</b></h1>
<hr>
<div class="japan_map mb-3">
    <img src="https://ramenhiroba.s3-ap-northeast-1.amazonaws.com/japan-map.png" alt="日本地図">
    <span class="area_btn area1" data-area="1">北海道・東北</span>
    <span class="area_btn area2" data-area="2">関東</span>
    <span class="area_btn area3" data-area="3">中部</span>
    <span class="area_btn area4" data-area="4">近畿</span>
    <span class="area_btn area5" data-area="5">中国・四国</span>
    <span class="area_btn area6" data-area="6">九州・沖縄</span>
    
    <div class="area_overlay"></div>
    <div class="pref_area">
        <div class="pref_list" data-list="1">
            <div data-id="北海道">北海道</div>
            <div data-id="青森県">青森県</div>
            <div data-id="岩手県">岩手県</div>
            <div data-id="宮城県">宮城県</div>
            <div data-id="秋田県">秋田県</div>
            <div data-id="山形県">山形県</div>
            <div data-id="福島県">福島県</div>
            <div></div>
        </div>
        
        <div class="pref_list" data-list="2">
            <div data-id="茨城県">茨城県</div>
            <div data-id="栃木県">栃木県</div>
            <div data-id="群馬県">群馬県</div>
            <div data-id="埼玉県">埼玉県</div>
            <div data-id="千葉県">千葉県</div>
            <div data-id="東京都">東京都</div>
            <div data-id="">神奈川県</div>
            <div></div>
        </div>
        
        <div class="pref_list" data-list="3">
            <div data-id="新潟県">新潟県</div>
            <div data-id="富山県">富山県</div>
            <div data-id="石川県">石川県</div>
            <div data-id="福井県">福井県</div>
            <div data-id="山梨県">山梨県</div>
            <div data-id="長野県">長野県</div>
            <div data-id="岐阜県">岐阜県</div>
            <div data-id="静岡県">静岡県</div>
            <div data-id="愛知県">愛知県</div>
            <div></div>
        </div>
        
        <div class="pref_list" data-list="4">
            <div data-id="三重県">三重県</div>
            <div data-id="滋賀県">滋賀県</div>
            <div data-id="京都府">京都府</div>
            <div data-id="大阪府">大阪府</div>
            <div data-id="兵庫県">兵庫県</div>
            <div data-id="奈良県">奈良県</div>
            <div data-id="和歌山県">和歌山県</div>
            <div></div>
        </div>
        
        <div class="pref_list" data-list="5">
            <div data-id="鳥取県">鳥取県</div>
            <div data-id="島根県">島根県</div>
            <div data-id="岡山県">岡山県</div>
            <div data-id="広島県">広島県</div>
            <div data-id="山口県">山口県</div>
            <div data-id="徳島県">徳島県</div>
            <div data-id="香川県">香川県</div>
            <div data-id="愛媛県">愛媛県</div>
            <div data-id="高知県">高知県</div>
            <div></div>
        </div>
        
        <div class="pref_list" data-list="6">
            <div data-id="福岡県">福岡県</div>
            <div data-id="佐賀県">佐賀県</div>
            <div data-id="長崎県">長崎県</div>
            <div data-id="熊本県">熊本県</div>
            <div data-id="大分県">大分県</div>
            <div data-id="宮崎県">宮崎県</div>
            <div data-id="鹿児島県">鹿児島県</div>
            <div data-id="沖縄県">沖縄県</div>
        </div>
    </div>
</div>

<script>
$(function(){
    $('.area_btn').click(function(){
        $('.area_overlay').show();
        $('.pref_area').show();
        var area = $(this).data('area');
        $('[data-list]').hide();
        $('[data-list="' + area + '"]').show();
    });
    
    $('.area_overlay').click(function(){
        prefReset();
    });
    
    $('.pref_list [data-id]').click(function(){
        if($(this).data('id')){
            var id = $(this).data('id');
            window.location.href = '/prefecture?prefecture=' + id;
            
            prefReset();
        }
    });
    
    function prefReset(){
        $('[data-list]').hide();
        $('.pref_area').hide();
        $('.area_overlay').hide();
    }
});
</script>